<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class ApiFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! auth()->loggedIn()) {
            return Services::response()
                ->setStatusCode(401)
                ->setJSON([
                    'status'  => 401,
                    'error'   => 'Unauthorized',
                    'message' => 'Anda harus login terlebih dahulu untuk mengakses API.',
                ]);
        }
        return null; // lanjut ke controller
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
