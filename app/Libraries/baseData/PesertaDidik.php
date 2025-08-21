<?php

namespace App\Libraries\baseData;

use App\Models\PesertaDidikModel;

class PesertaDidik
{
    public function __construct()
    {
        helper('peserta_didik');
    }

    public function get(string|bool|null $idOrStatus = null, array|string $select = '*'): array|string|null|false
    {
        $model = new PesertaDidikModel();
        $model->join('ref_jenis_kelamin', 'ref_jenis_kelamin.ref_id = peserta_didik.jenis_kelamin', 'left')
            ->join('ref_agama', 'ref_agama.ref_id = peserta_didik.agama_id', 'left')
            ->join('pass_foto', 'pass_foto.foto_id = peserta_didik.foto_id', 'left')
            ->orderBy('peserta_didik.nama', 'ASC');

        // default select
        if ($select === '*') {
            $model->select([
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
        } else {
            $model->select(is_array($select) ? implode(',', $select) : $select);
        }

        if (is_bool($idOrStatus)) {
            $model->join('anggota_rombongan_belajar', 'anggota_rombongan_belajar.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
                ->join('mutasi_pd', 'mutasi_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
                ->groupBy('peserta_didik.peserta_didik_id')
                ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
                ->join('semester', 'semester.kode = rombongan_belajar.semester_kode', 'left');
            if ($idOrStatus) {
                $model->where('semester.status', true);
            } else {
                $model->groupStart()
                    ->where('mutasi_pd.id !=', null)
                    ->orWhere('anggota_rombongan_belajar.id', null)
                    ->groupEnd();
            }
        } elseif (is_string($idOrStatus)) {
            $result = $model->where('peserta_didik.peserta_didik_id', $idOrStatus)->first();
        } else {
            $result = $model->findAll();
        }

        // === Post processing sesuai format $select ===
        if ($select !== '*') {
            if (is_string($select)) {
                // kalau single string → kembalikan langsung value
                if (is_array($result)) {
                    if (array_is_list($result)) {
                        // banyak row
                        return array_map(fn($row) => $row[$select] ?? null, $result);
                    } else {
                        // single row
                        return $result[$select] ?? null;
                    }
                }
            } elseif (is_array($select)) {
                // kalau array → hanya ambil field itu saja
                if (is_array($result)) {
                    if (array_is_list($result)) {
                        // banyak row
                        return array_map(fn($row) => array_intersect_key($row, array_flip($select)), $result);
                    } else {
                        // single row
                        return array_intersect_key($result, array_flip($select));
                    }
                }
            }
        }

        return $result;
    }

    public function search(string $keyword = '', bool|null $isAktif = null, array $option = []): array
    {
        $limit = $option['limit'] ?? null;
        $offset = $option['offset'] ?? 0;

        $model = new PesertaDidikModel();
        $model
            ->select(
                'peserta_didik.peserta_didik_id',
                false
            )
            ->join('registrasi_peserta_didik', 'registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('anggota_rombongan_belajar', 'anggota_rombongan_belajar.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('mutasi_pd', 'mutasi_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->groupBy(['peserta_didik.peserta_didik_id', 'rombongan_belajar.nama'])
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.kode = rombongan_belajar.semester_kode', 'left')
        ;

        if (is_bool($isAktif)) {
            if ($isAktif) {
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
        }

        $caseSql = "
        CASE 
            WHEN peserta_didik.nama = '{$keyword}' THEN 1
            WHEN nipd = '{$keyword}' THEN 1
            WHEN nisn = '{$keyword}' THEN 1
            WHEN nik = '{$keyword}' THEN 1
            WHEN rombongan_belajar.nama = '{$keyword}' THEN 1
            WHEN peserta_didik.nama LIKE '{$keyword}%' THEN 2
            WHEN nipd LIKE '{$keyword}%' THEN 2
            WHEN nisn LIKE '{$keyword}%' THEN 2
            WHEN nik LIKE '{$keyword}%' THEN 2
            WHEN rombongan_belajar.nama = '{$keyword}' THEN 2
            ELSE 3
        END as relevansi
    ";

        return $model
            ->select($caseSql, false)
            ->groupStart()
            ->like('peserta_didik.nama', $keyword)
            ->orLike('nisn', $keyword)
            ->orLike('nik', $keyword)
            ->orLike('nipd', $keyword)
            ->orLike('rombongan_belajar.nama', $keyword)
            ->groupEnd()
            ->orderBy('relevansi', 'ASC')
            ->orderBy('peserta_didik.nama', 'ASC')
            ->findAll($limit, $offset);
    }

    public function isActive($id): bool
    {

        return $this->cekStatus($id) ? true : false;
    }

    public function cekStatus($id): array|null
    {
        $model = new PesertaDidikModel();
        $model
            ->join('mutasi_pd', 'mutasi_pd.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('anggota_rombongan_belajar', 'anggota_rombongan_belajar.peserta_didik_id = peserta_didik.peserta_didik_id', 'left')
            ->join('rombongan_belajar', 'rombongan_belajar.rombel_id = anggota_rombongan_belajar.rombel_id', 'left')
            ->join('semester', 'semester.kode = rombongan_belajar.semester_kode', 'left')
            ->where('semester.status', true)
            ->where('peserta_didik.peserta_didik_id', $id)
        ;
        $pd = $model->first();
        if (!$pd) return null;
        $resp = [
            'mutasi' => '',
            'rombel' => rombelPd($id),
            'register' => '',
        ];
        return $resp;
    }
}
