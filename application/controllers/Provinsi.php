<?php
class Provinsi extends CI_Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        $getData = $this->db->get('provinsi');
        $this->output->set_content_type('application/json')->set_output(json_encode($getData->result()));
    }
}