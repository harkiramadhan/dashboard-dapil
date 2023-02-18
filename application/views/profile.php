<!DOCTYPE html><!--  Last Published: Thu Oct 27 2022 22:24:08 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="635b013fd188c12695221726" data-wf-site="633b251b96dff4c8a7043d93">
<head>
    <meta charset="utf-8">
    <title>Inangdapil | PKA DPR RI</title>
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
                <a href="<?= site_url('') ?>" class="nav-brand w-nav-brand">
                    <div class="nav-brand-flex">
                        <img src="<?= base_url('assets/images/logo-setjen-reduced.png') ?>" loading="lazy" srcset="<?= base_url('assets/images/logo-setjen-reduced-p-500.png') ?> 500w, <?= base_url('assets/images/logo-setjen-reduced.png') ?> 942w" sizes="(max-width: 479px) 56px, (max-width: 991px) 72px, 88px" alt="" class="setjen-logo">
                        <img src="<?= base_url('assets/images/inangdapil-notext.jpg') ?>" loading="lazy" srcset="<?= base_url('assets/images/inangdapil-notext.jpg') ?> 500w, <?= base_url('assets/images/inangdapil-notext.jpg') ?> 800w, <?= base_url('assets/images/inangdapil-notext.jpg') ?> 1080w" sizes="120px" alt="" class="inang-logo">
                    </div>
                </a>
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
                    <div class="margin-top-120">
                        <div class="sidenav-menu-flex">
                            <div class="margin-16">
                                <div class="sidenav-secondary-heading">BUKU&nbsp;PANDUAN<br>TRANSFER&nbsp;DAERAH</div>
                            </div>
                            <a href="<?= base_url('assets/Buku_Panduan_TKD.pdf') ?>" class="download-button w-inline-block" download>
                                <div class="icon-24 w-embed"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.0297 6.76641C20.1703 6.90703 20.25 7.09687 20.25 7.29609V21.75C20.25 22.1648 19.9148 22.5 19.5 22.5H4.5C4.08516 22.5 3.75 22.1648 3.75 21.75V2.25C3.75 1.83516 4.08516 1.5 4.5 1.5H14.4539C14.6531 1.5 14.8453 1.57969 14.9859 1.72031L20.0297 6.76641V6.76641ZM18.5203 7.64062L14.1094 3.22969V7.64062H18.5203ZM14.8411 14.9358C14.4853 14.9241 14.107 14.9515 13.6774 15.0052C13.1079 14.6538 12.7245 14.1713 12.4521 13.4623L12.4772 13.3596L12.5062 13.2382C12.607 12.8133 12.6612 12.5032 12.6773 12.1905C12.6895 11.9545 12.6764 11.7368 12.6345 11.535C12.5571 11.0993 12.2489 10.8445 11.8605 10.8288C11.4984 10.8141 11.1656 11.0163 11.0805 11.3297C10.942 11.8364 11.0231 12.5032 11.3168 13.6404C10.9427 14.5322 10.4484 15.5777 10.1168 16.1609C9.67406 16.3891 9.3293 16.5968 9.03961 16.827C8.65758 17.1309 8.41898 17.4434 8.35336 17.7715C8.32148 17.9236 8.36953 18.1223 8.47898 18.2852C8.6032 18.4699 8.79023 18.5899 9.01453 18.6073C9.58055 18.6511 10.2762 18.0675 11.0442 16.7496C11.1213 16.7238 11.2029 16.6966 11.3025 16.6629L11.5814 16.5687C11.7579 16.5091 11.8859 16.4665 12.0124 16.4255C12.5609 16.2469 12.9757 16.1341 13.353 16.0699C14.0088 16.421 14.7668 16.6512 15.2773 16.6512C15.6987 16.6512 15.9834 16.4327 16.0863 16.0889C16.1766 15.787 16.1051 15.4369 15.911 15.2433C15.7104 15.0462 15.3415 14.952 14.8411 14.9358V14.9358ZM9.02883 17.9456V17.9372L9.03187 17.9292C9.06617 17.8406 9.11019 17.756 9.16312 17.677C9.26344 17.5228 9.40148 17.3606 9.57258 17.1879C9.66445 17.0953 9.76008 17.0051 9.87234 16.9038C9.89742 16.8813 10.0577 16.7386 10.0877 16.7105L10.3495 16.4667L10.1592 16.7698C9.87047 17.2301 9.60937 17.5615 9.38578 17.7776C9.30352 17.8573 9.23109 17.9159 9.1725 17.9536C9.15316 17.9665 9.13268 17.9777 9.11133 17.9869C9.10172 17.9909 9.09328 17.9932 9.08484 17.9939C9.07594 17.995 9.06689 17.9938 9.05859 17.9904C9.04977 17.9867 9.04224 17.9805 9.03694 17.9725C9.03165 17.9645 9.02882 17.9552 9.02883 17.9456V17.9456ZM11.9805 12.8297L11.9276 12.9234L11.8948 12.8208C11.8221 12.5904 11.7687 12.2433 11.7539 11.9302C11.737 11.5739 11.7654 11.3602 11.8779 11.3602C12.0359 11.3602 12.1083 11.6133 12.1139 11.9941C12.1191 12.3288 12.0663 12.6771 11.9803 12.8297H11.9805ZM11.8444 14.1998L11.8802 14.1049L11.9292 14.194C12.2032 14.6918 12.5588 15.1071 12.9497 15.3966L13.0341 15.4589L12.9312 15.48C12.5484 15.5592 12.192 15.6783 11.7045 15.8749C11.7553 15.8543 11.1977 16.0826 11.0566 16.1367L10.9336 16.1838L10.9992 16.0695C11.2887 15.5655 11.5561 14.9604 11.8441 14.1998H11.8444ZM15.5386 15.9872C15.3544 16.0598 14.9578 15.9949 14.2596 15.6968L14.0824 15.6213L14.2746 15.6073C14.8207 15.5667 15.2074 15.5967 15.4329 15.6792C15.529 15.7144 15.593 15.7587 15.6213 15.8093C15.6363 15.8333 15.6413 15.8621 15.6353 15.8897C15.6294 15.9173 15.6129 15.9415 15.5895 15.9572C15.5746 15.9703 15.5573 15.9805 15.5386 15.9872V15.9872Z" fill="CurrentColor"></path>
                                </svg></div>
                                <div>Unduh panduan</div>
                            </a>
                        </div>
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
                <div class="container" id="reportPage">
                    
                    <div class="content-wrapper">
                        <div class="content-heading-wrapper">
                            <div class="flex-horizontal-between" style="margin-bottom: 20px">
                                <h2 class="heading-s medium text-foto"></h2>
                                <div class="button-wrapper">
                                    <a href="#" class="download-button w-inline-block"  id="downloadPdf">
                                        <div>Unduh format PDF</div>
                                        <div class="icon-24 w-embed"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.0297 6.76641C20.1703 6.90703 20.25 7.09687 20.25 7.29609V21.75C20.25 22.1648 19.9148 22.5 19.5 22.5H4.5C4.08516 22.5 3.75 22.1648 3.75 21.75V2.25C3.75 1.83516 4.08516 1.5 4.5 1.5H14.4539C14.6531 1.5 14.8453 1.57969 14.9859 1.72031L20.0297 6.76641V6.76641ZM18.5203 7.64062L14.1094 3.22969V7.64062H18.5203ZM14.8411 14.9358C14.4853 14.9241 14.107 14.9515 13.6774 15.0052C13.1079 14.6538 12.7245 14.1713 12.4521 13.4623L12.4772 13.3596L12.5062 13.2382C12.607 12.8133 12.6612 12.5032 12.6773 12.1905C12.6895 11.9545 12.6764 11.7368 12.6345 11.535C12.5571 11.0993 12.2489 10.8445 11.8605 10.8288C11.4984 10.8141 11.1656 11.0163 11.0805 11.3297C10.942 11.8364 11.0231 12.5032 11.3168 13.6404C10.9427 14.5322 10.4484 15.5777 10.1168 16.1609C9.67406 16.3891 9.3293 16.5968 9.03961 16.827C8.65758 17.1309 8.41898 17.4434 8.35336 17.7715C8.32148 17.9236 8.36953 18.1223 8.47898 18.2852C8.6032 18.4699 8.79023 18.5899 9.01453 18.6073C9.58055 18.6511 10.2762 18.0675 11.0442 16.7496C11.1213 16.7238 11.2029 16.6966 11.3025 16.6629L11.5814 16.5687C11.7579 16.5091 11.8859 16.4665 12.0124 16.4255C12.5609 16.2469 12.9757 16.1341 13.353 16.0699C14.0088 16.421 14.7668 16.6512 15.2773 16.6512C15.6987 16.6512 15.9834 16.4327 16.0863 16.0889C16.1766 15.787 16.1051 15.4369 15.911 15.2433C15.7104 15.0462 15.3415 14.952 14.8411 14.9358V14.9358ZM9.02883 17.9456V17.9372L9.03187 17.9292C9.06617 17.8406 9.11019 17.756 9.16312 17.677C9.26344 17.5228 9.40148 17.3606 9.57258 17.1879C9.66445 17.0953 9.76008 17.0051 9.87234 16.9038C9.89742 16.8813 10.0577 16.7386 10.0877 16.7105L10.3495 16.4667L10.1592 16.7698C9.87047 17.2301 9.60937 17.5615 9.38578 17.7776C9.30352 17.8573 9.23109 17.9159 9.1725 17.9536C9.15316 17.9665 9.13268 17.9777 9.11133 17.9869C9.10172 17.9909 9.09328 17.9932 9.08484 17.9939C9.07594 17.995 9.06689 17.9938 9.05859 17.9904C9.04977 17.9867 9.04224 17.9805 9.03694 17.9725C9.03165 17.9645 9.02882 17.9552 9.02883 17.9456V17.9456ZM11.9805 12.8297L11.9276 12.9234L11.8948 12.8208C11.8221 12.5904 11.7687 12.2433 11.7539 11.9302C11.737 11.5739 11.7654 11.3602 11.8779 11.3602C12.0359 11.3602 12.1083 11.6133 12.1139 11.9941C12.1191 12.3288 12.0663 12.6771 11.9803 12.8297H11.9805ZM11.8444 14.1998L11.8802 14.1049L11.9292 14.194C12.2032 14.6918 12.5588 15.1071 12.9497 15.3966L13.0341 15.4589L12.9312 15.48C12.5484 15.5592 12.192 15.6783 11.7045 15.8749C11.7553 15.8543 11.1977 16.0826 11.0566 16.1367L10.9336 16.1838L10.9992 16.0695C11.2887 15.5655 11.5561 14.9604 11.8441 14.1998H11.8444ZM15.5386 15.9872C15.3544 16.0598 14.9578 15.9949 14.2596 15.6968L14.0824 15.6213L14.2746 15.6073C14.8207 15.5667 15.2074 15.5967 15.4329 15.6792C15.529 15.7144 15.593 15.7587 15.6213 15.8093C15.6363 15.8333 15.6413 15.8621 15.6353 15.8897C15.6294 15.9173 15.6129 15.9415 15.5895 15.9572C15.5746 15.9703 15.5573 15.9805 15.5386 15.9872V15.9872Z" fill="CurrentColor"></path>
                                        </svg></div>
                                    </a>
                                </div>
                            </div>
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
                        <div class="footer-caption-small">Sekretariat Jenderal DPR RI</div>
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
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/custom-profil.js') ?>" type="text/javascript"></script>
</body>
</html>