<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/style_register.css') ?>">
</head>

<body>

    <form action="<?= base_url('auth/save'); ?>" method="post" autocomplete="off">
        <?= csrf_field(); ?>
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class="alert"><?= session()->getFlashdata('fail');  ?></div>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert"><?= session()->getFlashdata('success');  ?></div>
        <?php endif ?>

        <div class="wrapp">
            <div class="card">
                <div class="title">
                    <h1>Sign up</h1>
                </div>
                <div class="data">
                    <div class="inputs">
                        <div class="input-wrapper">
                            <label class="label" for="">Name</label>
                            <input class="input" type="text" name="user_name" value="<?= set_value('user_name'); ?>" placeholder="Your name" />
                            <span class="span"><?= isset($validation) ? display_error($validation, 'user_name') : '' ?></span>
                        </div>
                        <div class="input-wrapper">
                            <label class="label" for="">Email</label>
                            <input class="input" type="text" name="email" value="<?= set_value('email'); ?>" placeholder="example@gmail.com"/>
                            <span class="span"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                        </div>
                        <div class="input-wrapper">
                            <label class="label" for="">Password</label>
                            <input class="input" type="text" name="password" value="<?= set_value('password'); ?>" placeholder="* * * * * *" />
                            <span class="span"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                        </div>
                        <div class="input-wrapper">
                            <label class="label" for="">Confirm Password</label>
                            <input class="input" type="text" name="cpassword" value="<?= set_value('cpassword'); ?>" placeholder="* * * * * *" />
                            <span class="span"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>
                        </div>
                        <div class="input-wrapper">
                            <button class="button-register" type="submit">Sign Up</button>
                        </div>
                    </div>
                    <div class="login-link">
                        <div class="signup-action">
                            Already have an account? &nbsp <a class="link" href="<?= site_url('auth') ?>"> Login </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <!-- 
        <div class="wrapper">
            <div class="login">
                <div class="login-form">
                    <h1 class="login-title">Registrarse</h1>
                    <div class="form-wrapper">
                    <div class="input-wrapper">
                            <label class="label" for="">Nombre</label>
                            <input class="input" type="text"  name="user_name" value="<?= set_value('user_name'); ?>" />
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'user_name') : '' ?></span>
                        </div><br>
                        <div class="input-wrapper">
                            <label class="label" for="">E-mail</label>
                            <input class="input" type="text"  name="email"  value="<?= set_value('email'); ?>"  />
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                        </div><br>
                        <div class="input-wrapper">
                            <label class="label" for="">Contraseña</label>
                            <input class="input" type="text" name="password"  value="<?= set_value('password'); ?>" />
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                        </div> <br>
                        <div class="input-wrapper">
                            <label class="label" for="">Confirmar Contraseña</label>
                            <input class="input" type="text"  name="cpassword" value="<?= set_value('cpassword'); ?>" />
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>
                        </div>
                       <br>
                        <div class="actions">
                            <input class="action" type="submit" value="Registrarme" />
                            <div class="signup-action">
                             ¿Ya tienes una cuenta? &nbsp <a class="signup-link" href="<?= site_url('auth') ?>">Iniciar sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="login-decoration2">

                </div>
            </div>
        </div>
        -->
    </form>

</body>

</html>