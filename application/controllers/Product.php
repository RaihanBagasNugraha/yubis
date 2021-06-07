<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
        $this->load->model('pesanan_model');
	}
    
    function add_kategori()
    {
        $data = $this->input->post();
        $submit = $data['submit'];
        // echo "<pre>";
        // print_r ($data);

        if($submit == 'simpan'){
            if(!empty($_FILES)) { 
                $produk = array(
                    'nama' => $data['nama'],
                );

                $file = $_FILES['file']['tmp_name']; 
				$sourceProperties = getimagesize($file);
				$fileNewName = str_replace(' ', '',$_FILES['file']['name']);
				$folderPath = "assets/image/kategori/";
				$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

				$produk['icon'] = $folderPath.$fileNewName;
				move_uploaded_file($file, $folderPath. $fileNewName);

                $this->product_model->insert_kategori($produk);
            }
        }
        elseif($submit == 'ubah'){
            $kategori = $this->product_model->get_kategori_id($data['id']);
            if(!empty($_FILES)) { 
                unlink($kategori->icon);
                $produk = array(
                    'nama' => $data['nama'],
                );

                $file = $_FILES['file']['tmp_name']; 
				$sourceProperties = getimagesize($file);
				$fileNewName = str_replace(' ', '',$_FILES['file']['name']);
				$folderPath = "assets/image/kategori/";
				$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

				$produk['icon'] = $folderPath.$fileNewName;
				move_uploaded_file($file, $folderPath. $fileNewName);

                $this->product_model->update_kategori($produk,$data['id']);
            }
        }
       
        redirect(site_url("product-category"));
    }

    function delete_kategori()
    {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r ($data);
        //get kategori
        $kategori = $this->product_model->get_kategori_id($data['id']);
        unlink($kategori->icon);
        //delete kategori
        $this->product_model->delete_kategori($data['id']);
        redirect(site_url("product-category"));

    }

    function add_kecamatan()
    {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r ($data);
        $kecamatan = array(
            "nama" => $data['nama'],
            "ongkir" => str_replace(",","",$data['ongkir'])
        );
        $this->product_model->insert_kecamatan($kecamatan);
        redirect(site_url("kecamatan"));
    }

    function delete_kecamatan()
    {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r ($data);
        $this->product_model->delete_kecamatan($data['id']);
        redirect(site_url("kecamatan"));
    }

    function edit_kecamatan()
    {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r ($data);
        $update = array(
            "nama" => $data['nama'],
            "ongkir" => str_replace(",","",$data['ongkir'])
        );
        $this->product_model->update_kecamatan($update,$data['id']);
        redirect(site_url("kecamatan"));
    }

    function add_tanggal()
    {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r ($data);
        $submit = $data['submit'];

        $tgl = array(
            "tgl" => $data['tgl']
        );

        if($submit == 'simpan'){
            $this->product_model->insert_tanggal($tgl);
        }else{
            $this->product_model->ubah_tanggal($tgl,$data['id']);
        }

        redirect(site_url("tanggal-libur"));
    }

    function delete_tanggal()
    {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r ($data);
        $this->product_model->delete_tanggal($data['id']);
        redirect(site_url("tanggal-libur"));
    }

    function add_produk()
    {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r ($data);

        if(!empty($_FILES)) { 
            $produk = array(
                'nama' => $data['nama'],
            );
            
            $kategori = $data['kategori'];
            if(!empty($kategori) || $kategori != ''){
                $k = 0;
                $kat = '';
                foreach($kategori as $ktg)
                {
                    $kat .= $kategori[$k]."#";
                    $k++;
                }
                $produk['kategori'] = $kat;
            }
           

            $file = $_FILES['file']['tmp_name']; 
            $sourceProperties = getimagesize($file);
            $fileNewName = str_replace(' ', '',$_FILES['file']['name']);
            $folderPath = "assets/image/produk/";
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            $produk['foto'] = $folderPath.$fileNewName;
            move_uploaded_file($file, $folderPath. $fileNewName);

            $this->product_model->insert_produk($produk);
        }

        redirect(site_url("product"));
    }

    function delete_produk()
    {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r ($data);
        $this->product_model->delete_produk($data['id']);
        redirect(site_url("product"));
    }

    function edit_produk()
    {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r ($data);
        $id = $data['id'];
        $produk_data = $this->product_model->get_produk_id($id);

        $produk = array(
            'nama' => $data['nama'],
        );
        
        $kategori = $data['kategori'];
        if(!empty($kategori) || $kategori != ''){
            $k = 0;
            $kat = '';
            foreach($kategori as $ktg)
            {
                $kat .= $kategori[$k]."#";
                $k++;
            }
            $produk['kategori'] = $kat;
        }
       

        if(!empty($_FILES)) { 
            unlink($produk_data->foto);
            $produk = array(
                'nama' => $data['nama'],
            );
            
            $kategori = $data['kategori'];
            if(!empty($kategori) || $kategori != ''){
                $k = 0;
                $kat = '';
                foreach($kategori as $ktg)
                {
                    $kat .= $kategori[$k]."#";
                    $k++;
                }
            }
            $produk['kategori'] = $kat;

            $file = $_FILES['file']['tmp_name']; 
            $sourceProperties = getimagesize($file);
            $fileNewName = str_replace(' ', '',$_FILES['file']['name']);
            $folderPath = "assets/image/produk/";
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            $produk['foto'] = $folderPath.$fileNewName;
            move_uploaded_file($file, $folderPath. $fileNewName);
        }

        $this->product_model->update_produk($produk,$id);
        redirect(site_url("product"));

    }

    function insert_produk_row()
    {
        $data= array(
			'parent' => $this->input->post('parent'),
			'status' => $this->input->post('status'),
            'kategori' => $this->input->post('kategori')
		);

        $insert_id  = $this->product_model->insert_produk($data);
        echo $insert_id;
    }

    function delete_produk_row()
    {
        $this->product_model->delete_produk($this->input->post('parent'));
    }

    function insert_data_produk()
    {
        $modul = $this->input->post('modul');
        
        if($modul == 'satuan'){
            $data= array(
                'satuan' => $this->input->post('nilai'),
            );
        }
        elseif($modul == 'berat'){
            $data= array(
                'berat' => $this->input->post('nilai'),
            );
        }
        elseif($modul == 'harga'){
            $data= array(
                'harga' => $this->input->post('nilai'),
            );
        }
        elseif($modul == 'promo'){
            $data= array(
                'hargaPromo' => $this->input->post('nilai'),
            );
        }

        $this->product_model->update_produk($data,$this->input->post('ID'));
    }

    function status_data_produk()
    {
        $sts = $this->input->post('status');

        if($sts == 'tersedia'){
            $data = array(
                'status' => 'Tersedia',
            );
        }else{
            $data = array(
                'status' => 'Kosong',
            );
        }

        $this->product_model->update_produk($data,$this->input->post('ID'));
    }

    
}