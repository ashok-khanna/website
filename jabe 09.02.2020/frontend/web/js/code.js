

$(document).ready(function () {

    $( ".tourItemImg, .tourItemSlide" ).hover(
        function() {
          $(this).siblings('.tourItemSlide').addClass("active");
          $(this).addClass("active");
        }, function() {
            $( this ).siblings('.tourItemSlide').removeClass("active");
            $(this).removeClass("active");
        }
      );

      $( ".tourItemImgM, .tourItemSlideM" ).hover(
        function() {
          $(this).siblings('.tourItemSlideM').addClass("tourItemSlideActiveM");          
        }, function() {
            $(this).siblings('.tourItemSlideM').removeClass("tourItemSlideActiveM");
        }
      );

      $( ".guidePhoto" ).hover(
        function() {
          $(this).siblings('.guideImgMain').css({ display: 'none' });
          $(this).siblings('.guideImgHover').css({ display: 'block' });
        }, function() {
            $(this).siblings('.guideImgMain').css({ display: 'block' });
            $(this).siblings('.guideImgHover').css({ display: 'none' });
            }
      );

    let searchContent = $('.searchdropdown');
    let searchContentM = $('.searchdropdownM')
    $( ".search input" ).keyup(function() {
        let text = $(this).val();        
        searchContent.empty();       
        let lang = $('html').attr('lang');                 
        let isHave = false;
        $.ajax({
            type: 'GET',
            url: '../../search/search',
            data: { 'data': text },
            success: function (data) {                
                if (data['service_category'] != null) {
                    isHave = true;
                    data['service_category'].forEach(function(item){                        
                        let cloned = lang == 'ru' ? item['name_rus'] : item['name_eng'];
                        searchContent.append('<div><a href="/site/tours/' + item['id'] +'">' + cloned + '</a></div>')
                    })
                }
                if (data['services'] != null) {
                    isHave = true;
                    data['services'].forEach(function (item) {
                        let cloned = lang == 'ru' ? item['name_rus'] : item['name_eng'];
                        searchContent.append('<div><a href="/site/sub_tours/' + item['id'] +'">' + cloned + '</a></div>')
                    })
                }
                
                if (data['news'] != null) {
                    isHave = true;
                    data['news'].forEach(function (item) {
                        let cloned = lang == 'ru' ? item['name_rus'] : item['name_eng'];
                        searchContent.append('<div><a href="/site/articles/' + item['id'] +'">' + cloned + '</a></div>')
                    })
                }                
                
                if(!isHave) {
                    searchContent.append('<div><a href="#">Ничего не найдена</a></div>');
                }
                else {
                    isHave = false;
                }
                searchContent.show();
            }
        })        
    });
    $("body").click(function() {
        $('.searchdropdown').hide();
    });

    $( ".mob-search input" ).keyup(function() {
        let text = $(this).val();
        searchContentM.empty();
        let lang = $('html').attr('lang');
        let isHave = false;
        $.ajax({
            type: 'GET',
            url: '../../search/search',
            data: { 'data': text },
            success: function (data) {
                if (data['service_category'] != null) {
                    isHave = true;
                    data['service_category'].forEach(function (item) {
                        let cloned = lang == 'ru' ? item['name_rus'] : item['name_eng'];
                        searchContentM.append('<div><a href="/site/tours/' + item['id'] + '">' + cloned + '</a></div>')
                    })
                }
                if (data['services'] != null) {
                    isHave = true;
                    data['services'].forEach(function (item) {
                        let cloned = lang == 'ru' ? item['name_rus'] : item['name_eng'];
                        searchContentM.append('<div><a href="/site/sub_tours/' + item['id'] + '">' + cloned + '</a></div>')
                    })
                }

                if (data['news'] != null) {
                    isHave = true;
                    data['news'].forEach(function (item) {
                        let cloned = lang == 'ru' ? item['name_rus'] : item['name_eng'];
                        searchContentM.append('<div><a href="/site/articles/' + item['id'] + '">' + cloned + '</a></div>')
                    })
                }

                if (!isHave) {
                    searchContentM.append('<div><a href="#">Ничего не найдена</a></div>');
                }
                else {
                    isHave = false;
                }
                searchContentM.show();
            }
        }) 
        // $('.searchdropdownM').show();
       });
    // $(body).click(function() {
    //     $('.searchdropdownM').hide();
    // });


    var one = true;
    var two = true;
    

    if($('div').hasClass('sub-tours__title')){
        var scrollPosM88 = $('.sub-tours__bannerBlock').offset().top;
    
    var onceM88 = false;
        $(window).scroll(function(){
            var scrolled88 = $(window).scrollTop();
            if ((scrolled88 > scrollPosM88) && !onceM88) {
                onceM88 = true;
                $('.line_long').addClass('active')
                setTimeout(function(){
                    $('.op1').addClass('active')
                    setTimeout(function(){
                        $('.op2').addClass('active')
                        setTimeout(function(){
                            $('.op3').addClass('active')
                            setTimeout(function(){
                                $('.line_sm').addClass('active')
                            }, 1000)
                        }, 500)
                    }, 500)
                }, 500)
            }
    
        
        });
    }
    
    

    //-------------form submit--------------
    $('body').on('click', '.submit', function (e) {
        e.preventDefault();
        var success = true;
        $('.not_empty').each(function () {
            var val = $(this).val();
            if(val == ''){
               $(this).addClass('error');success = false;
            } else{$(this).removeClass('error');}
            if($(this).hasClass('phone')){
                val = val.replace(/[^0-9]/g,'');
                if (val.length != "11") {$(this).addClass('error');success = false;
                }else{$(this).removeClass('error');}
            }
        });
        if(success){
            var loader = $(".load");
            var form = $(this).data('form');
            $.ajax({
                type: 'POST',
                url: 'mail/mail.php',
                data: $(form).serialize(),
                beforeSend: function () {
                    $(loader).attr('src', $(loader).data('assets')).show();
                    $(form).animate({
                        opacity: 0
                    }, 600, function () {
                        $(form).css({
                            visibility: 'hidden'
                        });
                    });
                },
                success: function (data) {
                    $(loader).hide();
                    $('.thanks').show();
                }
            })
        }
    });
    $('body').on('click', '.close, .modal-backdrop', function (e) {
        $('.thanks').hide(); $('form').css({opacity: 1, visibility: 'visible'});
    });
    $(".phone").inputmask("+7 (999) 999 99 99");
});
//-----------------------------------------------------------------------------------------------------------------



