<?php

namespace App\Controllers;

use App\Controllers\AdminController;
use App\Models\BookStockModel;
use App\Models\ReportModel;
use DateTime;

class Pages extends BaseController
{

    public $structure = [];

    public function initController($request, $response, $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->structure['banner'] = view('adm/header/adm.header.php');
        $this->structure['footer'] = view('adm/footer/adm.footer.php');
    }

    public function colportagem()
    {
        $model = new ReportModel();

        if (empty(session()->get('dashboard_range'))) {

            $date_range = new DateTime();

            $closer = $date_range->format('Y-m-d');
            $farther = $date_range->modify('-3 months')->format('Y-m-d');

            session()->set('dashboard_range', [$closer, $farther]);
        } else {

            $range = session()->get('dashboard_range');
            $closer = $range[0];
            $farther = $range[1];
        }

        $condition = "date <= '{$closer}' AND date >= '{$farther}'";
        $result = list_items($model, $condition, null, null);

        ###### BUILDING PAGE ######

        $this->structure['reportList'] = list_items($model, null, "date", "desc");

        $dashboard = dashboard_panel($result, 'kits', 'sum');
        $dashboard += dashboard_panel($result, 'books', 'sum');
        $dashboard += dashboard_panel($result, 'jav', 'sum');
        $dashboard += dashboard_panel($result, 'id', 'total');
        $this->structure['topDashboard'] = view('adm/dashboard/top.dashboard.php', $dashboard);

        return view('adm/content/colportagem', $this->structure);
    }

    public function stock()
    {

        $model = new BookStockModel();

        $data = session()->get('stocklist');

        if (!isset($data)) {

            return redirect()->to(base_url('/BookStockController/titleList'));
        }

        ###### BUILDING PAGE ######

        $this->structure['stocklist'] = $data;
        $result = list_items($model, null, null, null);
        
        $dashboard = dashboard_panel($result, 'quantity', 'sum');
        // var_dump($dashboard);
        // exit;
        $this->structure['topDashboard'] = view('adm/dashboard/top.dashboard.php', $dashboard);

        session()->set('stocklist', null);
        return view('adm/content/stock', $this->structure);
    }

    public function bookTitle()
    {
        $structure['id'] = $this->request->getGet('id');

        $session = session();
        $isDetail = $session->get('isDetail');

        if (!isset($isDetail)) {

            return redirect()->to(base_url('/BookStockController/titleDetail?id=' . $structure['id']));
        }

        $this->structure['titleDetails'] = $session->get('titleDetails');
        $session->set('isDetail', null);
        return view('adm/content/bookTitle', $this->structure);
    }

    public function reportDetails()
    {
        $this->structure['titleDetails'] = 20;
        return view('adm/content/reportDetails', $this->structure);
    }


    public function login()
    {

        $data = $this->request->getPost();

        $admin = new AdminController;
        $query = $admin->loginUser($data);

        if ($query) {

            session()->set('user', $query);
            return redirect()->to(base_url('/Pages/stock'));
        } else {

            # Erro de usuário inexistente
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {

        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function report()
    {

        $this->structure['banner'] = view('adm/header/report.header.php');
        return view('adm/content/report', $this->structure);
    }

    public function newTitle()
    {

        $this->structure['banner'] = view('adm/header/report.header.php');
        return view('adm/content/newTitle', $this->structure);
    }

    public function index()
    {
        return view('login/index');
    }

    public function signin()
    {
        return view('login/signin');
    }

    public function managers()
    {

        return view('adm/content/managers', $this->structure);
    }
}
