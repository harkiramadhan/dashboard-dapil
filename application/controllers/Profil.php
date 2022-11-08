<?php
class Profil extends CI_Controller{
    function index(){
        $provid = $this->input->get('prov', TRUE);
        $var['provinsi'] = $this->db->get_where('provinsi', ['id' => $provid])->row();
        $var['dapil'] = $this->db->order_by('urut', "ASC")->get_where('dapil', ['provinsi_id' => $provid]);

        $this->load->view('profile', $var);
    }
}