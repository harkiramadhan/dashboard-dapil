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
        $anggota = $this->db->select('a.*, p.singkat fraksi')
                            ->from('anggota a')
                            ->join('parpol p', 'a.parpol_id = p.id')
                            ->where([
                                'LOWER(`dapil`)' => strtolower($dapil)
                            ])->get();
        ?>
            <div class="w-layout-grid grid-4-content margin-24">
                <?php foreach($anggota->result() as $row): ?>
                <div id="w-node-d81d9352-9940-5d49-8014-4ba3bde4962a-95221726" class="profile-wrapper">
                    <div class="profile-image-wrapper">
                        <img src="<?= base_url('uploads/profil/' . $row->img) ?>" loading="lazy" alt="" class="profile-image">
                    </div>
                    <div class="profile-content">
                        <div class="margin-8">
                            <h3 class="heading-xs"><?= $row->id." ".$row->nama ?></h3>
                        </div>
                        <div class="paragraph-small">F-<?= $row->fraksi ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php
    }
}