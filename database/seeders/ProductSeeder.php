<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $products=[
           [
               'name'=>'Mac Mini',
               'details'=>'Apple M1 Chip with 8-Core CPU and 8-Core GPU
                           256GB Storage',
               'description'=>'Every Mac comes with a one-year limited 
                                warranty and up to 90 days of complimentary technical support. AppleCare+ for Mac extends your coverage from your AppleCare+ purchase date and adds up to two incidents of accidental damage protection every 12 months, each subject to a service fee of $99 for screen damage or external enclosure damage, or $299 for other damage, plus applicable tax. In addition, you’ll get 24/7 priority 
                                access to Apple experts via chat or phone. For complete details, see the terms.',
               'brand'=>'Apple',
               'price'=>699,
               'shipping_cost'=>25,
               'image_path'=>'storage/product1.jpg'
           ],
           [
            'name'=>'Galaxy S21 Ultra 5G',
            'details'=>'S21 5G and S21+ 5G.',
            'description'=>'Super high-resolution camera and 8K video.
                              Galaxy\'s fastest processor yet. All-day intelligent battery. 
                              2A striking new design. Everyday just got epic',
            'brand'=>'Samsung',
            'price'=>456,
            'shipping_cost'=>25,
            'image_path'=>'storage/product1.jpg'
        ]
           ];
           foreach($products as $key=>$value){
               Product::create($value); //model. then call this class in database seeder
           }
    }
}
