<?php

namespace App\Libraries\baseData;

use App\Models\PesertaDidikModel;

class Pesertadidik
{
    public function getPd(string|bool|null $idOrStatus = null, array|string $select = '*'): array|null|false
    {
        $model = new PesertaDidikModel();
        $model->join('ref_jenis_kelamin', 'ref_jenis_kelamin.ref_id = peserta_didik.jenis_kelamin', 'left')
            ->join('ref_agama', 'ref_agama.ref_id = peserta_didik.agama_id', 'left')
            ->join('pass_foto', 'pass_foto.foto_id = peserta_didik.foto_id', 'left')
            ->orderBy('peserta_didik.nama', 'ASC');

        if ($select == '*')
            $model
                ->select([
                    'peserta_didik.peserta_didik_id',
                    'peserta_didik.nama',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'nisn',
                    'nik',
                    'nomor_akte',
                    'nomor_kk',
                    'anak_ke',
                    'jumlah_saudara',
                    'ref_jenis_kelamin.ref_id as jenis_kelamin_id',
                    'ref_jenis_kelamin.nama as jenis_kelamin_nama',
                    'ref_jenis_kelamin.kode as jenis_kelamin_kode',
                    'ref_jenis_kelamin.bg_color as jenis_kelamin_color',
                    'ref_agama.ref_id as agama_id',
                    'ref_agama.nama as agama_nama',
                    'ref_agama.kode as agama_kode',
                    'ref_agama.bg_color as agama_color',
                    'pass_foto.foto_id as foto_id',
                    'pass_foto.path as foto_path',
                    'pass_foto.filename as foto_filename',
                ]);
        else
            $model->select($select);

        if (is_bool($idOrStatus)) {
            $model->join('anggota_rombongan_belajar', 'anggota_rombongan_belajar.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
                ->join('mutasi_pd', 'mutasi_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
                ->groupBy('peserta_didik.peserta_didik_id')
                ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
                ->join('semester', 'semester.kode = rombongan_belajar.semester_kode', 'left')
            ;
            if ($idOrStatus) {
                $model
                    ->where('semester.status', true);
            } else {
                $model
                    ->groupStart()
                    ->where('mutasi_pd.id !=', null)
                    ->orWhere('anggota_rombongan_belajar.id', null)
                    ->groupEnd()
                ;
            }
        } else if (is_string($idOrStatus))
            return $model->where('peserta_didik.peserta_didik_id', $idOrStatus)->first();

        return $model->findAll();
    }

    public function cariPd(string $keyword, array|string $select = '*'): array
    {
        $model = new PesertaDidikModel();
        $model
            ->select([
                'peserta_didik.peserta_didik_id',
                'peserta_didik.nama',
                'nisn',
                'nik'
            ]);

        if ($select !== '*') {
            $model->select($select);
        }

        $caseSql = "
        CASE 
            WHEN peserta_didik.nama = '{$keyword}' THEN 1
            WHEN nisn = '{$keyword}' THEN 1
            WHEN nik = '{$keyword}' THEN 1
            WHEN peserta_didik.nama LIKE '{$keyword}%' THEN 2
            WHEN nisn LIKE '{$keyword}%' THEN 2
            WHEN nik LIKE '{$keyword}%' THEN 2
            ELSE 3
        END as relevansi
    ";

        return $model
            ->select($caseSql, false)
            ->groupStart()
            ->like('peserta_didik.nama', $keyword)
            ->orLike('nisn', $keyword)
            ->orLike('nik', $keyword)
            ->groupEnd()
            ->orderBy('relevansi', 'ASC')
            ->orderBy('peserta_didik.nama', 'ASC')
            ->findAll();
    }
}
