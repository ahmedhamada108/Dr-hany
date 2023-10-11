<?php

namespace Database\Seeders;

use App\Models\admins;
use App\Models\awards;
use App\Models\website_settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebstieSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        website_settings::create([
            'slogan' =>null,
            'image_path' =>null,
            'about_us_part1' =>null,
            'about_us_part2' =>null,
            'patient_number' =>null,
            'surgeries_number' =>null,
            'visitors_number' =>null,
            'address' =>null,
            'map_url' =>null,
            'image_path_map' =>null,
            'phone' =>null,
            'mobile' =>null,
            'email' =>null,
            'content_footer' =>null,
            'terms_of_use' =>null,
            'privacy_policy' =>null,
            'whatsapp' =>null,
            'facebook' =>null,
            'linkedin' =>null,
            'instagram' =>null,
            'tiktok' =>null,
        ]);
    }
}
