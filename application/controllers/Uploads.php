<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\IWriter;

class Uploads extends CI_Controller{
    function __construct(){
        parent::__construct();

    }

    function index(){
        ?>
            <form action="<?= site_url('uploads/submit') ?>" method="post" enctype='multipart/form-data'>
                <input type="file" name="file" id="">
                <button type="submit">Submit</button>
            </form>
        <?php
    }

    function submit(){
        // $config['upload_path']      = './uploads/';
        // $config['allowed_types']    = 'xlsx';
        // $config['encrypt_name']     = TRUE;
        // $config['overwrite']        = TRUE;

        // $this->load->library('upload', $config);
        // $this->upload->do_upload('file');
        // $upload_data = $this->upload->data();
        // $fileImport = $upload_data['file_name'];
        // if(!$this->upload->do_upload('file')){
        //     $this->session->set_flashdata('error', "Silahkan Pilih File Terlebih Dahulu");
        //     redirect($_SERVER['HTTP_REFERER']);
        // }else{
            // $newFileNames = explode('.',$fileImport);
            $fileImport = 'd161f5e8d7c9411ed9e255614eac53db.xlsx';
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
                $cekDaerah = $this->db->select('k.*, p.kode_provinsi')
                                    ->from('kabupaten k')
                                    ->join('provinsi p', 'k.provinsi_id = p.id')
                                    ->where([
                                        'k.kabupaten' => $sheetData[$row]['C']
                                    ])->get()->row();
                $cekBidang = $this->db->get_where('bidang', ['bidang' => $sheetData[$row]['D']])->row();

                /* Loop Kategori */
                foreach($kategoriContent as $ktc){
                    $nilaiKategori = $sheetData[$row][$ktc['column']];
                    $detailData[] = [
                        'tahun' => $sheetData[$row]['A'],
                        'Daerah Pemilihan' => $cekDaerah->kode_provinsi." ".$cekDaerah->kode_kabupaten,
                        'Nama Daerah' => $cekDaerah->kabupaten,
                        'Bidang' => $cekBidang->bidang,
                        'Kategori' => $ktc['kategori'],
                        'Nilai' => $nilaiKategori
                    ];

                    $dataInsert = [
                        'provinsi_id' => $cekDaerah->provinsi_id,
                        'kabupaten_id' => $cekDaerah->id,
                        'kategori_id' => $ktc['id'],
                        'bidang_id' => $cekBidang->id,
                        'tahun' => $sheetData[$row]['A'],
                        'nilai' => ($sheetData[$row][$ktc['column']] != NULL) ? $sheetData[$row][$ktc['column']] : 0
                    ];
                    $cekNilai = $this->db->get_where('nilai', [
                        'provinsi_id' => $cekDaerah->provinsi_id,
                        'kabupaten_id' => $cekDaerah->id,
                        'kategori_id' => $ktc['id'],
                        'bidang_id' => $cekBidang->id,
                        'tahun' => $sheetData[$row]['A'],
                    ]);
                    if($cekNilai->num_rows() > 0){
                        $this->db->where('id', $cekNilai->row()->id)->update('nilai', $dataInsert);
                    }else{
                        $this->db->insert('nilai', $dataInsert);
                    }

                    $hasil[] = $dataInsert;
                }

            }

            $this->output->set_content_type('application/json')->set_output(json_encode($hasil));
            
            
        // }
    }
}