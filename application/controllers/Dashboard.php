<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();

    }

    function index(){
        $provid = $this->input->get('prov', TRUE);
        $var['provinsi'] = $this->db->get_where('provinsi', ['id' => $provid])->row();
        $var['dapil'] = $this->db->order_by('dapil', "ASC")->get_where('dapil', ['provinsi_id' => $provid]);
        $var['bidang'] = $this->db->get('bidang');
		$this->load->view('dashboard', $var);
    }
}