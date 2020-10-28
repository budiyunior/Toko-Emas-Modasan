<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_sales extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_menu');
		$this->load->model('M_sales');
		$this->load->model('M_barang');
        $this->load->library('pagination');
    }


    public function index()
    {
        $data['title'] = "Sales";
        $data['menu'] = $this->M_menu->get_menu();
        //$data['idsales'] = $this->db->get_where('t_sales', ['fc_salesid' => $id_sales])->row_array();
        // $data['sales'] = $this->M_sales->get();
        // $data['sales3'] = $this->M_sales->get();
        $data['jabatan'] = $this->M_sales->get_jabatan();
        $data['jabatan2'] = $this->M_sales->get_jabatan();

        //konfigurasi pagination
        $config['base_url'] = site_url('C_sales/index'); //site url
        $config['total_rows'] = $this->db->count_all('t_sales'); //total row
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
        $data['sales'] = $this->M_sales->list_sales($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();


        $this->load->view('admin/v_sales', $data);
    }

    public function save()
    {
        $validasi = $this->form_validation->set_rules('fc_salesid', 'id sales', 'required|is_unique[t_sales.fc_salesid]', [
            'is_unique' => 'Kode sudah ada',
            'required' => 'Nama Tidak Boleh Kosong'
        ]);
        $validasi = $this->form_validation->set_rules('fv_nama', 'nama', 'required', [
            'required' => 'Nama Tidak boleh kosong'
        ]);

        $save_sales = $this->M_sales;
        if ($validasi->run() == true) {
            $save_sales->save_sales();
            // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
            // redirect('');
            echo "<script>
            alert('Data sales berhasil di tambahkan');
            window.location.href = '" . base_url('C_sales') . "';
        </script>"; //Url tujuan

        }
    }

    public function update()
    {
        // $validasi = $this->form_validation->set_rules('fc_salesid', 'id sales', 'required|is_unique[t_sales.fc_salesid]', [
        //     'is_unique' => 'Kode sudah ada',
        //     'required' => 'Nama Tidak Boleh Kosong'
        // ]);
        // $validasi = $this->form_validation->set_rules('fv_nama', 'nama', 'required', [
        //     'required' => 'Nama Tidak boleh kosong'
        // ]);

        $update_sales = $this->M_sales;
        // if ($validasi->run() == true) {
        $update_sales->update_sales();
        echo "<script>
            alert('Data sales berhasil di ubah');
            window.location.href = '" . base_url('C_sales') . "';
        </script>"; //Url tujuan
        //}
    }

    public function delete()
    { {
            foreach ($_POST['id'] as $id) {
                $this->M_sales->delete($id);
            }
            return redirect('C_sales');
        }
    }

    public function ajax_edit($id)
    {
        $data = $this->M_sales->get_by_id2($id);
        echo json_encode($data);
    }

    public function view()
    {
        $data['sales'] = $this->M_sales->get();
        $data['sales3'] = $this->M_sales->get();
        $data['jabatan'] = $this->M_sales->get_jabatan();
        $this->load->view('tambahan/v_tablesales', $data);
    }

    public function search()
    {
        if ($this->input->post('')) {
            $data['search'] = $this->input->post('search');
        }
        $this->load->view('tambahan/v_tablesales');
    }
}
