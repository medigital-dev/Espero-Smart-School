<?php

namespace App\Libraries;

use Picqer\Barcode\BarcodeGeneratorPNG;

class Barcode
{
    protected $string;
    protected $barcode;
    protected $barcodeData;

    public function set(string $string)
    {
        $this->string = $string;
        return $this;
    }

    public function to1d()
    {
        $this->barcode = new BarcodeGeneratorPNG();
        $this->barcodeData = $this->barcode->getBarcode($this->string);
        return $this;
    }
}
