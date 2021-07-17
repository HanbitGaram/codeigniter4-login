<?php

namespace App\Controllers;

class ResponseController extends BaseController
{
    public function responseJson(array|object $contents) : string {
        $this->response->setHeader('Content-type', 'application/json; charset=utf-8');
        return json_encode($contents);
    }
}
