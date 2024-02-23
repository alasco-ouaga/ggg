<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Page\Models\Page;
use Botble\Setting\Facades\Setting;
use Botble\Theme\Facades\ThemeOption;
use Carbon\Carbon;

class ThemeOptionSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('general');

        Setting::set(['admin_logo' => 'logo/logo-white.png', 'admin_favicon' => 'logo/favicon.png'])->save();

        $data = [
            'site_title' => 'RG Immobilier',
            'seo_description' => 'Trouver vos besoins immobilieres sur Rg Immobilier',
            'copyright' => sprintf('©%s Flex Home is Proudly Powered by Botble Team.', Carbon::now()->format('Y')),
            'favicon' => 'logo/favicon.png',
            'logo' => 'logo/logo.png',
            'cookie_consent_message' => 'Your experience on this site will be improved by allowing cookies ',
            'cookie_consent_learn_more_url' => '/cookie-policy',
            'cookie_consent_learn_more_text' => 'Cookie Policy',
            'homepage_id' => Page::query()->value('id'),
            'blog_page_id' => Page::query()->skip(1)->value('id'),
            'properties_list_page_id' => Page::query()->skip(6)->value('id'),
            'projects_list_page_id' => Page::query()->skip(7)->value('id'),
            'home_banner' => 'general/home-banner.jpg',
            'breadcrumb_background' => 'general/breadcrumb-background.jpg',
            'address' => 'Arrondissement 3 , sect 14 , Nonsin , Rue 19.71 , Porte 194,Ouagadougou ,Burkina faso',
            'hotline' => '+226 79806666',
            'email' => 'infos@rgi.eliteit.africa',
        ];

        Setting::set($this->prepareThemeOptions($data));

        Setting::set(
            ThemeOption::getOptionKey('social_links'),
            json_encode([
                [
                    [
                        'key' => 'social-name',
                        'value' => 'Facebook',
                    ],
                    [
                        'key' => 'social-icon',
                        'value' => 'fab fa-facebook',
                    ],
                    [
                        'key' => 'social-url',
                        'value' => 'https://facebook.com',
                    ],
                ],
                [
                    [
                        'key' => 'social-name',
                        'value' => 'Twitter',
                    ],
                    [
                        'key' => 'social-icon',
                        'value' => 'fab fa-twitter',
                    ],
                    [
                        'key' => 'social-url',
                        'value' => 'https://twitter.com',
                    ],
                ],
                [
                    [
                        'key' => 'social-name',
                        'value' => 'Youtube',
                    ],
                    [
                        'key' => 'social-icon',
                        'value' => 'fab fa-youtube',
                    ],
                    [
                        'key' => 'social-url',
                        'value' => 'https://youtube.com',
                    ],
                ],
            ])
        );

        Setting::save();
    }
}
