<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/18
 * Time: 1:39
 */

namespace Chatbox\Rumic\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

/**
 * 規定のステータスコードを添えてJsonResponseを生成する。
 *
 * @package Chatbox\Rumic\Http\Controllers
 */
trait RestControllerTrait {

    protected $jsonOption = 0;

    protected function responseOk(array $data,$status=200,$headers=[]){
        $data["status"] = "OK";
        return $this->response($data,$status,$headers);
    }
    protected function responseBad(array $data,$status=400,$headers=[]){
        $data["status"] = "BAD";
        return $this->response($data,$status,$headers);
    }
    protected function responseBadMessage($msg,$status=400,$headers=[]){
        return $this->responseBad([
            "msg" => $msg
        ],$status,$headers);
    }
    protected function responseError(array $data,$status=500,$headers=[]){
        $data["status"] = "ERROR";
        return $this->response($data,$status,$headers);
    }
    protected function responseException(\Exception $e,$status=500,$headers=[]){
        return $this->responseError([
            "code" => $e->getCode(),
            "file" => $e->getFile(),
            "line" => $e->getLine(),
            "message" => $e->getMessage(),
            "trace" => $e->getTrace(),
        ],$status,$headers);
    }

    /**
     * @param $data
     * @param $status
     * @param array $headers
     * @return JsonResponse
     */
    protected function response($data,$status,$headers=[]){
        $res = $this->createResponse();
        $res->setData($data);
        $res->setStatusCode($status);
        foreach($headers as $key=>$value){
            $res->headers->set($key,$value);
        }
        return $res;
    }

    /**
     * @return JsonResponse
     */
    protected function createResponse(){
        $obj = new JsonResponse();
        if($this->jsonOption){
            $obj->setJsonOptions($this->jsonOption);
        }
        return $obj;
    }


}