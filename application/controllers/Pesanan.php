<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller { 

    public function __construct()
	{
		parent::__construct();
        $this->load->library('fpdf');
		$this->load->model('product_model');
		$this->load->model('user_model');
        $this->load->model('pesanan_model');

	}

    public function baru()
	{
		if($this->session->has_userdata('userId')) {
			$this->load->view('header');
			$this->load->view('pesanan_baru');
			$this->load->view('footer');
		} else {
			redirect(site_url("login?status=login"));
		}
	}

    public function baru_detail()
	{
		if($this->session->has_userdata('userId')) {
            $id = $this->input->get('id');
            $data['detail'] = $this->pesanan_model->get_pesanan_detail($id);
            $data['pesanan'] = $this->pesanan_model->get_pesanan_id($id);

			$this->load->view('header');
			$this->load->view('pesanan_baru_detail',$data);
			$this->load->view('footer');
		} else {
			redirect(site_url("login?status=login"));
		}
	}

    function status_detail()
    {
        $sts = $this->input->post('status');
        $psn = $this->input->post('pesan');
        if($sts == 'tersedia'){
            $data = array(
                'status' => '1',
            );
        }else{
            $data = array(
                'status' => '0',
            );
        }

        $this->pesanan_model->update_sts_detail($data,$this->input->post('ID'));
        $jml = $this->pesanan_model->get_detail_jumlah_1($psn);
        echo $jml;
    }

    function pesanan_proses()
    {
        $id = $this->input->post('id');
        $aksi = $this->input->post('aksi');

        if($aksi == '1')
        {   
            $set = array(
                "status" => '1'
            );
        }elseif($aksi == '-1'){
            $set = array(
                "status" => '-1'
            );
        }elseif($aksi == '4'){
            $set = array(
                "status" => '4'
            );
        }

        $this->pesanan_model->update_pesanan($set,$id);

        redirect(site_url("pesanan/baru"));
    }


    function pesanan_catatan()
    {
        $id = $this->input->post('ID');
        $nilai = $this->input->post('nilai');

        $data = array(
            "catatan" => $nilai
        );
        $this->pesanan_model->update_pesanan($data,$id);

    }

    public function proses()
	{
		if($this->session->has_userdata('userId')) {
			$this->load->view('header');
			$this->load->view('pesanan_proses');
			$this->load->view('footer');
		} else {
			redirect(site_url("login?status=login"));
		}
	}

    public function selesai()
	{
		if($this->session->has_userdata('userId')) {
			$this->load->view('header');
			$this->load->view('pesanan_selesai');
			$this->load->view('footer');
		} else {
			redirect(site_url("login?status=login"));
		}
	}

    public function batal()
	{
		if($this->session->has_userdata('userId')) {
			$this->load->view('header');
			$this->load->view('pesanan_batal');
			$this->load->view('footer');
		} else {
			redirect(site_url("login?status=login"));
		}
	}

    function nota_pengepakan()
    {
        $id = $this->input->get('id');

        if($id != ''){
            $pesanan = $this->pesanan_model->get_pesanan_id($id); 
            $pelanggan = $this->user_model->get_user_id($pesanan->pelanggan);
            $detail = $this->pesanan_model->get_pesanan_detail2($id);

            $pdf = new FPDF('P','mm','A5');
            $pdf->AddPage();
            $pdf->SetFont('Times','B',12);
            $pdf->SetLeftMargin(5);
            $pdf->SetTopMargin(5);
            $spasi = 6;
    
            $pdf->Ln(5);
            $pdf->Image(site_url("assets/image/yubis-logo.png"),5,10,45,0,'PNG');
            $pdf->Ln(10);
            $pdf->Cell(25, $spasi,"Nota Pengepakan", 0, 0, 'L');
            $pdf->Ln(6);
            $pdf->SetFont('Times','',10);
            //nama
            $pdf->Cell(80, $spasi,$pelanggan->nama, 0, 0, 'L');
            //id pesanan
            $pdf->Cell(45, $spasi,'ID Pesanan       : '.$id, 0, 0, 'L');
            $pdf->Ln(5);
            $x1 = $pdf->GetX();
            $y1 = $pdf->GetY();
            $pdf->MultiCell(80, 6, $pesanan->alamat_penerima, 0,'L');
            // $pdf->Cell(80, $spasi,$pesanan->alamat_penerima, 0, 0, 'L');
            //tanggal
            $tgl = explode("-",substr($pesanan->created_at,0,10));
            $pdf->SetXY($x1+80, $y1);
            $pdf->Cell(45, $spasi,"Tgl Pemesanan : ".$tgl[2].'/'.$tgl[1].'/'.$tgl[0], 0, 0, 'L');
            
            $pdf->SetTextColor(255 , 255, 255);
            $pdf->Ln(10);
            $pdf->Cell(80, $spasi,'Produk', 1, 0, 'L',true);
            $pdf->Cell(40, $spasi,'Satuan', 1, 0, 'C',true);
            $pdf->Cell(20, $spasi,'Jumlah', 1, 0, 'C',true);
            $pdf->SetTextColor(0 , 0, 0);
            
            $pdf->Ln(6);
            foreach($detail as $dtl){
                $produk = $this->product_model->get_produk_id($dtl->id_produk);

                $pdf->Cell(80, 6,$produk->nama, 'B', 0, 'L');
                $pdf->Cell(40, 6,$produk->satuan, 'B', 0, 'C');
                $pdf->Cell(20, 6,$dtl->jumlah, 'B', 0, 'C');
                $pdf->Ln();
            }

            $pdf->Ln(7);
            //catatan
            $pdf->SetFont('Times','B',10);
            $pdf->Cell(100, $spasi,'Catatan Pelanggan', 0, 0, 'L');
            $pdf->Ln(5);
            $pdf->SetFont('Times','',10);
            $pdf->MultiCell(80, 6, $pesanan->catatan, 0,'L');

            $pdf->Output();
        }
       
    }

    function nota()
    {
        $id = $this->input->get('id');

        if($id != ''){
            $pesanan = $this->pesanan_model->get_pesanan_id($id); 
            $pelanggan = $this->user_model->get_user_id($pesanan->pelanggan);
            $detail = $this->pesanan_model->get_pesanan_detail2($id);
            if($pesanan->kecamatan_penerima != '' || $pesanan->kecamatan_penerima != NULL){
                $ongkir = $this->product_model->get_kecamatan_by_id($pesanan->kecamatan_penerima)->ongkir;
            }
            else{
                $ongkir = 0;
            }

            switch($pesanan->pembayaran){
                case "1":
                    $pembayaran = 'Transfer';
                    break;
                case "2":
                    $pembayaran = 'Bayar Di Tempat';
                    break;
            }

            switch($pesanan->pengantaran){
                case "1":
                    $pengantaran = 'Kurir';
                    break;
                case "2":
                    $pengantaran = 'Ojek Online';
                    break;
            }

            $pdf = new FPDF('P','mm','A5');
            $pdf->AddPage();
            $pdf->SetFont('Times','B',12);
            $pdf->SetLeftMargin(5);
            $pdf->SetTopMargin(5);
            $spasi = 6;
    
            $pdf->Ln(5);
            $pdf->Image(site_url("assets/image/yubis-logo.png"),5,10,45,0,'PNG');
            $pdf->Ln(10);
            $pdf->SetFont('Times','',10);
            //nama
            $pdf->Cell(80, $spasi,$pelanggan->nama, 0, 0, 'L');
            //id pesanan
            $pdf->Cell(45, $spasi,'ID Pesanan       : '.$id, 0, 0, 'L');
            $pdf->Ln(5);
            //alamat
            $x1 = $pdf->GetX();
            $y1 = $pdf->GetY();
            $pdf->MultiCell(80, 6, $pesanan->alamat_penerima, 0,'L');
            // $pdf->Cell(80, $spasi,$pesanan->alamat_penerima, 0, 0, 'L');
            //tanggal
            $tgl = explode("-",substr($pesanan->created_at,0,10));
            $pdf->SetXY($x1+80, $y1);
            $pdf->Cell(45, $spasi,"Tgl Pemesanan : ".$tgl[2].'/'.$tgl[1].'/'.$tgl[0], 0, 0, 'L');
            
            //no hp
            $pdf->Ln(5);
            $pdf->Cell(80, $spasi,$pesanan->hp_penerima, 0, 0, 'L');
            //pembayaran
            $pdf->Cell(45, $spasi,"Pembayaran      : ".$pembayaran, 0, 0, 'L');

            $pdf->SetTextColor(255 , 255, 255);
            $pdf->Ln(10);
            $pdf->Cell(60, $spasi,'Produk', 1, 0, 'L',true);
            $pdf->Cell(30, $spasi,'Satuan', 1, 0, 'C',true);
            $pdf->Cell(20, $spasi,'Jumlah', 1, 0, 'C',true);
            $pdf->Cell(30, $spasi,'Harga', 1, 0, 'C',true);
            $pdf->SetTextColor(0 , 0, 0);
            
            $pdf->Ln(6);
            $sub = 0;
            foreach($detail as $dtl){
                $produk = $this->product_model->get_produk_id($dtl->id_produk);

                $pdf->Cell(60, $spasi,$produk->nama, 'B', 0, 'L');
                $pdf->Cell(30, $spasi,$produk->satuan, 'B', 0, 'C');
                $pdf->Cell(20, $spasi,$dtl->jumlah, 'B', 0, 'C');
                $pdf->Cell(30, $spasi,"Rp".number_format($dtl->harga), 'B', 0, 'R');
                $pdf->Ln();
                $sub += $dtl->harga * $dtl->jumlah;
            }

            $pdf->Ln(7);
            //catatan
            $pdf->SetFont('Times','B',10);
            $pdf->Cell(60, $spasi,'Catatan Pelanggan', 0, 0, 'L');
            $pdf->Cell(30, $spasi,'Subtotal', 'T,B', 0, 'L');
            $pdf->Cell(20, $spasi,'', 'T,B', 0, 'C');
            $pdf->Cell(30, $spasi,"Rp".number_format($sub),'T,B', 0, 'R');
            $pdf->Ln(5);
            $pdf->SetFont('Times','',10);
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->MultiCell(60, 6, $pesanan->catatan, 0,'L');
            $pdf->SetFont('Times','',10);
            $pdf->SetXY($x+60, $y+2);
            $pdf->Cell(50, $spasi,'Pengiriman ('.$pengantaran.')', 'B', 0, 'L');
            // $pdf->Cell(20, $spasi,'', 'B', 0, 'C');
           
            $pdf->Cell(30, $spasi,"Rp".number_format($ongkir),'B', 0, 'R');
            $pdf->Ln(6);

            $total = $sub + $ongkir;
            $pdf->SetFont('Times','B',10);
            $pdf->Cell(60, $spasi,'', 0, 0, 'L');
            $pdf->Cell(30, $spasi,'Total', 'B', 0, 'L');
            $pdf->Cell(20, $spasi,'', 'B', 0, 'C');
            $pdf->Cell(30, $spasi,"Rp".number_format($total),'B', 0, 'R');
           

            $pdf->Output();
        }
       
    }

    function whatsapp()
    {
        $id = $this->input->get('id');

        if($id != ''){
            $pesanan = $this->pesanan_model->get_pesanan_id($id); 
            $pelanggan = $this->user_model->get_user_id($pesanan->pelanggan);
            $detail = $this->pesanan_model->get_pesanan_detail2($id);
            if($pesanan->kecamatan_penerima != '' || $pesanan->kecamatan_penerima != NULL){
                $ongkir = $this->product_model->get_kecamatan_by_id($pesanan->kecamatan_penerima)->ongkir;
            }
            else{
                $ongkir = 0;
            }

            $awal = substr($pesanan->hp_penerima,0,1);
            if($awal == "+"){
                $awal2 = "62";
                $hp = str_replace("+62","62",$pesanan->hp_penerima);
            }elseif($awal == '0'){
                $awal2 = "62";
                $hp = "62".substr($pesanan->hp_penerima,1);
            }
            

            switch($pesanan->pembayaran){
                case "1":
                    $pembayaran = 'Transfer';
                    break;
                case "2":
                    $pembayaran = 'Bayar Di Tempat';
                    break;
            }

            switch($pesanan->pengantaran){
                case "1":
                    $pengantaran = 'Kurir';
                    break;
                case "2":
                    $pengantaran = 'Ojek Online';
                    break;
            }
            $sub = 0;

            $txt =  "🛒 *".$id." - Nota Yubis_Sayur*%0a--------------------------------------------------%0aPelanggan Yth, *".$pelanggan->nama."*, terima kasih sudah memesan produk kami.%0aBerikut adalah detail pesanan Anda:%0a%0a";
            
            foreach($detail as $dtl){
                $produk = $this->product_model->get_produk_id($dtl->id_produk);
                $jml = $dtl->harga * $dtl->jumlah;
                $txt .= $produk->nama."-".$produk->satuan." x ".$dtl->jumlah." : Rp".$jml."%0a";
                $sub += $jml;
            }

            $txt .= '%0a*Pengantaran*:%0a'.$pengantaran." : Rp".$ongkir."%0a%0a";

            $txt .= '*Total Pembayaran:%0aRp'.$sub."*%0a%0a";

            $txt .= 'Pesanan Anda siap diantar, silakan lakukan pembayaran melalui Kurir kami.%0a%0a';

            $txt .= 'Terimakasih banyak sudah berbelanja.%0a';

            $txt .= '*@yubis_sayur*%0a%0a';

            $txt .= '*Fresh - Harga Terbaik - Mudah.*%0a%0a';

            $txt .= '🍋🥦🥬';

            redirect("https://api.whatsapp.com/send?phone=".$hp."p&text=$txt", 'refresh');
        }
    }

    function rekap_belanja_lihat()
    {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r ($data);
        $tgl = $data['tgl'];
        $rekap = $this->pesanan_model->get_rekap_belanja($tgl);
        if(!empty($rekap)){
            $date = explode('-',$tgl);

            $pdf = new FPDF('P','mm','A5');
            $pdf->AddPage();
            $pdf->SetFont('Times','B',12);
            $pdf->SetLeftMargin(5);
            $pdf->SetTopMargin(5);
            $spasi = 6;
    
            $pdf->Ln(5);
            $pdf->Image(site_url("assets/image/yubis-logo.png"),5,10,45,0,'PNG');
            $pdf->Ln(10);
            $pdf->Cell(25, $spasi,"Rekap Belanja", 0, 0, 'L');
            $pdf->Ln(6);
            $pdf->SetFont('Times','',10);
             //tgl
            $pdf->Cell(80, $spasi,"Tanggal Kirim : ".$date['2']."/".$date['1']."/".$date['0'], 0, 0, 'L');

            $pdf->SetTextColor(255 , 255, 255);
            $pdf->Ln(10);
            $pdf->Cell(10, $spasi,'No', 1, 0, 'L',true);
            $pdf->Cell(80, $spasi,'Produk', 1, 0, 'L',true);
            $pdf->Cell(30, $spasi,'Satuan', 1, 0, 'C',true);
            $pdf->Cell(20, $spasi,'Jumlah', 1, 0, 'C',true);
            $pdf->SetTextColor(0 , 0, 0);

            $pdf->Ln(6);
            $n = 1;
            foreach($rekap as $rk){
                $produk = $this->product_model->get_produk_id($rk->id_produk);

                $pdf->Cell(10, $spasi,$n, 'B', 0, 'C');
                $pdf->Cell(80, $spasi,$produk->nama, 'B', 0, 'L');
                $pdf->Cell(30, $spasi,$produk->satuan, 'B', 0, 'C');
                $pdf->Cell(20, $spasi,$rk->berat, 'B', 0, 'C');
                $pdf->Ln();
                $n++;
            }

            $pdf->Output();
        }else{
            $date = explode('-',$tgl);

            $pdf = new FPDF('P','mm','A5');
            $pdf->AddPage();
            $pdf->SetFont('Times','B',12);
            $pdf->SetLeftMargin(5);
            $pdf->SetTopMargin(5);
            $spasi = 6;
    
            $pdf->Ln(5);
            $pdf->Image(site_url("assets/image/yubis-logo.png"),5,10,45,0,'PNG');
            $pdf->Ln(10);
            $pdf->Cell(25, $spasi,"Rekap Belanja", 0, 0, 'L');
            $pdf->Ln(6);
            $pdf->SetFont('Times','',10);
             //tgl
            $pdf->Cell(80, $spasi,"Tanggal Kirim : ".$date['2']."/".$date['1']."/".$date['0'], 0, 0, 'L');

            $pdf->SetTextColor(255 , 255, 255);
            $pdf->Ln(10);
            $pdf->Cell(10, $spasi,'No', 1, 0, 'L',true);
            $pdf->Cell(80, $spasi,'Produk', 1, 0, 'L',true);
            $pdf->Cell(30, $spasi,'Satuan', 1, 0, 'C',true);
            $pdf->Cell(20, $spasi,'Jumlah', 1, 0, 'C',true);
            $pdf->SetTextColor(0 , 0, 0);

            $pdf->Output();
        }

    }


}