$(document).ready(function(){

  $('.prod_wrapper').slick({
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrow: true,
    dots: false,
    prevArrow: '<button class="slide-arrow prev-arrow"> <i class="fa-solid fa-arrow-left"></i></button>',
    nextArrow: '<button class="slide-arrow next-arrow"> <i class="fa-solid fa-arrow-right"></i></button>',
    responsive: [
    {
      breakpoint: 1140,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }

    ]

  });


  // Add to cart 
  $('body').delegate(".minus","click",function(){

  // })
  // $(".minus").click(function () {
    var $input = $(this).parent().find("input");
    var count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
    $input.change();
    return false;
  });
  $('body').delegate(".plus","click",function(){
  // $(".plus").click(function () {
    var $input = $(this).parent().find("input");
    $input.val(parseInt($input.val()) + 1);
    $input.change();
    return false;
  });



  $('.testimonial-slider').slick({
    infinite: true,
    nav: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    responsive: [
    {
      breakpoint: 1140,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
        dots: true,
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }

    ]

  });


  var drop = document.querySelector(".navbar-toggler")
  drop.addEventListener("click", function () {
    drop.classList.toggle("open")
  })

  jQuery(document).ready(function(){
    $(".action-toggler").click(function(){
     var this_ = $(this);
     this_.find('.country-drop').toggle();
   })
  });

  $(function () {
    var overlay = $('<div id="overlay"></div>');
    overlay.show();
    overlay.appendTo(document.body);
    $(".popup-onload").show();
    $(".close_onload").click(function () {
      $(".popup-onload").hide();
      overlay.appendTo(document.body).remove();
      return false;
    });

    $(".x").click(function () {
      $(".popup").hide();
      overlay.appendTo(document.body).remove();
      return false;
    });
  });

  $(".video_click").click(function(e){
    e.preventDefault()
    $(this).parent().css("display", "none")
    $(this).parents(".video_show").children("iframe").css("display", "block")

  })


  var btn = $(".back_to_top");
  $(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
      btn.addClass("show");
    } else {
      btn.removeClass("show");
    }
  });
  // btn.on("click", function (e) {
  //   e.preventDefault();
  //   $("html, body").animate({ scrollTop: 0 }, "300");
  // });


  $("#show_hide_password a").on('click', function(event) {
    event.preventDefault();
    if($('#show_hide_password input').attr("type") == "text"){
      $('#show_hide_password input').attr('type', 'password');
      $('#show_hide_password i').addClass( "fa-eye-slash" );
      $('#show_hide_password i').removeClass( "fa-eye" );
    }else if($('#show_hide_password input').attr("type") == "password"){
      $('#show_hide_password input').attr('type', 'text');
      $('#show_hide_password i').removeClass( "fa-eye-slash" );
      $('#show_hide_password i').addClass( "fa-eye" );
    }
  });



});



// Step from start here 
// ------------step-wizard-------------
$(document).ready(function () {
  $(".nav-tabs > li a[title]").tooltip();

  //Wizard
  $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
    var target = $(e.target);

    if (target.parent().hasClass("disabled")) {
      return false;
    }
  });

  $(".next-step").click(function (e) {
    var active = $(".wizard .nav-tabs li.active");
    active.next().removeClass("disabled");
    nextTab(active);
  });
  $(".prev-step").click(function (e) {
    var active = $(".wizard .nav-tabs li.active");
    prevTab(active);
  });
});

function nextTab(elem) {
  $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
  $(elem).prev().find('a[data-toggle="tab"]').click();
}

$(".nav-tabs").on("click", "li", function () {
  $(".nav-tabs li.active").removeClass("active");
  $(this).addClass("active");
});

$(".slider-for").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  adaptiveHeight: true,
  asNavFor: ".slider-nav",
  centerMode: false,
});
$(".slider-nav").slick({
  slidesToShow: 8,
  slidesToScroll: 1,
  asNavFor: ".slider-for",
  dots: true,
  focusOnSelect: true,
  centerMode: false,
});

$("a[data-slide]").click(function (e) {
  e.preventDefault();
  var slideno = $(this).data("slide");
  $(".slider-nav").slick("slickGoTo", slideno - 1);
});
