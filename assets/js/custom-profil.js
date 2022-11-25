$(document).ready(function(){
    getDescText()
    loadPhotos()
})

$('.filter-dapil').click(function(){
    var id = $(this).attr('data-id')
    $('.filter-dapil.opened').removeClass('opened')
    $(this).addClass('opened')

    getDescText()
    loadPhotos()
})

$('#downloadPdf').click(function(event) {
    $(this).css('display', 'none')
    if(screen.width < 1024) {
        document.getElementById("viewport").setAttribute("content", "width=1200px");
    }
    const data = document.getElementById('reportPage');
    html2canvas(data, {
        allowTaint: true,
        removeContainer: true,
        backgroundColor: '#ffffff',
        imageTimeout: 15000,
        logging: true,
        useCORS: true
    }).then((canvas) => {
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
        doc.save('Download.pdf');
    });
    $(this).css('display', 'block')
});

function loadPhotos(){
    var dapil = $('.filter-dapil.opened').text()
    $('.text-foto').text('Profil Anggota ' + dapil)
    $.ajax({
        url: baseUrl + 'profil/foto',
        type: 'get',
        data: {dapil : dapil},
        success: function(res){
            $('.foto').html(res)
        }
    })
}

function getDescText(){
    $.ajax({
        url: baseUrl + 'dashboard/ajaxGetKabupaten',
        type: 'get',
        data: {dapil : $('.filter-dapil.opened').text()},
        success: function(res){
            $('.text-desc').text(res)
        }
    })
}