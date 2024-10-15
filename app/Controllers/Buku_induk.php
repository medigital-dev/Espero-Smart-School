<?php

namespace App\Controllers;

class Buku_induk extends BaseController
{
    public function index(): string
    {
        return view('templates/admin');
    }
}
