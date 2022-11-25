<?php
class Profil extends CI_Controller{
    function index(){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT, GET, POST");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

        $provid = $this->input->get('prov', TRUE);
        $var['provinsi'] = $this->db->get_where('provinsi', ['id' => $provid])->row();
        $var['dapil'] = $this->db->order_by('urut', "ASC")->get_where('dapil', ['provinsi_id' => $provid]);

        $this->load->view('profile', $var);
    }

    function foto(){
        $dpl = trim(preg_replace('/\s\s+/', ' ', $this->input->get('dapil', TRUE)));
        $dapil = $this->db->get_where('dapil', ['dapil' => $dpl])->row()->long;
		ini_set('user_agent', 'Dashboard-PKA');
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://www.dpr.go.id/json/?method=getSemuaAnggota',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_USERAGENT => 'Dashboard-PKA'
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		
        /* 
            no_anggota
            id
            nama
            fraksi
            dapil
            alamat
            foto  => https://www.dpr.go.id/doksigota/photo/1320.jpg
        */
        ?><div class="w-layout-grid grid-4-content margin-24"><?php
            foreach($data as $row){
                if($row['dapil'] == $dapil){
                    $path = "https://www.dpr.go.id/" . $row['foto'];
                    $mimer = new \Mimey\MimeTypes();
                    $mimetype = $mimer->getMimeType(pathinfo($path,PATHINFO_EXTENSION));

                    $source = file_get_contents($path);
                    $base64 = base64_encode($source);
                    $blob = 'data:'.$mimetype.';base64,'.$base64;
                    ?>
                        <div id="w-node-d81d9352-9940-5d49-8014-4ba3bde4962a-95221726" class="profile-wrapper">
                            <div class="profile-image-wrapper">
                                <img src="<?= $blob ?>" loading="lazy" alt="" class="profile-image">
                            </div>
                            <div class="profile-content">
                                <div class="margin-8">
                                    <h3 class="heading-xs"><?= "A.".$row["no_anggota"]." - ".$row['nama'] ?></h3>
                                </div>
                                <div class="paragraph-small">F-<?= $row['fraksi'] ?></div>
                            </div>
                        </div>
                    <?php
                }
            }
        ?></div><?php
    }
}