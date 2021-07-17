<?php

namespace App\Controllers;

class ResponseController extends BaseController
{
    public function responseError(String $message, array|object $contents=null): string {
        return $this->responseJson([
            'status'=>false,
            'message'=>$message,
            'contents'=>$contents
        ]);
    }

    public function responseSuccess(String $message, array|object $contents=null): string {
        return $this->responseJson([
            'status'=>true,
            'message'=>$message,
            'contents'=>$contents
        ]);
    }
    public function responseJson(array|object $contents) : string {
        $response = service('response');
        $response->setHeader('Content-type', 'application/json; charset=utf-8');
        return json_encode($contents);
    }

    public function error404(){
        echo $this->responseJson([
            'status'=>false,
            'message'=>'404 Page Not Found Error'
        ]);
    }
}
