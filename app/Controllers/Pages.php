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

        $structure['banner'] = view('adm/header/adm.header.php');
        $structure['footer'] = view('adm/footer/adm.footer.php');
        return view('adm/content/stock', $structure);
    }

    public function title()
    {
        $structure['banner'] = view('adm/header/adm.header.php');
        $structure['footer'] = view('adm/footer/adm.footer.php');
        return view('adm/content/book_title', $structure);
    }
}