<?php
class Product_model extends CI_Model
{
    function get_kategori_all()
    {
        $query = $this->db->query("SELECT * FROM kategori");
		return $query->result();
    }

    function insert_kategori($data)
    {
        $this->db->trans_start();
        $this->db->insert('kategori', $data);
        $this->db->trans_complete();
    }

    function get_kategori_id($id)
    {
        $query = $this->db->query("SELECT * FROM kategori WHERE id = $id");
		return $query->row();
    }

    function delete_kategori($id)
    {
        $this->db->delete('kategori', array("id"=>$id));
    }

    function update_kategori($data, $where)
    {
        $this->db->trans_start();
        $this->db->where(array("id"=>$where));
        $this->db->update('kategori', $data);
        $this->db->trans_complete();
    }

    function get_kecamatan_all()
    {
        $query = $this->db->query("SELECT * FROM kecamatan");
		return $query->result();
    }

    function get_pelanggan_all()
    {
        $query = $this->db->query("SELECT * FROM pengguna where status = 3 order by nama");
		return $query->result();
    }

    function get_pelanggan_kecamatan($id)
    {
        $query = $this->db->query("SELECT * FROM pengguna where status = 3 AND kecamatan = $id order by nama");
		return $query->result();
    }

    function get_jml_pelanggan_kecamatan($id_kecamatan)
    {
        $query = $this->db->query("SELECT * FROM pengguna WHERE kecamatan = $id_kecamatan");
		return $query->result();
    }

    function insert_kecamatan($data)
    {
        $this->db->trans_start();
        $this->db->insert('kecamatan', $data);
        $this->db->trans_complete();
    }

    function delete_kecamatan($id)
    {
        $this->db->delete('kecamatan', array("ID"=>$id));
    }

    function update_kecamatan($data,$id)
    {
        $this->db->trans_start();
        $this->db->where(array("id"=>$id));
        $this->db->update('kecamatan', $data);
        $this->db->trans_complete();
    }

    function get_kecamatan_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM kecamatan WHERE ID = $id");
		return $query->row();
    }
    
    function get_tgl_libur()
    {
        $query = $this->db->query("SELECT * FROM tgl_libur order by tgl desc");
		return $query->result();
    }

    function insert_tanggal($data)
    {
        $this->db->trans_start();
        $this->db->insert('tgl_libur', $data);
        $this->db->trans_complete();
    }

    function delete_tanggal($id)
    {
        $this->db->delete('tgl_libur', array("ID"=>$id));
    }

    function get_tgl_libur_id($id)
    {
        $query = $this->db->query("SELECT * FROM tgl_libur where ID = $id");
		return $query->row();
    }

    function ubah_tanggal($data,$id)
    {
        $this->db->trans_start();
        $this->db->where(array("ID"=>$id));
        $this->db->update('tgl_libur', $data);
        $this->db->trans_complete();
    }

    function get_produk_all()
    {
        $query = $this->db->query("SELECT * FROM produk WHERE parent is NULL order by createdAt");
		return $query->result();
    }

    function get_produk_all2()
    {
        $query = $this->db->query("SELECT * FROM produk");
		return $query->result();
    }

    function get_produk_id($id)
    {
        $query = $this->db->query("SELECT * FROM `produk` WHERE id = $id");
		return $query->row();
    }

    function get_produk_child($parent)
    {
        $query = $this->db->query("SELECT * FROM `produk` WHERE parent = $parent");
		return $query->result();
    }

    function insert_produk($data)
    {
        $this->db->trans_start();
        $this->db->insert('produk', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
        $this->db->trans_complete();
    }

    function delete_produk($id)
    {
        $this->db->delete('produk', array("id"=>$id));
    }

    function update_produk($data,$where)
    {
        $this->db->trans_start();
        $this->db->where(array("id"=>$where));
        $this->db->update('produk', $data);
        $this->db->trans_complete();
    }

    function get_kategori_produk($id)
    {
        $query = $this->db->query("SELECT * FROM `produk` WHERE kategori LIKE '%$id%' order by createdAt");
		return $query->result();
    }
    
}