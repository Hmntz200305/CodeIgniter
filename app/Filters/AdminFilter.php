<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (!$session->get('logged_in') || !$session->get('username')) {
            return redirect()->to('/login');
        }

        if ($session->get('id_user_level') != 2) {
            $this->session->setFlashdata('message', 'Forbidden');
            $this->session->setFlashdata('message_type', 'warning');
            return redirect()->back();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something after the route is handled
    }
}
