<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Products;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ////////////////////////////////////////
        // USER TABLE
        ////////////////////////////////////////
        // Delete Table Data
        User::truncate();

        // Seed Table
        User::create([
            'name'=>"Test User",
            'email'=>"test@example.com",
            'password'=>bcrypt('password')
        ]);

        ////////////////////////////////////////
        /// PRODUCT TABLE
        ////////////////////////////////////////
        // Delete Table Data
        Products::truncate();

        // Seed Table with 20 Products
        Products::create([
            'name'=>'Magic Shampoo 1L',
            'price'=>12000,
            'description'=>'',
            'image'=>'https://i.imgur.com/XZRFQBZ.png',
        ]);
        Products::create([
            'name'=>'Protex Deep Clean Soap 150 G',
            'price'=>1299,
            'description'=>'Protex soap deep clean 150g',
            'image'=>'https://i.imgur.com/6kgpMGV.jpg',
        ]);
        Products::create([
            'name'=>'Telefunken 55IN UHD LED TV TLEDD-55UHD',
            'price'=>699900,
            'description'=>'Resolution 3840 x 2160, Brightness 300cd/m2, Contrast ratio 5000: 1, HDMI x 4, USB x 2, AV input x 1, Aspect ratio:16.9, 55 inch TV (139cm), 1-year warranty',
            'image'=>'https://i.imgur.com/Cyn62TB.jpg',
        ]);
        Products::create([
            'name'=>'Huggies Gold HUGGIES GOLD JUMBO SIZE 4 66S',
            'price'=>20000,
            'description'=>'Nappies Jumbo Size 4 66s',
            'image'=>'https://i.imgur.com/hkrjEC2.jpg',
        ]);
        Products::create([
            'name'=>'Campmaster Dome Tent 200',
            'price'=>40000,
            'description'=>'Size: 200cm (L) x 140cm (W) x 100cm (H) perfect for 2 person, Built in groundsheet, Large D door for easy access, Interconnected poles for quick assembly, Mosquito protection',
            'image'=>'https://i.imgur.com/pLx3lgK.jpg',
        ]);
        Products::create([
            'name'=>'Intex Whale ride-on',
            'price'=>20000,
            'description'=>'1.93mx1.19m, 0.30mm vinyl, 2 air chambers, 2 heavy duty handles, Age: 3 and above, Repair patch',
            'image'=>'https://i.imgur.com/njeXfX5.jpg',
        ]);
        Products::create([
            'name'=>'Colgate Toothpaste ACTIVE SALT 75 ML',
            'price'=>1600,
            'description'=>'Assorted',
            'image'=>'https://i.imgur.com/Lzsyeo8.jpg',
        ]);
        Products::create([
            'name'=>'Samsung Galaxy A02s 32GB Dual Sim Black',
            'price'=>249900,
            'description'=>'5000mAh battery capacity, 4G, 13+2+2MP Main Camera, 5MP front camera, Android 10, Ram :3GB ;Rom :32GB, 6.61" Display Size',
            'image'=>'https://i.imgur.com/zBvPxMn.jpg',
        ]);
        Products::create([
            'name'=>'Hisense 514L SXS Fridge',
            'price'=>1399900,
            'description'=>'No Frost, Energy Rating: A+,Touch control digital LED, Door Alarm, Door Lock Present, 4 Year Warranty',
            'image'=>'https://i.imgur.com/iDn61hB.jpg',
        ]);
        Products::create([
            'name'=>'Sunbeam Coffee Grinder SCG-250',
            'price'=>34900,
            'description'=>'70g coffee bean capacity, Grinds coffee beans, nuts and spices, Transparent lid, On/off switch, 250 Watt',
            'image'=>'https://i.imgur.com/3FAmHZA.jpg',
        ]);
        Products::create([
            'name'=>'Ryobi 12V 10mm LI-ION CORDLESS DRILL HLD-120',
            'price'=>59900,
            'description'=>'The Ryobi cordless drill has 21+1 torque setting with variable and an ergonomically designed shell with LED light to illuminate work area.  Its keyless chuck for quick and easy changes, and Li-ion battery and belt hook for increased portability and versatility.',
            'image'=>'https://i.imgur.com/Bd2Z9EA.jpg',
        ]);
        Products::create([
            'name'=>'Trojan Power Gym 1.0',
            'price'=>349900,
            'description'=>'50kg weight stack120kg max user weight, Targets multiple muscle groups, Foam padding included to ensure comfort, 50kg weight stack, 120kg max user weight, Steel cables, Chest, lats-back, arms, biceps, triceps & legs , 1360 x 1080 x 2010mm set up size',
            'image'=>'https://i.imgur.com/69EOxQl.jpg',
        ]);
        Products::create([
            'name'=>'USN Hyperbolic Mass Choc 4 KG',
            'price'=>34900,
            'description'=>'All-in-one mass gainer, Advanced amino acid formulation, Muscle repair, Recovery and gains, Boost performance and power, Cow\'s milk, Soy and fish, Traces of wheat/gluten, Tree nuts and peanuts',
            'image'=>'https://i.imgur.com/UqnOhhM.jpg',
        ]);
        Products::create([
            'name'=>'Lenovo Intel Core I5 Laptop',
            'price'=>799900,
            'description'=>'Operating System, Available with Windows 10 Home, Built To Last, Engineered for long-lasting performance, the IdeaPad S145 delivers, powerful, smooth processing in a stylish, light design. Perfect for everyday computing, this durable 15.6-inch laptop boasts exceptional audio and has fast, secure storage options. Packs A Real Punch, With up to Intel Core i5-1035G1 Processor, the IdeaPad S145 is designed to keep pace with you—no matter the task. It also comes with a range of secure storage options, including a hybrid SSD with hard disc drive, ensuring even faster response times. Unleash Your Inner Traveller, With a starting weight of just 1.85kg (4.08lbs), the IdeaPad S145 is ideal for when you’re on the go. Its narrow bezel makes for a cleaner design and larger display area. And with a choice of colours in a textured or glossy finish, this very affordable laptop is sure to impress, too. Great Sounds, Great Visuals, Whether you’re watching a video, streaming music, or video-chatting, you\'ll love what you hear on the IdeaPad S145- crystal-clear Dolby Audio™. And with the 15.6-inch antiglare display available in HD and FHD, you’ll love what you see as well.',
            'image'=>'https://i.imgur.com/QbIG6yR.jpg',
        ]);
        Products::create([
            'name'=>'Asus ZenBook 14 i7',
            'price'=>2799900,
            'description'=>'The beautiful new ZenBook 14 is more portable than ever. It’s thinner, lighter, and incredibly compact, yet includes HDMI, Thunderbolt™ 3 USB-C®, USB Type-A and MicroSD card reader for unrivalled versatility. Built to deliver powerful performance, ZenBook 14 is your perfect choice for an effortless on-the-go lifestyle.',
            'image'=>'https://i.imgur.com/qcWdq4N.jpg',
        ]);
        Products::create([
            'name'=>'No Brand SIL/GOLD CZ GENTS RING',
            'price'=>189900,
            'description'=>'',
            'image'=>'https://i.postimg.cc/zf9hLrdJ/818729-EA-1200x1200.jpg',
        ]);
        Products::create([
            'name'=>'Initial Round Watch & Bracelet Set L770',
            'price'=>29900,
            'description'=>'Ladies analogue watch with bracelet, Perfect set for gifting',
            'image'=>'https://i.postimg.cc/G2LCxBgz/770032-EA-1200x1200.jpg',
        ]);
        Products::create([
            'name'=>'Nivea For Men Aftershave Splash Sensitive Cool',
            'price'=>10999,
            'description'=>'Nivea men aftershave splash sensitive cool 100ml',
            'image'=>'https://i.postimg.cc/zBccH3sy/701281-EA-1200x1200.jpg',
        ]);
        Products::create([
            'name'=>'Eurolux EUROLUX OPAL BALL & GALLERY G5',
            'price'=>4999,
            'description'=>'Warm White, 25000hrs',
            'image'=>'https://i.postimg.cc/4xXRgHsG/728745-EA-1200x1200.jpg',
        ]);
        Products::create([
            'name'=>'Everlast Grapling Glove Black S/M',
            'price'=>34900,
            'description'=>'The preeminent brand in boxing since 1910. Everlast is the world’s leading manufacturer, marketer and licensor of boxing, MMA and fitness equipment. From legendary champions Jack Dempsey and Sugar Ray Robinson to current superstars Benson Henderson and Canelo Alvarez. Everlast is the brand of choice for generations of world champion professional athletes. Built on a brand heritage of strength, dedication, individuality and authenticity, Everlast is a necessary part of the lives of countless champions.',
            'image'=>'https://i.postimg.cc/P5S9n6Sb/812769002-EA-1200x1200.jpg',
        ]);
    }
}
