<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\TokenModel;
use TheSeer\Tokenizer\Token;

class MemberController extends BaseController
{
    protected MemberModel $model;
    protected TokenModel $token;
    protected RequestController $requests;
    protected ResponseController $responses;

    public function __construct(){
        $this->model = new MemberModel();
        $this->token = new TokenModel();
        $this->requests = new RequestController();
        $this->responses = new ResponseController();
    }

    /**
     * @return string
     */
    public function login(): string {
        $email = $this->requests->post('email');
        $password = $this->requests->post('password');

        if(!isset($email)) return $this->responses->responseError('email is not empty');
        if(!isset($password)) return $this->responses->responseError('password is not empty');

        if($member = $this->model->loginMember($email, $password)){
            $token_id = $this->token->setToken($member->id);
            $token = $this->token->getToken($token_id);
            return $this->responses->responseSuccess('login success',$token);
        }else{
            return $this->responses->responseError('login failed.');
        }
    }



}
