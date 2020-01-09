<?php
class Users_model extends CI_Model
{
    function get($username)
    {
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('users')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }

    function get_users($where = '')
    {
        return $this->db->query("SELECT * FROM users".$where);
    }

    function add_users($data, $table)
    {
		$this->db->insert($table, $data);
    }
    
    function delete_users($tabel, $where)
    {
        $this->db->delete($tabel, $where);
    }

    function edit_users($tabel, $data, $where)
    {
        $this->db->update($tabel, $data, $where);
    }    
} ?>