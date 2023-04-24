<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="
    IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Galería</title>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/style_gallery.css') ?>">
</head>

<body>

    <div class="wrapp"> 
        <div class="title-nav">
            <div class="title">
                <p><?= ucfirst($userInfo['user_name']); ?></p>
                <p>gallery</p>
            </div>

            <div class="add">
                <a class="link-add" href="<?= base_url('/dashboard/create') ?>">
                    <img class="icon-add" src="<?php echo base_url('/assets/img/mas.png') ?>" alt="add">
                    <span>add image</span>
                </a>
            </div>

            <div class="exit">
                <a href="<?= site_url('auth/logout'); ?>" class="link-exit">
                    <img src="<?php echo base_url('/assets/img/cerrar-sesion.png') ?>" alt="exit" class="icon-exit">
                    <span>logout</span>
                </a>
            </div>
        </div>
        <div class="gallery">
        <?php
            foreach ($images as $item) :
        ?>
            <div class="box-gallery">
                <div class="image">
                    <img src="<?= "../uploads/" . $item['image']; ?>" alt="img">
                </div>
                <div class="caption">
                    <div class="txt-capt">
                        <p class="text"><?= $item['name_image'] ?></p>
                    </div>
                    <div class="delet-capt">
                        <a href="<?= base_url('dashboard/delete/' . $item['id_image']) ?>">
                           <img src="<?php echo base_url('/assets/img/delete.png') ?>" alt="" class="delete-img"> 
                        </a>
                    </div>    
                </div>
            </div>
        <?php
            endforeach;
        ?>

        </div>
    </div>

</body>

</html>