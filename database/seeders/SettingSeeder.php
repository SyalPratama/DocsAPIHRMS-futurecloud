<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


public function run()
{

    Setting::create([

        'name'=>'HRMS Futurecloud',

        'base_url'=>'https://hrms.futurecloud.id',

        'api_key'=>'d0b1a083778582a',

        'api_secret'=>'50b043ffeb42e86',

        'is_active'=>true

    ]);

}
}
