<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Administrators;
use App\Models\AdministratorsModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\BookStockController;
use CodeIgniter\Database\Query;
use Faker\Extension\Helper;

class AdminController extends BaseController
{

    public function newManager()
    {

        if ($this->trueSession($_SESSION['user'])) {

            $admin = new AdministratorsModel();
            $data = $this->request->getPost();
            $data['id'] = $this->newId();

            $inserted = $admin->insert($data);

            if (!$inserted) {

                var_dump($admin->errors());
            }

            return redirect()->to(base_url('/pages/dashboard'));
        }
    }

    public function loginUser($data)
    {

        $admin = new AdministratorsModel();
        $query = $admin->where('email', $data['email'])->where('password', $data['password'])->findAll();

        $login = [
            'id'    => $query[0]['id'],
            'name'  => $query[0]['name'],
            'level' => $query[0]['level'],
        ];

        return $login;
    }

    public function login()
    {

        $admin = new AdministratorsModel();
        $data = $this->request->getPost();
        $query = $admin->where('email', $data['email'])->where('password', $data['password'])->findAll();

        if ($query) {

            session()->set('user', $query[0]['id']);
            session()->set('permission', $query[0]['permission']);

            return redirect()->to(base_url('/pages/stock'));
        } else {

            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {

        session_destroy();
        return redirect()->to(base_url('/'));
    }

    public function deleteManager() {}

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

    public function teste()
    {

        $id = "c28ada0f-6dbe-11ef-af54-4c2f0690c31f";
        return $this->trueSession($id);
    }

    private function trueSession($id)
    {

        // Criar uma verificação se o id do usuário nas sessões bate com o nível de acesso no banco de dados

        $admin = new AdministratorsModel();

        if ($admin->find($id)) {
            return true;
        } else {
            return false;
        }
    }
}
