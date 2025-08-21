<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        SocialMedia::insert([
            [
                'id'           => 1,
                'social_media' => 'facebook',
                'profile_link' => 'https://www.facebook.com/',
                'created_at'     => Carbon::now(),
            ],
            [
                'id'           => 2,
                'social_media' => 'twitter',
                'profile_link' => 'https://x.com/?lang=en',
                'created_at'     => Carbon::now(),
            ],
            [
                'id'           => 3,
                'social_media' => 'linkedin',
                'profile_link' => 'https://bd.linkedin.com/',
                'created_at'     => Carbon::now(),
            ],
            [
                'id'           => 4,
                'social_media' => 'instagram',
                'profile_link' => 'https://www.instagram.com/',
                'created_at'     => Carbon::now(),
            ],
        ]);
    }
}
