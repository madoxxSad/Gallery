<?php

namespace App\Controllers;
use App\Libraries\Hash;
use App\Models\UsersModel;

class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function save()
    {
        $validation = $this->validate([
            'user_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tu nombre completo es requerido'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Tu email es requerido',
                    'valid_email' => 'Debes ingresar un email válido',
                    'is_unique' => 'Email ya registrado'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Tu contraseña es requerida',
                    'min_length' => 'La contraseña debe tener al menos 5 caracteres de largo',
                    'max_length' => 'La contraseña no debe tener más de 12 caracteres de largo'
                ]
            ],
            'cpassword' => [
                'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
                'errors' => [
                    'required' => 'Tu confirmación de contraseña es requerida',
                    'min_length' => 'La confirmación de la contraseña debe tener al menos 5 caracteres de largo',
                    'max_length' => 'La confirmación de la contraseña no debe tener más de 12 caracteres de largo',
                    'matches' => 'La confirmación de la contraseña no es igual a la contraseña anterior'
                ]
            ]
        ]);

        if (!$validation) {
            return view('auth/register', ['validation' => $this->validator]);
        } else {
            $name = $this->request->getPost('user_name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [

                'user_name' => $name,
                'email' => $email,
                'password' => Hash::make($password),

            ];

            $usersModel = new UsersModel();
            $query = $usersModel->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'Algo fue mal');
            } else {
                // return redirect()->to('auth/register')->with('success', 'Te registraste exitosamente');
                $last_id = $usersModel->insertID();
                session()->set('loggedUser', $last_id);
                return redirect()->to('/dashboard/index');
            }
        }
    }

    function check()
    {
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[users.email]',
                'errors' => [
                    'required' => 'Email es requerido',
                    'valid_email' => 'Ingresa un email válido',
                    'is_not_unique' => 'Este email no está registrado'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'La contraseña es requerida',
                    'min_length' => 'La contraseña debe tener al menos 5 caracteres de largo',
                    'max_length' => 'La contraseña no debe tener más de 12 caracteres de largo'
                ]
            ]
        ]);

        if (!$validation) {
            return view('auth/login', ['validation' => $this->validator]);
        } else {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $usersModel = new UsersModel();
            $user_info = $usersModel->where('email', $email)->first();
            $check_password = Hash::check($password, $user_info['password']);


            if (!$check_password) {
                session()->setFlashdata('fail', 'Contraseña Incorrecta');
                return redirect()->to('/auth')->withInput();
            } else {
                $id = $user_info['id'];
                session()->set('loggedUser', $id);
                return redirect()->to('/dashboard/index');
            }
        }
    }

    function logout()
    {
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
            return redirect()->to('/auth?access=out')->with('fail', 'Cerraste sesión');
        }
    }
}
