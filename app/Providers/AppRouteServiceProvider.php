<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRouteServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        exit("hogehoge");
        $this->app->get("/api/",function(){
            return "hogehoge";
        });
//        $this->app->mount("hoge");
    }
}
