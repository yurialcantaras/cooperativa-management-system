<?php

namespace App\Controllers;

use App\Controllers\AdminController;

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

    public function index()
    {
        return view('login/index');
    }

    public function signin()
    {
        return view('login/signin');
    }
    
    public function login()
    {

        $data = $this->request->getPost();

        $admin = new AdminController;
        $query = $admin->loginUser($data);

        if ($query) {

            session()->set('user', $query);            
            return redirect()->to(base_url('/pages/dashboard'));
        
        } else {

            # Erro de usuário inexistente
            return redirect()->to(base_url('/'));

        }
    }

    public function managers()
    {

        return view('adm/content/managers', $this->structure);
    }

    public function dashboard()
    {

        $user = session()->get('user');

        if (isset($user) && $user['permission'] >= 9) {
            
            return view('adm/content/dashboard', $this->structure);
            
        }else{

            // Usuário não autorizado
            return redirect()->to(base_url('/'));

        }

    }

    public function stock()
    {

        $data = session()->get('stocklist');
        
        if (!isset($data)) {
            
            return redirect()->to(base_url('/bookstockcontroller/titlelist'));

        }

        $this->structure['stocklist'] = $data;

        session()->set('stocklist', null);
        return view('adm/content/stock', $this->structure);

    }

    public function title()
    {
        $structure['id'] = $this->request->getGet('id');
        
        $session = session();
        $isDetail = $session->get('isDetail');

        if (!isset($isDetail)) {
        
            return redirect()->to(base_url('/bookstockcontroller/titledetail?id=' . $structure['id']));
        
        }

        $this->structure['titleDetails'] = $session->get('titleDetails');
        $session->set('isDetail', null);
        return view('adm/content/book_title', $this->structure);
    }

    public function relatorio()
    {

        $structure['banner'] = view('adm/header/relatorio.header.php');
        $structure['footer'] = view('adm/footer/adm.footer.php');
        return view('adm/content/relatorio', $structure);

    }
}
