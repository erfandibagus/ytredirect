<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="<?= base_url('assets/img/icon.png'); ?>" />
	<title>YouTube Link Redirect</title>

	<meta itemprop="name" content="Youtube Link Redirect" />
	<meta itemprop="description" content="Open YouTube Link in YouTube App Easily" />
	<meta itemprop="image" content="<?= base_url('assets/img/icon.png'); ?>" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body class="pt-3">
	<div class="container">
		<div class="row">
			<div class="col-md">
				<h1 class="h4"><i class="fa fa-youtube"></i> YouTube Link Redirect</h1>
				<p>Open YouTube Link in YouTube App</p>
				<form action="" method="post">
					<div class="input-group">
						<input name="url" id="url" type="text" class="form-control" placeholder="Paste the Youtube URL here" required>
						<div class="input-group-append">
							<button class="btn btn-primary" type="submit"><i class="fa fa-angle-double-right"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php if (!empty($data)) {
			$api = $this->api->youtube($data[0]['slug']);
			$response = json_decode($api, true);
			?>
			<div class="row mt-4">
				<div class="col-md-8 mb-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb small">
							<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Your Video</li>
						</ol>
					</nav>
					<div class="card">
						<div class="card-body">
							<h1 class="h5 mb-4"><?= $response['title']; ?></h1>
							<div class="input-group">
								<label class="small" for="yourlink">Your Link</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-external-link"></i></span>
									</div>
									<input id="yourlink" readonly type="text" class="form-control" value="<?= base_url('v/') . $data[0]['slug']; ?>" onClick="this.select();">
								</div>
								<label class="small" for="original">Original Link</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-external-link"></i></span>
									</div>
									<input id="original" type="text" readonly class="form-control" value="<?= $data[0]['link']; ?>" onClick="this.select();">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card text-center mb-3">
						<img src="<?= $response['thumbnail_url']; ?>" class="card-img-top" alt="<?= $response['title']; ?>">
						<div class="card-body">
							<h6 class="card-title"><?= $response['title']; ?></h6>
							<p class="card-text text-muted"><?= $response['author_name']; ?></p>
							<a href="<?= base_url('v/') . $data[0]['slug']; ?>" class="btn btn-danger btn-sm" target="_blank">Watch on YouTube</a>
						</div>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<?php if ($latest) { ?>
				<div class="row mt-4">
					<div class="col-md">
						<h2 class="h5 mb-3">Latest Videos</h2>
					</div>
				</div>
				<div class="row">
					<?php foreach ($latest as $l) {
						$api = $this->api->youtube($l->slug);
						$response = json_decode($api, true);
						?>
						<div class="col-md-3 d-flex mb-3">
							<div class="card text-center">
								<img src="<?= $response['thumbnail_url']; ?>" class="card-img-top" alt="<?= $response['title']; ?>">
								<div class="card-body">
									<h6 class="card-title"><?= $response['title']; ?></h6>
									<p class="card-text text-muted"><?= $response['author_name']; ?></p>
									<a href="<?= base_url('v/') . $l->slug; ?>" class="btn btn-danger btn-sm" target="_blank">Watch on YouTube</a>
								</div>
							</div>
						</div>
					<?php  } ?>
				</div>
			<?php  } ?>
		<?php } ?>
	</div>
</body>

</html>