<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\AdminController;
use App\Models\ReportModel;
use CodeIgniter\HTTP\ResponseInterface;

class ReportController extends BaseController
{

    public function newReport(){

        $data = $this->request->getPost();

        $admin = new AdminController;
        $data['id'] = $admin->newId();

        $admin = new ReportModel();
        $inserted = $admin->insert($data);

        if (!$inserted) {
            
            var_dump($admin->error());
            exit;

        }

        return redirect()->to(base_url('/pages/report'));

    }

    public function listReport(){

        $connect = $this->reportConnect;
        $data = $connect->orderBy('date')->findAll();
        var_dump($data);
        
        // return $data;

    }

    public function reportDashboard(){

        

    }
}
