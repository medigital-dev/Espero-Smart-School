<?php

namespace App\Libraries;

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
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
            $lastColIndex = count($header);
            $lastColLetter = Coordinate::stringFromColumnIndex($lastColIndex);
            $rowPosition = 1;
            $sheet->fromArray($title['heading'], null, 'A1');
            for ($i = 0; $i < count($title['heading']); $i++) {
                $position = $i + $rowPosition;
                $coordinate = 'A' . $position . ':' . $lastColLetter . $position;
                $sheet->mergeCells($coordinate);
                $sheet->getStyle($coordinate)
                    ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER)
                    ->setHorizontal(Alignment::HORIZONTAL_LEFT);
            }
            $sheet->getStyle('A1:A' . count($title['heading']))
                ->getFont()->setBold(true)->setSize(14);

            $rowPosition += count($title['heading']);

            if (!empty($title['subHeading'])) {
                $sheet->fromArray($title['subHeading'], null, 'A' . $rowPosition);
                for ($i = 0; $i < count($title['subHeading']); $i++) {
                    $position = $i + $rowPosition;
                    $coordinate = 'A' . $position . ':' . $lastColLetter . $position;
                    $sheet->mergeCells($coordinate);
                    $sheet->getStyle($coordinate)
                        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER)
                        ->setHorizontal(Alignment::HORIZONTAL_LEFT);
                }
                $rowPosition += count($title['subHeading']);
            }

            $rowPosition += 1;
            $headerStartRow = $rowPosition;

            $sheet->fromArray($header, null, 'A' . $headerStartRow);

            for ($i = 1; $i <= $lastColIndex; $i++) {
                $colLetter = Coordinate::stringFromColumnIndex($i);
                $sheet->mergeCells("{$colLetter}{$headerStartRow}:{$colLetter}" . ($headerStartRow + 1));
                $sheet->getColumnDimension($colLetter)->setAutoSize(true);
            }

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

            $freezeRow = $headerStartRow + 2;
            $sheet->freezePane("A{$freezeRow}");

            $sheet->setAutoFilter("A" . ($headerStartRow + 1) . ":{$lastColLetter}" . ($headerStartRow + 1));

            $dataStartRow = $headerStartRow + 2;
            $dataEndRow = $dataStartRow + count($rows) - 1;
            $sheet->getStyle("A{$dataStartRow}:{$lastColLetter}{$dataEndRow}")
                ->getNumberFormat()->setFormatCode('@');

            $rowNum = $dataStartRow;
            foreach ($rows as $row) {
                $colNum = 1;
                foreach ($row as $value) {
                    $cell = Coordinate::stringFromColumnIndex($colNum) . $rowNum;
                    if (is_numeric($value) && strlen($value) >= 11) {
                        $sheet->setCellValueExplicit($cell, $value, DataType::TYPE_STRING);
                    } else {
                        $sheet->setCellValue($cell, $value);
                    }
                    $colNum++;
                }
                $rowNum++;
            }

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
