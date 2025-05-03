<?php

namespace App\Libraries;

use App\Models\DapodikSyncModel;

class Dapodik
{
    public function config(): array|null
    {
        $mDapodik = new DapodikSyncModel();
        $config = $mDapodik->where('status', true)->first();
        if ($config) {
            return [
                'url' => $config['url'],
                'port' => $config['port'],
                'npsn' => $config['npsn'],
                'token' => $config['token'],
            ];
        }
        return null;
    }

    /**
     * @param string $type Enum ['getPesertaDidik','getSekolah','getRombonganBelajar','get]
     * @return array Response
     */
    public function sync($type): array
    {
        $client = \Config\Services::curlrequest();

        $config = $this->config();
        if (empty($config)) return ['message' => 'Error: Konfigurasi koneksi dapodik belum diset.', 'success' => false];

        $url = 'http://' . $config['url'] . ':' . $config['port'] . '/WebService/' . $type . '?npsn=' . $config['npsn'];
        $token = 'Authorization: Bearer ' . $config['token'];

        $options = [
            'headers' => ['Authorization' => $token],
            'http_errors' => false,
            'debug' => true,
        ];

        try {
            $response = $client->get($url, $options);
            $statusCode = $response->getStatusCode();
            if ($statusCode !== 200) {
                return  [
                    'success' => false,
                    'http_code' => $statusCode,
                    'status_code' => 'error',
                    'message' => $response->getReason(),
                    'data' => [],
                ];
            }
            $hasil = $response->getBody();
            $awal = strpos($hasil, '{');
            $result = json_decode(substr($hasil, $awal), true);
            if (isset($result['results'])) {
                $response = [
                    'success' => true,
                    'http_code' => 200,
                    'status_code' => 'success',
                    'message' => 'Data berhasil ditarik dari Aplikasi Dapodik.',
                    'data' => $result['rows'],
                ];
            } else {
                $response = $result;
                $response['data'] = [];
            }

            return $response;
        } catch (\Exception $e) {
            return  [
                'success' => false,
                'http_code' => 400,
                'status_code' => 'error',
                'message' => $e->getMessage(),
                'data' => [],
            ];
        }
    }
}
