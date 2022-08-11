<?php

namespace Database\Seeders;

use App\Models\DeliveryAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DeliveryAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryRecords = [
            ['id' => 1,
            'user_id' => '18' ,
            'name' => 'preet' ,
            'address' => 'sector 71' ,
            'city'  => 'mohali' ,
            'state' => 'punjab' ,
            'country' => 'India' ,
            'pincode' => '145656' ,
            'mobile'  => '638408567' ,
            'status'   => 1,],

            ['id' => 2,
            'user_id' => '18' ,
            'name' => 'preet' ,
            'address' => 'sector 74' ,
            'city'  => 'moga' ,
            'state' => 'punjab' ,
            'country' => 'India' ,
            'pincode' => '142001' ,
            'mobile'  => '638408567' ,
            'status'   => 1,],

         ];
         DeliveryAddress::insert($deliveryRecords);
    }
}
