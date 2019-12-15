$(window).on("load", function () {
    "use strict";


    //  ============= REQUISIÇÕES AJAX =========

    $('.loading').hide();

    $('#formUserConsumidor').submit((event) => {
        $('.loading').show();
        event.preventDefault();
        let data = $('#formUserConsumidor').serialize();
        $.ajax({
            url: "panel/app/helpers/validaLogin.php",
            type: "POST",
            data: data,
            dataType: "json"
        }).done(function (resposta) {
            $(".signup-tab").before(resposta.msg);
            $('#formUserConsumidor').each(function () { this.reset(); });
            console.log(resposta)
        }).fail(function (jqXHR, textStatus) {
            console.error("Request failed: " + textStatus);
        }).always(function () {
            $('.loading').hide();
            console.log("finish");
        });
    });

    $('a.btn-avaliar').click(function (e) {
        e.preventDefault();
        let id_user_avaliado = $(this).attr('alt');
        console.log(id_user_avaliado);
    });

    // avaliação
    $('.vote label i.fa').on('click', function () {
        // pegar o valor do input da estrela clicada
        var val = $(this).prev('input').val();
        var id = $(this).prev('input').attr('alt');
        // remove classe ativa de todas as estrelas
        $('#vote-box-' + id + ' label i.fa').removeClass('active');
        //percorrer todas as estrelas
        $('#vote-box-' + id + ' label i.fa').each(function () {
            /* checar de o valor clicado é menor ou igual do input atual
            *  se sim, adicionar classe active
            */
            var $input = $(this).prev('input');
            if ($input.val() <= val) {
                $(this).addClass('active');
            }
        });
        console.log(val, id)
        avaliar({val, id});
    });

    const avaliar = (data) => {
        $('.loading').show();
        event.preventDefault();
        $.ajax({
            url: "app/helpers/avaliar.php",
            type: "POST",
            data: data,
            dataType: "json"
        }).done(function (resposta) {
            console.log(resposta)
        }).fail(function (jqXHR, textStatus) {
            console.error("Request failed: " + textStatus);
        }).always(function () {
            $('.loading').hide();
            console.log("finish");
        });
    }
    //===========================================//

    $('#formUserVendedor').submit((event) => {
        $('.loading').show();
        event.preventDefault();
        let data = $('#formUserVendedor').serialize();
        $.ajax({
            url: "panel/app/helpers/validaLogin.php",
            type: "POST",
            data: data,
            dataType: "json"
        }).done(function (resposta) {
            $(".signup-tab").before(resposta.msg);
            $('#formUserVendedor').each(function () { this.reset(); });
            console.log(resposta)
        }).fail(function (jqXHR, textStatus) {
            console.error("Request failed: " + textStatus);
        }).always(function () {
            $('.loading').hide();
            console.log("finish");
        });
    });

    $('a.setLike').click(function (event) {
        event.preventDefault();
        $('.loading').show();
        var idForm = $(this).attr('alt');
        var idUser = $(`input[type=hidden][name=idUser_${idForm}]`).val();
        $.ajax({
            url: "app/helpers/like.php",
            type: "POST",
            data: `id_post=${idForm}&id_usuario=${idUser}`,
            dataType: "json"
        }).done(function (resposta) {
            console.log(resposta)
            if (resposta.msg == 'curtiu') {
                $(`a.setLike[alt=${idForm}]`).addClass('curtiu');
            } else {
                $(`a.setLike[alt=${idForm}]`).removeClass('curtiu');
            }
        }).fail(function (jqXHR, textStatus) {
            console.error("Request failed: " + textStatus);
        }).always(function () {
            $('.loading').hide();
            console.log("finish");
        });
    });
    $('button.setComentario').click(function (event) {
        event.preventDefault();
        var idForm = $(this).attr('alt');
        var idUser = $(`input[type=hidden][name=idUser_${idForm}]`).val();
        var comentario = $(`input[type=text][name=comentario_${idForm}]`).val();
        console.log(idForm, idUser, comentario);
        $.ajax({
            url: "app/helpers/coments.php",
            type: "POST",
            data: `comentario=${comentario}&id_post=${idForm}&id_usuario=${idUser}`,
            dataType: "json"
        }).done(function (resposta) {
            console.log(resposta)
        }).fail(function (jqXHR, textStatus) {
            console.error("Request failed: " + textStatus);
        }).always(function () {
            $('.loading').hide();
            location.reload();
            console.log("finish");
        });
    });

    $('a.seguir').click(function () {
        var data = $(this).attr('alt');
        $.ajax({
            url: 'app/helpers/seguidor.php',
            type: 'POST',
            data: 'id_seguidor=' + data,
            dataType: "json"
        }).done(function (resposta) {
            console.log(resposta)
        }).fail(function (jqXHR, textStatus) {
            console.error("Request failed: " + textStatus);
        }).always(function () {
            $('.loading').hide();
            location.reload();
            console.log("finish");
        });
    });
    //  ============= POST PROJECT POPUP FUNCTION =========

    $(".post_project").on("click", function () {
        $(".post-popup.pst-pj").addClass("active");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".post-project > a").on("click", function () {
        $(".post-popup.pst-pj").removeClass("active");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= POST JOB POPUP FUNCTION =========

    $(".post-jb").on("click", function () {
        $(".post-popup.job_post").addClass("active");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".post-project > a").on("click", function () {
        $(".post-popup.job_post").removeClass("active");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= SIGNIN CONTROL FUNCTION =========

    $('.sign-control li').on("click", function () {
        var tab_id = $(this).attr('data-tab');
        $('.sign-control li').removeClass('current');
        $('.sign_in_sec').removeClass('current');
        $(this).addClass('current animated fadeIn');
        $("#" + tab_id).addClass('current animated fadeIn');
        return false;
    });

    //  ============= SIGNIN TAB FUNCTIONALITY =========

    $('.signup-tab ul li').on("click", function () {
        var tab_id = $(this).attr('data-tab');
        $('.signup-tab ul li').removeClass('current');
        $('.dff-tab').removeClass('current');
        $(this).addClass('current animated fadeIn');
        $("#" + tab_id).addClass('current animated fadeIn');
        return false;
    });

    //  ============= SIGNIN SWITCH TAB FUNCTIONALITY =========

    $('.tab-feed ul li').on("click", function () {
        var tab_id = $(this).attr('data-tab');
        $('.tab-feed ul li').removeClass('active');
        $('.product-feed-tab').removeClass('current');
        $(this).addClass('active animated fadeIn');
        $("#" + tab_id).addClass('current animated fadeIn');
        return false;
    });

    //  ============= COVER GAP FUNCTION =========

    var gap = $(".container").offset().left;
    $(".cover-sec > a, .chatbox-list").css({
        "right": gap
    });

    //  ============= OVERVIEW EDIT FUNCTION =========

    $(".overview-open").on("click", function () {
        $("#overview-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#overview-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= EXPERIENCE EDIT FUNCTION =========

    $(".exp-bx-open").on("click", function () {
        $("#experience-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#experience-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= EDUCATION EDIT FUNCTION =========

    $(".ed-box-open").on("click", function () {
        $("#education-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#education-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= LOCATION EDIT FUNCTION =========

    $(".lct-box-open").on("click", function () {
        $("#location-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#location-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= SKILLS EDIT FUNCTION =========

    $(".skills-open").on("click", function () {
        $("#skills-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#skills-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= ESTABLISH EDIT FUNCTION =========

    $(".esp-bx-open").on("click", function () {
        $("#establish-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#establish-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= CREATE PORTFOLIO FUNCTION =========

    $(".portfolio-btn > a").on("click", function () {
        $("#create-portfolio").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#create-portfolio").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= EMPLOYEE EDIT FUNCTION =========

    $(".emp-open").on("click", function () {
        $("#total-employes").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#total-employes").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  =============== Ask a Question Popup ============

    $(".ask-question").on("click", function () {
        $("#question-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function () {
        $("#question-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });


    //  ============== ChatBox ============== 


    $(".chat-mg").on("click", function () {
        $(this).next(".conversation-box").toggleClass("active");
        return false;
    });
    $(".close-chat").on("click", function () {
        $(".conversation-box").removeClass("active");
        return false;
    });

    //  ================== Edit Options Function =================


    $(".ed-opts-open").on("click", function () {
        $(this).next(".ed-options").toggleClass("active");
        return false;
    });


    // ============== Menu Script =============

    $(".menu-btn > a").on("click", function () {
        $("nav").toggleClass("active");
        return false;
    });


    //  ============ Notifications Open =============

    $(".not-box-open").on("click", function () {
        $("#message").hide();
        $(".user-account-settingss").hide();
        $(this).next("#notification").toggle();
    });

    //  ============ Messages Open =============

    $(".not-box-openm").on("click", function () {
        $("#notification").hide();
        $(".user-account-settingss").hide();
        $(this).next("#message").toggle();
    });


    // ============= User Account Setting Open ===========
    /*
    $(".user-info").on("click", function(){$("#users").hide();
        $(".user-account-settingss").hide();
        $(this).next("#notification").toggle();
    });
     
    */
    $(".user-info").click(function () {
        $(".user-account-settingss").slideToggle("fast");
        $("#message").not($(this).next("#message")).slideUp();
        $("#notification").not($(this).next("#notification")).slideUp();
        // Animation complete.
    });


    //  ============= FORUM LINKS MOBILE MENU FUNCTION =========

    $(".forum-links-btn > a").on("click", function () {
        $(".forum-links").toggleClass("active");
        return false;
    });
    $("html").on("click", function () {
        $(".forum-links").removeClass("active");
    });
    $(".forum-links-btn > a, .forum-links").on("click", function () {
        e.stopPropagation();
    });

    //  ============= PORTFOLIO SLIDER FUNCTION =========

    $('.profiles-slider').slick({
        slidesToShow: 3,
        slck: true,
        slidesToScroll: 1,
        prevArrow: '<span class="slick-previous"></span>',
        nextArrow: '<span class="slick-nexti"></span>',
        autoplay: true,
        dots: false,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]


    });




});


