<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav class="container navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= base_url('admin/dashboard'); ?>">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="<?= base_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> Home</a>
            <a class="nav-item nav-link" href="<?= base_url('admin/settings'); ?>"><i class="fa fa-cogs"></i> Settings</a>
            <a class="nav-item nav-link" href="<?= base_url('admin/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
    </div>
</nav>