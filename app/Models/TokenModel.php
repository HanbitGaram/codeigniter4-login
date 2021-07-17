<?php

namespace App\Models;

use CodeIgniter\Database\BaseResult;

/**
 * クラス MemberModel
 * @package App\Models
 */
class TokenModel extends BaseModel
{
    protected string $table      = 'tokens';
    protected array $allowedFields = ['id', 'token', 'user_id', 'exp'];

    /**
     * @param Int $user_id
     * @return string
     */
    public function generateToken(Int $user_id=0): string {
        helper('uuid');
        return sha1(uuidGenerator('new_token', time(), $user_id));
    }

    /**
     * @param Int $user_id
     * @return BaseResult|false|int|object|string
     */
    public function setToken(Int $user_id=0){
        try {
            return $this->insert([
                'token' => $this->generateToken($user_id),
                'user_id' => $user_id,
                'exp' => time() + 604800
            ]);
        } catch (\ReflectionException $e) {
            return false;
        }
    }

    /**
     * @param string $token
     * @return array|object|null
     */
    public function getToken(String|Int $token=''): object|array|null
    {
        if(gettype($token)==='string') $request = $this->where('token', $token)->first();
        else $request = $this->where('id', $token)->first();

        if($result = $request)
            return $result;
        else
            return null;
    }

    /**
     * @param string $token
     * @return bool
     */
    public function validateToken(String $token=''): bool {
        if($result = $this->getToken($token)){
            if($result->exp < time()) return false;
            else true;
        }else{
            return false;
        }
    }
}
