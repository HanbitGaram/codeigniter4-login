<?php

namespace App\Models;

/**
 * クラス MemberModel
 * @package App\Models
 */
class MemberModel extends BaseModel
{
    protected string $table      = 'members';
    protected array $allowedFields = ['id', 'email', 'password'];

    /**
     * 会員情報を取得
     *
     * @param Int|String $member_id
     * @return object|null
     */
    public function getMember(Int|String $member_id): object|null {
        if( gettype($member_id) === 'string' )
            return $this->where('email', $member_id)->first();
        else
            return $this->where('id', $member_id)->first();
    }

    /**
     * 会員情報設定
     *
     * @param Int $member_id
     * @param object|array|null $update
     * @return bool
     */
    public function setMember(Int $member_id=0, object|array $update=null): bool {
        try{
            return $this->where('id', $member_id)->update($update);
        }catch(\ReflectionException $e){
            return false;
        }
    }

    /**
     * 会員加入
     *
     * パスワード入力及び検証ロジックは
     * 自ら活用してください。
     *
     * @param String|null $email
     * @param String|null $password
     * @return object|bool
     */
    public function registerMember(String $email=null, String $password=null): object|bool{
        if($member = $this->getMember($email))
            return false;
        else
            return $this->insert([
                'email'=>$email,
                'password'=>$password
            ]);
    }

    /**
     * 会員ログインロジック
     *
     * @param String|null $email
     * @param String|null $password
     * @return object|bool
     */
    public function loginMember(String $email=null, String $password=null): object|bool {
        if($member = $this->getMember($email)){
            if($member->password === $password) return $member;
            else return false;
        }
        else
            return false;
    }

}
