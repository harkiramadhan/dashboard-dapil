<?php
class Kabupaten extends CI_Controller{
    function __construct(){
        parent::__construct();


    }

    function index(){
        $provinsi_id = $this->input->get('provid', TRUE);
        if($provinsi_id){
            $this->db->where('provinsi_id', $provinsi_id);
        }
        $getData = $this->db->select('k.*, p.singkat_provinsi')
                            ->from('kabupaten k')
                            ->join('provinsi p', 'k.provinsi_id = p.id')
                            ->get();

        foreach($getData->result() as $row){
            $datas[] = [
                'id' => $row->id,
                'provinsi_id' => $row->provinsi_id,
                'kabupaten' => $row->kabupaten,
                'kode_kabupaten' => $row->kode_kabupaten,
                'singkat_kabupaten' => $row->singkat_kabupaten,
                'dapil' => $row->singkat_provinsi." ".$row->kode_kabupaten
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($datas));
    }
}