// Optimized and modular JavaScript code
$(document).ready(function() {
    
    // ==== SAHIFA YUKLASH ANIMATSIYASI ====
    if ($('.loading').length) {
        window.addEventListener('load', () => {
            $('.loading').addClass('active');
            $('body').removeClass('hidden')
        });
    }

    // ==== HOVER EFFEKTLARI ====
    if ($('[main-item]').length) {
        $('[main-item]').hover(
            function() {
                const itemNumber = $(this).attr('main-item');
                $(`[info-item="${itemNumber}"]`).addClass('active');
                $('.center-logo, .logo_item').removeClass('active');
            },
            function() {
                const itemNumber = $(this).attr('main-item');
                $(`[info-item="${itemNumber}"]`).removeClass('active');
                $('.center-logo, .logo_item').addClass('active');
            }
        );
    }

    // ==== CONTAINER POSITION CALCULATOR ====
    if ($('.container').length) {
        function calculateContainerLeft() {
            const containerLeft = $('.container').offset().left;
            $(document.documentElement).css('--container-left', containerLeft + 'px');
        }
        calculateContainerLeft();
    }

    // ==== SVG ANIMATSIYA SISTEMA ====
    if ($('.letter').length) {
        let animationPaused = false;
        
        // CSS animatsiya uslublari
        const animationCSS = `
            .letter { animation: drawLetter 2s ease-in-out forwards; }
            ${Array.from({length: 10}, (_, i) => `.letter-${i+1} { animation-delay: ${0.2 * (i+1)}s; }`).join('')}
            @keyframes drawLetter {
                0% { stroke-dashoffset: 200; opacity: 0; }
                50% { opacity: 1; }
                100% { stroke-dashoffset: 0; opacity: 1; }
            }
            .letter.paused { animation-play-state: paused; }
            .letter.restart { animation: none; }
            .glow { filter: drop-shadow(0 0 10px #000) drop-shadow(0 0 20px #000) drop-shadow(0 0 30px #000); }
        `;
        
        $('<style>').text(animationCSS).appendTo('head');

        function restartAnimation() {
            const letters = $('.letter');
            letters.addClass('restart').css('stroke-dashoffset', '200');
            
            setTimeout(() => {
                letters.removeClass('restart paused').css('animation', 'none');
                letters[0].offsetHeight; // reflow
                letters.css('animation', '');
                animationPaused = false;
            }, 50);
        }

        // Glow effekt va takrorlash
        setTimeout(() => $('svg').addClass('glow'), 4000);
        setInterval(() => !animationPaused && restartAnimation(), 8000);
    }

    // ==== UNIVERSAL SWIPER FUNKSIYASI ====
    function initSwiper(className, navNext, navPrev) {
        if ($(`.${className}`).length) {
            return new Swiper(`.${className}`, {
                effect: "fade",
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                grabCursor: true,
                speed: 800,
                autoplay: { delay: 4000, disableOnInteraction: false },
                navigation: { nextEl: `.${navNext}`, prevEl: `.${navPrev}` },
                breakpoints: {
                    640: { slidesPerView: 1, spaceBetween: 20 },
                    768: { slidesPerView: 1, spaceBetween: 30 },
                    1024: { slidesPerView: 1, spaceBetween: 40 }
                }
            });
        }
    }

    // SWIPER INSTANCES
    const swipers = [
        { class: 'portfolio_one', next: 'l_button', prev: 'r_button' },
        { class: 'portfolio_two', next: 'left_button', prev: 'right_button' },
        { class: 'portfolio_three', next: 'left_butt', prev: 'right_butt' },
        { class: 'portfolio_four', next: 'left_butto', prev: 'right_butto' }
    ];

    swipers.forEach(swiper => initSwiper(swiper.class, swiper.next, swiper.prev));

    // ==== TEAM SWIPER ====
    if ($('.swiper_team').length) {
        new Swiper('.swiper_team', {
            slidesPerView: 1,
            loop: true,
            speed: 1000,
            autoplay: { delay: 4000, disableOnInteraction: false }
        });
    }

    // ==== UNIVERSAL GALLERY FUNKSIYASI ====
    function initGallery(buttonClass) {
        if ($(`.${buttonClass}`).length) {
            $(`.${buttonClass}`).on('click', function(e) {
                e.preventDefault();
                
                const swiper = $(this).closest('.item_swiper');
                const galleryItems = swiper.find('.photo');
                
                if (galleryItems.length && typeof lightGallery !== 'undefined') {
                    const tempGallery = $('<div>').hide().appendTo('body');
                    
                    const lg = lightGallery(tempGallery[0], {
                        dynamic: true,
                        dynamicEl: galleryItems.map((i, el) => ({
                            src: el.href,
                            thumb: $(el).find('img').attr('src')
                        })).get(),
                        plugins: [lgZoom, lgThumbnail],
                        thumbnail: true,
                        zoom: true
                    });
                    
                    lg.openGallery(0);
                }
            });
        }
    }

    // GALLERY BUTTONS
    ['more_one', 'more_two', 'more_three', 'more_four'].forEach(initGallery);

    // ==== TELEFON INPUT ====
    if (typeof intlTelInput !== 'undefined') {
        ['#phone', '#phone_mobile'].forEach(selector => {
            const input = document.querySelector(selector);
            if (input) {
                intlTelInput(input, {
                    initialCountry: "ru",
                    separateDialCode: true,
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js"
                });
            }
        });
    }

    // ==== MODAL OYNA ====
    if ($('#openModal, #closeModal').length) {
        $('#openModal').on('click', function(e) {
            e.preventDefault();
            const $modal = $('#myModal');
            $modal.css('display', 'flex');
            setTimeout(() => {
                $('body').css('overflow', 'hidden');
                $modal.addClass('active');
            }, 10);
        });

        $('#closeModal').on('click', function(e) {
            e.preventDefault();
            $('#myModal').removeClass('active');
            setTimeout(() => {
                $('body').css('overflow', 'auto');
                $('#myModal').css('display', 'none');
            }, 300);
        });
    }

    // ==== HAMBURGER MENU ====
    if ($('#hamburger').length) {
        let isOpen = false;
        const $hamburger = $('#hamburger');
        const $nav = $('#nav');
        const $helpItem = $('#help_item');
        
        $hamburger.on('click', () => {
            isOpen = !isOpen;
            [$hamburger, $nav, $helpItem].forEach($el => 
                $el.toggleClass('active', isOpen)
            );
        });
    }

    // ==== INTERSECTION OBSERVER ====
    if ($('.step').length && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                entry.isIntersecting && entry.target.classList.add('animate');
            });
        });
        
        $('.step').each((i, el) => observer.observe(el));
    }

    // ==== SERVICE ACCORDION ====
    if ($('.service').length) {
        $('.service a').on('click', function(e) {
            e.preventDefault();
            const $service = $(this).closest('.service');
            
            if ($service.hasClass('active')) {
                $service.removeClass('active');
            } else {
                $('.service').removeClass('active');
                $service.addClass('active');
            }
        });
    }

  // Har bir SELECT'ni ochish-yopish (boshqalar yopilmaydi)
  $('.select .selected').on('click', function (e) {
    e.stopPropagation();
    $(this).parent().toggleClass('open');
  });

  // Variant tanlanganda
  $('.select .options div').on('click', function () {
    var selectedText = $(this).text();
    var $selectBox = $(this).closest('.select');

    if (selectedText.trim() !== '') {
      // Matnni o‘zgartirish
      $selectBox.find('.selected').text(selectedText);

      // Dropdownni yopish
      $selectBox.removeClass('open');

      // ❌ Bu xatoga sabab bo‘lardi: hamma .selected dan back ni olib tashlaydi
      // $('.select .selected').removeClass('back');

      // ✅ To‘g‘risi: faqat o‘zidagi .selected ga qo‘shiladi
      $selectBox.find('.selected').addClass('back');
    }
  });

  // Tashqariga bosilsa barcha dropdownlarni yopish
  $(document).on('click', function () {
    $('.select').removeClass('open');
  });

  if ($('.swiper_images .swiper-slide').length > 1) {
    new Swiper('.swiper_images', {
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      loop: false,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        // clickable: true
      },
      spaceBetween: 30,
      slidesPerView: 1,
    });
  }

