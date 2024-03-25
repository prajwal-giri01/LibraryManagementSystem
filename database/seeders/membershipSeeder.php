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
        $memberships =[
          ["Basic Membership",5,500],
          ["Standard Membership",10,1000],
          ["Premium Membership",15,1500],
          ["VIP Membership",20,2000],
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
            ]);
        }
    }
}
