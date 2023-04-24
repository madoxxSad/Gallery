<?php
namespace App\Controllers;
use App\Models\UsersModel;

class Admin extends BaseController{


    public function admin(){
        $model = new UsersModel();
        $datos = $model->getUsuarios();

        echo view('/admin/admin', compact('datos'));

    }

    public function edit($id){
        $model = new UsersModel();
        $dato = $model -> getUsuario($id);
        echo view('/admin/edit', compact('dato'));
    }

    public function update(){

        $validacion = $this->validate([
            'user_name' => 'required',
            'email' => 'required'
        ]);

        if($_POST && $validacion){

            //print_r($_POST);exit;
            
            $datos= [

                'id'=> $_POST['id'],
                'user_name' => $_POST['user_name'],
                'email' => $_POST['email']
            ];

            $id=$_POST['id'];

            $model = new UsersModel();
            $model->updateDatos($id, $datos);


            session()->setFlashdata('mensaje', 'Registro Editado Correctamente');
            return redirect()->to(base_url('/admin/admin'));

        } else{
            $id=$_POST['id'];
            $error = $this->validator->listErrors();
        

            session()->setFlashdata('mensaje', $error);
            return redirect()->to(base_url('admin/edit/'. $id));
        }

    }

    public function delete($id){

        $model = new UsersModel();
        $model->delete($id);

        session()->setFlashdata('mensaje', 'Usuario Eliminado');
        return redirect()->to(base_url('/admin/admin'));

    }



}