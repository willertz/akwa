// Loader


$( document ).ready(function() {
    document.querySelectorAll('[data-modal="consultation"]').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const $modal = $("#myModal");
            const $body = $("body");
            $modal.css("display", "flex");
            setTimeout(() => {
                $body.css("overflow", "hidden");
                $modal.addClass("active");
            }, 10);
        });
    });



    $('[main-item]').on('mouseenter', function () {
        let itemNumber = $(this).attr('main-item');
        let $infoItem = $('[info-item="' + itemNumber + '"]');
        let $logoItem = $('.logo_item');
        let $mainItem = $('.center-logo');

        $infoItem.addClass('active');
        $mainItem.removeClass('active');
        $logoItem.removeClass('active');
      });

      $('[main-item]').on('mouseleave', function () {
        let itemNumber = $(this).attr('main-item');
        let $infoItem = $('[info-item="' + itemNumber + '"]');
        let $logoItem = $('.logo_item');
        let $mainItem = $('.center-logo');

        $infoItem.removeClass('active');
        $mainItem.addClass('active');
        $logoItem.addClass('active');
      });


    function calculateContainerLeft() {
        const container = $('.container');
        const containerLeft = container.offset().left;
        $(document.documentElement).css('--container-left', containerLeft + 'px');
    }

    calculateContainerLeft();


    let animationPaused = false;

    // CSS animatsiyasini dinamik qo'shish
    const style = document.createElement('style');
    style.textContent = `
        .letter {
            animation: drawLetter 2s ease-in-out forwards;
        }

        .letter-1 { animation-delay: 0.2s; }
        .letter-2 { animation-delay: 0.4s; }
        .letter-3 { animation-delay: 0.6s; }
        .letter-4 { animation-delay: 0.8s; }
        .letter-5 { animation-delay: 1.0s; }
        .letter-6 { animation-delay: 1.2s; }
        .letter-7 { animation-delay: 1.4s; }
        .letter-8 { animation-delay: 1.6s; }
        .letter-9 { animation-delay: 1.8s; }
        .letter-10 { animation-delay: 2.0s; }

        @keyframes drawLetter {
            0% {
                stroke-dashoffset: 200;
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                stroke-dashoffset: 0;
                opacity: 1;
            }
        }

        .letter.paused {
            animation-play-state: paused;
        }

        .letter.restart {
            animation: none;
        }

        .glow {
            filter: drop-shadow(0 0 10px #000) drop-shadow(0 0 20px #000) drop-shadow(0 0 30px #000);
        }
    `;
    document.head.appendChild(style);

    function restartAnimation() {
        const letters = document.querySelectorAll('.letter');

        // Animatsiyani to'xtatish va qayta boshlash
        letters.forEach(letter => {
            letter.classList.add('restart');
            letter.style.strokeDashoffset = '200';
        });

        setTimeout(() => {
            letters.forEach(letter => {
                letter.classList.remove('restart', 'paused');
                letter.style.animation = 'none';
                letter.offsetHeight; // reflow
                letter.style.animation = null;
            });
            animationPaused = false;
        }, 50);
    }

    function toggleAnimation() {
        const letters = document.querySelectorAll('.letter');

        if (animationPaused) {
            letters.forEach(letter => {
                letter.classList.remove('paused');
            });
            animationPaused = false;
        } else {
            letters.forEach(letter => {
                letter.classList.add('paused');
            });
            animationPaused = true;
        }
    }

    // Sahifa yuklanganda glow effekti qo'shish
    setTimeout(() => {
        document.querySelector('svg').classList.add('glow');
    }, 4000);

    // Animatsiyani takrorlash (loop)
    setInterval(() => {
        if (!animationPaused) {
            restartAnimation();
        }
    }, 8000);


     // Swiper initialization
     const portfolio_one = new Swiper('.portfolio_one', {
        effect: "fade",
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        grabCursor: true,
        speed: 800,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.l_button',
            prevEl: '.r_button',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 40,
            },
        }
    });


    document.querySelectorAll('.more_one').forEach(function(btn, index) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            // Shu .swiper ichidagi barcha <a class="photo"> ni topamiz
            const swiper = btn.closest('.item_swiper');
            const galleryItems = swiper.querySelectorAll('.photo');

            // Temporary div yaratamiz lightGallery uchun
            const tempGallery = document.createElement('div');
            tempGallery.style.display = 'none';

            galleryItems.forEach((a) => {
                const newLink = document.createElement('a');
                newLink.href = a.href;
                newLink.dataset.subHtml = "";
                tempGallery.appendChild(newLink);
            });

            document.body.appendChild(tempGallery);

            const lg = lightGallery(tempGallery, {
                dynamic: true,
                dynamicEl: Array.from(galleryItems).map(a => ({
                    src: a.href,
                    thumb: a.querySelector('img').src,
                })),
                plugins: [lgZoom, lgThumbnail],
                thumbnail: true,
                zoom: true
            });

            // Galereyani ochamiz
            lg.openGallery(0);
        });
    });

    // Swiper initialization
    const portfolio_two = new Swiper('.portfolio_two', {
        effect: "fade",
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        grabCursor: true,
        speed: 800,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.left_button',
            prevEl: '.right_button',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 40,
            },
        }
    });

    document.querySelectorAll('.more_two').forEach(function(btn, index) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            // Shu .swiper ichidagi barcha <a class="photo"> ni topamiz
            const swiper = btn.closest('.item_swiper');
            const galleryItems = swiper.querySelectorAll('.photo');

            // Temporary div yaratamiz lightGallery uchun
            const tempGallery = document.createElement('div');
            tempGallery.style.display = 'none';

            galleryItems.forEach((a) => {
                const newLink = document.createElement('a');
                newLink.href = a.href;
                newLink.dataset.subHtml = "";
                tempGallery.appendChild(newLink);
            });

            document.body.appendChild(tempGallery);

            const lg = lightGallery(tempGallery, {
                dynamic: true,
                dynamicEl: Array.from(galleryItems).map(a => ({
                    src: a.href,
                    thumb: a.querySelector('img').src,
                })),
                plugins: [lgZoom, lgThumbnail],
                thumbnail: true,
                zoom: true
            });

            // Galereyani ochamiz
            lg.openGallery(0);
        });
    });

    const input = document.querySelector("#phone");

    // window.intlTelInput(input, {
    //   initialCountry: "ru",
    //   separateDialCode: true,
    //   utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js"
    // });

    const input_mobile = document.querySelector("#phone_mobile");

    // window.intlTelInput(input_mobile, {
    //   initialCountry: "ru",
    //   separateDialCode: true,
    //   utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js"
    // });

     // Swiper initialization
     const portfolio_three = new Swiper('.portfolio_three', {
        effect: "fade",
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        grabCursor: true,
        speed: 800,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.left_butt',
            prevEl: '.right_butt',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 40,
            },
        }
    });

    document.querySelectorAll('.more_three').forEach(function(btn, index) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            // Shu .swiper ichidagi barcha <a class="photo"> ni topamiz
            const swiper = btn.closest('.item_swiper');
            const galleryItems = swiper.querySelectorAll('.photo');

            // Temporary div yaratamiz lightGallery uchun
            const tempGallery = document.createElement('div');
            tempGallery.style.display = 'none';

            galleryItems.forEach((a) => {
                const newLink = document.createElement('a');
                newLink.href = a.href;
                newLink.dataset.subHtml = "";
                tempGallery.appendChild(newLink);
            });

            document.body.appendChild(tempGallery);

            const lg = lightGallery(tempGallery, {
                dynamic: true,
                dynamicEl: Array.from(galleryItems).map(a => ({
                    src: a.href,
                    thumb: a.querySelector('img').src,
                })),
                plugins: [lgZoom, lgThumbnail],
                thumbnail: true,
                zoom: true
            });

            // Galereyani ochamiz
            lg.openGallery(0);
        });
    });


    // Swiper initialization
    const portfolio_four = new Swiper('.portfolio_four', {
        effect: "fade",
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        grabCursor: true,
        speed: 800,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.left_butto',
            prevEl: '.right_butto',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 40,
            },
        }
    });

    document.querySelectorAll('.more_four').forEach(function(btn, index) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            // Shu .swiper ichidagi barcha <a class="photo"> ni topamiz
            const swiper = btn.closest('.item_swiper');
            const galleryItems = swiper.querySelectorAll('.photo');

            // Temporary div yaratamiz lightGallery uchun
            const tempGallery = document.createElement('div');
            tempGallery.style.display = 'none';

            galleryItems.forEach((a) => {
                const newLink = document.createElement('a');
                newLink.href = a.href;
                newLink.dataset.subHtml = "";
                tempGallery.appendChild(newLink);
            });

            document.body.appendChild(tempGallery);

            const lg = lightGallery(tempGallery, {
                dynamic: true,
                dynamicEl: Array.from(galleryItems).map(a => ({
                    src: a.href,
                    thumb: a.querySelector('img').src,
                })),
                plugins: [lgZoom, lgThumbnail],
                thumbnail: true,
                zoom: true
            });

            // Galereyani ochamiz
            lg.openGallery(0);
        });
    });


    const swiper_team = new Swiper('.swiper_team', {
        // effect: "slide",
        slidesPerView: 1,
        // spaceBetween: 30,
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
    });


    $('#closeModal').on('click', function(e) {
        e.preventDefault();
        const $body = $("body");
        $('#myModal').removeClass('active');
        setTimeout(() => {
            $body.css('overflow', 'auto');
            $('#myModal').css('display', 'none');
        }, 300);
    });


     const hamburger = document.getElementById('hamburger');
    let isOpen = false;
    const nav = document.getElementById('nav');
    const help_item = document.getElementById('help_item');
    hamburger.addEventListener('click', () => {
        isOpen = !isOpen;

        if (isOpen) {
            hamburger.classList.add('active');
            nav.classList.add('active');
            help_item.classList.add('active');
        } else {
            hamburger.classList.remove('active');
            nav.classList.remove('active');
            help_item.classList.remove('active');
        }
    });


    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('animate');
          }
        });
      });

      document.querySelectorAll('.step').forEach(step => {
        observer.observe(step);
      });


      $('.service a.more-service-btn').on('click', function(e) {
        e.preventDefault();

        var $service = $(this).closest('.service'); // Bosilgan a ning eng yaqin .service ota elementini topish

        // Agar joriy service active bo'lsa, uni yopish
        if ($service.hasClass('active')) {
            $service.removeClass('active');
        } else {
            // Avval barcha service lardan active classni olib tashlash
            $('.service').removeClass('active');

            // Faqat bosilgan elementning service iga active qo'shish
            $service.addClass('active');
        }
    });
});