$('body').on('click', '.openPopupGuide', function() {
    let name = $(this).parent().find('.ChoosedGid').data('id');
    let img = $(this).parent().find('.ChoosedGid').data('img');
    $('#img_smile').attr('src', img);
    $('#choosedGid').val(name)
    $('.GuideName').text(name)
    $('.popupGuide').css({top: $(window).scrollTop() + 130 }).addClass('popupGuideActive');    
    $('.popupGuideBack').fadeIn();

    $('.popupGuideBack, .popupGuideCloseBtn').click(function(){
        $('.popupGuideAzamat').css({top: - 3000}).removeClass('popupGuideActive');
        $('.popupGuideBack').fadeOut();        
    });    
});

$('body').on('click', '.openPopupGuideM', function () {
    let parent = $('#carousel_guidesM').find('.owl-item.active');    
    let name = parent.find('.ChoosedGid').data('id');
    let img = parent.find('.ChoosedGid').data('img');
    $('#img_smile').attr('src', img);
    $('#choosedGid').val(name)
    $('.GuideName').text(name)
    $('.popupGuide').css({ top: $(window).scrollTop() + 130 }).addClass('popupGuideActive');
    $('.popupGuideBack').fadeIn();

    $('.popupGuideBack, .popupGuideCloseBtn').click(function () {
        $('.popupGuideAzamat').css({ top: - 3000 }).removeClass('popupGuideActive');
        $('.popupGuideBack').fadeOut();
    });
});

