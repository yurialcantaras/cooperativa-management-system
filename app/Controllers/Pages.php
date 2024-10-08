<?php

namespace App\Controllers;

class Pages extends BaseController
{
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

        $structure['banner'] = view('adm/header/adm.header.php');
        $structure['footer'] = view('adm/footer/adm.footer.php');
        return view('adm/content/managers', $structure);
    }

    public function dashboard()
    {

        $structure['banner'] = view('adm/header/adm.header.php');
        $structure['footer'] = view('adm/footer/adm.footer.php');
        return view('adm/content/dashboard', $structure);
    }

    public function stock()
    {

        $data = session()->get('stocklist');
        
        if (!isset($data)) {
            
            return redirect()->to(base_url('/bookstockcontroller/titlelist'));

        }

        $structure['banner'] = view('adm/header/adm.header.php');
        $structure['footer'] = view('adm/footer/adm.footer.php');
        $structure['stocklist'] = $data;

        session()->set('stocklist', null);
        return view('adm/content/stock', $structure);

    }

    public function title()
    {
        $structure['id'] = $this->request->getGet('id');
        
        $session = session();
        $isDetail = $session->get('isDetail');

        if (!isset($isDetail)) {
        
            return redirect()->to(base_url('/bookstockcontroller/titledetail?id=' . $structure['id']));
        
        }

        $structure['banner'] = view('adm/header/adm.header.php');
        $structure['footer'] = view('adm/footer/adm.footer.php');
        $structure['titleDetails'] = $session->get('titleDetails');
        $session->set('isDetail', null);
        return view('adm/content/book_title', $structure);
    }

    public function relatorio()
    {

        $structure['banner'] = view('adm/header/relatorio.header.php');
        $structure['footer'] = view('adm/footer/adm.footer.php');
        return view('adm/content/relatorio', $structure);

    }
}
