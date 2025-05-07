<?php

namespace App\Libraries;

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export
{
    public function excel(array $title, array $header, array $rows)
    {
        try {

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Heading (A1 downward)
            $sheet->fromArray($title['heading'], null, 'A1');
            $sheet->getStyle('A1:A' . count($title['heading']))
                ->getFont()->setBold(true)->setSize(14);

            // Mulai baris setelah heading
            $rowPosition = count($title['heading']) + 1;

            // Subheading jika ada
            if (!empty($title['subHeading'])) {
                $sheet->fromArray($title['subHeading'], null, 'A' . $rowPosition);
                $rowPosition += count($title['subHeading']);
            }

            // Skip 1 baris sebelum header kolom utama
            $rowPosition += 1;
            $headerStartRow = $rowPosition;

            // Tulis header kolom dan merge ke baris berikutnya
            $sheet->fromArray($header, null, 'A' . $headerStartRow);

            $lastColIndex = count($header);
            $lastColLetter = Coordinate::stringFromColumnIndex($lastColIndex);

            for ($i = 1; $i <= $lastColIndex; $i++) {
                $colLetter = Coordinate::stringFromColumnIndex($i);
                $sheet->mergeCells("{$colLetter}{$headerStartRow}:{$colLetter}" . ($headerStartRow + 1));
                $sheet->getColumnDimension($colLetter)->setAutoSize(true);
            }

            // Styling header
            $theadRange = "A{$headerStartRow}:{$lastColLetter}" . ($headerStartRow + 1);
            $thead = $sheet->getStyle($theadRange);
            $thead->getAlignment()
                ->setVertical(Alignment::VERTICAL_CENTER)
                ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                ->setWrapText(true);
            $thead->getFont()->setBold(true);
            $thead->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $thead->getFill()->setFillType(Fill::FILL_SOLID)
                ->getStartColor()->setRGB('F0F0F0');

            // Freeze pane tepat di bawah header 2 baris
            $freezeRow = $headerStartRow + 2;
            $sheet->freezePane("A{$freezeRow}");

            // AutoFilter di baris paling bawah header (baris kedua dari merge)
            $sheet->setAutoFilter("A" . ($headerStartRow + 1) . ":{$lastColLetter}" . ($headerStartRow + 1));

            // Tulis data baris-barisnya
            $dataStartRow = $headerStartRow + 2;
            $sheet->fromArray($rows, null, 'A' . $dataStartRow);
            $sheet->setSelectedCell('A1');

            $writer = new Xlsx($spreadsheet);
            $dir = 'downloads/';
            if (!file_exists($dir)) mkdir($dir, 0777, true);
            $fileName = 'daftar-pd_' . tanggal('now', 'Y-m-d_H-i-s') . '.xlsx';
            $target = $dir . $fileName;
            $writer->save($target);
            return [
                'status' => true,
                'http_code' => 200,
                'status_code' => 'success',
                'message' => 'Export file excel berhasil.',
                'error' => null,
                'data' => ['path' => $target, 'filename' => $fileName, 'dir' => $dir],
            ];
        } catch (\Throwable $th) {
            return [
                'status' => false,
                'http_code' => 400,
                'status_code' => 'error',
                'message' => 'Export file excel gagal.',
                'error' => $th->getMessage(),
                'data' => [],
            ];
        }
    }
}
