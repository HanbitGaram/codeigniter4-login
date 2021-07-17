<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 * クラス BaseModel
 *
 * リファレンス - https://codeigniter4.github.io/userguide/models/model.html
 * このモデルの役割は何もしません。
 *
 * @package App\Models
 */
class BaseModel extends Model{
    protected string $primaryKey = 'id';
    protected bool $useAutoIncrement = true;
    protected string $returnType     = 'object';
    // ソフトデリート設定
    protected bool $useSoftDeletes = true;
    protected bool $useTimestamps = false;
    protected string $createdField  = 'created_at';
    protected string $updatedField  = 'updated_at';
    protected string $deletedField  = 'deleted_at';
    protected array $validationRules    = [];
    protected array $validationMessages = [];
    protected bool $skipValidation     = true;
}