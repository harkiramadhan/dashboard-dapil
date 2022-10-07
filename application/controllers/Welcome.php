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
	public function index()
	{
		$getProvinsi = $this->db->get('provinsi');
		foreach($getProvinsi->result() as $prov){
			$dataKab = [];
			$getKabupaten = $this->db->get_where('kabupaten', ['provinsi_id' => $prov->id]);
			foreach($getKabupaten->result() as $kab){
				$dataKab[] = [
					'dapil' => $prov->kode_provinsi." ".$kab->kode_kabupaten,
					'kabupaten' => $kab->kabupaten,
					'singkat' => $kab->singkat_kabupaten
				];
			}
			$datas[] = [
				'provinsi' => $prov->provinsi,
				'singkat' => $prov->singkat_provinsi,
				'kabupaten' => $dataKab
			];
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($datas));
		
	}
}
