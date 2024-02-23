<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Language\Models\Language;
use Botble\Language\Models\LanguageMeta;
use Botble\LanguageAdvanced\Supports\LanguageAdvancedManager;
use Botble\Setting\Facades\Setting;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends BaseSeeder
{
    public function run(): void
    {
        Language::query()->truncate();
        LanguageMeta::query()->truncate();

        foreach (LanguageAdvancedManager::supportedModels() as $model) {
            DB::table((new $model())->getModel()->getTable() . '_translations')->truncate();
        }

        Language::query()->create([
            'lang_name' => 'Français',
            'lang_locale' => 'fr',
            'lang_is_default' => true,
            'lang_code' => 'fr_FR',
            'lang_is_rtl' => false,
            'lang_flag' => 'fr',
            'lang_order' => 0,
        ]);        

        Setting::set([
            'language_hide_default' => '1',
            'language_switcher_display' => 'list',
            'language_display' => 'all',
            'language_hide_languages' => '[]',
        ])->save();
    }
}
