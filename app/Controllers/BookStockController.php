<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookStockModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\AdminController;
use DateTime;

class BookStockController extends BaseController
{

    public function titleList()
    {

        $connect = new BookStockModel();
        $data = $connect->orderBy('name')->findAll();

        $session = session();
        $session->set('stocklist', $data);

        return redirect()->to(base_url('/pages/stock'));
    }

    public function titleDetail()
    {
        $session = session();
        $session->set('isDetail', null);

        $id = $this->request->getGet('id');

        $connect = new BookStockModel();
        $details = $connect->where('id', $id)->first();


        ######## Processing Data ########

        // Book type
        $details['type'] = ($details['type'] == 1) ? "Kit" : "Livro";

        // Arrived Date
        $dateFormat = new DateTime($details['arrived_date']);
        $details['arrived_date'] = $dateFormat->format('d-m-Y');

        if ($details == null) {

            $session->set('isDetail', null);
            echo "Título não encontrado";
            exit;
        }

        $session->set('isDetail', $id);
        $session->set('titleDetails', $details);

        return redirect()->to(base_url('/pages/bookTitle?id=' . $id));
    }

    public function newTitle()
    {

        $connect = new BookStockModel();
        $data = $this->request->getPost();

        if ($data['observations'] === "") $data['observations'] = " ";

        $admin = new AdminController();
        $data['id'] = $admin->newId(); // Create a service
        $inserted = $connect->insert($data);

        if (!$inserted) {

            var_dump($connect->errors());
            exit; // Tratar mensagem de erro

        }

        $session = service('session');
        return redirect()->to(base_url('/pages/stock'));
    }

    public function titleEdit()
    {

        $data = $this->request->getPost();
        $id = $this->request->getGet('id');

        ####### Processing Data #######
        // Arrived Date
        $dateFormat = new DateTime($data['arrived_date']);
        $data['arrived_date'] = $dateFormat->format('Y-m-d');

        // Observations Field
        if ($data['observations'] === "") $data['observations'] = " ";

        $connect = new BookStockModel();
        $connect->update($id, $data);

        return redirect()->to(base_url('/pages/bookTitle?id=' . $id));
    }

    public function titleDelete()
    {

        $id = $this->request->getGet('id');
        $connect = new BookStockModel();
        $connect->delete($id);

        return redirect()->to(base_url('/pages/stock'));
    }
}
