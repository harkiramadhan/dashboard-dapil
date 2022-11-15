<?php
class Profil extends CI_Controller{
    function index(){
        $provid = $this->input->get('prov', TRUE);
        $var['provinsi'] = $this->db->get_where('provinsi', ['id' => $provid])->row();
        $var['dapil'] = $this->db->order_by('urut', "ASC")->get_where('dapil', ['provinsi_id' => $provid]);

        $this->load->view('profile', $var);
    }

    function foto(){
        $dapil = trim(preg_replace('/\s\s+/', ' ', $this->input->get('dapil', TRUE)));

        ?>
            <div class="w-layout-grid grid-4-content margin-24">
                <div id="w-node-d81d9352-9940-5d49-8014-4ba3bde4962a-95221726" class="profile-wrapper">
                    <div class="profile-image-wrapper"><img src="../images/AMINUROKHMAN-S.E.-M.M._A-376_F-Nasdem.webp" loading="lazy" alt="" class="profile-image"></div>
                    <div class="profile-content">
                    <div class="margin-8">
                        <h3 class="heading-xs">AMINUROKHMAN, S.E., M.M.</h3>
                    </div>
                    <div class="paragraph-small">F-Nasdem</div>
                    </div>
                </div>
            </div>
        <?php
        $this->output->set_content_type('application/json')->set_output(json_encode($dapil));
    }
}