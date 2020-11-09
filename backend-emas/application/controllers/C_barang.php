<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_menu');
        $this->load->model('M_barang');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title'] = "Barang";
        $data['menu'] = $this->M_menu->get_menu();
        $data['barang'] = $this->M_barang->get_barang();
        $data['sales'] = $this->M_barang->get_sales();
        $data['sales2'] = $this->M_barang->get_sales();
        $data['kelompok'] = $this->M_barang->get_kelompok();
        $data['kelompok2'] = $this->M_barang->get_kelompok();
        $data['lokasi'] = $this->M_barang->get_lokasi();
		$data['lokasi2'] = $this->M_barang->get_lokasi();
		
		$data['kode_barcode'] = $this->randomString();

		$nota = $this->M_barang->max()->row();

		$kode = $nota->maxs;
            //tampil data

		$urut = (int) substr($kode, 0, 5);

		$urut++;

		//$char = "BPB";

		$kode = sprintf("%05s", $urut);

		$data['kode_barang'] = $kode;

		//kelompok

		$kelompok = $this->M_barang->max_kelompok()->row();

		$kode_kelompok = $kelompok->maxs_kelompok;

		$urut_kelompok = (int) substr($kode_kelompok, 0, 3);

		$urut_kelompok++;

		$kode_kelompok = sprintf("%03s", $urut_kelompok);

		$data['kode_kelompok'] = $kode_kelompok;

		//lokasi
		$lokasi = $this->M_barang->max_lokasi()->row();

		$kode_lokasi = $lokasi->maxs_lokasi;

		$urut_lokasi = (int) substr($kode_lokasi, 0, 2);

		$urut_lokasi++;

		$kode_lokasi = sprintf("%02s", $urut_lokasi);

		$data['kode_lokasi'] = $kode_lokasi;

        // $fc_userid = $this->session->userdata('fc_userid');

        // $r = $this->M_barang->getRole($fc_userid, 'r')->r;
        // $c = $this->M_barang->getRole($fc_userid, 'c')->r;
        // $u = $this->M_barang->getRole($fc_userid, 'u')->r;
        // $d = $this->M_barang->getRole($fc_userid, 'd')->r;

        //konfigurasi pagination
        $config['base_url'] = site_url('C_barang/index'); //site url
        $config['total_rows'] = $this->db->count_all('tm_stock'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination dengan Bootstrap
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function list_pelanggan yang ada pada mmodel M_pelanggan 
        $data['barang'] = $this->M_barang->list_barang($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();


        //load view pelanggan view
        //if ($r == '1' || $c == '1' || $u == '1' || $d == '1') {

        $this->load->view('admin/v_barang', $data);
        //}	
    }


    public function save_nmkelompok()
    {
        $save_kelompok = $this->form_validation->set_rules('');







        $save_kelompok->save_namakelompok();
        // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
        // redirect('');

        // echo "<script>
        //     alert('Data sales berhasil di tambahkan');
        //     window.location.href = '" . base_url('C_barang') . "';
        // </script>"; //Url tujuan
    }

    public function save_barang()
    {

		$save_barang = $this->M_barang;
		
        $save_barang->save_barang();
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
       // redirect('');
        echo "<script>
            alert('Data Barang berhasil di tambahkan');
            window.location.href = '" . base_url('C_barang') . "';
        </script>"; //Url tujuan

	}
	
	public function cetak_barcode(){
		$nama_toko = $this->M_barang->get_nama_toko();
		$data['nama_tokone'] = $nama_toko->fc_isi;
		$data['barcode'] = $this->input->post('fc_barcode2');
		$data['kode_stock'] = $this->input->post('fc_kdstock2');
		$data['berat'] = $this->input->post('ff_berat2');
		$data['kadar'] = $this->input->post('fc_kadar2');
		$data['nama_barang'] = $this->input->post('fv_nmbarang2');
		$data['kelompok'] = $this->input->post('fc_kdkelompok2');
		$data['lokasi'] = $this->input->post('fc_kdlokasi2');
		$this->load->view('admin/v_barcode', $data);
	}

	public function get_barcode(){
		echo $this->randomString();
	}	

	function randomString($length = 10) {
		$str = "";
		$characters = array_merge(range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str  .= $characters[$rand];
		}
		return $str;
	}

    public function update_barang()
    {

        $save_barang = $this->M_barang;
        $save_barang->update_barang();
        // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
        // redirect('');
        echo "<script>
            alert('Data Barang berhasil di ubah');
            window.location.href = '" . base_url('C_barang') . "';
        </script>"; //Url tujuan

    }

    public function edit($id)
    {
        $data = $this->M_barang->get_by_id($id);
        echo json_encode($data);
	}
	
	public function get_edit_kelompok($id){
		$data = $this->M_barang->get_edit_kelompok($id);
        echo json_encode($data);
	}

	public function get_edit_lokasi($id){
		$data = $this->M_barang->get_edit_lokasi($id);
        echo json_encode($data);
	}

    public function delete()
    {
        foreach ($_POST['id'] as $id) {
            $this->M_barang->delete($id);
        }
        return redirect('C_barang/index');
    }

    public function save_kelompok()
    {

        $save_kelompok = $this->M_barang;
        $save_kelompok->save_kelompok();
        // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
        // redirect('');
        echo "<script>
            alert('Data kelompok berhasil di tambahkan');
            window.location.href = '" . base_url('C_barang') . "';
        </script>"; //Url tujuan
    }

    public function save_lokasi()
    {

        $save_lokasi = $this->M_barang;
        $save_lokasi->save_lokasi();
        // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
        // redirect('');
        echo "<script>
            alert('Data lokasi berhasil di tambahkan');
            window.location.href = '" . base_url('C_barang') . "';
        </script>"; //Url tujuan
    }


    public function filter()
    {
        $data['title'] = "Barang";
        $data['menu'] = $this->M_menu->get_menu();
        $data['barang'] = $this->M_barang->get_barang();
        $data['sales'] = $this->M_barang->get_sales();
        $data['sales2'] = $this->M_barang->get_sales();
        $data['kelompok'] = $this->M_barang->get_kelompok();
        $data['kelompok2'] = $this->M_barang->get_kelompok();
        $data['lokasi'] = $this->M_barang->get_lokasi();
        $data['lokasi2'] = $this->M_barang->get_lokasi();


        //konfigurasi pagination
        $config['base_url'] = site_url('C_barang/index'); //site url
        $config['total_rows'] = $this->db->count_all('tm_stock'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination dengan Bootstrap
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function list_pelanggan yang ada pada mmodel M_pelanggan 
        $data['barang'] = $this->M_barang->filternew($config["per_page"], $data['page']);
        // $data['barang'] = $this->M_barang->filter2($config["per_page"], $data['page']);
        // $data['barang'] = $this->M_barang->filter3($config["per_page"], $data['page']);
        // $data['barang'] = $this->M_barang->filter4($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('admin/v_barang', $data);

	}
	
	public function Barcode($code)
	{
		$this->load->library('Zend');
		$this->zend->load('Zend/Barcode');
		Zend_Barcode::render('code128', 'image', array(
		'text'=>$code,
		'fontSize'=> 10,
		'barThickWidth' => 5,
		'barHeight' => 25,
		'drawText' =>true
		), array());
	}

	public function ajax_get_kelompok(){
		echo json_encode($this->M_barang->ajax_get_kelompok()->result_array());
	}

	public function ajax_get_lokasi(){
		echo json_encode($this->M_barang->ajax_get_lokasi()->result_array());
	}

	public function ajax_add_kelompok(){

		if($this->input->post('fn_id')==''){
			$data = array(
			
				'fc_kdkelompok' => $this->input->post('fc_kdkelompok'),
				'fv_nmkelompok' => $this->input->post('fv_nmkelompok'),
			); 		
	
			$this->M_barang->add_kelompok($data);
			echo json_encode(array('status' => TRUE));
		}else{
			$data = array(
		
				'fc_kdkelompok' => $this->input->post('fc_kdkelompok'),
				'fv_nmkelompok' => $this->input->post('fv_nmkelompok'),
			);
			$this->M_barang->update_kelompok(array('fn_id' => $this->input->post('fn_id')), $data);
			//print_r($this->db->last_query());
			echo json_encode(array("status" => TRUE));
		}
	
	}

	public function ajax_add_lokasi(){
		if($this->input->post('fn_id')==''){
			$data = array(
			
				'fc_kdlokasi' => $this->input->post('fc_kdlokasi'),
				'fv_nmlokasi' => $this->input->post('fv_nmlokasi'),
			); 		
	
			$this->M_barang->add_lokasi($data);
			echo json_encode(array('status' => TRUE));
		}else{
			$data = array(
		
				'fc_kdlokasi' => $this->input->post('fc_kdlokasi'),
				'fv_nmlokasi' => $this->input->post('fv_nmlokasi'),
			);
			$this->M_barang->update_lokasi(array('fn_id' => $this->input->post('fn_id')), $data);
			//print_r($this->db->last_query());
			echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_delete_kelompok($id){
		$this->M_barang->delete_by_id_kelompok($id);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete_lokasi($id){
		$this->M_barang->delete_by_id_lokasi($id);
		echo json_encode(array("status" => TRUE));
	}


    public function kadar()
    {
        $kadar = $_GET['kadar'];
        if ($kadar == 0) {
            $barang = $this->db->get('tm_stock', array('fc_kondisi' => 0))->result();
        } else {
            $barang = $this->db->get_where('tm_stock', ['fc_kadar' => $kadar, 'fc_kondisi' => 0])->result();
        }

        if (!empty($barang)) {
            $no = $this->uri->segment('3') + 1;
        foreach ($barang as $s) : ?>
            <tr>
                <td class="check">
                    <input type="checkbox" class="check-item" name="id" value="<?= $s->fn_id ?>">
                </td>
                <th scope="col"><?= $no++ ?></th>
                <td scope="row"><?= $s->fc_kdstock ?></td>
                <td scope="row"><?= $s->fv_nmbarang ?></td>
                <td scope="row"><?= $s->fc_kdkelompok ?></td>
                <td scope="row"><?= $s->fc_kdlokasi ?></td>
                <td scope="row"><?= $s->ff_berat ?></td>
                <td scope="row"><?= $s->fc_kadar ?></td>
                <td scope="row"><?= $s->fm_hargabeli ?></td>
                <td scope="row"><?= $s->fc_salesid ?></td>
                <td scope="row"><?= $s->fc_sts ?></td>
                <td scope="row"><?= $s->fd_date ?></td>
            </tr>
        <?php endforeach ?> <?php
        } else {
            ?>
                <tr><td align="center">Tidak Ada Data</td></tr>
            <?php
        }
        
    }

    public function kelompok()
    {
        $kelompok = $_GET['kelompok'];
        if ($kelompok == 0) {
            $barang = $this->db->get('tm_stock', ['fc_kondisi' => 0])->result();
        } else {
            $barang = $this->db->get_where('tm_stock', ['fc_kdkelompok' => $kelompok, 'fc_kondisi' => 0])->result();
        }

        if (!empty($barang)) {
            $no = $this->uri->segment('3') + 1;
        foreach ($barang as $s) : ?>
            <tr>
                <td class="check">
                    <input type="checkbox" class="check-item" name="id" value="<?= $s->fn_id ?>">
                </td>
                <th scope="col"><?= $no++ ?></th>
                <td scope="row"><?= $s->fc_kdstock ?></td>
                <td scope="row"><?= $s->fv_nmbarang ?></td>
                <td scope="row"><?= $s->fc_kdkelompok ?></td>
                <td scope="row"><?= $s->fc_kdlokasi ?></td>
                <td scope="row"><?= $s->ff_berat ?></td>
                <td scope="row"><?= $s->fc_kadar ?></td>
                <td scope="row"><?= $s->fm_hargabeli ?></td>
                <td scope="row"><?= $s->fc_salesid ?></td>
                <td scope="row"><?= $s->fc_sts ?></td>
                <td scope="row"><?= $s->fd_date ?></td>
            </tr>
        <?php endforeach ?> <?php
        } else {
            ?>
                <tr><td align="center">Tidak Ada Data</td></tr>
            <?php
        }
    }

    public function lokasi($limit, $start)
    {
        $lokasi = $_GET['lokasi'];
        if ($lokasi == 0) {
            $barang = $this->db->get_where('tm_stock', array('fc_kondisi' => 0), $limit, $start)->result();
        } else {
            $barang = $this->db->get_where('tm_stock', ['fc_kdlokasi' => $lokasi, 'fc_kondisi' => 0])->result();
        }

        if (!empty($barang)) {
            $no = $this->uri->segment('3') + 1;
        foreach ($barang as $s) : ?>
            <tr>
                <td class="check">
                    <input type="checkbox" class="check-item" name="id" value="<?= $s->fn_id ?>">
                </td>
                <th scope="col"><?= $no++ ?></th>
                <td scope="row"><?= $s->fc_kdstock ?></td>
                <td scope="row"><?= $s->fv_nmbarang ?></td>
                <td scope="row"><?= $s->fc_kdkelompok ?></td>
                <td scope="row"><?= $s->fc_kdlokasi ?></td>
                <td scope="row"><?= $s->ff_berat ?></td>
                <td scope="row"><?= $s->fc_kadar ?></td>
                <td scope="row"><?= $s->fm_hargabeli ?></td>
                <td scope="row"><?= $s->fc_salesid ?></td>
                <td scope="row"><?= $s->fc_sts ?></td>
                <td scope="row"><?= $s->fd_date ?></td>
            </tr>
        <?php endforeach ?> <?php
        } else {
            ?>
                <tr><td align="center">Tidak Ada Data</td></tr>
            <?php
        }
    }

    public function diambil($id)
    {
        $kondisi = 1;
        $data = $this->M_barang->get_by_id($id);
        $this->M_barang->update_kondisibrg($kondisi, $id);
        echo json_encode($data);
        echo "<script>
        alert('Data Barang berhasil di ambil');
        window.location.href = '" . base_url('C_barang') . "';
        </script>"; //Url tujuan

    }
}
