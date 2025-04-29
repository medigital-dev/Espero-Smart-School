<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
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
        $keyword = $this->request->getPost('keyword');
        $kelas = $this->request->getPost('kelas');
        $tingkat = $this->request->getPost('tingkat');
        $nama = $this->request->getPost('nama');
        $ibu_kandung = $this->request->getPost('ibu_kandung');
        $nipd = $this->request->getPost('nipd');
        $nisn = $this->request->getPost('nisn');
        $jk = $this->request->getPost('jk');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $tanggal_lahir_lengkap = $this->request->getPost('tanggal_lahir_lengkap');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $bulan_lahir = $this->request->getPost('bulan_lahir');
        $tahun_lahir = $this->request->getPost('tahun_lahir');
        $usia_awal = $this->request->getPost('usia_awal');
        $usia_akhir = $this->request->getPost('usia_akhir');
        $dusun = $this->request->getPost('dusun');
        $desa = $this->request->getPost('desa');
        $kecamatan = $this->request->getPost('kecamatan');
        $this->mPesertaDidik
            ->select(['peserta_didik.peserta_didik_id as id', 'peserta_didik.nama', 'peserta_didik.jenis_kelamin as jk', 'nipd as nis', 'nisn', 'peserta_didik.tanggal_lahir', 'peserta_didik.tempat_lahir', 'rombongan_belajar.nama as kelas', 'desa', 'dusun', 'kecamatan', 'orangtua_wali.nama as ibu_kandung'])
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('anggota_rombongan_belajar', 'peserta_didik.peserta_didik_id = anggota_rombongan_belajar.peserta_didik_id', 'left')
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.semester_id = rombongan_belajar.semester_id', 'left')
            ->join('alamat_tinggal', 'alamat_tinggal.nik = peserta_didik.nik', 'left')
            ->join('orangtua_wali_pd', 'orangtua_wali_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('orangtua_wali', 'orangtua_wali.orangtua_id = orangtua_wali_pd.orangtua_id', 'left')
            ->where('status', true)
            ->where('hubungan_keluarga', 'kandung')
            ->where('orangtua_wali.jenis_kelamin', 'P')
        ;
        if ($kelas) $this->mPesertaDidik->where('rombongan_belajar.rombel_id', $kelas);
        if ($tingkat) $this->mPesertaDidik->where('tingkat_pendidikan', $tingkat);
        if ($nama) $this->mPesertaDidik->like('peserta_didik.nama', $nama);
        if ($ibu_kandung) $this->mPesertaDidik->like('orangtua_wali.nama', $ibu_kandung);
        if ($nipd) $this->mPesertaDidik->like('nipd', $nipd);
        if ($nisn) $this->mPesertaDidik->like('nisn', $nisn);
        if ($jk !== 'all') $this->mPesertaDidik->where('peserta_didik.jenis_kelamin', $jk);
        if ($tempat_lahir) $this->mPesertaDidik->like('peserta_didik.tempat_lahir', $tempat_lahir);
        if ($tanggal_lahir_lengkap) {
            $setTagl = date_create_from_format('d/m/Y', $tanggal_lahir_lengkap);
            if ($setTagl)
                $this->mPesertaDidik->where('peserta_didik.tanggal_lahir', date_format($setTagl, 'Y-m-d'));
        }
        if ($tanggal_lahir) $this->mPesertaDidik->where('DAY(peserta_didik.tanggal_lahir)', (int) $tanggal_lahir);
        if ($bulan_lahir) $this->mPesertaDidik->where('MONTH(peserta_didik.tanggal_lahir)', $bulan_lahir);
        if ($tahun_lahir) $this->mPesertaDidik->where('YEAR(peserta_didik.tanggal_lahir)', (int) $tahun_lahir);
        if ($usia_awal && $usia_akhir) {
            if ($usia_awal == $usia_akhir) {
                $dateAwal = date('Y-m-d', strtotime('-' . $usia_awal . ' years -6 months'));
                $dateAkhir = date('Y-m-d', strtotime('-' . $usia_awal . ' years +6 months'));
            } else {
                $dateAwal = date('Y-m-d', strtotime('-' . $usia_awal . ' years'));
                $dateAkhir = date('Y-m-d', strtotime('-' . $usia_akhir . ' years'));
            }

            if ($dateAwal < $dateAkhir) {
                [$dateAwal, $dateAkhir] = [$dateAkhir, $dateAwal];
            }

            $this->mPesertaDidik->where('peserta_didik.tanggal_lahir BETWEEN "' . $dateAkhir . '" AND "' . $dateAwal . '"');
        }
        if ($dusun) $this->mPesertaDidik->like('dusun', $dusun);
        if ($desa) $this->mPesertaDidik->like('desa', $desa);
        if ($kecamatan) $this->mPesertaDidik->like('kecamatan', $kecamatan);
        $rows = $this->mPesertaDidik
            ->groupStart()
            ->like('peserta_didik.nama', $keyword)
            ->orLike('nipd', $keyword)
            ->orLike('nisn', $keyword)
            ->orLike('rombongan_belajar.nama', $keyword)
            ->groupEnd();

        $rows = $rows->orderBy('peserta_didik.nama', 'ASC')->findAll();
        $array = [];
        $i = 1;
        foreach ($rows as $row) {
            $temp = [
                $i++,
                $row['kelas'],
                $row['nama'],
                $row['nis'],
                $row['nisn'],
                $row['jk'],
                $row['tempat_lahir'],
                $row['tanggal_lahir'],
                $row['ibu_kandung'],
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
