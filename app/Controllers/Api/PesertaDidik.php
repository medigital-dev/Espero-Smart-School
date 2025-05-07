<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Libraries\DataPesertaDidik;
use App\Models\PesertaDidikModel;
use CodeIgniter\API\ResponseTrait;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PesertaDidik extends BaseController
{
    use ResponseTrait;
    protected $mPesertaDidik;

    public function __construct()
    {
        helper(['indonesia', 'text']);
        $this->mPesertaDidik = new PesertaDidikModel();
    }

    public function exportExcelPublicTable()
    {
        $dataPdLib = new DataPesertaDidik;
        $rows = $dataPdLib
            ->active()
            ->withAlamat()
            ->withOrtuWali()
            ->withFilter()
            ->get();

        $array = [];
        $i = 1;
        foreach ($rows as $row) {
            $temp = [
                $i++,
                $row['kelas'],
                $row['nama'],
                $row['nipd'],
                $row['nisn'],
                $row['jwnia_kelamin'],
                $row['tempat_lahir'],
                $row['tanggal_lahir'],
                $row['ibu'],
                $row['dusun'] . ', ' . $row['desa'] . ', ' . $row['kecamatan'],
            ];
            $array[] = $temp;
        }

        $spreadsheet = new Spreadsheet();
        $activeSheet = $spreadsheet->getActiveSheet();
        $activeSheet->setCellValue('A1', 'Daftar Peserta Didik');
        $activeSheet->setCellValue('A2', 'SMP NEGERI 2 WONOSARI');
        $activeSheet->getStyle('A1:A2')->getFont()->setBold(true)->setSize(14);
        $activeSheet->setCellValue('A3', 'Tanggal unduh ' . tanggal('now', 'j F Y') . ' Jam ' . tanggal('now', 'H:i:s') . ' WIB');

        $activeSheet->setCellValue('A5', 'No');
        $activeSheet->setCellValue('B5', 'Kelas');
        $activeSheet->setCellValue('C5', 'Nama');
        $activeSheet->setCellValue('D5', 'NIS');
        $activeSheet->setCellValue('E5', 'NISN');
        $activeSheet->setCellValue('F5', 'Jenis Kelamin');
        $activeSheet->setCellValue('G5', 'Tempat Lahir');
        $activeSheet->setCellValue('H5', 'Tanggal Lahir');
        $activeSheet->setCellValue('I5', 'Nama Ibu Kandung');
        $activeSheet->setCellValue('J5', 'Alamat');
        $activeSheet->mergeCells('A5:A6');
        $activeSheet->mergeCells('B5:B6');
        $activeSheet->mergeCells('C5:C6');
        $activeSheet->mergeCells('D5:D6');
        $activeSheet->mergeCells('E5:E6');
        $activeSheet->mergeCells('F5:F6');
        $activeSheet->mergeCells('G5:G6');
        $activeSheet->mergeCells('H5:H6');
        $activeSheet->mergeCells('I5:I6');
        $activeSheet->mergeCells('J5:J6');

        $thead = $activeSheet->getStyle('A5:J6');
        $thead->getAlignment()->setVertical(Alignment::VERTICAL_CENTER)->setHorizontal(Alignment::HORIZONTAL_CENTER)->setWrapText(true);
        $thead->getFont()->setBold(true);
        $thead->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $thead->getFill()->getStartColor()->setARGB('D3D3D3');
        $activeSheet->getStyle('D7:E' . count($array) + 6)->getNumberFormat()->setFormatCode('@');
        $activeSheet->freezePane('D7');
        $activeSheet->setAutoFilter('A6:J6');

        $activeSheet->fromArray($array, '', 'A7');
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('E')->setWidth(12);
        $activeSheet->getColumnDimension('E')->setWidth(12);
        $activeSheet->getColumnDimension('G')->setWidth(16);
        $activeSheet->getColumnDimension('H')->setWidth(12);
        $activeSheet->getColumnDimension('I')->setWidth(24);
        $activeSheet->getColumnDimension('J')->setAutoSize(true);
        $activeSheet->setSelectedCell('A7');

        $writer = new Xlsx($spreadsheet);
        $dir = 'downloads/';
        if (!file_exists($dir)) mkdir($dir, 0777, true);
        $fileName = 'daftar-pd_' . tanggal('now', 'Y-m-d_H-i-s') . '.xlsx';
        $target = $dir . $fileName;
        $writer->save($target);
        return $this->respond($target);
    }
}
