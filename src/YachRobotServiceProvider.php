<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tal\Yach\Robot;

use Illuminate\Support\ServiceProvider;

/**
 * Description of YachRobotServiceProvider
 *
 * @author JIAO Jie <thomasjiao@vip.qq.com>
 */
class YachRobotServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        $this->publishes([
            __DIR__ . '/../config/robot.php' => base_path('config/yach/robot.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->registerLaravelBindings();
    }

    /**
     * Register Laravel bindings.
     *
     * @return void
     */
    protected function registerLaravelBindings() {
        $this->app->singleton(DingTalk::class, function ($app) {
            return new DingTalk($app['config']['ding']);
        });
    }

}
