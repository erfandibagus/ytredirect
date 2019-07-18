<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$this->form_validation->set_rules('url', 'url', 'required');
		if ($this->form_validation->run() == FALSE) {
			$result['latest'] = $this->data->getLatest();
			$this->load->view('home', $result);
		} else {
			$link = trim($this->input->post('url'));

			if ($this->get_domain($link) == 'youtube.com') {
				parse_str(parse_url($link, PHP_URL_QUERY), $yt_id);

				$api = $this->api->youtube($yt_id['v']);
				$response = json_decode($api, true);

				$check = $this->data->getSlug($yt_id['v'])->num_rows();
				if ($check <= 0) {
					$data = [
						'title' => $response['title'],
						'link' => 'https://www.youtube.com/watch?v=' . $yt_id['v'],
						'slug' => $yt_id['v'],
						'hit'  => 0,
						'date_created' => time(),
						'date_updated' => time()
					];
					$this->data->generate($data);
				} else {
					$data = [
						'title' => $response['title'],
						'date_updated' => time()
					];
					$this->data->update($yt_id['v'], $data);
				}

				$result['data'] = $this->data->getSlug($yt_id['v'])->result_array();
			} elseif ($this->get_domain($link) == 'youtu.be') {
				$yt_id = substr($link, 17);

				$api = $this->api->youtube($yt_id);
				$response = json_decode($api, true);

				$check = $this->data->getSlug($yt_id)->num_rows();
				if ($check <= 0) {
					$data = [
						'title' => $response['title'],
						'link' => 'https://www.youtube.com/watch?v=' . $yt_id,
						'slug' => $yt_id,
						'hit'  => 0,
						'date_created' => time(),
						'date_updated' => time()
					];
					$this->data->generate($data);
				} else {
					$data = [
						'title' => $response['title'],
						'date_updated' => time()
					];
					$this->data->update($yt_id, $data);
				}

				$result['data'] = $this->data->getSlug($yt_id)->result_array();
			} else {
				redirect(base_url());
			}
			$this->load->view('home', $result);
		}
	}

	private function get_domain($url = SITE_URL)
	{
		preg_match("/[a-z0-9\-]{1,63}\.[a-z\.]{2,6}$/", parse_url($url, PHP_URL_HOST), $_domain_tld);
		return $_domain_tld[0];
	}
}
