<!DOCTYPE html><!--  Last Published: Mon Oct 10 2022 13:38:14 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="633dbb106f6af822ec0da9ff" data-wf-site="633b251b96dff4c8a7043d93">
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <meta content="Dashboard" property="og:title">
  <meta content="Dashboard" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="<?= base_url('assets/css/normalize.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/css/components.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/css/clients-dashboard-pka.css') ?>" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Poppins:regular,500,700"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="<?= base_url('assets/images/favicon.ico') ?>" rel="shortcut icon" type="image/x-icon">
  <link href="<?= base_url('assets/images/webclip.png') ?>" rel="apple-touch-icon">
  <!-- Tooltip Styling -->
  <link rel="stylesheet" href="https://unpkg.com/tippy.js@4/themes/light-border.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
  <div class="page-wrapper">
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="side-navigation w-nav">
      <div class="navside-container">
        <a href="#" class="nav-brand w-nav-brand"><img src="<?= base_url('assets/images/logo-setjen-reduced.png') ?>" loading="lazy" srcset="<?= base_url('assets/images/logo-setjen-reduced-p-500.png') ?> 500w, images/logo-setjen-reduced.png 942w" sizes="64px" alt=""></a>
        <nav role="navigation" class="sidenav-menu w-nav-menu">
          <div class="sidenav-menu-flex">
            <a href="<?= site_url('') ?>" class="sidenav-link hide-tablet w-inline-block">
              <div class="icon-text"><img src="<?= base_url('assets/images/fi_chevron-left.svg') ?>" loading="lazy" alt="">
                <div>Halaman Utama</div>
              </div>
            </a>
            <a href="#" aria-current="page" class="sidenav-link w-inline-block w--current">
              <div class="icon-text"><img src="<?= base_url('assets/images/Category-customized.svg') ?>" loading="lazy" alt="">
                <div>Dashboard</div>
              </div>
            </a>
            <a href="#" class="sidenav-link w-inline-block">
              <div class="icon-text"><img src="<?= base_url('assets/images/2-User.svg') ?>" loading="lazy" alt="">
                <div>Profil Anggota</div>
              </div>
            </a>
          </div>
        </nav>
        <div class="menu-button w-nav-button">
          <div class="w-icon-nav-menu"></div>
        </div>
      </div>
    </div>
    <div class="page-content">
      <div class="page-content-header wf-section">
        <div class="header-container">
          <div class="heading-s regular">Dashboard <?= str_replace('Prov. ', '', $provinsi->provinsi) ?></div>
        </div>
        <div class="container">
          <div class="breadcrumbs-wrapper">
            <a href="<?= site_url() ?>" class="breadcrumbs-home w-inline-block"><img src="<?= base_url('assets/images/Home-filled-primary.svg') ?>" loading="lazy" alt=""></a>
            <div>/</div>
            <a href="#" class="breadcrumb-link"><?= str_replace('Prov. ', '', $provinsi->provinsi) ?></a>
          </div>
        </div>
      </div>
      <section class="section no-padding wf-section">
        <div class="container">
          <div class="white-wrapper">
            <div class="section-heading-centered">
              <h1 class="heading-m regular">Daerah Pemilihan <?= str_replace('Prov. ', '', $provinsi->provinsi) ?></h1>
              <div class="pill-wrapper">
                <?php $no= 1; foreach($dapil->result() as $row): ?>
                  <a href="#" class="pill w-inline-block filter-dapil <?= ($no==1) ? 'opened' : '' ?>" data-id="<?= $row->id ?>">
                    <div><?= $row->dapil ?></div>
                  </a>
                <?php $no++; endforeach; ?>
              </div>
            </div>
          </div>
          <div class="content-wrapper">
            <div class="margin-24">
              <div data-hover="false" data-delay="0" class="dropdown first w-dropdown">
                <div class="dropdown-toggle w-dropdown-toggle">
                  <div class="dropdown-icon w-icon-dropdown-toggle"></div>
                  <div class="paragraph" id="bidang">Bidang</div>
                </div>
                <nav class="home-dropdown-lists w-dropdown-list">
                  <input type="search" class="home-dropdown-search w-input" maxlength="256" name="query" placeholder="Search…" id="myInput" required="">
                  <a href="#" class="dropdown-item w-dropdown-link data-bidang">Semua Bidang</a>
                  <?php foreach($bidang->result() as $bdr){ ?>
                    <a href="#" class="dropdown-item w-dropdown-link data-bidang"><?= $bdr->bidang ?></a>
                  <?php } ?>
                </nav>
              </div>
              <div data-hover="false" data-delay="0" class="dropdown w-dropdown">
                <div class="dropdown-toggle w-dropdown-toggle">
                  <div class="dropdown-icon w-icon-dropdown-toggle"></div>
                  <div class="paragraph" id="tahun">Tahun</div>
                </div>
                <nav class="dropdown-list auto w-dropdown-list">
                  <a href="#" class="dropdown-item w-dropdown-link data-tahun">Semua Tahun</a>
                  <a href="#" class="dropdown-item w-dropdown-link data-tahun">2020</a>
                  <a href="#" class="dropdown-item w-dropdown-link data-tahun">2021</a>
                  <a href="#" class="dropdown-item w-dropdown-link data-tahun">2022</a>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <input type="hidden" id="provinsiid" value="<?= $this->input->get('prov', TRUE) ?>">
      <section class="section no-padding wf-section">
        <div class="container">
          <div class="content-wrapper">
            <div class="content-heading-wrapper">
              <h2 class="heading-s medium">Rincian DAK, DAU, DID dan Dana Desa Daerah Pemilihan</h2>
            </div>
            <div class="w-layout-grid grid-2-content">
              <div id="w-node-d81d9352-9940-5d49-8014-4ba3bde4962a-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content="Dana Alokasi Khusus Fisik Reguler" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DAK Fisik Reguler</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="div-DAK_Fisik_Reguler-chart">
                  <canvas id="DAK_Fisik_Reguler-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-f8ad2aae-4107-6c8e-04f1-3519ba3396c1-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content="Dana Alokasi Khusus Fisik Penugasan" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DAK Fisik Penugasan</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="div-DAK_Fisik_Penugasan-chart">
                  <canvas id="DAK_Fisik_Penugasan-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-_30d3b11e-f6e7-561e-1903-1b053dc12f5d-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content="Dana Alokasi Khusus Fisik Afirmasi" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DAK Fisik Afirmasi</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="div-DAK_Fisik_Afirmasi-chart">
                  <canvas id="DAK_Fisik_Afirmasi-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-a671b37f-c7dc-ad68-c70f-9a627aedc524-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content="Dana Alokasi Khusus Non Fisik" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DAK Non Fisik</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="div-DAK_Non_Fisik-chart">
                  <canvas id="DAK_Non_Fisik-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-_85c7003f-a803-1f71-9bd8-3a609ec320ac-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content=" Dana Alokasi Umum" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DAU</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="div-DAU-chart">
                  <canvas id="DAU-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-c1c4d836-3222-3dd2-5987-d3173d6186e1-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content=" Dana Insentif Daerah" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DID</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="div-DID-chart">
                  <canvas id="DID-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-_62128a06-0ea3-dcdb-1c01-98edf600c336-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <h3 class="heading-xs medium">Dana Desa</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="div-Dana_Desa-chart">
                  <canvas id="Dana_Desa-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-_11c1a606-658b-0b80-7579-aa988c389ec4-ec0da9ff" class="bar-content note">
                <div class="graph-title">
                  <h3 class="heading-xs medium">Transfer ke Daerah dan Dana Desa</h3>
                  <div class="note-text w-richtext">
                    <p>Transfer ke Daerah merupakan bagian dari Belanja Negara dalam rangka mendanai pelaksanaan desentralisasi fiskal berupa Dana Perimbangan, Dana Insentif Daerah (DID), dan dana lainnya. Dana Transfer ke Daerah dialokasikan untuk mengurangi ketimpangan sumber pendanaan antara pusat dan daerah, mengurangi kesenjangan pendanaan urusan pemerintahan antar daerah, mengurangi kesenjangan layanan publik antar daerah.</p>
                    <p>Transfer Dana Perimbangan meliputi</p>
                    <ol role="list">
                      <li>Transfer Dana Bagi Hasil Pajak, baik Pajak Penghasilan (PPh) &amp; Pajak Bumi maupun Bangunan (PBB);</li>
                      <li>Transfer Dana Bagi Hasil Sumber Daya Alam (SDA);</li>
                      <li>Transfer Dana Alokasi Umum (DAU);</li>
                      <li>Transfer Dana Alokasi Khusus (DAK).</li>
                    </ol>
                    <p>Transfer ke Daerah ditetapkan dalam APBN, Peraturan Presiden, dan Peraturan Menteri Keuangan (PMK) yang selanjutnya dituangkan dalam Daftar Isian Pelaksanaan Anggaran (DIPA) yang ditandatangani oleh Direktur Jenderal Perimbangan Keuangan selaku Kuasa Pengguna Anggaran atas nama Menteri Keuangan selaku Pengguna Anggaran untuk tiap jenis Transfer ke Daerah dengan dilampiri rincian alokasi per daerah.</p>
                    <p>Dana Desa didefinisikan sebagai dana yang bersumber dari APBN yang diperuntukkan bagi desa yang ditransfer melalui APBD kabupaten/kota dan digunakan unuk membiayai penyelenggaraan pemerintahan, pelaksanaan pembangunan, pembinaan, kemasyarakatan dan pemberdayaan masyarakat. Dana ini dialokasikan secara berkeadilan berdasarkan: alokasi dasar, dan alokasi yang dihitung dengan memperhatikan jumlah penduduk, angka kemiskinan, luas wilayah, dan tingkat kesulitan geografis desa setiap kabupaten/kota.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section no-padding wf-section">
        <div class="container">
          <div class="content-wrapper">
            <div class="content-heading-wrapper">
              <h2 class="heading-s medium">Rincian Transfer ke Daerah - DBH Daerah Pemilihan</h2>
            </div>
            <div class="w-layout-grid grid-2-content">
              <div id="w-node-ec2c38c2-0b6b-a007-1110-381693661878-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content=" Dana Bagi Hasil Pajak Bumi dan Bangunan" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DBH PBB</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="div-DBH_PBB-chart">
                  <canvas id="DBH_PBB-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-ec2c38c2-0b6b-a007-1110-38169366187a-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content=" Dana Bagi Hasil Pajak Penghasilan" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DBH PPh</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="id-DBH_PPh-chart">
                  <canvas id="DBH_PPh-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-ec2c38c2-0b6b-a007-1110-38169366187c-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content=" Dana Bagi Hasil Sumber Daya Alam Panas Bumi" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DBH SDA Panas Bumi</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="id-DBH_SDA_Panas_Bumi-chart">
                  <canvas id="DBH_SDA_Panas_Bumi-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-ec2c38c2-0b6b-a007-1110-38169366187e-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content=" Dana Bagi Hasil Sumber Daya Alam Perikanan" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DBH SDA Perikanan</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="div-DBH_SDA_Perikanan-chart">
                  <canvas id="DBH_SDA_Perikanan-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-ec2c38c2-0b6b-a007-1110-381693661880-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content=" Dana Bagi Hasil Sumber Daya Alam Kehutanan" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DBH SDA Kehutanan</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="div-DBH_SDA_Kehutanan-chart">
                  <canvas id="DBH_SDA_Kehutanan-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-ec2c38c2-0b6b-a007-1110-381693661882-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content=" Dana Bagi Hasil Sumber Daya Alam Minyak dan Gas Bumi" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DBH SDA Migas</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="div-DBH_SDA_Migas-chart">
                  <canvas id="DBH_SDA_Migas-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-ec2c38c2-0b6b-a007-1110-381693661884-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content=" Dana Bagi Hasil Sumber Daya Alam Mineral dan Batubara" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DBH SDA Minerba</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="div-DBH_SDA_Minerba-chart">
                  <canvas id="DBH_SDA_Minerba-chart" style="width: 100%;"></canvas>
                </div>
              </div>
              <div id="w-node-ec2c38c2-0b6b-a007-1110-381693661886-ec0da9ff" class="bar-content">
                <div class="graph-title">
                  <div data-tippy-content=" Dana Bagi Hasil Cukai Hasil Tembakau" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                  <h3 class="heading-xs medium">DBH CHT</h3>
                  <div class="paragraph-small">(dalam Rp 000)</div>
                </div>
                <div class="w-embed w-script" id="div-DBH_CHT-chart">
                  <canvas id="DBH_CHT-chart" style="width: 100%;"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section no-padding wf-section">
        <div class="container">
          <div class="content-wrapper">
            <div class="content-heading-wrapper">
              <h2 class="heading-s medium">Indikator Kinerja Daerah Pemilihan</h2>
            </div>
            <div class="grid-padded">
              <div class="w-layout-grid grid-3-content">
                <div id="w-node-ecdd8c13-28ad-bb49-c00c-c6898fa313e4-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <div data-tippy-content="Indeks Pembangunan Manusia" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                    <h3 class="heading-xs medium">IPM</h3>
                    <div class="paragraph-small">dalam (%)</div>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="IPM-chart" style="width: 100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata  Indeks Pembangunan Manusia (IPM) daerah pemilihan (Dapil), dihitung dari  jumlah IPM daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
                <div id="w-node-_22d40952-1588-ce49-d597-342f996fcc20-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <div data-tippy-content="Angka Harapan Hidup" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                    <h3 class="heading-xs medium">AHH</h3>
                    <div class="paragraph-small">(tahun)</div>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="AHH-chart" style="width: 100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata  Angka Harapan Hidup (AHH) daerah pemilihan (Dapil), dihitung dari jumlah AHH  daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
                <div id="w-node-ea25fa97-d09c-13c6-5ffe-6bc8a7131284-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <div data-tippy-content="Harapan Lama Sekolah" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                    <h3 class="heading-xs medium">HLS</h3>
                    <div class="paragraph-small">(tahun)</div>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="HLS-chart" style="width: 100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata angka Harapan Lama Sekolah (HLS) daerah pemilihan (Dapil), dihitung dari jumlah HLS daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
                <div id="w-node-_2d4a4fd2-34fe-646e-b048-1df27e513dcf-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <div data-tippy-content="Rata-rata Lama Sekolah" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                    <h3 class="heading-xs medium">RLS</h3>
                    <div class="paragraph-small">(tahun)</div>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="RLS-chart" style="width: 100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata angka Rerata Lama Sekolah (RLS) daerah pemilihan (Dapil), dihitung dari jumlah RLS daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
                <div id="w-node-ca91e47f-9597-b78e-58cd-3ea6bc01f216-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <h3 class="heading-xs medium">Pengeluaran per Kapita</h3>
                    <div class="paragraph-small">(Rp 000)</div>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="Pengeluaran_per_Kapita-chart" style="max-height:320px; width:100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata angka Pengeluaran Per Kapita daerah pemilihan (Dapil), dihitung dari jumlah Pengeluaran Per Kapita daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
                <div id="w-node-ecc24572-4f9f-65ce-5185-947ceb5056fc-ec0da9ff" class="bar-content linebar">
                  <div class="graph-title">
                    <div data-tippy-content="Indeks Pembangunan Manusia per Kabupaten/Kota" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                    <h3 class="heading-xs medium">IPM per Kabupaten/Kota</h3>
                    <div class="paragraph-small">(dalam %)</div>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="IPM_per_Kabupaten_Kota-chart" style="max-height: 480px; width: 100%;"></canvas>
                  </div>
                </div>
                <div id="w-node-_9637b692-add7-36b6-6471-4fc643c37f84-ec0da9ff" class="w-layout-grid grid-2-content">
                  <div id="w-node-_649917c6-271f-0439-6e14-b2bb129f4c94-ec0da9ff" class="bar-content linebar">
                    <div class="graph-title">
                      <h3 class="heading-xxs medium">Tingkat Partisipasi Angkatan Kerja per Kab/Kota</h3>
                      <div class="paragraph-small">(dalam %)</div>
                    </div>
                    <div class="w-embed w-script">
                      <canvas id="TPAK-chart" style="height: 320px; width: 100%;"></canvas>
                    </div>
                  </div>
                  <div id="w-node-cb3dd79d-c318-1729-812b-c67266ce91d3-ec0da9ff" class="bar-content linebar">
                    <div class="graph-title">
                      <h3 class="heading-xxs medium">Tingkat Pengangguran per Kab/Kota</h3>
                      <div class="paragraph-small">(dalam %)</div>
                    </div>
                    <div class="w-embed w-script">
                      <canvas id="TPT-chart" style="height: 320px; width: 100%;"></canvas>
                    </div>
                  </div>
                </div>
                <div id="w-node-_501dec09-3980-8afe-7618-cd297dbb041e-ec0da9ff" class="bar-content linebar">
                  <div class="graph-title">
                    <h3 class="heading-xxs medium">Jumlah Penduduk Miskin per Kab/Kota</h3>
                    <div class="paragraph-small">(ribu jiwa)</div>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="Jml_Pend_Miskin-chart" style="max-height:300px;width: 100%;"></canvas>
                  </div>
                </div>
                <div id="w-node-c447a6c9-4533-0509-8e2b-5dbcab5927c8-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <h3 class="heading-xxs medium">Rata-rata Jumlah Penduduk Miskin </h3>
                    <div class="paragraph-small">(ribu jiwa)</div>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="Rata_Rata_Pend_Miskin-chart" style="max-height:300px; width: 100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata angka Rerata Jumlah Penduduk Miskin daerah pemilihan (Dapil), dihitung dari Jumlah Penduduk Miskin daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
                <div id="w-node-_375240f1-9e01-5fc7-c7e4-2bf953260e5e-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <h3 class="heading-xxs medium">Rata-rata % Penduduk Miskin</h3>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="Pend_Miskin-chart" style="max-height: 320px; width: 100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata angka Persentase Jumlah Penduduk Miskin daerah pemilihan (Dapil), dihitung dari Jumlah Penduduk Miskin daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
                <div id="w-node-_1f52cd19-39e5-4bc4-5a26-7505501d0873-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <div data-tippy-content="Angka Partisipasi Kasar PAUD" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                    <h3 class="heading-xxs medium">APK PAUD</h3>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="APK_PAUD-chart" style="width: 100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata Angka Partisipasi Kasar (APK) Pendidikan Anak Usia Dini (PAUD) daerah pemilihan (Dapil), dihitung dari jumlah APK PAUD daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
                <div id="w-node-_3b5d8742-3d44-2d1e-07b5-cdfe9cb6614d-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <div data-tippy-content="Angka Partisipasi Kasar Sekolah Dasar" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                    <h3 class="heading-xxs medium">APK SD</h3>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="APK_SD-chart" style="width: 100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata Angka Partisipasi Kasar (APK) Sekolah Dasar (SD) daerah pemilihan (Dapil), dihitung dari jumlah APK SD daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
                <div id="w-node-b083bf0f-b0b8-35e9-b451-bfcd61b21d2d-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <div data-tippy-content="Angka Partisipasi Kasar Sekolah Menengah Pertama" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                    <h3 class="heading-xxs medium">APK SMP</h3>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="APK_SMP-chart" style="width: 100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata Angka Partisipasi Kasar (APK) Sekolah Menengah Pertama (SMP) daerah pemilihan (Dapil), dihitung dari jumlah APK SMP daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
                <div id="w-node-_218c9880-97f5-9a84-2cd4-df84f73d02ae-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <div data-tippy-content="Angka Partisipasi Kasar Sekolah Menengah" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                    <h3 class="heading-xxs medium">APK SM</h3>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="APK_SMA-chart" style="width: 100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata Angka Partisipasi Kasar (APK) Sekolah Menengah (SM) daerah pemilihan (Dapil), dihitung dari jumlah APK SM daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
                <div id="w-node-_85608af2-0897-e002-fc85-65e65f7ea0f4-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <div data-tippy-content="Angka Partisipasi Murni Sekolah Dasar" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                    <h3 class="heading-xxs medium">APM SD</h3>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="APM_SD-chart" style="width: 100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata Angka Partisipasi Murni (APM) Sekolah Dasar (SD) daerah pemilihan (Dapil), dihitung dari jumlah APM SD daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
                <div id="w-node-_4d86c549-6244-6f5e-7ab7-d657f818c2c7-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <div data-tippy-content="Angka Partisipasi Murni Sekolah Menengah Pertama" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                    <h3 class="heading-xxs medium">APM SMP</h3>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="APM_SMP-chart" style="width: 100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata Angka Partisipasi Murni (APM) Sekolah Menengah Pertama (SMP) daerah pemilihan (Dapil), dihitung dari jumlah APM SMP daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
                <div id="w-node-_314ab4b1-48e0-378a-ea8f-b0cdc4cc9215-ec0da9ff" class="bar-content short">
                  <div class="graph-title">
                    <div data-tippy-content="Angka Partisipasi Murni Sekolah Menengah" class="tooltip"><img src="<?= base_url('assets/images/fi_help-circle-grey.svg') ?>" loading="lazy" alt=""></div>
                    <h3 class="heading-xxs medium">APM SM</h3>
                  </div>
                  <div class="w-embed w-script">
                    <canvas id="APM_SM-chart" style="width: 100%;"></canvas>
                  </div>
                  <div class="graph-caption">Rata-rata Angka Partisipasi Murni (APM) Sekolah Menengah (SM) daerah pemilihan (Dapil), dihitung dari jumlah APM SM daerah dalam Dapil dibagi jumlah daerah dalam Dapil</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section no-padding wf-section">
        <div class="container">
          <div class="content-wrapper">
            <div class="content-heading-wrapper">
              <h2 class="heading-s medium">Transfer Ke Daerah dan Dana Desa Daerah Pemilihan</h2>
              <div class="c-t-primary-100">
                <h3 class="heading-xs dapil-name"></h3>
              </div>
            </div>
            <div class="table-wrapper">
              <div class="w-embed tbl-dapil" style="overflow-x: auto; max-width: 80vw">
                
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="footer wf-section">
        <div class="footer-container">
          <div class="footer-content">
            <div class="footer-caption"><strong>Pusat Kajian Anggaran DPR-RI.</strong> 2022</div>
            <div class="footer-caption-small">All Right Reserved</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    var baseUrl = '<?= site_url() ?>';
    var assetsUrl = '<?= base_url('assets/') ?>';
  </script>
  <script src="https://unpkg.com/popper.js@1"></script>
  <script src="https://unpkg.com/tippy.js@4"></script>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=633b251b96dff4c8a7043d93" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
  <script src="<?= base_url('assets/js/clients-dashboard-pka.js') ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/custom.js') ?>" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <!-- Tooltip Scripts & Settings -->

</body>
</html>