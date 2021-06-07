<?php
class Pesanan_model extends CI_Model
{
    function get_pesanan_baru()
    {
        $query = $this->db->query("SELECT * FROM `pesanan` WHERE status = 0");
		return $query->result();
    }

    function get_pesanan_proses()
    {
        $query = $this->db->query("SELECT * FROM `pesanan` WHERE status = 1");
		return $query->result();
    }

    function get_pesanan_selesai()
    {
        $query = $this->db->query("SELECT * FROM `pesanan` WHERE status = 4");
		return $query->result();
    }

    function get_pesanan_batal()
    {
        $query = $this->db->query("SELECT * FROM `pesanan` WHERE status = '-1'");
		return $query->result();
    }

    function get_pesanan_id($id)
    {
        $query = $this->db->query("SELECT * FROM `pesanan` WHERE id = $id");
		return $query->row();
    }

    function get_pesanan_detail($id)
    {
        $query = $this->db->query("SELECT * FROM `detail_pesanan` WHERE id_pesanan = $id");
		return $query->result();
    }

    function get_pesanan_detail2($id)
    {
        $query = $this->db->query("SELECT * FROM `detail_pesanan` WHERE id_pesanan = $id AND status = 1");
		return $query->result();
    }

    function update_sts_detail($data,$id)
    {
        $this->db->trans_start();
        $this->db->where(array("id"=>$id));
        $this->db->update('detail_pesanan', $data);
        $this->db->trans_complete();
    }

    function get_detail_jumlah_1($id)
    {
        $query = $this->db->query("SELECT SUM(harga*jumlah) as jumlah FROM `detail_pesanan` WHERE status = 1 AND id_pesanan = $id");
		$jml = $query->row()->jumlah;
        if($jml == NULL){
            $jml = 0;
        }else{
            $jml = $jml;
        }
        return $jml;
    }

    function update_pesanan($data,$id)
    {
        $this->db->trans_start();
        $this->db->where(array("id"=>$id));
        $this->db->update('pesanan', $data);
        $this->db->trans_complete();
    }

    function pesanan_pelanggan($id)
    {
        $query = $this->db->query("SELECT * FROM `pesanan` WHERE pelanggan = $id");
		return $query->result();
    }

    function jml_transaksi()
    {
        $query = $this->db->query("SELECT * FROM `pesanan` where status = 4");
		return $query->result();
    }

    function jml_pesanan_selesai()
    {
        $query = $this->db->query("SELECT SUM(b.harga*b.jumlah) as jumlah FROM pesanan a, detail_pesanan b where a.status = 4 AND a.id = b.id_pesanan AND b.id_pesanan AND b.status = 1");
		return $query->row();
    }

    function avg_pesanan_selesai()
    {
        $query = $this->db->query("SELECT avg(jml) as avg FROM ( SELECT SUM(b.harga*b.jumlah) as jml FROM pesanan a, detail_pesanan b where a.status = 4 AND a.id = b.id_pesanan AND b.id_pesanan AND b.status = 1 GROUP BY Day(a.created_at) ) as counts");
		return $query->row();
    }

    function jml_pesanan()
    {
        $query = $this->db->query("SELECT * FROM `pesanan` where status = 0");
		return $query->result();
    }

    function get_avg_pesanan()
    {
        $query = $this->db->query("SELECT avg(count) as avg FROM ( SELECT COUNT(*) as count FROM `pesanan` GROUP BY Day(created_at) ) as counts");
		return $query->row();
    }

    function get_rekap_belanja($tgl)
    {
        $query = $this->db->query("SELECT b.*, SUM(b.harga) as harga, SUM(b.jumlah) as jumlah, SUM(c.berat) as berat FROM pesanan a, detail_pesanan b, produk c WHERE a.tgl_kirim LIKE '$tgl' AND a.id = b.id_pesanan AND b.status = 1 AND b.id_produk = c.id GROUP BY b.id_produk");
		return $query->result();
    }
}