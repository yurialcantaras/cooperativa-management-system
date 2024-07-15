<?php

namespace App\Models;

use CodeIgniter\Model;

class AdministratorsModel extends Model
{
    protected $table            = 'administrators';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'password', 'level'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [

        'name'              => 'required|max_length[100]|alpha_numeric_space|min_length[3]',
        'email'             => 'required|max_length[100]|valid_email',
        'password'          => 'required|max_length[100]',
        'confirmPassword'   => 'required_with[password]|max_length[100]|matches[password]',
        'level'             => 'required|exact_length[1]|integer',

    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
