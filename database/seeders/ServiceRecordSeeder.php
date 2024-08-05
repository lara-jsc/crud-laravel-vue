<?php

namespace Database\Seeders;

use App\Models\ServiceRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        ServiceRecord::factory()->count(10)->create();

    }
}
