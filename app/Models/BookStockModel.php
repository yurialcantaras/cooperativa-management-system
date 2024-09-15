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
    protected $allowedFields    = ['book_type', 'book_name', 'quantity', 'arrived_date', 'observation'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [

        'book_type'     => 'required|exact_length[1]|is_natural',
        'book_name'     => 'required|max_length[255]|min_length[3]|regex_match[/^[\p{L}\p{N}_\s.]+$/u]',
        'quantity'      => 'required|max_length[20]',
        'arrived_date'  => 'required|valid_date[Y-m-d]',
        'observation'   => 'max_length[255]|regex_match[/^[\p{L}\p{N}_\s.]+$/u]',

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
