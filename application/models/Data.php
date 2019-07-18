<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Model
{

    public function auth($username, $password)
    {
        return $this->db->where(['username' => $username, 'password' => sha1($password)])->get('auth');
    }

    public function getHistory()
    {
        return $this->db->order_by('id', 'DESC')
            ->get('data')->result();
    }

    public function getLatest()
    {
        return $this->db->order_by('date_updated', 'DESC')
            ->limit(4)->get('data')->result();
    }

    public function deleteBy($id)
    {
        $this->db->where('id', $id)
            ->delete('data');
        return $this->db->affected_rows();
    }

    public function clean()
    {
        return $this->db->truncate('data');
    }

    public function settings($data)
    {
        $this->db->where('id', 1)
            ->update('auth', $data);
        return $this->db->affected_rows();
    }

    public function generate($data)
    {
        $this->db->insert('data', $data);
        return $this->db->affected_rows();
    }

    public function update($slug, $data)
    {
        $this->db->where('slug', $slug)
            ->update('data', $data);
        return $this->db->affected_rows();
    }

    public function getSlug($slug)
    {
        return $this->db->where('slug', $slug)
            ->limit(1)
            ->get('data');
    }

    public function hit($slug)
    {
        $hit = $this->getSlug($slug)->result_array();
        $data = ['hit' => $hit[0]['hit'] + 1];
        $this->db->where('slug', $slug);
        return $this->db->update('data', $data);
    }
}
