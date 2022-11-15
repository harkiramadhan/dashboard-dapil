$(document).ready(function(){
    loadPhotos()
})

$('.filter-dapil').click(function(){
    var id = $(this).attr('data-id')
    $('.filter-dapil.opened').removeClass('opened')
    $(this).addClass('opened')

    loadPhotos()
})

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