var loader = "<div style='text-align:center !important'><img src='" + assetsUrl + "loader.svg' alt=''></div>";
var provinsiid = $('#provinsiid').val()
var dapil = $('.filter-dapil.opened').text()
var bidang = $('#bidang').text()
var tahun = $('#tahun').text()

$('.filter-dapil').click(function(){
    var id = $(this).attr('data-id')
    $('.filter-dapil.opened').removeClass('opened')
    $(this).addClass('opened')
    loadChart()
})

$('.data-bidang').click(function(){
    var bidang = $(this).text()
    $('#bidang').text(bidang)
    loadChart()
})

$('.data-tahun').click(function(){
    var tahun = $(this).text()
    $('#tahun').text(tahun)
    loadChart()
})

$("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase()
    $(".data-bidang").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    })
})

/* ChartJs */
loadChart()

function loadChart(){
    loadBarChart('DAK Fisik Reguler', 'DAK_Fisik_Reguler-chart')
    loadBarChart('DAK Fisik Penugasan', 'DAK_Fisik_Penugasan-chart')
    loadBarChart('DAK Fisik Afirmasi', 'DAK_Fisik_Afirmasi-chart')
    loadBarChart('DAK Non Fisik', 'DAK_Non_Fisik-chart')
    loadBarChart('DAU', 'DAU-chart')
    loadBarChart('DID', 'DID-chart')
    loadBarChart('Dana Desa', 'Dana_Desa-chart')
    loadBarChart('DBH PBB', 'DBH_PBB-chart')
    loadBarChart('DBH PPh', 'DBH_PPh-chart')
    loadBarChart('DBH SDA Panas Bumi', 'DBH_SDA_Panas_Bumi-chart')
    loadBarChart('DBH SDA Perikanan', 'DBH_SDA_Perikanan-chart')
    loadBarChart('DBH SDA Kehutanan', 'DBH_SDA_Kehutanan-chart')
    loadBarChart('DBH SDA Migas', 'DBH_SDA_Migas-chart')
    loadBarChart('DBH SDA Minerba', 'DBH_SDA_Minerba-chart')
    loadBarChart('DBH CHT', 'DBH_CHT-chart')

    loadLineChart('IPM', 'IPM-chart')
    loadLineChart('AHH', 'AHH-chart')
    loadLineChart('HLS', 'HLS-chart')
    loadLineChart('RLS', 'RLS-chart')
    loadLineChart('Pengeluaran per Kapita', 'Pengeluaran_per_Kapita-chart')

    loadBarChartBolder('IPM per Kabupaten/Kota', 'IPM_per_Kabupaten_Kota-chart')
    loadBarChartBolder('TPAK', 'TPAK-chart')
    loadBarChartBolder('TPT', 'TPT-chart')

    loadLineChart('Rata Rata % Pend Miskin', 'Pend_Miskin-chart')
    loadBarChartBolder('Jml Pend Miskin', 'Jml_Pend_Miskin-chart')
    loadLineChart('Rata Rata Juml Pend Miskin', 'Rata_Rata_Pend_Miskin-chart')

    loadLineChart('APK PAUD', 'APK_PAUD-chart')
    loadLineChart('APK SD', 'APK_SD-chart')
    loadLineChart('APK SMP', 'APK_SMP-chart')
    loadLineChart('APK SMA', 'APK_SMA-chart')

    loadLineChart('APM SD', 'APM_SD-chart')
    loadLineChart('APM SMP', 'APM_SMP-chart')
    loadLineChart('APM SM', 'APM_SM-chart')
}

function loadBarChart(type, chartid){
    $.ajax({
        url: baseUrl + 'dashboard/ajaxBarChart',
        type: 'get',
        data: {
            type: type, 
            bidang: $('#bidang').text(),
            tahun: $('#tahun').text(),
            provinsiid: provinsiid,
            dapil: $('.filter-dapil.opened').text()
        },
        beforeSend: function(){
            $('#' + chartid).html(loader)
        },
        success: function(res){
            let chartStatus = Chart.getChart(chartid)
            if (chartStatus != undefined) {
                chartStatus.destroy()
            }

            const ctx = document.getElementById(chartid).getContext('2d')
            const labels = res.labels
            const data = {
                labels: labels,
                datasets: res.datasets
            };
            const config = {
                type: 'bar',
                data: data,
                options: {
                    indexAxis: 'y',
                    plugins: {
                        title: {
                            display: false,
                            text: '',
                            font: {
                                family: "'Poppins', sans-serif",
                                size: 16
                            }
                        },
                    },
                    responsive: true,
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            stacked: true,
                        },
                        y: {
                            grid: {
                                display: false
                            },
                            stacked: true
                        }
                    }
                }
            };
            const myChart = new Chart(ctx, config)
        }
    })
}

function loadLineChart(type, chartid){
    $.ajax({
        url: baseUrl + 'dashboard/ajaxLineChart',
        type: 'get',
        data: {
            type: type, 
            bidang: $('#bidang').text(),
            tahun: $('#tahun').text(),
            provinsiid: provinsiid,
            dapil: $('.filter-dapil.opened').text()
        },
        beforeSend: function(){
            $('#' + chartid).html(loader)
        },
        success: function(res){
            let chartLineStatus = Chart.getChart(chartid)
            if(chartLineStatus != undefined){
                chartLineStatus.destroy()
            }

            const ctxLine = document.getElementById(chartid).getContext('2d')
            const labelsLine = res.labels
            const dataLine = {
                labels: labelsLine,
                datasets: res.datasets 
            };
            const configLine = {
                type: 'line',
                data: dataLine,
                options: {
                    plugins: {
                        title: {
                            display: false,
                            text: '',
                            font: {
                                family: "'Poppins', sans-serif",
                                size: 16
                            }
                        },
                    },
                    responsive: true,
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            stacked: true,
                        },
                        y: {
                            grid: {
                                display: false
                            },
                            stacked: true
                        }
                    },
                },
            };
            const myChartLine = new Chart(ctxLine, configLine);
        }
    })
}

function loadBarChartBolder(type, chartid){
    $.ajax({
        url: baseUrl + 'dashboard/ajaxBarChartBolder',
        type: 'get',
        data: {
            type: type, 
            bidang: $('#bidang').text(),
            tahun: $('#tahun').text(),
            provinsiid: provinsiid,
            dapil: $('.filter-dapil.opened').text()
        },
        beforeSend: function(){
            $('#' + chartid).html(loader)
        },
        success: function(res){
            let charBarBolder = Chart.getChart(chartid)
            if(charBarBolder != undefined){
                charBarBolder.destroy()
            }

            const ctxBarBolder = document.getElementById(chartid).getContext('2d');
            const labelsBarBolder = res.labels
            const dataBarBolder = {
                labels: labelsBarBolder,
                datasets: res.datasets
            };
            const configBarBolder = {
                type: 'bar',
                data: dataBarBolder,
                options: {
                    barPercentage: 0.3,
                    responsive: true,
                    scales: {
                        y: {
                            grid: {
                                display: false,
                                color: "rgba(255,99,132,0.2)"
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: ''
                        }
                    }
                },
            };
            const myChartBarBolder = new Chart(ctxBarBolder, configBarBolder);
        }
    })
}