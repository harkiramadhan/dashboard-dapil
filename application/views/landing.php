<!DOCTYPE html><!--  Last Published: Mon Oct 10 2022 13:38:14 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="633b251b96dff4945c043d94" data-wf-site="633b251b96dff4c8a7043d93">
<head>
  <meta charset="utf-8">
  <title>Client&#x27;s Dashboard</title>
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
  <link rel="stylesheet" type="text/css" href="https://github.s3.amazonaws.com/downloads/lafeber/world-flags-sprite/flags32.css" />
</head>
<body>
  <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="nav w-nav">
    <div class="nav-container">
      <a href="index.html" aria-current="page" class="nav-brand w-nav-brand w--current"><img src="<?= base_url('assets/images/logo-setjen-reduced.png') ?>" loading="lazy" srcset="<?= base_url('assets/images/logo-setjen-reduced-p-500.png') ?> 500w, images/logo-setjen-reduced.png 942w" sizes="64px" alt=""></a>
    </div>
  </div>
  <div class="hp-hero-section wf-section">
    <div class="hp-hero-container">
      <div class="hp-content-wrapper">
        <div class="hero-heading-wrapper">
          <h1 class="heading-xl regular">Kenali daerah Dapil anda dengan data lebih lengkap</h1>
        </div>
        <div class="ct-grey-40">
          <div class="paragraph-large">Lebih dekat dengan kondisi daerah pemilihan anda!</div>
        </div>
        <div data-hover="false" data-delay="0" class="filter-dropdown w-dropdown">
          <div class="home-dropdown-toggle w-dropdown-toggle">
            <div class="home-dropdown-icon w-icon-dropdown-toggle"></div>
            <div class="paragraph">Pilih provinsi dapil anda...</div>
          </div>
          <nav class="home-dropdown-lists w-dropdown-list">
            <input type="search" class="home-dropdown-search w-input" maxlength="256" name="query" placeholder="Search…" id="myInput" required="">
            <?php foreach($provinsi->result() as $row){ ?>
              <a href="#" class="home-dropdown-item w-dropdown-link data-provinsi" data-id="<?= $row->id ?>"><?= str_replace('Prov. ', '', $row->provinsi) ?></a>
            <?php } ?>
          </nav>
        </div>
        <div class="map-indonesia-wrapper">
          <h2 class="heading-s regular">Peta Dapil Indonesia</h2>
          <div class="w-embed w-script">
            <script src="https://code.highcharts.com/maps/highmaps.js"></script>
            <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/maps/modules/accessibility.js"></script>
            <div id="container"></div>
            <style>
              #container {
                  height: 500px;
                  min-width: 310px;
                  max-width: 1200px;
                  margin: 0 auto;
                  background-color: #F4F5FA
              }
              .loading {
                  margin-top: 10em;
                  text-align: center;
                  color: gray;
              }
              .highcharts-tooltip > span {
                  background: rgb(255 255 255 / 85%);
                  border: 1px solid silver;
                  border-radius: 3px;
                  box-shadow: 1px 1px 2px #888;
                  padding: 8px;
              }

              .loading {
                  margin-top: 10em;
                  text-align: center;
                  color: gray;
              }

              .f32 .flag {
                  vertical-align: middle !important;
              }

              .highcharts-color-0 {
                fill:#5570f1;
              }
              </style>
            <script>
              (async () => {
                const topology = await fetch(
                  'https://code.highcharts.com/mapdata/countries/id/id-all.topo.json'
                ).then(response => response.json());

                const data = <?= json_encode($dapil2) ?>;
                Highcharts.mapChart('container', {
                  chart: {map: topology},
                  title: {text: ''},
                  subtitle: {text: ''},
                  legend: {enabled: false},
                  mapNavigation: {
                      enabled: true,
                      buttonOptions: {
                          verticalAlign: 'bottom'
                      }
                  },
                  colorAxis: {min: 0},
                  series: [{
                      data: <?= json_encode($dapil) ?>,
                      name: 'Dapil',
                      states: {
                          hover: {
                              color: '#5570F1'
                          }
                      },
                      dataLabels: {
                          enabled: true,
                          format: '{point.name}'
                      }
                  }],
                  plotOptions: {
                    series: {
                        point: {
                            events: {
                                click: function () {
                                    $.ajax({
                                      url: '<?= site_url('welcome/getProv') ?>',
                                      type: 'get',
                                      data: {name: this.name},
                                      success: function(res){
                                        window.location.href = "<?= site_url('dashboard?prov=') ?>" + res
                                      }
                                    })
                                }
                            }
                        }
                    }
                  },
                  tooltip: {
                    formatter(){
                      let point = this,
                          VAs;
                          
                      data.forEach(d => {
                        if(d[0] == point.point['hc-key']){
                          VAs = d[1]
                        }
                      })
                      return `<b>Prov. ${point.key}</b> <br> <b>${point.point.value} Kabupaten</b> <br> <b>${VAs} Dapil</b>`
                    }
                  },
                });
              })();
            </script>
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
  <script>
      tippy('.tooltip', {        
      animation: 'scale-subtle',    
      duration: 200,      
      arrow: true,          
      delay: [0, 50],      
      arrowType: 'sharp',  
      theme: 'material',        
      maxWidth: 220,    
      interactive: true,
      })
  </script>
  <script>
    const DATA_COUNT = 7;
    const NUMBER_CFG = {count: DATA_COUNT, min: -100, max: 100};
    const labels = Utils.months({count: 7});
    const data = {
      labels: labels,
      datasets: [
        {
          label: 'Dataset 1',
          data: labels.map(() => {
            return [Utils.rand(-100, 100), Utils.rand(-100, 100)];
          }),
          backgroundColor: Utils.CHART_COLORS.red,
        },
        {
          label: 'Dataset 2',
          data: labels.map(() => {
            return [Utils.rand(-100, 100), Utils.rand(-100, 100)];
          }),
          backgroundColor: Utils.CHART_COLORS.blue,
        },
      ]
    };
  </script>

  <script>
    var baseUrl = '<?= site_url() ?>'
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase()
        $(".data-provinsi").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    })

    $('.data-provinsi').click(function(){
      var id = $(this).attr('data-id')
      window.location.replace( baseUrl + "dashboard?prov=" + id)
    })
  </script>
</body>
</html>