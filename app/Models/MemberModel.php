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
     * @param Int $member_id
     * @return object|null
     */
    public function getMember(Int $member_id=0): object|null {
        return $this->where('id', $member_id)->first();
    }

    /**
     * 会員情報設定
     *
     * @param Int $member_id
     * @param object|array $update
     * @return bool
     */
    public function setMember(Int $member_id=0, object|array $update=null): bool {
        try{
            return $this->where('id', $member_id)->update($update);
        }catch(\ReflectionException $e){
            return false;
        }
    }

}
