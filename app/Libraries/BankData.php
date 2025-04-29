<?php

namespace App\Libraries;

class BankData
{
    protected $pesertaDidik;

    public function get()
    {
        return true;
    }

    public function all()
    {
        return $this;
    }

    public function public()
    {
        return $this;
    }

    public function active()
    {
        return $this;
    }

    public function withFilter()
    {
        return $this;
    }
}
