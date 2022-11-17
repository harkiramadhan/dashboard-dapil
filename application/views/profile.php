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
            <a href="#" class="nav-brand w-nav-brand"><img src="<?= base_url('assets/images/logo-setjen-reduced.png') ?>" loading="lazy" srcset="<?= base_url('assets/images/logo-setjen-reduced-p-500.png') ?> 500w, images/logo-setjen-reduced.png 942w" sizes="64px" alt=""></a>
                <nav role="navigation" class="sidenav-menu w-nav-menu">
                <div class="sidenav-menu-flex">
                    <a href="<?= site_url('') ?>" class="sidenav-link hide-tablet w-inline-block">
                    <div class="icon-text"><img src="<?= base_url('assets/images/fi_chevron-left.svg') ?>" loading="lazy" alt="">
                        <div>Halaman Utama</div>
                    </div>
                    </a>
                    <a href="<?= site_url('dashboard?prov=' . $this->input->get('prov', TRUE)) ?>" aria-current="page" class="sidenav-link w-inline-block ">
                        <div class="icon-text">
                            <div class="icon-24 w-embed"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="CurrentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="CurrentColor"></path>
                            </svg></div>
                            <div>Dashboard</div>
                        </div>
                    </a>
                    <a href="<?= site_url('profil?prov=' . $this->input->get('prov', TRUE)) ?>" aria-current="page" class="sidenav-link w-inline-block w--current">
                        <div class="icon-text">
                            <div class="icon-24 w-embed"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.59151 15.2068C13.2805 15.2068 16.4335 15.7658 16.4335 17.9988C16.4335 20.2318 13.3015 20.8068 9.59151 20.8068C5.90151 20.8068 2.74951 20.2528 2.74951 18.0188C2.74951 15.7848 5.88051 15.2068 9.59151 15.2068Z" stroke="CurrentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.59157 12.0198C7.16957 12.0198 5.20557 10.0568 5.20557 7.63482C5.20557 5.21282 7.16957 3.24982 9.59157 3.24982C12.0126 3.24982 13.9766 5.21282 13.9766 7.63482C13.9856 10.0478 12.0356 12.0108 9.62257 12.0198H9.59157Z" stroke="CurrentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M16.4829 10.8816C18.0839 10.6566 19.3169 9.28265 19.3199 7.61965C19.3199 5.98065 18.1249 4.62065 16.5579 4.36365" stroke="CurrentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M18.5952 14.7322C20.1462 14.9632 21.2292 15.5072 21.2292 16.6272C21.2292 17.3982 20.7192 17.8982 19.8952 18.2112" stroke="CurrentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></div>
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
                        <a href="<?= site_url('') ?>" class="breadcrumbs-home w-inline-block"><img src="<?= base_url('assets/images/Home-filled-primary.svg') ?>" loading="lazy" alt=""></a>
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
                            <div class="margin-16">
                                <div class="text-desc dapil-detail"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section no-padding wf-section">
                <div class="container">
                    <div class="content-wrapper">
                        <div class="content-heading-wrapper">
                            <h2 class="heading-s medium text-foto"></h2>
                        </div>
                        <div class="foto">

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
    <script>
        var baseUrl = '<?= site_url() ?>';
        var assetsUrl = '<?= base_url('assets/') ?>';
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?= base_url('assets/js/clients-dashboard-pka.js') ?>" type="text/javascript"></script>
    <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
    <!-- Tooltip Scripts & Settings -->
    <script src="https://unpkg.com/popper.js@1"></script>
    <script src="https://unpkg.com/tippy.js@4"></script>
    <script src="<?= base_url('assets/js/custom-profil.js') ?>" type="text/javascript"></script>
</body>
</html>