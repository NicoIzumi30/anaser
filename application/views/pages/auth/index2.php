<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/style.css">
    <style>

    </style>
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox pb-4 px-3">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Elektronik Shampah Shewu</p>
                            <?php echo $this->session->flashdata('message'); ?>
                            <form action="<?=base_url('auth')?>" method="post">
                                <div class="form-group">
                                    <label class="form-control-label">Username</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input">
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                </div>
                                <button name="login" class="btn btn-lg btn-block btn-primary w-100 mt-3" type="submit">Login</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url() ?>assets/auth/jquery-3.6.0.min.js"></script>

    <script src="<?= base_url() ?>assets/auth/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>assets/auth/feather.min.js"></script>

    <script src="<?= base_url() ?>assets/auth/script.js"></script>
</body>

</html>
