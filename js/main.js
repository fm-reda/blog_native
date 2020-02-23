var previousScroll = 0;

    $(window).scroll(function(){

      var currentScroll = $(this).scrollTop();

      if (currentScroll > 0 && currentScroll < $(document).height() - $(window).height()){

        if (currentScroll > previousScroll){
          window.setTimeout(hideNav, 300);

        } else if (currentScroll == previousScroll) {
          window.setTimeout(visibleNav, 300);
        }
         else {
          window.setTimeout(showNav, 300);
        }

        previousScroll = currentScroll;
      }

      /* make the scroll navigation disappear when it is scrolled on top */

      if ($(window).scrollTop() <= 150) {
          $('#navigation-scroll').css('display', 'none');
      } else {
        $('#navigation-scroll').css('display', 'flex');
      }

    });

    function hideNav() {
      $(".main-navigation-scroll").removeClass("is-visible").addClass("is-hidden");
    }
    function showNav() {
      $(".main-navigation-scroll").removeClass("is-hidden").addClass("is-visible");
      $(".main-navigation-scroll").addClass("shadow");
    }

  });