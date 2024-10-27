<?php

namespace App\Controllers;

class RombonganBelajar extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
