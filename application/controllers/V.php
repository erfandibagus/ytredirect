<?php
defined('BASEPATH') or exit('No direct script access allowed');

class V extends CI_Controller
{

	public function index($slug = NULL)
	{
		if ($slug) {
			$query = $this->data->getSlug($slug);
			if ($query->num_rows() <= 0) {
				redirect(base_url(), 'location', 301);
			} else {
				$this->data->hit($slug);
				$result['data'] = $query->result_array();
				$this->load->view('view', $result);
			}
		} else {
			show_404();
		}
	}
}
