<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/style_auth.css') ?>">
</head>

<body>

    <form action="<?= base_url('auth/check') ?>" method="post" autocomplete="off">
        <?= csrf_field(); ?>

        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class="alert"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <div class="wrapp">
            <div class="card">
                <div class="logo">
                    <img src="<?php echo base_url('/assets/img/logo_gallery.png') ?>" alt="logo" class="image">
                </div>
                <div class="data">
                    <div class="title">
                        <h1>Login</h1>
                    </div>
                    <div class="inputs">
                        <div class="input-wrapper">
                            <label class="label" for="email">Email</label>
                            <input class="input" type="text" id="email" name="email" placeholder="example@gmail.com" />
                            <span class="span"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                        </div>
                    
                        <div class="input-wrapper">
                            <label class="label" for="password">Password</label>
                            <input class="input" type="password" id="password" name="password" placeholder="* * * * * *" />
                            <span class="span"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                        </div>
                    
                        <div class="input-wrapper">
                            <button class="button-login" type="submit"> Login </button>
                        </div>
                    </div>
                    <div class="register-link">
                        <div class="signup-action">
                            Don't have any account? <a class="signup-link" href="<?= site_url('auth/register') ?>">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


</body>

</html>