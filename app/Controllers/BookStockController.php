<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookStockModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\AdminController;

class BookStockController extends BaseController
{
    public function __construct()
    {
        
    }

    public function newTitle()
    {
        
        $connect = new BookStockModel();
        $data = $this->request->getPost();

        if ($data['observation'] === "") $data['observation'] = " ";

        $admin = new AdminController();
        $data['id'] = $admin->newId();
        $inserted = $connect->insert($data);

        if (!$inserted) {

            var_dump($connect->errors());
            exit; // Tratar mensagem de erro
        
        }

        session()->set('stocklist', NULL);

        return redirect()->to(base_url('/pages/stock'));

    }

    public function titlelist()
    {

        $session = session();
        $session->set('stocklist', '');
        $data = $session->get('stocklist');

        $connect = new BookStockModel();
        $data = $connect->findAll();

        $session->set('stocklist', $data);

        return redirect()->to(base_url('/pages/stock'));

    }
}
