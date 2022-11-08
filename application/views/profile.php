<!DOCTYPE html><!--  Last Published: Thu Oct 27 2022 22:24:08 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="635b013fd188c12695221726" data-wf-site="633b251b96dff4c8a7043d93">
<head>
    <meta charset="utf-8">
    <title>Profil</title>
    <meta content="Profil" property="og:title">
    <meta content="Profil" property="twitter:title">
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
</head>
<body>
    <div class="page-wrapper">
        <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="side-navigation w-nav">
            <div class="navside-container">
                <a href="#" class="nav-brand w-nav-brand"><img src="<?= base_url('assets/images/logo-setjen-reduced.png') ?>" loading="lazy" srcset="../images/logo-setjen-reduced-p-500.png 500w, ../images/logo-setjen-reduced.png 942w" sizes="64px" alt=""></a>
                <nav role="navigation" class="sidenav-menu w-nav-menu">
                <div class="sidenav-menu-flex">
                    <a href="<?= site_url('') ?>" class="sidenav-link hide-tablet w-inline-block">
                    <div class="icon-text"><img src="<?= base_url('assets/images/fi_chevron-left.svg') ?>" loading="lazy" alt="">
                        <div>Halaman Utama</div>
                    </div>
                    </a>
                    <a href="<?= site_url('dashboard?prov=' . $this->input->get('prov', TRUE)) ?>" aria-current="page" class="sidenav-link w-inline-block ">
                    <div class="icon-text"><img src="<?= base_url('assets/images/Category-customized.svg') ?>" loading="lazy" alt="">
                        <div>Dashboard</div>
                    </div>
                    </a>
                    <a href="<?= site_url('profil?prov=' . $this->input->get('prov', TRUE)) ?>" class="sidenav-link w-inline-block w--current">
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
                        <a href="../index.html" class="breadcrumbs-home w-inline-block"><img src="<?= base_url('assets/images/Home-filled-primary.svg') ?>" loading="lazy" alt=""></a>
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
                </div>
            </section>
            <section class="section no-padding wf-section">
                <div class="container">
                    <div class="content-wrapper">
                        <div class="content-heading-wrapper">
                        <h2 class="heading-s medium">Profil Anggota Jawa Timur II</h2>
                        </div>
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
                            <div id="w-node-e40058f3-0fc0-9019-0bc8-eab5b00624bf-95221726" class="profile-wrapper">
                                <div class="profile-image-wrapper"><img src="../images/dr.-H.-MUFTI-AIMAH-NURUL-ANAM_A-208_F-PDIP.webp" loading="lazy" alt="" class="profile-image"></div>
                                <div class="profile-content">
                                <div class="margin-8">
                                    <h3 class="heading-xs">dr. H. MUFTI AIMAH NURUL ANAM</h3>
                                </div>
                                <div class="paragraph-small">F-PDIP</div>
                                </div>
                            </div>
                            <div id="w-node-b30b70f8-b47e-5e7c-487f-dd748f4bc0ce-95221726" class="profile-wrapper">
                                <div class="profile-image-wrapper"><img src="../images/AMINUROKHMAN-S.E.-M.M._A-376_F-Nasdem.webp" loading="lazy" alt="" class="profile-image"></div>
                                <div class="profile-content">
                                <div class="margin-8">
                                    <h3 class="heading-xs">Dra. Hj. ANISAH SYAKUR</h3>
                                </div>
                                <div class="paragraph-small">F-PKB</div>
                                </div>
                            </div>
                            <div id="w-node-f409c706-6d9a-95b0-8141-52fb9602afd2-95221726" class="profile-wrapper">
                                <div class="profile-image-wrapper"><img src="../images/FAISOL-RIZA_A-33_F-PKB.webp" loading="lazy" alt="" class="profile-image"></div>
                                <div class="profile-content">
                                <div class="margin-8">
                                    <h3 class="heading-xs">FAISOL RIZA</h3>
                                </div>
                                <div class="paragraph-small">F-PKB</div>
                                </div>
                            </div>
                            <div id="w-node-bf7a73ef-f689-e021-58b4-72a304105a67-95221726" class="profile-wrapper">
                                <div class="profile-image-wrapper"><img src="../images/H.-MUKHAMAD-MISBAKHUN-S.E.-M.H._A-314_F-Golkar.webp" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 90vw, (max-width: 991px) 91vw, (max-width: 1919px) 80vw, 96vw" srcset="../images/H.-MUKHAMAD-MISBAKHUN-S.E.-M.H._A-314_F-Golkar-p-500.jpg 500w, ../images/H.-MUKHAMAD-MISBAKHUN-S.E.-M.H._A-314_F-Golkar-p-800.jpg 800w, ../images/H.-MUKHAMAD-MISBAKHUN-S.E.-M.H._A-314_F-Golkar-p-1080.jpg 1080w, ../images/H.-MUKHAMAD-MISBAKHUN-S.E.-M.H._A-314_F-Golkar-p-1600.jpg 1600w, ../images/H.-MUKHAMAD-MISBAKHUN-S.E.-M.H._A-314_F-Golkar-p-2000.jpg 2000w, ../images/H.-MUKHAMAD-MISBAKHUN-S.E.-M.H._A-314_F-Golkar-p-2600.jpg 2600w, ../images/H.-MUKHAMAD-MISBAKHUN-S.E.-M.H._A-314_F-Golkar-p-3200.jpg 3200w" alt="" class="profile-image"></div>
                                <div class="profile-content">
                                <div class="margin-8">
                                    <h3 class="heading-xs">H. MUKHAMAD MISBAKHUN, S.E.,</h3>
                                </div>
                                <div class="paragraph-small">F-Golkar</div>
                                </div>
                            </div>
                            <div id="w-node-_9a44756b-5425-a961-b2d1-7ce1fb131dbd-95221726" class="profile-wrapper">
                                <div class="profile-image-wrapper"><img src="../images/MOH.-HAERUL-AMRI-SP._A-375_F-Nasdem.webp" loading="lazy" alt="" class="profile-image"></div>
                                <div class="profile-content">
                                <div class="margin-8">
                                    <h3 class="heading-xs">MOH. HAERUL AMRI, SP.</h3>
                                </div>
                                <div class="paragraph-small">F-Nasdem</div>
                                </div>
                            </div>
                            <div id="w-node-_3504d432-a356-5f76-9f42-ea8847031fd9-95221726" class="profile-wrapper">
                                <div class="profile-image-wrapper"><img src="../images/LAKSDYA.-TNI-PURN-MOEKHLAS-SIDIK-MPA._A-107_-F-Gerindra.webp" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 90vw, (max-width: 991px) 91vw, (max-width: 1919px) 80vw, 96vw" srcset="../images/LAKSDYA.-TNI-PURN-MOEKHLAS-SIDIK-MPA._A-107_-F-Gerindra-p-500.jpeg 500w" alt="" class="profile-image"></div>
                                <div class="profile-content">
                                <div class="margin-8">
                                    <h3 class="heading-xs">LAKSDYA. TNI (PURN) MOEKHLAS SIDIK, MPA.</h3>
                                </div>
                                <div class="paragraph-small">F-Nasdem</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="footer wf-section">
                <div class="footer-container">
                    <div class="footer-content">
                        <div class="footer-caption"><strong>Pusat Kajian Anggaran DPR-RI.</strong> <?= date('Y') ?></div>
                        <div class="footer-caption-small">All Right Reserved</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=633b251b96dff4c8a7043d93" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/clients-dashboard-pka.js') ?>" type="text/javascript"></script>
    <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
    <!-- Tooltip Scripts & Settings -->
    <script src="https://unpkg.com/popper.js@1"></script>
    <script src="https://unpkg.com/tippy.js@4"></script>
    <script src="<?= base_url('assets/js/custom-profil.js') ?>" type="text/javascript"></script>
</body>
</html>