<?php

namespace Database\Seeders;

use App\Models\membership;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class membershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $memberships = [
            ["Basic", 5, 500, "Access to basic features"],
            ["Standard", 10, 1000, "Access to standard features"],
            ["Premium", 15, 1500, "Access to premium features"],
            ["VIP", 20, 2000, "Access to VIP features"],
        ];

        foreach ($memberships as $membership){
            membership::create([
               "membershipLevel"=>$membership[0],
               "numberOfBooks" => $membership[1],
               "price" => $membership[2],
                "cId" => 1,
                "uId" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "Extra" => $membership[3],
            ]);
        }
    }
}
