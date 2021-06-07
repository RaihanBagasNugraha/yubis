<?php
class User_model extends CI_Model
{

    function cek_login($email, $password)
	{
		$query = "SELECT * FROM `admin` WHERE email = '$email'";

		$query = $this->db->query($query);

		$user= $query->row();

		if(!empty($user)){
            if(verifyHashedPassword($password, $user->pass)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
	}

    function cek_email($email)
    {
        $this->db->where('email', $email);
		$query = $this->db->get('admin');

		$user= $query->row();

		if(!empty($user)){
            return 1;
        } else {
            return 0;
        }
    }

    function addNewUser($data)
    {
        $this->db->trans_start();
        $this->db->insert('admin', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;
    }

    function editUser($data,$id)
    {
        $this->db->trans_start();
        $this->db->where(array("ID"=>$id));
        $this->db->update('admin', $data);
        $this->db->trans_complete();
    }

    function get_admin()
    {
        $query = $this->db->query("SELECT * FROM admin");
		return $query->result();
    }

    function delete_user_admin($id)
    {
        $this->db->delete('admin', array("ID"=>$id));
    }

    function get_user_admin($id)
    {
        $query = $this->db->query("SELECT * FROM admin where ID = $id");
		return $query->row();
    }

    function get_user_id($id)
    {
        $query = $this->db->query("SELECT * FROM pengguna where ID = $id");
		return $query->row();
    }

}