$('.submitGid').click(function (e) {
    let form = $('#formGuide');
    let lang = $('html').attr('lang');
    var loader = $(".load");
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: lang != 'ru' ? '../../../' + lang + '/site/chosed-guide' : '/site/chosed-guide',
        data: $(form).serialize(),
        beforeSend: function () {
            $(loader).attr('src', $(loader).data('assets')).show();
            $(form).animate({
                opacity: 0
            }, 600, function () {
                $(form).css({
                    visibility: 'hidden'
                });
            });
        },
        success: function (response) {
            console.log(response)
            $(loader).hide();
            $('.thanks').show();
        }
    })
})





$(window).scroll(function(){
    $('.popupGuideActive').css({ 'top': $(window).scrollTop() + 140 })
}).scroll();

// Ajax feedback
$('.submitForm2').click(function(e) {
    e.preventDefault();
    var page = $('.page_name').text();
    var text = $(this).text();
    let lang = $('html').attr('lang');
    var loader = $(".load");
    $('#page_name').val(page);
    $('#btn_name').val(text);
    var form = $(this).parents('form');
    $.ajax({
        type: 'POST',
        url: lang != 'ru' ? '../../../' + lang + '/site/mail' : '/site/mail',
        data: $(form).serialize(),
        beforeSend: function () {
            $(loader).attr('src', $(loader).data('assets')).show();
            $(form).animate({
                opacity: 0
            }, 600, function () {
                $(form).css({
                    display: 'none'
                });
            });
        },
        success: function (response) {
            console.log(response)
            $(loader).hide();
            $('.thanksForm').show();
        }
    })
})
$('.submitForm').click(function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    let lang = $('html').attr('lang');
    var loader = $(".load");
    console.log('sssss')
    $.ajax({
        type: 'POST',
        url: lang != 'ru' ? '../../../' + lang + '/site/mail' : '/site/mail',
        data: $(form).serialize(),
        beforeSend: function () {
            $(loader).attr('src', $(loader).data('assets')).show();
            $(form).animate({
                opacity: 0
            }, 600, function () {
                $(form).css({
                    visibility: 'hidden'
                });
            });
        },
        success: function (response) {
            console.log(response)
            $(loader).hide();
            $('.thanks').show();
        }
    })
});
//-----------------------MENU-POPUP--------------------

$('.openMenu').click(function(){
    $('.popupMenu').addClass('popupMenuActive');
    $('.popupGuideBack').fadeIn();
    $('header').css({ background: 'none' });
    $('body').css({overflow: 'hidden'});
    $('.menu').css({ display: 'none' })
    $('.popupMenuCloseBtn').css({ display: 'flex' })
    $('.popupGuideBack, .popupMenuCloseBtn, .closeMenu').click(function(){
        $('.popupMenu').removeClass('popupMenuActive');
        $('.popupGuideBack').fadeOut();
        $('header').css({ background: 'linear-gradient(to right, #3f3f3f, #000000)' });
        $('header').css({ display: 'block' });
        $('body').css({ overflow: 'visible' });
        $('.menu').css({ display: 'block' })
        $('.popupMenuCloseBtn').css({ display: 'none' })
    });
});



$(window).scroll(function(){
    $('.popupMenuActive').css({'top': $(window).scrollTop() + 0 })
}).scroll();

//-----------------------MAIN-POPUP--------------------

$('.openForm').click(function () {
    $('.popupForm').css({ top: $(window).scrollTop() + 250 }).addClass('popupFormActive');
    var page = $('.page_name').text();    
    var text = $(this).text();
    $('#page_name').val(page);
    $('#btn_name').val(text);
    $('.popupFormBack').fadeIn();

    $('.popupFormBack, .popupGuideCloseBtn').click(function () {
        $('.popupForm').css({ top: - 3000 }).removeClass('popupFormActive');
        $('.popupFormBack').fadeOut();
    });
});


$(window).scroll(function () {
    $('.popupFormActive').css({ 'top': $(window).scrollTop() + 200 })
}).scroll();
//-----------------------MAIN-POPUP-MOBILE--------------------

$('.openFormM').click(function () {
    var page = $('.page_name').text();
    var text = $(this).text();
    $('#page_nameM').val(page);
    $('#btn_name').val(text);
    $('.popupFormM').css({ top: $(window).scrollTop() + 150 }).addClass('popupFormActiveM');
    $('.popupFormBack').fadeIn();

    $('.popupFormBack, .popupGuideCloseBtn').click(function () {
        $('.popupFormM').css({ top: - 3000 }).removeClass('popupFormActiveM');
        $('.popupFormBack').fadeOut();
    });
});


