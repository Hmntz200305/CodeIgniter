<?php

namespace App\Controllers;

class UsersData extends BaseController
{
    protected $userDataModel;
    protected $session;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->userDataModel = new \App\Models\UserDataModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $find = $this->userDataModel->findAll();

        $userData = [];
        foreach ($find as $result) {
            if ($result['id_user_level'] == 2) {
                $role = 'Admin';
            } else {
                $role = 'User';
            }

            $data = [
                'id' => $result['id_user'],
                'id_user_level' => $role,
                'nama' => $result['nama'],
                'email' => $result['email'],
                'username' => $result['username']
            ];
            $userData[] = $data;
        }

        return view('page/UsersData/index', ['userData' => $userData]);
    }

    public function addUsers()
    {
        return view('page/UsersData/addusers');
    }

    public function addprocess()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'role' => [
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'Role harus diisi',
                    'greater_than' => 'Role harus diisi'
                ]
            ],
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'is_unique' => 'Email telah terdaftar'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username telah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi'
                ]
            ]
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $role = $this->request->getPost('role');
        $nama = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $md5password = md5($password);
        $insert = $this->userDataModel->addProcess($role, $nama, $email, $username, $md5password);
        if ($insert) {
            $this->session->setFlashdata('message', 'DataUser berhasil ditambahkan!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Gagal menyimpan data!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }

    public function deleteprocess($id_user)
    {
        $delete = $this->userDataModel->delete($id_user);

        if ($delete) {
            $this->session->setFlashdata('message', 'DataUser berhasil dihapus!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Gagal menyimpan data!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }

    public function editUsers($id_user)
    {
        $userdata = $this->userDataModel->getUser($id_user);

        $data = [
            'id' => $id_user,
            'userdata' => $userdata,
        ];

        return view('page/UsersData/editusers', $data);
    }

    public function editUserprocess($id_user)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'role' => [
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'Role harus diisi',
                    'greater_than' => 'Role harus dipilih'
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $name = $this->request->getPost('name');
        $role = intval($this->request->getPost('role'));

        $update = $this->userDataModel->editProcess($id_user, $name, $role);
        if ($update) {
            $this->session->setFlashdata('message', 'DataUser berhasil diupdate');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Gagal menyimpan data!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }
}
