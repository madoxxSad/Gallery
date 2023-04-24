<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\ImageModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $usersModel = new UsersModel();
        $loggedUserID= session()->get('loggedUser');
        $userInfo= $usersModel->find($loggedUserID);
        $images= new ImageModel();
        $data = [
            'title' => 'Mi Galería',
            'userInfo' => $userInfo,
            'images' => $images->where('id',$userInfo['id'])->findAll()
        ];
        return view('dashboard/index', $data);

    }

    public function create(){

        $usersModel = new UsersModel();
        $loggedUserID= session()->get('loggedUser');
        $userInfo= $usersModel->find($loggedUserID);
        $data = [
            'title' => 'Añadir Imagenes',
            'userInfo' => $userInfo
        ]; 
        return view('dashboard/create', $data);

    }

    public function store()
    {
        $usersModel = new UsersModel();
        $loggedUserID= session()->get('loggedUser');
        $userInfo= $usersModel->find($loggedUserID);
       
        $imageModel = new ImageModel();
        $file= $this->request->getFile('image');
        if ($file->isValid()&&! $file->hasMoved()) 
        {
            $imageName= $file->getRandomName();
            $file->move('uploads',$imageName);
        }
        $data=[
            'id'=> $userInfo['id'],
            'name_image'=> $this->request->getPost('name_image'),
            'image'=> $imageName,
        ];
        $imageModel->save($data);
        return redirect()->to('dashboard/index');


    }

    public function delete($id){

        $imageModel= new ImageModel();

        $data= $imageModel->find($id);
        $imageFile= $data['image'];
        if (file_exists('../uploads/'.$imageFile)) {
            unlink('../uploads/'.$imageFile);
        }

        $imageModel->delete($id);
        return redirect()->to('dashboard/index');

    }


}