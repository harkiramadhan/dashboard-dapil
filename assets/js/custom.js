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
    $('.dapil-name').text($('.filter-dapil.opened').text())
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
    loadLineChart('APK SM', 'APK_SMA-chart')

    loadLineChart('APM SD', 'APM_SD-chart')
    loadLineChart('APM SMP', 'APM_SMP-chart')
    loadLineChart('APM SM', 'APM_SM-chart')
    loadTable()
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
            $('#div-' + chartid).height(res.height)
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
                    responsive: true,
                    aspectRatio: res.aspectRatio,
                    maintainAspectRatio: false,
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
            myChart.canvas.toDataURL()
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
            myChartLine.canvas.toDataURL()
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
            myChartBarBolder.canvas.toDataURL()
        }
    })
}

function loadTable(){
    $.ajax({
        url: baseUrl + 'dashboard/tbl',
        type: 'get',
        data: {
            bidang: $('#bidang').text(),
            tahun: $('#tahun').text(),
            provinsiid: provinsiid,
            dapil: $('.filter-dapil.opened').text()
        },
        beforeSend: function(){
    
        },
        success: function(res){
            $('.tbl-dapil').html(res)
            $('.tbl-dapil').css("color", "black")
        }
    })
}

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

$('#downloadPdf').click(function(event) {
    // html2canvas(document.querySelector("#reportPage")).then(canvas => {
    //     //$("#previewBeforeDownload").html(canvas); 
    //     var imgData = canvas.toDataURL("image/png",1);
    //     var pdf = new jsPDF("p", "pt", "letter");
    //     var pageWidth = pdf.internal.pageSize.getWidth();
    //     var pageHeight = pdf.internal.pageSize.getHeight();
    //     var imageWidth = canvas.width;
    //     var imageHeight = canvas.height;

    //     var ratio = imageWidth/imageHeight >= pageWidth/pageHeight ? pageWidth/imageWidth : pageHeight/imageHeight;
    //     //pdf = new jsPDF(this.state.orientation, undefined, format);
    //     pdf.addImage(imgData, 'PNG', 0, 0, imageWidth * ratio, imageHeight * ratio);
    //     pdf.save("invoice.pdf");
    // });

    // var quotes = document.getElementById('reportPage');
    // html2canvas(quotes).then((canvas) => {
    //     //! MAKE YOUR PDF
    //     var pdf = new jsPDF('l', 'pt', 'A3');

    //     for (var i = 0; i <= quotes.clientHeight/900; i++) {
    //         //! This is all just html2canvas stuff
    //         var srcImg  = canvas;
    //         var sX      = 0;
    //         var sY      = 900*i; // start 980 pixels down for every new page
    //         var sWidth  = 1200;
    //         var sHeight = 900;
    //         var dX      = 0;
    //         var dY      = 0;
    //         var dWidth  = 1200;
    //         var dHeight = 900;

    //         window.onePageCanvas = document.createElement("canvas");
    //         onePageCanvas.setAttribute('width', 1200);
    //         onePageCanvas.setAttribute('height', 900);
    //         var ctx = onePageCanvas.getContext('2d');
    //         // details on this usage of this function: 
    //         // https://developer.mozilla.org/en-US/docs/Web/API/Canvas_API/Tutorial/Using_images#Slicing
    //         ctx.drawImage(srcImg,sX,sY,sWidth,sHeight,dX,dY,dWidth,dHeight);

    //         // document.body.appendChild(canvas);
    //         var canvasDataURL = onePageCanvas.toDataURL("image/png", 1.0);

    //         var width         = onePageCanvas.width;
    //         var height        = onePageCanvas.clientHeight;

    //         //! If we're on anything other than the first page,
    //         // add another page
    //         if (i > 0) {
    //             pdf.addPage('A3'); //8.5" x 11" in pts (in*72)
    //         }
    //         //! now we declare that we're working on that page
    //         pdf.setPage(i+1);
    //         //! now we add content to that page!
    //         pdf.addImage(canvasDataURL, 'PNG', 20, 40, (width*.62), (height*.62));

    //     }
    //     //! after the for loop is finished running, we save the pdf.
    //     pdf.save('Test.pdf');
    // });

    const data = document.getElementById('reportPage');
    html2canvas(data).then((canvas) => {
        const imgWidth = 208;
        const pageHeight = 295;
        const imgHeight = (canvas.height * imgWidth) / canvas.width;
        let heightLeft = imgHeight;
        let position = 0;
        heightLeft -= pageHeight;
        const doc = new jsPDF('p', 'mm');
        doc.addImage(canvas, 'PNG', 0, position, imgWidth, imgHeight, '', 'FAST');
        while (heightLeft >= 0) {
            position = heightLeft - imgHeight;
            doc.addPage();
            doc.addImage(canvas, 'PNG', 0, position, imgWidth, imgHeight, '', 'FAST');
            heightLeft -= pageHeight;
        }
        doc.save('Downld.pdf');
    });
});