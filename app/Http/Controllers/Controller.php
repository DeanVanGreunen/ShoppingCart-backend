<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Products;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function api_is_logged_in(Request $request){
        $api_key = $request->api_key;
        $user = User::all()->where('api_key', $api_key)->first();
         if($user){
            return response()->json([
                'status'=>200,
                'is_logged_in'=>true,
                'message'=>"User is logged in"
            ], 200);
        }
        return response()->json([
            'status'=>200,
            'is_logged_in'=>false,
            'message'=>"User is logged out"
        ], 200);
    }

    public function api_login(Request $request){
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => strtolower($email),'password' => $password])){
            Auth::user()->api_key = Str::random(60);
            Auth::user()->save();
            return response()->json([
                'status'=>200,
                'message'=>"User logged in",
                'api_key'=>Auth::user()->api_key
            ], 200);
        }

        return response()->json([
            'status'=>403,
            'message'=>"Incorrect login details"
        ], 200);
    }

    public function api_register(Request $request){
        $fullname = $request->fullname;
        $email = $request->email;
        $password = $request->password;

        if(!$fullname or !$email or !$password){
            return response()->json([
                'status'=>403,
                'message'=>"Incorrect registration details"
            ], 403);
        }

        if(User::all()->where('email', strtolower($email))->first()){
            return response()->json([
                'status'=>403,
                'message'=>"Email address already in use"
            ], 200);
        }

        $user = User::create([
            'email'=>strtolower($email),
            'name'=>$fullname,
            'password'=>bcrypt($password),
            'api_key'=>Str::random(60),
        ]);

        return response()->json([
            'status'=>200,
            'message'=>"Registration completed"
        ], 200);
    }

    public function api_logout(Request $request){
        $api_key = $request->api_key;
        $user = User::all()->where('api_key', $api_key)->first();
        if($user){
            $user->api_key = null;
            $user->save();
        }
        return response()->json([
            'status'=>200,
            'message'=>"User logged out"
        ], 200);
    }

    public function api_get_product(Request $request){
        $product = Products::all()->where('id', $request->id)->first();
        return response()->json([
            'success'=>200,
            'product'=>$product
        ]);
    }

    public function api_list_products(Request $request){
        $products = Products::all();
        return response()->json([
            'success'=>200,
            'products'=>$products
        ]);
    }

    public function api_get_products_from_ids_and_quantity_array(Request $request){
        // return current user's cart session variable
        $data = $request->data;
        if(!$data){
            return response()->json([
                'status'=>200,
                'products'=>[]
            ]);
        }
        $products = [];
        foreach ($data as $item){
            $product = Products::all()->where('id', $item['id'])->first();
            if($product){
                $products[] = [
                    'id'=>$product->id,
                    'name'=>$product->name,
                    'quantity'=>$item['quantity'],
                    'price'=>$product->price,
                    'image'=>$product->image,
                ];
            }
        }
         return response()->json([
            'status'=>200,
            'products'=>$products
        ]);
    }

    public function api_get_order_history(Request $request){
        $api_key = $request->api_key;
        $user = User::all()->where('api_key', $api_key)->first();
        if($user){
            $_orders = Orders::all()->where('user_id', $user->id)->sortByDesc('created_at');
            $orders = [];
            foreach ($_orders as $order){
                $images = [];
                $total_price = 0;
                $json = $order->order_data;
                $objs = json_decode($json, true);
                foreach ($objs as $obj){
                    $product = Products::all()->where('id', $obj['id'])->first();
                    if($product){
                        $images[] = $product->image;
                    }
                    $total_price += $obj['price'];
                }

                $orders[] = [
                    'id'=>$order->id,
                    'created_at'=>date_format($order->created_at,"F d, y"),
                    'images'=>$images,
                    'price'=>$total_price
                ];
            }
            return response()->json([
                'status'=>200,
                'orders'=>$orders
            ], 200);
        }
        return response()->json([
            'status'=>403,
            'message'=>"User logged out"
        ], 200);
    }

    public function api_create_order(Request $request)
    {
        $api_key = $request->api_key;
        $user = User::all()->where('api_key', $api_key)->first();
        if (!$user) {
            return response()->json([
                'status' => 200,
                'is_logged_in' => true,
                'message' => "User is logged out"
            ], 200);
        }
        $data = $request->data;
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => "No Products Included In The Order"
            ]);
        }
        $products = [];
        foreach ($data as $item) {
            $product = Products::all()->where('id', $item['id'])->first();
            if ($product) {
                $products[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ];
            }
        }

        $order_data = json_encode($products);

        $order = Orders::create([
            'user_id' => $user->id,
            'order_data' => $order_data
        ]);

        $order->save();

        return response()->json([
            'success' => 200,
            'order' => $order,
            'message' => ""
        ]);
    }
}
