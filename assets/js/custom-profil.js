$('.filter-dapil').click(function(){
    var id = $(this).attr('data-id')
    $('.filter-dapil.opened').removeClass('opened')
    $(this).addClass('opened')
})