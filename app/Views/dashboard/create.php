<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Imagen</title>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/style_create.css') ?>">
    <script src="https://kit.fontawesome.com/4980eff790.js" crossorigin="anonymous"></script>
</head>

<body>

    <form action="<?= base_url('/dashboard/store') ?>" method="post" enctype="multipart/form-data" autocomplete="off">

        <div class="wrapp">
            <div class="card">
                <div class="title">
                    <h1>Add image</h1>
                </div>
                <div class="create-img">
                    <div class="upload">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="image" id="image" accept=".png, .jpg, .jpeg" />
                                <label for="image"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url(<?php echo base_url('/assets/img/Añadir_imagen.png') ?>);">
                                    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
                                    <script src="<?php echo base_url('/assets/js/create.js') ?>"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapp-input">
                        <div class="inputs">
                            <div class="data-inputs">
                                <label class="label" for="name_image">Photo caption</label>
                                <input class="input" type="text" id="name_image" name="name_image" placeholder="caption" />
                            </div>
                        </div>

                        <div class="buttons">
                            <button class="button-add" type="submit">Add image</button>
                            <a class="cancel-link" href="<?= site_url('/dashboard/index') ?>">Cancel</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>




        <!--
        <div class="wrapper">
            <div class="login">
                <div class="login-form">
                    <h1 class="login-title">Añadir Imagen</h1>
                    <div class="form-wrapper">
                    <div class="input-wrapper">
                            <label class="label" for="user"><?= ucfirst($userInfo['user_name']); ?></label>
                        </div><br>
                        <div class="input-wrapper">
                            <label class="label" for="name_image">Titulo Imagen</label>
                            <input class="input" type="text" id="name_image" name="name_image" />
                        </div><br>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="image" id="image" accept=".png, .jpg, .jpeg" />
                                <label for="image"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url(<?php echo base_url('/assets/img/Añadir_imagen.png') ?>);">


                                    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
                                    <script src="<?php echo base_url('/assets/js/create.js') ?>"></script>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="actions">
                            <button class="action" type="submit">Añadir a mi Galería</button>
                            <div class="signup-action">
                                <a class="signup-link" href="<?= site_url('/dashboard/index') ?>">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

-->
    </form>

</body>

</html>