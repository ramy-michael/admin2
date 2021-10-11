$('.togglebutton').click(function() {
        if ($('.navbar-default').width() >= 220) { //your chosen mobile res
            
            $('.nav-label').hide(300);
            $('.profile-element').hide(100);
            $('.logo-element').show(200);
            $('.navbar-default').css( 'width' , '0%' );
            $('.page-heading').css( 'width' , '1221px' );
            $('#page-wrapper').css( 'margin-right' , '0px' );
            $('#page-wrapper').css( 'width' , '100%' );
        }
        else {
            $('.nav-label').show(500);
            $('.profile-element').show(300);
            $('.logo-element').hide(200);
            $('.navbar-default').css('width', '220px');
            $('.page-heading').css( 'width' , '1070px' );
            $('#page-wrapper').css( 'margin-right' , '220px' );
            $('#page-wrapper').css( 'width' , '83%' );
        }
    });