<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $allowedFields = ['user_name', 'email', 'password'];

    public function getUsuarios(){

        return $this->findAll();

    }
    public function add($dato) {

        return $this->save($dato);
    }

    public function getUsuario($id){

        return $this->where('id', $id)->first($id);

    }

    public function updateDatos($id, $datos){

        return $this->update($id, $datos);

    }
    
}

?> 