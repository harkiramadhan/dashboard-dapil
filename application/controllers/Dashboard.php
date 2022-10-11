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

    function ajaxBarChart(){
        $type = $this->input->get('type', TRUE);
        $bidang = $this->input->get('bidang', TRUE);
        $tahun = $this->input->get('tahun', TRUE);
        $provinsiid = $this->input->get('provinsiid', TRUE);
        $dapil = trim(preg_replace('/\s\s+/', ' ', $this->input->get('dapil', TRUE)));

        $getKabupaten = $this->db->select('id, kabupaten')->order_by('kabupaten', "ASC")->get_where('kabupaten', ['dapil' => $dapil]);
        if($tahun == 'Tahun' || $tahun == 'Semua Tahun'){
            $rangeTahun = range(2020, date('Y'));
        }else{
            $rangeTahun = range($tahun, $tahun);
        }

        $datasets = [];
        foreach($rangeTahun as $rt){
            if($rt == 2020){      
                $color = '#4339F2';
            }elseif($rt == 2021){
                $color = '#34B53A';
            }else{
                $color = '#FFB200';
            }

            $getData = [];
            $total = [];
            $kabupaten = [];

            foreach($getKabupaten->result() as $k){
                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                    $this->db->where('bidang', $bidang);
                }

                if($type == 'DAK Fisik Reguler'){
                    $getData = $this->db->select('SUM(DAK_Fisik_Reguler) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'DAK Fisik Penugasan'){
                    $getData = $this->db->select('SUM(DAK_Fisik_Penugasan) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'DAK Fisik Afirmasi'){
                    $getData = $this->db->select('SUM(DAK_Fisik_Afirmasi) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'DAK Non Fisik'){
                    $getData = $this->db->select('SUM(DAK_Non_Fisik) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'DAU'){
                    $getData = $this->db->select('SUM(DAU) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'DID'){
                    $getData = $this->db->select('SUM(DID) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'Dana Desa'){
                    $getData = $this->db->select('SUM(Dana_Desa) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'DBH PBB'){
                    $getData = $this->db->select('SUM(DBH_PBB) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'DBH PPh'){
                    $getData = $this->db->select('SUM(DBH_PPh) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'DBH SDA Panas Bumi'){
                    $getData = $this->db->select('SUM(DBH_SDA_Panas_Bumi) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'DBH SDA Perikanan'){
                    $getData = $this->db->select('SUM(DBH_SDA_Perikanan) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'DBH SDA Kehutanan'){
                    $getData = $this->db->select('SUM(DBH_SDA_Kehutanan) as total')
                    ->from('data d')
                    ->where([
                        'd.provinsi_id' => $provinsiid, 
                        'd.tahun' => $rt,
                        'd.kabupaten_id' => $k->id
                    ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'DBH SDA Migas'){
                    $getData = $this->db->select('SUM(DBH_SDA_Migas) as total')
                    ->from('data d')
                    ->where([
                        'd.provinsi_id' => $provinsiid, 
                        'd.tahun' => $rt,
                        'd.kabupaten_id' => $k->id
                    ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'DBH SDA Minerba'){
                    $getData = $this->db->select('SUM(DBH_SDA_Minerba) as total')
                    ->from('data d')
                    ->where([
                        'd.provinsi_id' => $provinsiid, 
                        'd.tahun' => $rt,
                        'd.kabupaten_id' => $k->id
                    ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }elseif($type == 'DBH CHT'){
                    $getData = $this->db->select('SUM(DBH_CHT) as total')
                    ->from('data d')
                    ->where([
                        'd.provinsi_id' => $provinsiid, 
                        'd.tahun' => $rt,
                        'd.kabupaten_id' => $k->id
                    ])->get()->row();
                    array_push($total, $getData->total);
                    array_push($kabupaten, $k->kabupaten);
                }
            }

            $datasets[] = [
                'label' => $rt,
                'data' => $total,
                'backgroundColor' => $color,
                'barThickness' => 20
            ];
        }
        
        $result = [
            'labels' => $kabupaten,
            'datasets' => $datasets
        ];

        $this->output->set_content_type('application/json')->set_output(json_encode($result));
        // $this->output->enable_profiler(TRUE);
    }

    function ajaxLineChart(){
        $type = $this->input->get('type', TRUE);
        $bidang = $this->input->get('bidang', TRUE);
        $tahun = $this->input->get('tahun', TRUE);
        $provinsiid = $this->input->get('provinsiid', TRUE);
        $dapil = trim(preg_replace('/\s\s+/', ' ', $this->input->get('dapil', TRUE)));

        $getKabupaten = $this->db->select('id, kabupaten')->order_by('kabupaten', "ASC")->get_where('kabupaten', ['dapil' => $dapil]);
        $rangeTahun = range(date('Y', strtotime('-1 year')), date('Y'));

        $datasets = [];
        $total = [];

        if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
            $this->db->where('bidang', $bidang);
        }

        if($type == 'IPM'){
            $borderColor = '#34B53A';
            $backgroundColor = '#D6F0D8';

            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(IPM) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, $getData->total);
            }
        }elseif($type == 'AHH'){
            $borderColor = '#02A0FC';
            $backgroundColor = '#CCECFE';

            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(AHH_thn) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, $getData->total);
            }
        }elseif($type == 'HLS'){
            $borderColor = '#FFB200';
            $backgroundColor = '#FFF0CC';

            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(HLS_thn) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, $getData->total);
            }
        }elseif($type == 'RLS'){
            $borderColor = '#4339F2';
            $backgroundColor = '#D9D7FC';

            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(RLS_thn) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, $getData->total);
            }
        }elseif($type == 'Pengeluaran per Kapita'){
            $borderColor = '#FF3A29';
            $backgroundColor = '#FFD8D4';

            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(Pengeluaran_per_Kapita_Rp_000) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, $getData->total);
            }
        }

        $datasets[] = [
            'label' => $type,
            'data' => $total,
            'borderColor'=> $borderColor,
            'fill'=> 'start',
            'backgroundColor'=> $backgroundColor,
        ];
        
        $result = [
            'labels' => $rangeTahun,
            'datasets' => $datasets,
        ];

        $this->output->set_content_type('application/json')->set_output(json_encode($result));
        // $this->output->enable_profiler(TRUE);
    }
}