//   Lightgallery
    if (document.getElementById('infogallery')) {
        lightGallery(document.getElementById('infogallery'), {
            plugins: [lgZoom, lgThumbnail],
            speed: 500,
        });
    }
    if(('.catalog_btn').length) {
        $('.catalog_btn').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('active');
            $('.catalog').toggleClass('active');
            $('section').toggleClass('hidden');
            $('footer').toggleClass('hidden');
        });
    }
    $('.more_btn').on('click', function(e) {
        e.preventDefault();
    
        $(this).addClass('hid');
    
        var catalogItem = $(this).closest('.catalog_item');
    
        var hiddenItems = catalogItem.find('li.none');
    
        if (hiddenItems.length > 0) {
            hiddenItems.removeClass('none'); 
        }
    });

    const $selected = $('.selected');
    const $optionsContainer = $('.select_options');
    const $options = $('.option');

    // Select ochish-yopish
    $selected.on('click', function (e) {
      e.stopPropagation(); // tashqariga chiqmasin
      $optionsContainer.toggle();
    });

    // Option tanlanganda
    $options.on('click', function (e) {
      e.stopPropagation();
      const text = $(this).text();
      $selected.text(text);
      $options.removeClass('active');
      $(this).addClass('active');
      $optionsContainer.hide();
    });

    // Tashqariga bosilganda yopish
    $(document).on('click', function (e) {
      if (!$(e.target).closest('.custom_select').length) {
        $optionsContainer.hide();
      }
    });

    let totalPrice = 0;

    $('.item_basket').on('click', function (e) {
        e.preventDefault();

        // Narxni topish
        let priceText = $(this).closest('.shop_item').find('.price').text();
        let number = parseInt(priceText.replace(/\D/g, ''));

        // Narxni qo‘shish
        totalPrice += number;

        // Narxni chiqarish
        let formattedPrice = totalPrice.toLocaleString('ru-RU') + ' ₽';
        $('.basket_btn span').text('' + formattedPrice);

        // Active class qo‘shish
        $('.basket_btn').addClass('active');
        $(this).addClass('active');
    });

    if ($('.item_favourito').length) {
        $('.item_favourito').on('click', function (e) {
            e.preventDefault();
            $(this).toggleClass('active');
        });
    }

    $('.plus').on('click', function () {
        let $input = $(this).siblings('.number_inp');
        let current = parseInt($input.val());
  
        if (isNaN(current)) {
          current = 1;
        }
  
        $input.val(current + 1);
      });
  
    $('.minus').on('click', function () {
        let $input = $(this).siblings('.number_inp');
        let current = parseInt($input.val());

        if (isNaN(current)) {
            current = 1;
        }

        if (current > 1) {
            $input.val(current - 1);
        }
    });

    if ($('.delete_btn').length) {
        $('.delete_btn').on('click', function (e) {
            e.preventDefault();
            $(this).closest('.basket_item').remove();
        });
    }

    $('.delete_btn').on('click', function () {
        // Tegishli basket_item dan active'ni olib tashlaymiz
        $(this).closest('.basket_item').removeClass('active');
  
        // Endi qolgan basket_item.active larni tekshiramiz
        const hasAnyActive = $('.left_side .row .basket_item.active').length > 0;
  
        if (!hasAnyActive) {
          $('.non_product').addClass('active');
          $('.all_price').removeClass('active');
          $('.delivery.none').removeClass('none');
        } else {
          $('.non_product').removeClass('active');
        //   $('.all_price').removeClass('active');
        $('.left_side .row').addClass('active');
        }
      });


      function calculateTotalPrice() {
        let total = 0;
  
        $('.basket_item.active').each(function () {
          const $item = $(this);
  
          // Narxni olish (matndan raqamni ajratib)
          const priceText = $item.find('.price').text();
          const price = parseInt(priceText.replace(/\D/g, ''));
  
          // Soni (inputdagi qiymat)
          const count = parseInt($item.find('.number_inp').val());
  
          // Tekshirish (NaN bo‘lsa, 0)
          if (!isNaN(price) && !isNaN(count)) {
            total += price * count;
          }
        });
  
        // Jami narxni ko‘rsatish
        $('.all_price span').text(total.toLocaleString('ru-RU') + ' ₽');
      }
  
      // Sahifa yuklanganda hisobla
      calculateTotalPrice();
  
      // Har safar input o‘zgarishida yoki + / – bosilganda qayta hisobla
      $(document).on('click', '.plus, .minus, .delete_btn', function () {
        setTimeout(calculateTotalPrice, 50); // ozgina kechikish: DOM yangilanishi uchun
      });
  
      $(document).on('input', '.number_inp', function () {
        calculateTotalPrice();
      });
    
    if ($('.delivery_item').length) {
        $('.delivery_item').on('click', function (e) {
            e.preventDefault();
            $(this).addClass('active');
            $('.delivery_item').not(this).removeClass('active');
            $('.right_input').removeClass('active');
        });
    }

    
    if ($('.delivery_item.last').length) {
        $('.delivery_item.last').on('click', function (e) {
            e.preventDefault();
            $('.right_input').addClass('active');
        });
    }
    

    $('.item_favourito').on('click', function (e) {
        e.preventDefault();
  
        // O‘zi tegishli bo‘lgan .shop_item dan active'ni olib tashlaymiz
        $(this).closest('.shop_item').removeClass('active');
        // $(this).removeClass('active');
  
        // .right_row ichidagi faolligini tekshiramiz
        const hasAnyActive = $('.right_row .shop_item.active').length > 0;
  
        if (!hasAnyActive) {
          $('.no_favourite_item').addClass('active');
        } else {
          $('.no_favourite_item').removeClass('active');
        }
    });

    if ($('.top_item.swiper').length > 0) {
        const mySwiper = new Swiper('.top_item.swiper:not(.item_bottom)', {
          loop: true,
          slidesPerView: 1,
        });
    
        const bottomSwiper = new Swiper('.top_item.swiper.item_bottom', {
          loop: true,
          slidesPerView: 6,
          spaceBetween: 10,
        });
    
        // Tugmalarni sinxron ishlashga ulaymiz
        $('.right_btn').on('click', function () {
          mySwiper.slideNext();
          bottomSwiper.slideNext();
        });
    
        $('.left_btn').on('click', function () {
          mySwiper.slidePrev();
          bottomSwiper.slidePrev();
        });
      }

});