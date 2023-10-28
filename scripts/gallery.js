function Show(x){
    numImage=x;
    ChangeImage();
    $('.main').addClass('main_active');
    $('body').addClass('hidden');
    $('.btn_close').click(function () {
        $('.main').removeClass('main_active');
        $('body').removeClass('hidden');
    });

}