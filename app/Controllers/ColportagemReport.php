<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ColportagemReport extends BaseController
{

    public function newReport(){
        
        $colportor = $this->request->getPost('colportor');
        $kit_qty = $this->request->getPost('kit_qty');
        $book_qty = $this->request->getPost('book_qty');
        $jav_qty = $this->request->getPost('jav_qty');
        $colportagem_date = $this->request->getPost('colportagem_date');

        $cash = $this->request->getPost('cash');
        $pix = $this->request->getPost('pix');
        $card = $this->request->getPost('card');
        $observation = $this->request->getPost('observation');

    }
}
