<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('admin_m');
		 $this->load->database();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function pertanyaan()
	{
		// $data['pertanyaan'] = $this->admin_m->forms();
		$data['pertanyaan'] = $this->admin_m->quizes();
		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/pertanyaan',$data);
		$this->load->view('footer_admin');
	}

	public function detailquiz($id)
	{
		$where = array('id' => $id);

		$data['datapertanyaan'] = $this->admin_m->detail_quiz($where,'form')->result();

		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/quiz_detail',$data);
		$this->load->view('footer_admin');
	}

	public function detailpertanyaan($id)
	{
		$where = array('id' => $id);

		$data['datapertanyaan'] = $this->admin_m->detail($where,'form')->result();

		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/pertanyaan_detail',$data);
		$this->load->view('footer_admin');
	}
	function updateskor()
	{
		$bobot1 = $this->input->post('bobot1');
		$bobot2 =$this->input->post('bobot2');
		$id =$this->input->post('id');
		$this->admin_m->update_skor($bobot2,$bobot1,$id);
		$this->pertanyaan();
	}
		function updatequiz()
	{
		$pertanyaan = $this->input->post('pertanyaan');
		$pilihan1 = $this->input->post('pilihan');
		$pilihan2 =$this->input->post('pilihan2');
		$id =$this->input->post('id');
		$this->admin_m->update_quiz($pertanyaan,$pilihan1,$pilihan2,$id);
		$this->pertanyaan();
	}
	public function skrinning()
	{
		$data['result'] = $this->admin_m->get_all();
		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('footer_admin');
	}

	function detailSkrining($id)
	{
		$where = array('id' => $id);

		$data['datascreening'] = $this->admin_m->detail_skrining($where,'temp_trx')->result();

		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/skrining_detail',$data);
		$this->load->view('footer_admin');
	}

	public function testi()
	{
		$this->load->model('testi_m');
		$this->load->helper('url');
		$this->load->view('detailproyek');
	}

	function get_list_pertanyaan()
	{
		$this->load->model('testi_m');
		$list = $this->testi_m->get_datatables();
        $data = array();
        // $no = $_POST['start'];
        foreach ($list as $customers) {
            // $no++;
            $row = array();
            $row[] = $customers->id;
            $row[] = $customers->pertanyaan;
            $row[] = $customers->description;

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->testi_m->count_all(),
                        "recordsFiltered" => $this->testi_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


}
