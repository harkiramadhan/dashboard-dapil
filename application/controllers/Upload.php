<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\IWriter;

class Upload extends CI_Controller{
    function __construct(){
        parent::__construct();

    }

    function index(){
        $this->load->view('upload_view');
        ?>
            <!-- <form action="<?= site_url('uploads/import') ?>" method="post" enctype='multipart/form-data'>
                <input type="file" name="file" id="">
                <button type="submit">Submit</button>
            </form> -->
        <?php
    }

    function profil(){
        $provid = $this->input->get('prov', TRUE);
        $var['provinsi'] = $this->db->get_where('provinsi', ['id' => $provid])->row();
        $var['dapil'] = $this->db->order_by('urut', "ASC")->get_where('dapil', ['provinsi_id' => $provid]);

        $this->load->view('profil_upload', $var);
    }

    function submit(){
        ini_set('memory_limit', '-1');
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'xlsx';
        $config['encrypt_name']     = TRUE;
        $config['overwrite']        = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload('file');
        $upload_data = $this->upload->data();
        $fileImport = $upload_data['file_name'];
        if(!$this->upload->do_upload('file')){
            $this->session->set_flashdata('error', "Silahkan Pilih File Terlebih Dahulu");
            // redirect($_SERVER['HTTP_REFERER']);
        }else{
            // $newFileNames = explode('.',$fileImport);
            // $fileImport = 'd161f5e8d7c9411ed9e255614eac53db.xlsx';
            $newFileNames = explode('.',$fileImport);
            $fileType = ucfirst($newFileNames[1]);
            $path = './uploads/';
            $inputFileType = $fileType;
            $inputFileName = $path.$fileImport;
            $reader = IOFactory::createReader($inputFileType);
            $reader->setReadDataOnly(true);
            $reader->setReadEmptyCells(false);
            $spreadsheet = $reader->load($inputFileName);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null,true,true,true);
            $sheet = $spreadsheet->getActiveSheet();

            /* Loop Kategori */
            $kategoriContent = [];
            foreach($sheetData[1] as $key => $val){
                if($val != 'Tahun' && $val != 'Daerah Pemilihan' && $val != 'Nama Daerah' && $val != 'Bidang'){
                    $cekKategori = $this->db->get_where('kategori', ['kategori' => $val]);
                    if($cekKategori->num_rows() > 0){
                        $dataKategori = [
                            'id' => $cekKategori->row()->id,
                            'column' => $key,
                            'kategori' => $cekKategori->row()->kategori
                        ];
                        array_push($kategoriContent, $dataKategori);
                    }
                }
            }

            /* Loop Data */
            for($row = 2; $row <= count($sheetData); $row++){
                $daerah = $this->db->select('k.*, p.kode_provinsi')
                                    ->from('kabupaten k')
                                    ->join('provinsi p', 'k.provinsi_id = p.id')
                                    ->where([
                                        'k.kabupaten' => $sheetData[$row]['C']
                                    ])->get();
                $cekBidang = $this->db->get_where('bidang', ['bidang' => $sheetData[$row]['D']])->row();

                /* Loop Kategori */
                $successData = [];
                $errorData = [];
                foreach($kategoriContent as $ktc){
                    $dataInsert = [
                        'provinsi_id' => @$cekDaerah->provinsi_id,
                        'kabupaten_id' => @$cekDaerah->id,
                        'kategori_id' => $ktc['id'],
                        'bidang_id' => $cekBidang->id,
                        'tahun' => $sheetData[$row]['A'],
                        'nilai' => ($sheetData[$row][$ktc['column']] != NULL) ? $sheetData[$row][$ktc['column']] : 0
                    ];

                    if($daerah->num_rows() > 0){
                        $cekDaerah = $daerah->row();
                        $nilaiKategori = $sheetData[$row][$ktc['column']];
                        $detailData[] = [
                            'tahun' => $sheetData[$row]['A'],
                            'Daerah Pemilihan' => $cekDaerah->dapil,
                            'Nama Daerah' => $cekDaerah->kabupaten,
                            'Bidang' => $cekBidang->bidang,
                            'Kategori' => $ktc['kategori'],
                            'Nilai' => $nilaiKategori
                        ];
    
                        $cekNilai = $this->db->get_where('nilai', [
                            'provinsi_id' => $cekDaerah->provinsi_id,
                            'kabupaten_id' => $cekDaerah->id,
                            'kategori_id' => $ktc['id'],
                            'bidang_id' => $cekBidang->id,
                            'tahun' => $sheetData[$row]['A'],
                        ]);
                        if($cekNilai->num_rows() > 0){
                            $this->db->where('id', $cekNilai->row()->id)->delete('nilai');
                        }
                        $this->db->insert('nilai', $dataInsert);
                        if($this->db->affected_rows() > 0){
                            $successData = $dataInsert;
                        }else{
                            $errorData = [
                                'Nama Daerah' => $sheetData[$row]['C'],
                                'Data' => $dataInsert
                            ];
                        }
                    }else{
                        $errorData = [
                            'Nama Daerah' => $sheetData[$row]['C'],
                            'Data' => $dataInsert
                        ];
                    }

                    $hasil[] = [
                        'success' => $successData,
                        'error' => $errorData
                    ];
                }

            }

            $this->output->set_content_type('application/json')->set_output(json_encode($hasil));
            
            
        }
    }

    function import(){
        ini_set('memory_limit', '-1');
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'xlsx';
        $config['overwrite']        = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload('file');
        $upload_data = $this->upload->data();
        $fileImport = $upload_data['file_name'];
        if(!$this->upload->do_upload('file')){
            echo 'File Belum Di Pilih';
            // $this->session->set_flashdata('error', "Silahkan Pilih File Terlebih Dahulu");
            // redirect($_SERVER['HTTP_REFERER']);
        }else{
            // $fileImport = 'Dashboard_Dapil-Aceh.xlsx';
            $newFileNames = explode('.',$fileImport);
            $fileType = ucfirst($newFileNames[1]);
            $path = './uploads/';
            $inputFileType = $fileType;
            $inputFileName = $path.$fileImport;
            $reader = IOFactory::createReader($inputFileType);
            $reader->setReadDataOnly(true);
            $reader->setReadEmptyCells(false);
            $spreadsheet = $reader->load($inputFileName);
            $sheetData = $spreadsheet->getSheet(1)->toArray(null,true,true,true);
            $sheet = $spreadsheet->getActiveSheet();
            
            $successData = [];
            $errorData = [];
            for($row = 2; $row <= count($sheetData); $row++){
                $cekDapil = $this->db->get_where('kabupaten', ['kabupaten' => $sheetData[$row]['C']]);
                $cekBidang = $this->db->get_where('bidang', ['bidang' => $sheetData[$row]['D']])->row();
                if($cekDapil->num_rows() > 0){
                    $dapil = $cekDapil->row();
                    $dataInsert = [
                        'provinsi_id' => $dapil->provinsi_id,
                        'kabupaten_id' => $dapil->id,
                        'bidang_id' => $cekBidang->id,
                        'Tahun' => $sheetData[$row]['A'],
                        'Daerah_Pemilihan' => $sheetData[$row]['B'],
                        'Nama_Daerah' => $sheetData[$row]['C'],
                        'Bidang' => $sheetData[$row]['D'],
                        'DAK_Fisik_Reguler' => $sheetData[$row]['E'],
                        'DAK_Fisik_Penugasan' => $sheetData[$row]['F'],
                        'DAK_Fisik_Afirmasi' => $sheetData[$row]['G'],
                        'DAK_Non_Fisik' => $sheetData[$row]['H'],
                        'DAU' => $sheetData[$row]['I'],
                        'DID' => $sheetData[$row]['J'],
                        'Dana_Desa' => $sheetData[$row]['K'],
                        'DBH_PPh' => $sheetData[$row]['L'],
                        'DBH_PBB' => $sheetData[$row]['M'],
                        'DBH_SDA_Migas' => $sheetData[$row]['N'],
                        'DBH_SDA_Minerba' => $sheetData[$row]['O'],
                        'DBH_SDA_Kehutanan' => $sheetData[$row]['P'],
                        'DBH_SDA_Perikanan' => $sheetData[$row]['Q'],
                        'DBH_SDA_Panas_Bumi' => $sheetData[$row]['R'],
                        'IPM' => $sheetData[$row]['S'],
                        'AHH_thn' => $sheetData[$row]['T'],
                        'HLS_thn' => $sheetData[$row]['U'],
                        'RLS_thn' => $sheetData[$row]['V'],
                        'Pengeluaran_per_Kapita_Rp_000' => $sheetData[$row]['W'],
                        'TPT' => $sheetData[$row]['X'],
                        'TPAK' => $sheetData[$row]['Y'],
                        'Jml_Pend_Miskin_ribu_jiwa' => $sheetData[$row]['Z'],
                        'Pend_Miskin' => $sheetData[$row]['AA'],
                        'APK_PAUD' => $sheetData[$row]['AB'],
                        'APK_SD' => $sheetData[$row]['AC'],
                        'APK_SMP' => $sheetData[$row]['AD'],
                        'APK_SMA' => $sheetData[$row]['AE'],
                        'DBH_CHT' => $sheetData[$row]['AF'],
                        'APM_SD' => $sheetData[$row]['AG'],
                        'APM_SMP' => $sheetData[$row]['AH'],
                        'APM_SMA' => $sheetData[$row]['AI'],
                    ];
                    $cekData = $this->db->get_where('data', [
                        'provinsi_id' => $dapil->provinsi_id,
                        'kabupaten_id' => $dapil->id,
                        'bidang_id' => $cekBidang->id,
                        'Tahun' => $sheetData[$row]['A']
                    ]);
                    if($cekData->num_rows() > 0){
                        $this->db->where('id', $cekData->row()->id)->delete('data');
                    }
                    $this->db->insert('data', $dataInsert);
                    if($this->db->affected_rows() > 0){
                        $successData[] = $dataInsert; 
                    }
                }else{
                    $errorData[] = [
                        'Tahun' => $sheetData[$row]['A'],
                        'Daerah_Pemilihan' => $sheetData[$row]['B'],
                        'Nama_Daerah' => $sheetData[$row]['C'],
                        'Bidang' => $sheetData[$row]['D'],
                        'DAK_Fisik_Reguler' => $sheetData[$row]['E'],
                        'DAK_Fisik_Penugasan' => $sheetData[$row]['F'],
                        'DAK_Fisik_Afirmasi' => $sheetData[$row]['G'],
                        'DAK_Non_Fisik' => $sheetData[$row]['H'],
                        'DAU' => $sheetData[$row]['I'],
                        'DID' => $sheetData[$row]['J'],
                        'Dana_Desa' => $sheetData[$row]['K'],
                        'DBH_PPh' => $sheetData[$row]['L'],
                        'DBH_PBB' => $sheetData[$row]['M'],
                        'DBH_SDA_Migas' => $sheetData[$row]['N'],
                        'DBH_SDA_Minerba' => $sheetData[$row]['O'],
                        'DBH_SDA_Kehutanan' => $sheetData[$row]['P'],
                        'DBH_SDA_Perikanan' => $sheetData[$row]['Q'],
                        'DBH_SDA_Panas_Bumi' => $sheetData[$row]['R'],
                        'IPM' => $sheetData[$row]['S'],
                        'AHH_thn' => $sheetData[$row]['T'],
                        'HLS_thn' => $sheetData[$row]['U'],
                        'RLS_thn' => $sheetData[$row]['V'],
                        'Pengeluaran_per_Kapita_Rp_000' => $sheetData[$row]['W'],
                        'TPT' => $sheetData[$row]['X'],
                        'TPAK' => $sheetData[$row]['Y'],
                        'Jml_Pend_Miskin_ribu_jiwa' => $sheetData[$row]['Z'],
                        'Pend_Miskin' => $sheetData[$row]['AA'],
                        'APK_PAUD' => $sheetData[$row]['AB'],
                        'APK_SD' => $sheetData[$row]['AC'],
                        'APK_SMP' => $sheetData[$row]['AD'],
                        'APK_SMA' => $sheetData[$row]['AE'],
                        'APM_SD' => $sheetData[$row]['AF'],
                        'APM_SMP' => $sheetData[$row]['AG'],
                        'APM_SMA' => $sheetData[$row]['AH'],
                        'DBH_CHT' => $sheetData[$row]['AI'],
                    ];
                }

                $res = [
                    'success' => $successData,
                    'error' => $errorData
                ];
            }
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($res));
        
    }

    function upload(){
        $dapil = str_replace('                                    ', '', $this->input->get('dapil', TRUE));
        $this->output->set_content_type('application/json')->set_output(json_encode($this->input->post()));
        
    }
}