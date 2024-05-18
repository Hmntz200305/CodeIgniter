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
                    'required' => 'Role must be filled in!',
                    'greater_than' => 'Role must be filled in!'
                ]
            ],
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama must be filled in!',
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email must be filled in!',
                    'is_unique' => 'Email already exist!'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username must be filled in!',
                    'is_unique' => 'Username already exist!'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username must be filled in!'
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
            $this->session->setFlashdata('message', 'DataUser Successfully added!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Failed to save data!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }

    public function deleteprocess($id_user)
    {
        $delete = $this->userDataModel->delete($id_user);

        if ($delete) {
            $this->session->setFlashdata('message', 'DataUser successfully deleted!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'failed to save data!');
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
                    'required' => 'Name must be filled in!'
                ]
            ],
            'role' => [
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'Role must be filled in!',
                    'greater_than' => 'Role must be selected in!'
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
            $this->session->setFlashdata('message', 'DataUser Successfully updated!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Failed to save data!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }
}
