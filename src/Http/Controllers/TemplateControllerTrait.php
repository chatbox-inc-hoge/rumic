<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/18
 * Time: 1:39
 */

namespace Chatbox\Rumic\Http\Controllers;

use Illuminate\View\View;

trait TemplateControllerTrait {

    protected $template = "layout";

    protected $contentKey = "content";

    /**
     * @return \Illuminate\View\View|string
     */
    protected function getLayout(View $content){
        $view = view($this->template);
        $view->with($this->contentKey,$content);
        return $view;
    }

}