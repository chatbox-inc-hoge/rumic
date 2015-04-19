<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/16
 * Time: 16:18
 */

namespace Chatbox\Rumic\Http\Controllers;

use Chatbox\Rumic\Application;
use Closure;


class ControllerCollection {

    /**
     * @var Application
     */
    protected $app;

    protected $name;

    protected $route = [];

    function __construct($name)
    {
        $this->name = $name;
    }


    public function get($path,$route){
        $this->addRoute("GET",$path,$route);
    }
    public function post($path,$route){
        $this->addRoute("POST",$path,$route);
    }

    protected function addRoute($method,$path,$callableRoute,$keepArray=false){
        if(!$callableRoute instanceof Closure){
            $closureRoute = function()use($callableRoute){
                return call_user_func_array($callableRoute,func_get_args());
            };
        }else{
            $closureRoute = $callableRoute;
        }
        $this->route[] = [
            "method" => $method,
            "path" => $this->name.$path,
            "route" => $closureRoute,
        ];
    }

    public function getRouteCollection(){
        return $this->route;
    }

}