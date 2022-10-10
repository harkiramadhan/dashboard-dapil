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
        <div class="map-indonesia-wrapper hide">
          <h2 class="heading-s regular">Peta Dapil Indonesia</h2>
          <div class="w-embed w-script">
            <script src="https://code.highcharts.com/maps/highmaps.js"></script>
            <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
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
              </style>
            <script>
              (async () => {
                  const topology = await fetch(
                      'https://code.highcharts.com/mapdata/countries/id/id-all.topo.json'
                  ).then(response => response.json());
                  // Prepare demo data. The data is joined to map using value of 'hc-key'
                  // property by default. See API docs for 'joinBy' for more info on linking
                  // data and map.
                  const data = [
                      ['id-3700', 10], ['id-ac', 11], ['id-jt', 12], ['id-be', 13],
                      ['id-bt', 14], ['id-kb', 15], ['id-bb', 16], ['id-ba', 17],
                      ['id-ji', 18], ['id-ks', 19], ['id-nt', 20], ['id-se', 21],
                      ['id-kr', 22], ['id-ib', 23], ['id-su', 24], ['id-ri', 25],
                      ['id-sw', 26], ['id-ku', 27], ['id-la', 28], ['id-sb', 29],
                      ['id-ma', 30], ['id-nb', 31], ['id-sg', 32], ['id-st', 33],
                      ['id-pa', 34], ['id-jr', 35], ['id-ki', 36], ['id-1024', 37],
                      ['id-jk', 38], ['id-go', 39], ['id-yo', 40], ['id-sl', 41],
                      ['id-sr', 42], ['id-ja', 43], ['id-kt', 44]
                  ];
                  // Create the chart
                  Highcharts.mapChart('container', {
                      chart: {
                          map: topology
                      },
                      title: {
                          text: 'Highcharts Maps basic demo'
                      },
                      subtitle: {
                          text: 'Source map: <a href="http://code.highcharts.com/mapdata/countries/id/id-all.topo.json">Indonesia</a>'
                      },
                      mapNavigation: {
                          enabled: true,
                          buttonOptions: {
                              verticalAlign: 'bottom'
                          }
                      },
                      colorAxis: {
                          min: 0
                      },
                      series: [{
                          data: data,
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
                      }]
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