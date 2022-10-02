@push('script')
    <script>
        var swiper = new Swiper(".home-slider", {
            autoplay: true,
            pagination: true,
            speed: 1000,
            pagination: {
                el: ".swiper-pagination",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        var swiper = new Swiper(".testimonial-slider", {
            autoplay: true,
            pagination: true,
            speed: 1000,
            pagination: {
                el: ".swiper-pagination",
            },

        });
        var swiper = new Swiper(".partner-slider", {
            slidesPerView: 5,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>

    <script>
        // $('.portfolio-item').isotope({
        //  	itemSelector: '.item',
        //  	layoutMode: 'fitRows'
        //  });
        $('.portfolio-menu ul li').click(function () {
            $('.portfolio-menu ul li').removeClass('active');
            $(this).addClass('active');

            var selector = $(this).attr('data-filter');
            $('.portfolio-item').isotope({
                filter: selector
            });
            return false;
        });
        $(document).ready(function () {
            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>

    <script type="text/javascript">

        window.addEventListener("resize", function () {
            "use strict";
            window.location.reload();
        });


        document.addEventListener("DOMContentLoaded", function () {


            if (window.innerWidth > 992) {

                document.querySelectorAll('.navbar .nav-item').forEach(function (everyitem) {

                    everyitem.addEventListener('mouseover', function (e) {

                        let el_link = this.querySelector('a[data-bs-toggle]');

                        if (el_link != null) {
                            let nextEl = el_link.nextElementSibling;
                            el_link.classList.add('show');
                            nextEl.classList.add('show');
                        }

                    });
                    everyitem.addEventListener('mouseleave', function (e) {
                        let el_link = this.querySelector('a[data-bs-toggle]');

                        if (el_link != null) {
                            let nextEl = el_link.nextElementSibling;
                            el_link.classList.remove('show');
                            nextEl.classList.remove('show');
                        }


                    })
                });

            }

        });


    </script>
    <script>
        var swiper = new Swiper(".recognition-slider", {
            autoplay: true,
            pagination: true,
            speed: 1500,
            slidesPerView: '1',
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {

            window.addEventListener('scroll', function () {

                if (window.scrollY > 200) {
                    document.getElementById('navbar_top').classList.add('fixed-top');
                    // add padding top to show content behind navbar
                    navbar_height = document.querySelector('.navbar').offsetHeight;
                    document.body.style.paddingTop = navbar_height + 'px';
                } else {
                    document.getElementById('navbar_top').classList.remove('fixed-top');
                    // remove padding top from body
                    document.body.style.paddingTop = '0';
                }
            });
        });
        // DOMContentLoaded  end
    </script>
    <script>
        var swiper = new Swiper(".int-conf", {
            spaceBetween: 20,
            slidesPerView: 4,
            freeMode: true,
            autoplay: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".int-conf2", {
            spaceBetween: 10,
            autoplay: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#cloneRequester').on('click', function (e) {
                e.preventDefault();
                $("#AppendParent").append($("#refereeSection").clone());
            });
            $(document).on('click', '.course-cart', function (e) {
                e.preventDefault();
                let course_id = $(this).attr('course_id');
                $.ajax({
                    url: "{{ url('/addToCart') }}",
                    type: "POST",
                    data: {
                        "course_id": course_id,
                        "_token": "{{csrf_token()}}"
                    },
                    success: function (data) {
                        if (data.status == 200) {
                            toastr.success(data.message);
                        } else {
                            toastr.error(data.message);
                        }
                    },
                });
            });
            $(document).on('click', '.remove-product', function (e) {
                e.preventDefault();
                let course_id = $(this).attr('course_id');
                $.ajax({
                    url: "{{ url('/removeCart') }}",
                    type: "POST",
                    data: {
                        "course_id": course_id,
                        "_token": "{{csrf_token()}}"
                    },
                    success: function (data) {
                        if (data.status == 200) {
                            $('#cart'+course_id).remove();
                            toastr.success(data.message);
                        } else {
                            toastr.error(data.message);
                        }
                        window.location.reload();
                    },
                });
            });

        });
    </script>
@endpush