$(window).scroll(function () {
    $('.popupFormActiveM').css({ 'top': $(window).scrollTop() + 150 })
}).scroll();

//-------------------PRELOADER------------------------

setTimeout(function(){
    $('.preloader').fadeOut(1000)
},2000);

// setTimeout(function(){
//     $('.aboutCompanyBox').addClass('aboutCompanyBox_active')
// },4000);

//---------------------ANIMATION-----------------------'
setTimeout(function(){
    $('.flareImgBanner').addClass('flareImgBannerActive')
},3000);

//-----------------------------SHARE DROPDOWN HOVER----------------------------------------------

// 
$('.mainCityChoiceBack').click(function () {
    $('.mainCityChoice').removeClass('mainCityChoiceActive');
    $('.mainCityChoice').hide()

});
$('.swiper-slide-choice').click(function () {
    $('.mainCityChoice').removeClass('mainCityChoiceActive');
    $('.mainCityChoice').hide()
});


$('.citiesMobOpen').click(function(){
    $('.menuItems').css({ display: 'none' });
    $('.citiesItemOpenM').css({ display: 'flex'});
});

$('.citiesItemOpenBackM').click(function(){
    $('.menuItems').css({ display: 'flex' });
    $('.citiesItemOpenM').css({ display: 'none'});
});


$('.toursMobOpen').click(function(){
    $('.menuItems').css({ display: 'none' });
    $('.toursItemOpenM').css({ display: 'flex'});
});

$('.toursItemOpenBackM').click(function(){
    $('.menuItems').css({ display: 'flex' });
    $('.toursItemOpenM').css({ display: 'none'});
});

function convertTimestamp(date) {
    var DateTime = new Date(date)
    var ms = DateTime.valueOf()
    var s = ms / (1000);       
    return parseInt(DateTime);
}

$('.baksetButton').click(function(){
    var dateFrom = $('#dateFrom').val();
    var dateTo = $('#dateTo').val();  
    var lang = $('body').attr('lang');  
    if (dateFrom.length === 0 && dateTo.length === 0) {
        let text = lang === 'ru' ? 'Заполните дату' : 'Required fields';
        $('.error_msg').show()
        $('.error_msg').text(text)
        return false;
    }
    $('.error_msg').hide()    
    $('.basketList').css({ left: '1%' });
    $('.customerForm').css({ right: '2%', opacity: '1'});
});


$('.baksetButtonM').click(function () {
    var dateFrom = $('#dateFromM').val();
    var dateTo = $('#dateToM').val();
    var lang = $('body').attr('lang');
    if (dateFrom.length === 0 && dateTo.length === 0) {
        let text = lang === 'ru' ? 'Заполните дату' : 'Required fields';
        $('.error_msgM').show()
        $('.error_msgM').text(text)
        return false;
    }
});

$(window).scroll(function() {
    var height = $(window).scrollTop();
    
         /*Если сделали скролл на 100px задаём новый класс для header*/
    if(height > 100){
    $('.header-left-mob').addClass('header-left-mob_afterScroll');
    } else{
         /*Если меньше 100px удаляем класс для header*/
    $('.header-left-mob').removeClass('header-left-mob_afterScroll');
    }
    
});


AOS.init({
    // Global settings:
    disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
    startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
    initClassName: 'aos-init', // class applied after initialization
    animatedClassName: 'aos-animate', // class applied on animation
    useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
    disableMutationObserver: false, // disables automatic mutations' detections (advanced)
    debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
    throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
    
  
    // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
    offset: 150, // offset (in px) from the original trigger point
    delay: 800, // values from 0 to 3000, with step 50ms
    duration: 400, // values from 0 to 3000, with step 50ms
    easing: 'ease', // default easing for AOS animations
    once: true, // whether animation should happen only once - while scrolling down
    mirror: false, // whether elements should animate out while scrolling past them
    anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
  
  });