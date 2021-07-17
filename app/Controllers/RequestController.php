<?php

namespace App\Controllers;

class RequestController extends BaseController
{
    public function getRequest(){
        return service('request');
    }

    /**
     * GET データを読み込む
     *
     * @param String|null $name
     * @return mixed
     */
    public function get(String $name=null){
        $request = $this->getRequest();
        return $request->getGet($name);
    }

    /**
     * POST データを読み込む
     *
     * @param String|null $name
     * @return mixed
     */
    public function post(String $name=null){
        $request = $this->getRequest();
        return $request->getPost($name);
    }
}
