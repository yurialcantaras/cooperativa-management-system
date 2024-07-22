<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookStockModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\AdminController;
use DateTime;

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

    public function titleList()
    {

        $session = session();
        $session->set('stocklist', '');
        $data = $session->get('stocklist');

        $connect = new BookStockModel();
        $data = $connect->findAll();

        $session->set('stocklist', $data);

        return redirect()->to(base_url('/pages/stock'));

    }

    public function titleDetail()
    {
        $session = session();
        $session->set('isDetail', null);

        $request = service('request');
        $id = $request->getGet('id');

        
        $connect = new BookStockModel();
        $details = $connect->where('id', $id)->first();


        ######## Processing Data ########
        
        // Book type
        $details['type'] = ($details['type'] == 1) ? "Kit" : "Livro";

        // Arrived Date
        $dateFormat = new DateTime($details['arrived_date']);
        $details['arrived_date'] = $dateFormat->format('d/m/Y');

        if ($details == null) {
            
            $session->set('isDetail', null);
            echo "Título não encontrado";
            exit;
            
        }
        
        $session->set('isDetail', $id);
        $session->set('titleDetails', $details);

        return redirect()->to(base_url('/pages/title?id='.$id));

    }

    public function titleDelete()
    {



    }
}
