<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	function index(){
		$var['provinsi'] = $this->db->get('provinsi');
		$dapils = [];
		$getProv = $this->db->get('provinsi');
		foreach($getProv->result() as $row){
			$getDapil = $this->db->get_where('kabupaten', ['provinsi_id' => $row->id])->num_rows();
			array_push($dapils, [strtolower($row->kode), $getDapil]);
		}

		$dapils2 = [];
		foreach($getProv->result() as $row){
			$getDapil2 = $this->db->select('*')
								->from('kabupaten')
								->where([
									'provinsi_id' => $row->id
								])->group_by('dapil')->get()->num_rows();
			array_push($dapils2, [strtolower($row->kode), $getDapil2]);
		}

		$var['dapil'] = $dapils;
		$var['dapil2'] = $dapils2;
		$this->load->view('landing', $var);
	}

	function getProv(){
		$name = $this->input->get('name', TRUE);
		$get = $this->db->get_where('provinsi', ['kode_provinsi' => $name])->row();
		$this->output->set_content_type('application/json')->set_output(json_encode($get->id));
	}
}
