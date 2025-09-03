<?php

namespace App\Libraries\baseData;

use App\Models\SemesterModel;

class Semester
{
    public function save(array $set = [], string|array|null $keyname = null): string|null
    {
        $model = new SemesterModel();
        $ifExist = false;
        if (is_string($keyname)) {
            $ifExist = $model->where($keyname, $set[$keyname])->first();
            if ($ifExist) {
                $set['id'] = $ifExist['id'];
                $set['semester_id'] = $ifExist['semester_id'];
            }
        } else if (is_array($keyname) && count($keyname) > 0) {
            $model->groupStart();
            foreach ($keyname as $key) {
                $model->where($key, $set[$key]);
            }
            $model->groupEnd();
            $ifExist = $model->first();
            if ($ifExist) {
                $set['id'] = $ifExist['id'];
                $set['semester_id'] = $ifExist['semester_id'];
            }
        }
        if (!isset($set['semester_id'])) $set['semester_id'] = idUnik($model, 'semester_id');
        if (!$model->save($set)) return false;

        return $set['semester_id'];
    }

    public function get(string|bool|null $idOrStatus = null, array|string $select = '*'): array|string|null|false
    {
        $model = new SemesterModel();
        $model->orderBy('kode', 'DESC');

        if ($select == '*') {
            $model->select([
                'semester_id',
                'kode',
                'status',
                'nama'
            ]);
        } else $model->select($select);

        if (is_bool($idOrStatus)) {
            if ($idOrStatus)
                $result =  $model->where('status', $idOrStatus)->first();
            else
                $result =  $model->where('status', $idOrStatus)->findAll();
        } else if (is_string($idOrStatus)) {
            $result = $model->where('semester_id', $idOrStatus)->first();
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
            } elseif (is_array($select) || is_string($select)) {
                if (is_array($result)) {
                    $normalized = $this->normalizeSelect($select);
                    if (array_is_list($result)) {
                        // banyak row
                        return array_map(fn($row) => array_intersect_key($row, array_flip($normalized)), $result);
                    } else {
                        // single row
                        return array_intersect_key($result, array_flip($normalized));
                    }
                }
            }
        }

        return $result;
    }
    /**
     * Normalisasi select agar hanya menghasilkan key sesuai hasil query
     * Bisa input string "a, b as c" atau array ['a', 'b as c']
     */
    private function normalizeSelect(array|string $select): array
    {
        if (is_string($select)) {
            // pecah string jadi array
            $select = array_map('trim', explode(',', $select));
        }

        $normalized = [];
        foreach ($select as $s) {
            // cek apakah ada alias
            if (stripos($s, ' as ') !== false) {
                [, $alias] = preg_split('/\s+as\s+/i', $s);
                $normalized[] = trim($alias);
            } else {
                // kalau tanpa alias → ambil nama kolom terakhir
                $parts = explode('.', $s);
                $normalized[] = trim(end($parts));
            }
        }

        return $normalized;
    }
}
