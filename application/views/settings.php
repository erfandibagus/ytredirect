<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/icon.png'); ?>" />
    <title>Settings | YouTube Link Redirection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <?php $this->load->view('navbar'); ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md">
                <h1 class="h4 mb-3">Settings</h1>
                <?= $this->session->flashdata('msg'); ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="<?= base_url('admin/setpass'); ?>" method="post">
                            <div class="form-group">
                                <label for="password"><strong>Change Password</strong></label>
                                <input class="form-control mb-2" type="password" name="password" id="password" placeholder="New Password">
                                <input class="form-control" type="password" name="password_conf" id="password_conf" placeholder="Password Confirmation">
                            </div>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <p class="card-text"><strong>Reset</strong></p>
                        <p class="card-text small">All data will be permanently deleted</p>
                        <p class="card-text"><a class="btn btn-danger btn-sm" href="<?= base_url('admin/clean'); ?>" OnClick="return confirm('Are you sure?');">Clean All Data</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>