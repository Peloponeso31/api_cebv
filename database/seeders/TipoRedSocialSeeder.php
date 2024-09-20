<?php

namespace Database\Seeders;

use App\Models\TipoRedSocial;
use Illuminate\Database\Seeder;

class TipoRedSocialSeeder extends Seeder
{
    public function run(): void
    {
        $redesSociales = [
            'Facebook',
            'Instagram',
            'Facebook Messenger',
            'LinkedIn',
            'Snapchat',
            'Pinterest',
            'Reddit',
            'TikTok',
            'YouTube',
            'Telegram',
            'WhatsApp',
            'WeChat',
            'Douyin',
            'Kuaishou',
            'X (Twitter)',
            'Sina Weibo',
            'Spotify',
            'Flickr',
            'Baidu Tieba',
            'Skype',
            'Vibber',
            'Vkontakte (VK)',
            'Imgur',
            'Fotki',
            'SoundCloud',
            'Tinder',
            'SlideShare'
        ];

        sort($redesSociales);

        foreach ($redesSociales as $redSocial) {
            TipoRedSocial::create([
                'nombre' => $redSocial,
            ]);
        }
    }
}

