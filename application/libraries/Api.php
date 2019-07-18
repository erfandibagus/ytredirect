<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api
{
    protected $_ci;

    public function __construct()
    {
        $this->_ci = &get_instance();
    }

    public function youtube($slug)
    {
        $url = "https://www.youtube.com/oembed?url=" . urlencode('https://www.youtube.com/watch?v=' . $slug) . "&format=json";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
