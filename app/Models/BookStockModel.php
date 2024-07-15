<?php

namespace App\Models;

use CodeIgniter\Model;

class BookStockModel extends Model
{
    protected $table            = 'book_stock';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['type', 'book_name', 'quantity', 'arrived_date',];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [

        'type'          => 'required|exact_length[1]|is_natural',
        'book_name'     => 'required|max_length[255]|alpha_numeric_space|min_length[3]',
        'quantity'      => 'required|max_length[20]',
        'arrived_date'  => 'required|valid_date[Y-m-d]',

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
