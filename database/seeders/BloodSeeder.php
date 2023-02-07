<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blood;
use Illuminate\Support\Facades\DB;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloods')->delete();

        $bloodType = ['A+','A-','B+','B-','O-','O+','AB+','AB-'];

        foreach($bloodType as  $type){
            Blood::create(['name' => $type]);
        }
    }
}
