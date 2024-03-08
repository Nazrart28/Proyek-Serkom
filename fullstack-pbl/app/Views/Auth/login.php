<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600;700&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        *,
        html,
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Open Sans";
        }

        body {
            width: 100%;
            height: 100vh;
        }

        .container {
            max-width: 1400px;
            height: 100vh;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-area {
            max-width: 800px;
            height: 500px;
            margin: 0 auto;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            background-color: rgb(61, 61, 61);
        }

        .form-login {
            background-color: white;
            height: 400px;
            display: flex;
            flex: 1;
            border-radius: 20px;
        }

        .form-logo {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .uns-logo {
            width: 250px;
        }

        .form-card {
            flex: 1.3;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-input {
            padding: 15px 40px;
            width: 350px;
            border-radius: 15px;
            background-color: rgb(169, 169, 169);
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 50px;
            border: none;
            outline: none;
        }

        .password {
            margin-top: 15px;
        }

        button {
            width: 100%;
            padding: 10px;
            border-radius: 50px;
            border: none;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 600;
            background-color: rgb(69, 227, 69);
            cursor: pointer;
            transition: all ease 0.3s;
        }

        button:hover {
            background-color: rgb(5, 181, 5);
        }

        .create-account {
            margin-top: 10px;
            font-size: 12px;
        }

        a {
            text-decoration: none;
            color: rgb(0, 152, 0);
            font-weight: 600;
        }

        @media (max-width: 767px) {
            .form-area {
                height: 100%;
            }

            .form-login {
                flex-direction: column;
                padding: 20px 0;
                height: 500px;
            }

            .form-input {
                height: 300px;
                width: 250px;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .form-card {
                flex: 2;
            }

            .uns-logo {
                width: 150px;
            }

            label {
                font-size: 14px;
                margin-bottom: 5px;
            }

            input {
                padding: 5px;
                font-size: 12px;
            }

            button {
                font-size: 14px;
                padding: 5px;
                margin-top: 15px;
            }

            .create-account {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-area">
            <div class="form-login">
                <div class="form-logo">
                    <img class="uns-logo" src="dist/img/d3-ti.svg" alt="" />
                </div>
                <div class="form-card">
                    <div class="form-input">
                        <form action="<?= url_to('login') ?>" method="post">
                            <?= csrf_field() ?>
                            <?php if ($config->validFields === ['email']) : ?>
                                <div class="user">
                                    <label class="email-label" for="user"><?= lang('Auth.email') ?></label>
                                    <input class="user-input <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" id="user" type="email" />
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="user">
                                    <label class="username-label" for="user"><?= lang('Auth.emailOrUsername') ?></label>
                                    <input class="user-input <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" id="user" type="text" />
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="password">
                                <label class="password-label" for="password"><?= lang('Auth.password') ?></label>
                                <input name="password" class="password-input <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" id="password" type="password" />
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>
                            <button type="submit" <?= lang('Auth.loginAction') ?>>Masuk</button>
                            <p class="create-account">
                                Dont have an account?
                                <span><a href="<?= route_to('register') ?>">Create Account</a></span>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

