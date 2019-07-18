<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/icon.png'); ?>" />
    <title>Login | YouTube Link Redirection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body class="pt-5">
    <div class="container">
        <div class="row mb-3 justify-content-center">
            <div class="col-md-4 text-center">
                <h1 class="h4 mb-3">LOGIN ADMIN</h1>
                <?= $this->session->flashdata('msg'); ?>
                <form action="" method="post">
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username" required autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>