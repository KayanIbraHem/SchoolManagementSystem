<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BloodSeeder::class);
        $this->call(NationalitySedeer::class);
        $this->call(ReligionSedeer::class);
        $this->call(SpecializationSeeder::class);
        $this->call(GenderSedeer::class);
        $this->call(FeeTypeSedeer::class);
    }
}
