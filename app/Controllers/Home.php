<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        helper(['my']);
    }

    public function index(): string
    {
        return view('templates/admin');
    }
}
