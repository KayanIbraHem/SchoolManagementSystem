<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Religion;


class ReligionSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('religions')->delete();

        $religions = [
            ['en'=> 'Muslim','ar'=> 'مسلم'],
            ['en'=> 'Christian','ar'=> 'مسيحي'],
            ['en'=> 'Other', 'ar'=> 'غيرذلك' ],
        ];
        foreach ($religions as $religion) {
            Religion::create(['name' => $religion]);
        }
    }
}
