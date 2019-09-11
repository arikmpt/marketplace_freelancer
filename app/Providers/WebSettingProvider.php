<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Config;

class WebSettingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if (\Schema::hasTable('web_settings')) {
            $website = DB::table('web_settings')->first();
            if ($website)
            {
                $config = array(
                    'title'     => $website->title,
                    'meta_keyword' => $website->meta_keyword,
                    'meta_description' => $website->meta_description,
                    'logo' => $website->logo ? asset($website->logo) : null,
                    'favicon' => $website->favicon ? asset($website->favicon) : null,
                );
                
                Config::set('website', $config);
            } else {
                $config = array(
                    'title'     => 'No Title Yet',
                    'meta_keyword' => 'No Keyword Set Yet',
                    'meta_description' => 'No Description Set Yet',
                    'logo' => null,
                    'favicon' => null
                );
                Config::set('website', $config);
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
