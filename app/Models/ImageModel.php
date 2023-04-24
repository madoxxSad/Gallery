<?php
namespace App\Models;
use CodeIgniter\Model;

class ImageModel extends Model{

    protected $table='images';
    protected $primaryKey='id_image';

    protected $allowedFields =[
        'id',
        'name_image',
        'image'
    ];


}