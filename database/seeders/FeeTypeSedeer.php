<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FeeType;
use Illuminate\Support\Facades\DB;
class FeeTypeSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fee_types')->delete();

        $feetype = [
            ['ar'=>'رسوم الكتب','en'=>'Books fees'],
            ['ar'=>'رسوم الباص','en'=>'Bus fees'],
            ['ar'=>'رسوم دراسية','en'=>'Study fees'],
        ];

        foreach($feetype as  $type){
            FeeType::create(['name' => $type]);
        }
    }
}
