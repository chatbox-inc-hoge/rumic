<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/16
 * Time: 16:14
 */

namespace Chatbox\Rumic\Http\Controllers;

use Chatbox\Rumic\Http\Controllers\ControllerCollection;


interface ControllerInterface {

    /**
     * @param ControllerCollection $cc
     * @return ControllerCollection
     */
    public function connect(ControllerCollection $cc);

}