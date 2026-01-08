<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://fonts.cdnfonts.com/css/futura-pt" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <style>
        .error {
            color: #8a0404;
        }
        .swal2-confirm{
            width: 100%;
            background: var(--secondary-green);
            color: var(--white);
            padding: 1rem;
            border: none;
            border-radius: 12px;
            font-size: 1.0rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-top: 1rem;
            display: inline-flex;
        }
    </style>
</head>
<body>
@include('components.header')
<main>
    @yield('content')
</main>
@include('components.footer')
<!-- Bootstrap Modal JS -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->

<script>
    let csrf_token = $('meta[name="csrf-token"]').attr('content');

    /*** Send-Career ***/
    $('#cv-upload').on('change', function () {
        const fileName = this.files.length ? this.files[0].name : 'Upload CV';
        $('.file-upload-text').text(fileName);
    });

    let careerForm = $('#careerForm');
    let careerSubmitBtn = $('#careerSubmitBtn');

    careerForm.validate({
        rules: {
            careerName: {
                required: true,
            },
            careerEmail: {
                required: true,
                email: true
            },
            careerPhone: {
                required: true,
            },
            careerDepartment: {
                required: true,
            },
            careerCV: {
                required: true,
            },
            careerMessage: {
                required: true,
            }
        }
    });

    careerSubmitBtn.on('click', function(e) {
        e.preventDefault();
        if (careerForm.valid()) {
            let formData = new FormData(careerForm[0]);
            // let data = formData.entries();
            // console.log(formData, ...formData.entries(),);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{route('sendCareer')}}',
                async: true,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $.blockUI({
                        message: '<div class="d-flex justify-content-center align-items-center">' +
                            '<p class="me-50 mb-0" style="color: white; font-size:28px; font-weight:450;">Sending...</p></div>',
                        // '<br>'+
                        // '<div class="spinner-border text-white" role="status"></div>',
                        // timeout: 0,
                        css: {
                            backgroundColor: 'transparent',
                            border: '0'
                        },
                        overlayCSS: {
                            opacity: 0.5
                        }
                    });
                },
                complete: function() {
                    $.unblockUI();
                },
                success: function(response) {
                    // console.log(response);
                    if (response.success === true) {
                        Swal.fire({
                            title: '',
                            text: 'Send Successfully',
                            icon: 'success',
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false,
                            allowOutsideClick: false,
                            willOpen: () => {
                                // $('.swal2-confirm').css({ 'display': 'inline-flex', 'background-color': '#191c53' });
                                $('.swal2-deny').removeClass('btn btn-label-secondary');
                                $('.swal2-cancel').removeClass('btn-label-danger');
                                $('.swal2-cancel').addClass('btn-danger');
                            }
                        }).then((result) => {
                            // console.log(result);
                            if (result.isConfirmed) {
                                window.location = '/careers';
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // console.log(error);
                    Swal.fire({
                        title: 'Error',
                        text: 'Something went wrong.',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false,
                        allowOutsideClick: false,
                        willOpen: () => {
                            // $('.swal2-confirm').css({ 'display': 'inline-flex', 'background-color': '#191c53' });
                            $('.swal2-deny').removeClass('btn btn-label-secondary');
                            $('.swal2-cancel').removeClass('btn-label-danger');
                            $('.swal2-cancel').addClass('btn-danger');
                        }
                    }).then((result) => {
                        // console.log(result);
                        if (result.isConfirmed) {
                            window.location = '/careers';
                        }
                    });
                }
            });
        }
    });

    /*** Send-Contact ***/
    let contactForm = $('#contactForm');
    let contactSubmitBtn = $('#contactSubmitBtn');
    // console.log($(this), contactSubmitBtn, csrf_token);
    contactForm.validate({
        rules: {
            contactName: {
               required: true,
           },
            contactSubject: {
               required: true,
            },
            contactMessage: {
               required: true,
            }
        }
    });
    contactSubmitBtn.on('click', function(e) {
        e.preventDefault();
        // console.log($(this), csrf_token);
        let name = $('input[name="contactName"]');
        let subject = $('input[name="contactSubject"]');
        let message = $('textarea[name="contactMessage"]');
        if (contactForm.valid()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{route('sendContact')}}',
                async: true,
                data: {
                    'name': name.val(),
                    'subject': subject.val(),
                    'message': message.val()
                },
                beforeSend: function() {
                    $.blockUI({
                        message: '<div class="d-flex justify-content-center align-items-center">' +
                            '<p class="me-50 mb-0" style="color: white; font-size:28px; font-weight:450;">Sending...</p></div>',
                            // '<br>'+
                            // '<div class="spinner-border text-white" role="status"></div>',
                        // timeout: 0,
                        css: {
                            backgroundColor: 'transparent',
                            border: '0'
                        },
                        overlayCSS: {
                            opacity: 0.5
                        }
                    });
                },
                complete: function() {
                    $.unblockUI();
                },
                success: function(response) {
                    // console.log(response);
                    if (response.success === true) {
                        Swal.fire({
                            title: '',
                            text: 'Send Successfully',
                            icon: 'success',
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false,
                            allowOutsideClick: false,
                            willOpen: () => {
                                // $('.swal2-confirm').css({ 'display': 'inline-flex', 'background-color': '#191c53' });
                                $('.swal2-deny').removeClass('btn btn-label-secondary');
                                $('.swal2-cancel').removeClass('btn-label-danger');
                                $('.swal2-cancel').addClass('btn-danger');
                            }
                        }).then((result) => {
                            // console.log(result);
                            if (result.isConfirmed) {
                                window.location = '/contact';
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // console.log(error);
                    Swal.fire({
                        title: 'Error',
                        text: 'Something went wrong.',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false,
                        allowOutsideClick: false,
                        willOpen: () => {
                            // $('.swal2-confirm').css({ 'display': 'inline-flex', 'background-color': '#191c53' });
                            $('.swal2-deny').removeClass('btn btn-label-secondary');
                            $('.swal2-cancel').removeClass('btn-label-danger');
                            $('.swal2-cancel').addClass('btn-danger');
                        }
                    }).then((result) => {
                        // console.log(result);
                        if (result.isConfirmed) {
                            window.location = '/contact';
                        }
                    });
                }
            });
        }
    });
</script>

<script>
    window.addEventListener("scroll", function () {
        const nav = document.querySelector("nav");
        nav.classList.toggle("scrolled", window.scrollY > 50);
    });

    const counters = document.querySelectorAll(".stat-number");
    counters.forEach(counter => {
        const finalValue = counter.innerText.replace(/\D/g, "");
        const suffix = counter.innerText.replace(/[0-9]/g, "");

        let value = 0;
        const duration = 1400; // slightly slowed down
        const increment = finalValue / (duration / 16);

        const animate = () => {
            value += increment;

            if (value < finalValue) {
                counter.innerText = Math.floor(value) + suffix;
                requestAnimationFrame(animate);
            } else {
                counter.innerText = finalValue + suffix;
            }
        };

        animate();
    });

    // document.addEventListener('DOMContentLoaded', () => {
    //     // Run on load
        reorderServices();
    //     // Run on resize
        window.addEventListener("resize", reorderServices);
    // });

    // // Run on load
    // reorderFms();
    // // Run on resize
    // window.addEventListener("resize", reorderFms);


    /**** services-container ****/
    function reorderServices() {
        const container = document.getElementById("servicesContainer");
        const intro = document.getElementById("servicesIntro");
        const content = document.getElementById("servicesContent");
        const contentTitle = document.getElementById("servicesContentTitle");
        const contentCards = document.getElementById("servicesContentCards");
        // console.log(window.innerWidth);

        if (window.innerWidth <= 960) {
            // Mobile: content first
            if (container.firstElementChild !== contentTitle) {
                container.prepend(contentTitle);
                // container.prepend(intro);
            }
        } else {
            // Desktop: reset to original order (intro first)
            if (container.firstElementChild !== intro) {
                container.prepend(intro);
            }
        }
    }
    /**** services-container ****/

    /**** fms ****/
    function reorderFms() {
        const fmsContentGrid = document.getElementById("fmsContentGrid");
        const fmsPhoneShowcase = document.getElementById("fmsPhoneShowcase");
        const fmsTextContent = document.getElementById("fmsTextContent");
        // console.log(fmsContentGrid, fmsContentGrid.firstElementChild);

        if (window.innerWidth <= 960) {
            // Mobile: content first
            if (fmsContentGrid.firstElementChild !== fmsTextContent) {
                fmsContentGrid.prepend(fmsTextContent);
            }
        } else {
            // Desktop: reset to original order (fmsPhoneShowcase first)
            if (fmsContentGrid.firstElementChild !== fmsPhoneShowcase) {
                fmsContentGrid.prepend(fmsPhoneShowcase);
            }
        }
    }
    /**** fms ****/

</script>

</body>
</html>
