<?php

use Illuminate\Database\Seeder;
use App\Models\WebSetting;

class WebSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebSetting::updateOrCreate([
            'id' => 1
        ],[
            'title' => 'kerja yuk'
        ]);
    }
}
