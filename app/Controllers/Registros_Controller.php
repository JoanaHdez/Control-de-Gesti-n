<?php

namespace App\Controllers;

class Registros_Controller extends BaseController
{
    public function index()
    {
        $css = [
            'style'=>'asset/css/Registros.css'
        ];
        return view('head', $css)
/*             . view('header') 
 */            . view('Registros');
/*             . view('footer');
 */    }
}