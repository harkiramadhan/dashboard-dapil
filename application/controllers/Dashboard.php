<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();

    }

    function index(){
        $provid = $this->input->get('prov', TRUE);
        $var['provinsi'] = $this->db->get_where('provinsi', ['id' => $provid])->row();
        $var['dapil'] = $this->db->order_by('urut', "ASC")->get_where('dapil', ['provinsi_id' => $provid]);
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

        if($getKabupaten->num_rows() >= 10){
            $height = 800;
        }elseif($getKabupaten->num_rows() >= 8){
            $height = 400;
        }else{
            $height = 240;
        }

        
        $result = [
            'labels' => $kabupaten,
            'datasets' => $datasets,
            'aspectRatio' => ($getKabupaten->num_rows() > 8) ? 1 : 'false',
            'height' => $height
        ];

        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    function ajaxLineChart(){
        $type = $this->input->get('type', TRUE);
        $bidang = $this->input->get('bidang', TRUE);
        $tahun = $this->input->get('tahun', TRUE);
        $provinsiid = $this->input->get('provinsiid', TRUE);
        $dapil = trim(preg_replace('/\s\s+/', ' ', $this->input->get('dapil', TRUE)));

        $getKabupaten = $this->db->select('id, kabupaten')->order_by('kabupaten', "ASC")->get_where('kabupaten', ['dapil' => $dapil]);
        $rangeTahun = range(date('Y', strtotime('-2 year')), date('Y', strtotime('-1 year')));

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
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
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
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
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
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
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
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
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
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
            }
        }elseif($type == 'Rata Rata % Pend Miskin'){
            $borderColor = '#FFB200';
            $backgroundColor = '#FFF0CC';

            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(Pend_Miskin) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
            }
        }elseif($type == 'Rata Rata Juml Pend Miskin'){
            $borderColor = '#4339F2';
            $backgroundColor = '#D9D7FC';
            
            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(Jml_Pend_Miskin_ribu_jiwa) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
            }
        }elseif($type == 'APK PAUD'){
            $borderColor = '#FF3A29';
            $backgroundColor = '#FFD8D4';

            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(APK_PAUD) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
            }
        }elseif($type == 'APK SD'){
            $borderColor = '#34B53A';
            $backgroundColor = '#D6F0D8';

            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(APK_SD) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
            }
        }elseif($type == 'APK SMP'){
            $borderColor = '#02A0FC';
            $backgroundColor = '#CCECFE';

            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(APK_SMP) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
            }
        }elseif($type == 'APK SM'){
            $borderColor = '#4339F2';
            $backgroundColor = '#D9D7FC';

            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(APK_SMA) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
            }
        }elseif($type == 'APM SD'){
            $borderColor = '#34B53A';
            $backgroundColor = '#D6F0D8';

            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(APM_SD) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
            }
        }elseif($type == 'APM SMP'){
            $borderColor = '#02A0FC';
            $backgroundColor = '#CCECFE';

            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(APM_SMP) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
            }
        }elseif($type == 'APM SM'){
            $borderColor = '#4339F2';
            $backgroundColor = '#D9D7FC';

            foreach($rangeTahun as $rt){
                $getData = $this->db->select('SUM(APM_SMA) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rt,
                                        'k.dapil' => $dapil
                                    ])->get()->row();
                array_push($total, ($getData->total/$getKabupaten->num_rows()));
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

    function ajaxBarChartBolder(){
        $type = $this->input->get('type', TRUE);
        $bidang = $this->input->get('bidang', TRUE);
        $tahun = $this->input->get('tahun', TRUE);
        $provinsiid = $this->input->get('provinsiid', TRUE);
        $dapil = trim(preg_replace('/\s\s+/', ' ', $this->input->get('dapil', TRUE)));

        $getKabupaten = $this->db->select('id, kabupaten')->order_by('kabupaten', "ASC")->get_where('kabupaten', ['dapil' => $dapil]);
        $rangeTahun = range(2020, 2021);

        $datasets = [];
        foreach($rangeTahun as $rt){
            if($rt == 2020){      
                $color = '#5570F1';
            }elseif($rt == 2021){
                $color = '#FFB200';
            }else{
                $color = '#FFCC91';
            }

            $getData = [];
            $total = [];
            $kabupaten = [];

            foreach($getKabupaten->result() as $k){
                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                    $this->db->where('bidang', $bidang);
                }

                if($type == 'IPM per Kabupaten/Kota'){
                    $getData = $this->db->select('SUM(IPM) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                }elseif($type == 'TPAK'){
                    $getData = $this->db->select('SUM(TPAK) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                }elseif($type == 'TPT'){
                    $getData = $this->db->select('SUM(TPT) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                }elseif($type == 'Jml Pend Miskin'){
                    $getData = $this->db->select('SUM(Jml_Pend_Miskin_ribu_jiwa) as total')
                                        ->from('data d')
                                        ->where([
                                            'd.provinsi_id' => $provinsiid, 
                                            'd.tahun' => $rt,
                                            'd.kabupaten_id' => $k->id
                                        ])->get()->row();
                    array_push($total, $getData->total);
                }

                array_push($kabupaten, $k->kabupaten);
            }

            $datasets[] = [
                'categoryPercentage' => '0.3', // notice here 
                'barPercentage' => '0.7',  // notice here
                'label'=> $rt,
                'data'=> $total,
                'borderColor'=> $color,
                'backgroundColor'=> $color,
                'width'=> 16,
                'borderWidth'=> 0,
                'borderRadius'=> 1.7976931348623157e+308,
                'borderSkipped'=> false,
            ];
        }
        
        $result = [
            'labels' => $kabupaten,
            'datasets' => $datasets
        ];

        $this->output->set_content_type('application/json')->set_output(json_encode($result));
        // $this->output->enable_profiler(TRUE);
        
    }
    
    function tbl(){
        $provinsiid = $this->input->get('provinsiid', TRUE);
        $dapil = trim(preg_replace('/\s\s+/', ' ', $this->input->get('dapil', TRUE)));
        $getKabupaten = $this->db->select('id, kabupaten')->order_by('kabupaten', "ASC")->get_where('kabupaten', ['dapil' => $dapil]);
        $rangeTahun = range(2020, date('Y'));
        $bidang = $this->input->get('bidang', TRUE);

        ?>
            <table id="table_dapil" class="display nowrap cell-border stripe" style="color: black!important margin-top: 10px">
                <thead class="tableheader">
                    <tr class="tablerow-noline">
                        <th class="tablehead" rowspan="2" style="background-color: white; padding: 15px!important"></th>
                        <?php foreach($rangeTahun as $rt){ 
                            if($rt == 2020){      
                                $backgroundColor = '#5570F1';
                            }elseif($rt == 2021){
                                $backgroundColor = '#5FAE65';
                            }else{
                                $backgroundColor = '#FFA640';
                            }    
                        ?>
                            <th class="tablehead" style="background-color: <?= $backgroundColor ?>; color: white; padding: 15px!important" colspan="<?= $getKabupaten->num_rows() ?>" align="center"><?= $rt ?></th>
                        <?php } ?>
                    </tr>
                    <tr class="tablerow-noline">
                        <?php 
                            foreach($rangeTahun as $rts){ 
                                if($rts == 2020){      
                                    $backgroundColor = '#5570F1';
                                }elseif($rts == 2021){
                                    $backgroundColor = '#5FAE65';
                                }else{
                                    $backgroundColor = '#FFA640';
                                }  
                                foreach($getKabupaten->result() as $kbr){ 
                        ?>
                            <th align="center" style="background-color: <?= $backgroundColor ?>; color: white; padding: 15px!important"><?= $kbr->kabupaten ?></th>
                        <?php }} ?>
                    </tr>
                </thead>
                <tbody class="tablebody">
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DBH PPh</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DBH_PPh) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DBH PBB</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DBH_PBB) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DBH CHT</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DBH_CHT) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DBH SDA Migas</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DBH_SDA_Migas) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DBH SDA Minerba</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DBH_SDA_Minerba) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DBH SDA Kehutanan</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DBH_SDA_Kehutanan) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DBH SDA Perikanan</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DBH_SDA_Perikanan) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DBH SDA Panas Bumi</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DBH_SDA_Panas_Bumi) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DAU</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DAU) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DAK Fisik Reguler</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DAK_Fisik_Reguler) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DAK Fisik Penugasan</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DAK_Fisik_Penugasan) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DAK Fisik Afirmasi</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DAK_Fisik_Afirmasi) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DAK Non Fisik</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DAK_Non_Fisik) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">DID</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(DID) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                <tr class="tablerow-noline">
                    <th id="dataname" class="tabledataleft" style="background-color: white; padding: 15px!important">Dana Desa</th>
                    <?php 
                        foreach($rangeTahun as $rts){ 
                            if($rts == 2020){      
                                $backgroundColor = '#DBDEEE';
                            }elseif($rts == 2021){
                                $backgroundColor = '#E5F0E6';
                            }else{
                                $backgroundColor = '#FFF2E2';
                            }  
                            foreach($getKabupaten->result() as $kbr){ 
                                if($bidang != 'Bidang' && $bidang != 'Semua Bidang'){
                                    $this->db->where('bidang', $bidang);
                                }
                                $cekData = $this->db->select('SUM(Dana_Desa) as total')
                                    ->from('data d')
                                    ->join('kabupaten k', 'd.kabupaten_id = k.id')
                                    ->where([
                                        'd.provinsi_id' => $provinsiid, 
                                        'd.tahun' => $rts,
                                        'd.kabupaten_id' => $kbr->id
                                    ])->get()->row();
                    ?>
                        <th align="right" style="background-color: <?= $backgroundColor ?>;"><?= rupiah($cekData->total) ?></th>
                    <?php }} ?>
                </tr>
                </tbody>
            </table>

            <script>
                $('#table_dapil').dataTable({
                    aaSorting: [],
                    lengthChange: false,
                    bPaginate: false,
                    <?php if($getKabupaten->num_rows() > 2): ?>
                    scrollX: true,
                    fixedColumns:   {
                        left: 1
                    },
                    <?php endif; ?>
                    
                })

                const export_button = document.getElementById('downloadPdf2');
                    export_button.addEventListener('click', () =>  {
                    html_table_to_excel('xlsx');
                });

                function html_table_to_excel(type){
                    var dapil = '<?= $dapil ?>'
                    var data = document.getElementById('table_dapil');
                    var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});
                    XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });
                    XLSX.writeFile(file, 'Transfer Ke Daerah dan Dana Desa Daerah Pemilihan - ' + dapil + ' .xlsx');
                }
            </script>
        <?php
    }
}