<?php
defined('BASEPATH') or exit('No direct script access allowed');
$api = $this->api->youtube($data[0]['slug']);
$response = json_decode($api, true);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $response['title']; ?></title>
    <meta itemprop="name" content="<?= $response['title']; ?>" />
    <meta itemprop="description" content="Click to watch this video on the YouTube Application." />
    <meta itemprop="image" content="<?= $response['thumbnail_url']; ?>" />

    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="<?= $_SERVER['HTTP_HOST']; ?>" />
    <meta property="og:url" content="<?= "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:title" content="<?= $response['title']; ?>" />
    <meta property="og:description" content="Click to watch this video on the YouTube Application." />
    <meta property="og:image" content="<?= $response['thumbnail_url']; ?>" />
    <meta property="og:image:alt" content="<?= $response['title']; ?>" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $response['title']; ?>">
    <meta name="twitter:description" content="Click to watch this video on the YouTube Application.">
    <meta name="twitter:image" content="<?= $response['thumbnail_url']; ?>">
</head>

<body>
    <script type="text/javascript">
        window.onload = function() {
            var desktopFallback = "https://www.youtube.com/watch?v=<?= $data[0]['slug']; ?>",
                mobileFallback = "https://www.youtube.com/watch?v=<?= $data[0]['slug']; ?>",
                app = "vnd.youtube://<?= $data[0]['slug']; ?>";
            if (/Android|iPhone|iPad|iPod/i.test(navigator.userAgent)) {

                window.location = app;
                window.setTimeout(function() {
                    window.location = mobileFallback;
                }, 25);

            } else {
                window.location = desktopFallback;
            }

            function killPopup() {
                window.removeEventListener('pagehide', killPopup);
            }

            window.addEventListener('pagehide', killPopup);
        };
    </script>
</body>

</html>