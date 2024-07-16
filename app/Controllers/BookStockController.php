<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookStockModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\AdminController;

class BookStockController extends BaseController
{
    public function newTitle()
    {
        
        $connect = new BookStockModel();
        $data = $this->request->getPost();
        $admin = new AdminController();

        $data['id'] = $admin->newId();
        $inserted = $connect->insert($data);

        if (!$inserted) {

            var_dump($connect->errors());
            exit;
            // return redirect()->to(base_url('/pages/stock'));
        
        }

        return redirect()->to(base_url('/pages/stock'));

    }

    public function listTitles()
    {

        $connect = new BookStockModel();
        $data = $connect->findAll();

        return $data;

    }
}
