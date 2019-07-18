<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('logged_in') == FALSE) {
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login');
            } else {
                $username = trim($this->input->post('username', true));
                $password = $this->input->post('password', true);
                $auth = $this->data->auth($username, $password);
                if ($auth->num_rows() > 0) {
                    $result = $auth->result_array();
                    $data = [
                        'username'  => $result[0]['username'],
                        'logged_in' => TRUE
                    ];
                    $this->session->set_userdata($data);
                    redirect(base_url('admin/dashboard'));
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Login Failed</div>');
                    redirect(base_url('admin'));
                }
            }
        } else {
            redirect(base_url('admin/dashboard'));
        }
    }

    public function dashboard()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $result['data'] = $this->data->getHistory();
            $this->load->view('dashboard', $result);
        } else {
            redirect(base_url('admin'));
        }
    }

    public function settings()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $this->load->view('settings');
        } else {
            redirect(base_url('admin'));
        }
    }

    public function delete($id)
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $query = $this->data->deleteBy($id);
            if ($query) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success</div>');
                redirect(base_url('admin/dashboard'));
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Failed</div>');
                redirect(base_url('admin/dashboard'));
            }
        } else {
            redirect(base_url('admin'));
        }
    }

    public function clean()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $query = $this->data->clean();
            if ($query) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success</div>');
                redirect(base_url('admin/dashboard'));
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Failed</div>');
                redirect(base_url('admin/dashboard'));
            }
        } else {
            redirect(base_url('admin'));
        }
    }

    public function setpass()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('password_conf', 'password confirmation', 'required|matches[password]');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Failed</div>');
                redirect(base_url('admin/settings'));
            } else {
                $data = [
                    'password' => sha1($this->input->post('password', true))
                ];
                $query = $this->data->settings($data);
                if ($query) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success</div>');
                    redirect(base_url('admin/settings'));
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Failed</div>');
                    redirect(base_url('admin/settings'));
                }
            }
        } else {
            redirect(base_url('admin'));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(['username', 'logged_in']);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">You have been logged out</div>');
        redirect(base_url('admin'));
    }
}
