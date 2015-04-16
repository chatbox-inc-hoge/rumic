<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/16
 * Time: 8:37
 */

require __DIR__."/../vendor/autoload.php";

$rumic = new \Chatbox\Rumic\Application();
$rumic->loadEnv(__DIR__."/../");
$rumic->configure([
    "bind" => [
        ['Illuminate\Contracts\Debug\ExceptionHandler','App\Exceptions\Handler',true],
        ['Illuminate\Contracts\Console\Kernel','App\Console\Kernel',true]
    ],
    "register"=>[
        'App\Providers\AppRouteServiceProvider'
    ]
]);

$rumic->run();