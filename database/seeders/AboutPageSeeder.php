<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('business_settings')->where('type' , 'about_us_page')->delete();
        // SA
        DB::table('business_settings')->where('type' , 'about_us_page')->where('lang' , 'sa')->insert([
            'type' => 'about_us_page',
            'lang' => 'sa',
            'value' => file_get_contents(public_path('html/about_ar.html')),
        ]);
        // SA
        DB::table('business_settings')->where('type' , 'about_us_page')->where('lang' , 'en')->insert( [
            'type' => 'about_us_page',
            'lang' => 'en',
            'value' => file_get_contents(public_path('html/about_en.html')),

        ]);
    }
}
