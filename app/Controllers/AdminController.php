<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Administrators;
use App\Models\AdministratorsModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\BookStockController;

class AdminController extends BaseController
{

    public function newManager()
    {

        session_start();

        if ($_SESSION['user'] == "c28ada0f-6dbe-11ef-af54-4c2f0690c31f") {
            
            $admin = new AdministratorsModel();
            $data = $this->request->getPost();
            $data['id'] = $this->newId();
            $data['level'] = 1;

            $inserted = $admin->insert($data);

            if (!$inserted) {

                var_dump($admin->errors());

            }

            return redirect()->to(base_url('/pages/dashboard'));

        }

    }

    public function deleteManager()
    {
    }

    public function login()
    {

        $admin = new AdministratorsModel();
        $data = $this->request->getPost();

        $query = $admin->where('email', $data['email'])
            ->where('password', $data['password'])
            ->findAll();

        if ($query) {

            session_start();
            $_SESSION['user'] = $query[0]['id'];
            // Aprimorar o session

            return redirect()->to(base_url('/pages/dashboard'));
        } else {

            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function newId()
    {

        // Criar um helper para a funcao newId

        $admin = new AdministratorsModel();

        if ($admin) {

            $exist = false;

            while ($exist != true) {

                $new_id = random_int(1000000000, 9999999999);

                if ($admin->find($new_id) == false) {

                    $exist = true;
                }
            }

            return $new_id;
        }
    }
}
