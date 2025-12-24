<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>TruBoard | Home</title>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5TTGKQP9');</script>
<!-- End Google Tag Manager -->
    <script>
        $(document).ready(function() {
            $(".case-study-thumbnail-img").first().show()
            $('.case-study').click(function() {
                // Get the id from the 'for' attribute of the clicked label
                const targetId = $(this).attr('for');

                // Hide all images first
                $('.case-study-thumbnail-img').hide();

                // Show the one matching the target id
                $('#' + targetId).fadeToggle();
            });
        });

        $(document).ready(function() {
            $('.toggle-tab-btn').on('click', function() {
                const targetId = $(this).attr('for');
                $(".toggle-tab-btn").removeClass("toggle-tab-btn-active")
                $(this).addClass("toggle-tab-btn-active")

                // Hide all tab contents
                $('.tab-content').hide();

                // Show the selected tab content
                $('#' + targetId).fadeToggle();


            });

            // Optionally trigger the first tab by default
            $('.toggle-tab-btn').first().click();
        });

        $(document).ready(function() {
            let animated = false;

            function animateCounters() {
                $('.number').each(function() {
                    const $this = $(this);
                    const countTo = parseFloat($this.attr('data-count'));
                    const isMoney = $this.text().includes('$');
                    const decimalPlaces = countTo % 1 !== 0 ? 1 : 0;
                    let suffix = '';

                    // Get the class name to determine the suffix
                    const className = $this.attr('class').split(' ')[1]; // Get the second class (gw, bn, mw)
                    if (className) {
                        suffix = className.toUpperCase() + '+';
                        // if(suffix)
                    }

                    $({
                        val: 0
                    }).animate({
                        val: countTo
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function(now) {
                            const formatted = now.toFixed(decimalPlaces);
                            if (isMoney) {
                                $this.text(formatted + '$');
                            } else {
                                if (suffix == 'BN+') {
                                    $this.text('USD ' + formatted + ' ' + suffix);
                                } else {
                                    $this.text(formatted + ' ' + suffix);
                                }
                            }
                        },
                        complete: function() {
                            const formatted = countTo.toFixed(decimalPlaces);
                            if (isMoney) {
                                $this.text(formatted + '$');
                            } else {
                                if (suffix == 'BN+') {
                                    $this.text('USD ' + formatted + ' ' + suffix);
                                } else {
                                    $this.text(formatted + ' ' + suffix);
                                }
                            }
                        }
                    });
                });
            }

            function isElementInViewport(el) {
                const rect = el.getBoundingClientRect();
                return (
                    rect.top < window.innerHeight &&
                    rect.bottom > 0
                );
            }

            $(window).on('scroll', function() {
                const $recordGrid = document.querySelector('.record-grid');

                if (isElementInViewport($recordGrid)) {
                    if (!animated) {
                        animateCounters();
                        animated = true;
                    }
                } else {
                    animated = false;
                }
            });

            // Optional: check if already in view on load
            $(window).trigger('scroll');

        });
    </script>

    <style>
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .toast {
            background: #fff;
            border-radius: 8px;
            padding: 16px 24px;
            margin-bottom: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            min-width: 300px;
            transform: translateX(120%);
            transition: transform 0.3s ease-in-out;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast.success {
            border-left: 4px solid #00AD6F;
        }

        .toast.error {
            border-left: 4px solid #ff4444;
        }

        .toast-icon {
            margin-right: 12px;
        }

        .toast-icon.success {
            color: #00AD6F;
        }

        .toast-icon.error {
            color: #ff4444;
        }

        .toast-message {
            flex-grow: 1;
            color: #333;
            font-size: 14px;
        }

        .toast-close {
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
            padding: 0;
            margin-left: 12px;
        }
    </style>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5TTGKQP9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class="navbar">
        <div class="container">
            <a href="index.html" class="brand">
                <img src="./img/brand-logo/Truboard-Cleantech-logo-white-08.png" alt="" srcset="">
            </a>
            <nav>
                <ul class="primary-nav">
                    <li class="nav-item">
                        <a href="Trugreen.html" class="nav-link">TruGreen</a>
                    </li>
                    <li class="nav-item">
                        <a href="Asset-Lifecycle-Management.html" class="nav-link"> Asset Lifecycle Management</a>
                    </li>
                    <li class="nav-item">
                        <a href="TruEleqtric.html" class="nav-link">TruEleqtric</a>
                    </li>
                    <li class="nav-item">
                        <a href="resources.html" class="nav-link">Resource</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="resources.html" class="nav-link">Resource</a>
                    </li> -->
                </ul>
            </nav>

            <span class="mobile-menu-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12" />
                    <line x1="3" y1="6" x2="21" y2="6" />
                    <line x1="3" y1="18" x2="21" y2="18" />
                </svg>
                <div class="option-dropdown-wrapper">
                    <div class="option-dropdown">
                        <ul class="option-dropdown-list">
                            <li class="option-dropdown-item"><a href="./About-us.html"
                                    class="option-dropdown-link">About Us</a></li>
                            <li class="option-dropdown-item"><a href="./Career.html"
                                    class="option-dropdown-link">Career</a></li>
                            <li class="option-dropdown-item"><a href="./Contact-us.html"
                                    class="option-dropdown-link">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </span>

        </div>
    </div>

    <section class="hero-section">
        <img src="./img/banners/Truboard-homepage-hero-section-banner.jpg" alt="" class="hero-section-img">
        <div class="container">
            <div class="content-info-wrapper">
                <div class="content-info">
                    <h1 class="hero-section-title">
                        A Digital-First Asset-Management Platform Powering the Energy Transition
                    </h1>
                    <p class="hero-section-description">
                        From sourcing and design to financing and operations, we integrate services, products, and
                        platforms to maximize performance, uptime, and ROI for your renewable energy assets.
                    </p>

                    <div class="hero-email-capture-wrapper-2">
                        <form id="emailForm" onsubmit="return false;">

                            <div class="hero-email-capture-wrapper">
                                <input type="email" id="userEmail" class="hero-email-capture-input-container"
                                    placeholder="ENTER YOUR EMAIL" required>
                                <div class="hero-email-capture-container">
                                    <button type="submit" onclick="submitEmail()">GET IN TOUCH</button>
                                    <div class="hero-email-capture-line"></div>
                                </div>
                            </div>

                        </form>


                        <div class="hero-email-capture-text">
                            Trusted by energy professionals in <strong>100+</strong> organizations worldwide
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="our-track-record-section">
            <div class="section-header">
                <h1 class="section-header-title section-header-title-white">
                    Our Impact
                </h1>
                <p class="section-header-description ">
                    Proven expertise across renewable-energy lifecycles from engineering and finance to procurement and
                    operations.
                </p>
            </div>
            <div class="record-grid">
                <div class="record-grid-item">
                    <h1 class="number gw" data-count="14">14 GW+</h1>
                    <div class="text-wrapper">
                        <p>
                            Engineering &amp; Technical DD
                        </p>
                        <p>
                            Projects Engineered &amp; Validated
                        </p>
                    </div>
                </div>
                <div class="record-grid-item record-grid-item-2">
                    <h1 class="number bn" data-count="1.9">USD 1.9 BN+</h1>
                    <div class="text-wrapper">
                        <p>
                            Fundraise &amp; Advisory
                        </p>
                        <p>
                            Debt Secured for Renewables
                        </p>
                    </div>
                </div>
                <div class="record-grid-item">
                    <h1 class="number gw" data-count="5">5 GW+</h1>
                    <div class="text-wrapper">
                        <p>
                            Procurement as a Service (PaaS)
                        </p>
                        <p>
                            Equipment Sourced &amp; Delivered
                        </p>

                    </div>
                </div>
                <div class="record-grid-item">
                    <h1 class="number mw" data-count="5">5 MW+</h1>
                    <div class="text-wrapper">
                        <p> Asset Management &amp; O&amp;M</p>
                        <p>Solar O&amp;M Capacity Maintained</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- numbers section starts here  -->
    <section class="section-common-margin" data-aos="fade-up" data-aos-duration="1000" style="display: none;">
        <div class="container our-track-record-section">
            <div class="section-header">
                <h1 class="section-header-title section-header-title-white">
                    Our Impact
                </h1>
                <p class="section-header-description ">
                    Proven expertise across renewable-energy lifecycles from engineering and finance to procurement and
                    operations.
                </p>
            </div>
            <div class="record-grid">
                <div class="record-grid-item">
                    <h1 class="number gw" data-count="14">
                        14 GW+
                    </h1>
                    <div class="text-wrapper">
                        <p>
                            Engineering & Technical DD
                        </p>
                        <p>
                            Projects Engineered & Validated
                        </p>
                    </div>
                </div>
                <div class="record-grid-item record-grid-item-2">
                    <h1 class="number bn" data-count="1.9">
                        USD 1.9 Bn+
                    </h1>
                    <div class="text-wrapper">
                        <p>
                            Fundraise & Advisory
                        </p>
                        <p>
                            Debt Secured for Renewables
                        </p>
                    </div>
                </div>
                <div class="record-grid-item">
                    <h1 class="number gw" data-count="5">
                        5 GW+
                    </h1>
                    <div class="text-wrapper">
                        <p>
                            Procurement as a Service (PaaS)
                        </p>
                        <p>
                            Equipment Sourced & Delivered
                        </p>

                    </div>
                </div>
                <div class="record-grid-item">
                    <h1 class="number mw" data-count="5">
                        5 MW+
                    </h1>
                    <div class="text-wrapper">
                        <p> Asset Management & O&M</p>
                        <p>Solar O&M Capacity Maintained</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Logo Carousel Section -->
    <section class="lg-logo-carousel-section trusted-by-section" data-aos="fade-up" data-aos-duration="1000">
        <div class="section-header">
            <h1 class="section-header-title">
                Trusted by 20+ Leading Renewable Energy & Asset Owners
            </h1>
        </div>
        <div>
            <h1 class="logo-header-wrapper">

            </h1>
            <div class="lg-logo-carousel">
                <div class="lg-logo-container">
                    <img src="./img/truboard-client-logo/01.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/2.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/3.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/4.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/5.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/6.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/7.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/8.png" alt="Logo 1" class="lg-logo-item">
                    <!-- Duplicate logos for infinite scroll -->
                    <img src="./img/truboard-client-logo/01.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/2.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/3.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/4.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/5.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/6.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/7.png" alt="Logo 1" class="lg-logo-item">
                    <img src="./img/truboard-client-logo/8.png" alt="Logo 1" class="lg-logo-item">
                </div>
            </div>
        </div>
    </section>

    <section class="feature-section section-common-margin">
        <div class="container">
            <div class="section-header" data-aos="zoom-in" data-aos-duration="1000">
                <h1 class="section-header-title">
                    Why Global Companies Trust Us?
                </h1>
                <p class="section-header-description primary-text-color">
                    Empowering enterprises with adaptable, data-driven solutions and unwavering support for every stage
                    of operation
                </p>
            </div>

            <div class="feature-card-grid">
                <figure class="feature-card" data-aos="zoom-in-down" data-aos-duration="1000">
                    <div class="feature-card-img-wrapper">
                        <!-- <img src="./icons/Unified Digital  Ecosystem.jpg" alt="" class="feature-icon"> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"
                            fill="none">
                            <path
                                d="M50.2265 0.574951C52.0885 0.977364 54.0134 1.19359 55.7973 1.81823C61.9866 3.97444 66.3021 8.16374 68.7195 14.272C69.4763 16.185 70.155 16.4102 71.9298 15.3201C74.969 13.4552 78.8549 13.8846 81.3595 16.3652C83.9001 18.8787 84.3716 22.8218 82.4977 25.8819C81.3025 27.8339 81.7739 28.7769 84.0353 28.9421C87.9092 29.2274 91.0024 32.6209 91.0024 36.5849C91.0024 40.597 87.8732 43.9815 83.9211 44.2368C83.6959 44.2518 83.4707 44.2548 83.2455 44.2548C62.386 44.2548 41.5266 44.2728 20.6672 44.2428C14.7571 44.2338 9.77199 40.3328 8.45064 34.666C7.35151 29.9511 8.50469 25.7528 12.1054 22.4704C15.7752 19.125 20.0936 18.2271 24.8625 19.7917C25.0757 19.8608 25.2799 19.9599 25.4901 20.0349C26.9196 20.5545 27.6704 20.107 27.9677 18.5935C29.7875 9.37399 35.2201 3.52999 44.3285 1.15455C45.3705 0.881266 46.4547 0.764145 47.5178 0.574951C48.4187 0.574951 49.3196 0.574951 50.2205 0.574951H50.2265Z" />
                            <path
                                d="M47.9923 47.423H51.1095C51.1095 47.9065 51.1095 48.342 51.1095 48.7774C51.1095 61.1922 51.1185 73.6099 51.0914 86.0247C51.0914 86.8776 51.2836 87.325 52.1335 87.6854C54.8573 88.8416 56.2628 91.7936 55.6261 94.7396C55.0375 97.4664 52.4488 99.5446 49.5959 99.5746C46.776 99.6046 44.1303 97.5505 43.4906 94.8297C42.8059 91.9137 44.1723 88.8986 46.8871 87.7304C47.8391 87.322 48.0133 86.8205 48.0133 85.8926C47.9833 73.5529 47.9923 61.2102 47.9923 48.8675V47.42V47.423Z" />
                            <path
                                d="M33.9169 77.1265V47.441H36.9891V48.6483C36.9891 58.3993 36.9891 68.1473 36.9891 77.8983C36.9891 79.8473 36.5836 80.2437 34.6016 80.2437C32.1631 80.2437 29.7276 80.2648 27.2891 80.2317C26.6344 80.2227 26.3251 80.4179 26.0608 81.0546C24.8596 83.9345 21.9466 85.412 18.9135 84.7664C16.1447 84.1808 14.0395 81.514 14.0725 78.6341C14.1056 75.7091 16.1777 73.1745 19.0126 72.5949C22.0097 71.9822 24.8686 73.4387 26.0548 76.2917C26.3431 76.9854 26.6945 77.1535 27.3762 77.1385C29.5084 77.0995 31.6376 77.1235 33.9169 77.1235V77.1265Z" />
                            <path
                                d="M62.1847 47.4381H65.1818V77.1206C67.6474 77.1206 69.9657 77.1506 72.2811 77.0786C72.5544 77.0695 72.8907 76.535 73.0559 76.1806C74.14 73.8412 76.4824 72.3367 78.975 72.4328C81.5216 72.5289 83.7829 74.1656 84.6448 76.535C85.789 79.6732 84.2424 83.1838 81.1552 84.4571C78.0801 85.7244 74.4614 84.328 73.146 81.2558C72.7766 80.397 72.3232 80.2078 71.4793 80.2258C68.9687 80.2768 66.4551 80.2588 63.9416 80.2378C62.6923 80.2288 62.1217 79.6822 62.1217 78.469C62.1097 68.3065 62.1157 58.1441 62.1217 47.9817C62.1217 47.8345 62.1547 47.6904 62.1877 47.4411L62.1847 47.4381Z" />
                            <path
                                d="M76.2966 47.4292H79.2456V61.0061H83.1196C83.4199 61.0061 83.7232 60.9791 84.0175 61.0091C85.6842 61.1803 86.8824 60.9821 87.8014 59.1112C89.0417 56.5856 92.282 55.7357 94.9577 56.6787C97.6515 57.6277 99.3152 60.2644 99.075 63.2044C98.8557 65.8982 96.6995 68.2105 93.9337 68.7181C91.2249 69.2166 88.2879 67.712 87.2218 65.1264C86.8644 64.2585 86.423 64.0513 85.5641 64.0693C83.0535 64.1203 80.5429 64.0963 78.0324 64.0843C76.7801 64.0783 76.1825 63.5558 76.1764 62.3485C76.1524 57.5136 76.1704 52.6786 76.1764 47.8436C76.1764 47.7385 76.2335 47.6334 76.2936 47.4292H76.2966Z" />
                            <path
                                d="M19.8234 47.426H22.8775C22.8985 47.8495 22.9346 48.2128 22.9346 48.5792C22.9376 53.0028 22.9406 57.4263 22.9346 61.8498C22.9346 63.6487 22.4811 64.0871 20.6672 64.0901C18.2317 64.0901 15.7932 64.1172 13.3577 64.0751C12.619 64.0631 12.2436 64.2553 11.9403 64.9821C10.7871 67.7569 7.82905 69.2915 4.99114 68.6789C2.04511 68.0452 0.0060196 65.5526 1.34305e-05 62.5796C-0.00599274 59.6456 2.00307 57.114 4.84699 56.4713C7.76899 55.8106 10.736 57.2942 11.9283 60.1201C12.2346 60.8438 12.613 61.039 13.3427 61.024C15.4659 60.9819 17.5891 61.009 19.8174 61.009V47.429L19.8234 47.426Z" />
                        </svg>
                    </div>
                    <figcaption class="feature-card-caption">
                        <h1 class="feature-card-caption-item feature-card-caption-item-title">
                            Tailored Modular <br> Architecture
                        </h1>
                        <ul class="feature-card-caption-item-description">
                            <li class="primary-text-color">
                                Customize modules to fit your workflows
                            </li>
                            <li class="primary-text-color">
                                Scale effortlessly without system overhauls
                            </li>
                        </ul>


                    </figcaption>
                </figure>
                <figure class="feature-card" data-aos="zoom-in-down" data-aos-duration="1000">
                    <div class="feature-card-img-wrapper">
                        <!-- <img src="./icons/Collaborative  Data Hub.jpg" alt="" class="feature-icon"> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="99" height="99" viewBox="0 0 99 99" fill="none">
                            <path
                                d="M85.2764 0C87.0236 0.421928 88.6489 1.03996 90.0305 2.27604C92.9365 4.87595 93.7714 9.40425 91.8965 12.8658C89.9533 16.4493 85.9331 18.1786 82.0674 17.0822C81.5563 16.9366 81.1819 16.8623 80.7451 17.3763C75.5929 23.4349 70.4109 29.4637 65.2348 35.5044C65.1338 35.6232 65.0476 35.754 65.0744 35.7153C66.1827 37.6289 67.3831 39.373 68.2477 41.2688C70.3366 45.8505 70.4911 50.5898 68.848 55.3469C68.5449 56.2264 68.6905 56.5889 69.4957 57.0346C74.3271 59.7058 79.1258 62.4305 83.9185 65.1671C84.4623 65.4761 84.8188 65.4821 85.3447 65.0988C88.2359 62.9891 92.0748 62.9416 95.0432 64.9205C97.9521 66.8578 99.4348 70.5601 98.6682 73.9622C97.8838 77.4476 94.9689 80.1188 91.4419 80.5794C85.8439 81.3133 81.1641 76.788 81.696 71.19C81.7227 70.9018 81.5177 70.4353 81.28 70.2986C76.101 67.3392 70.9041 64.4124 65.6062 61.4203C62.9469 64.7006 59.622 67.0212 55.48 68.293C55.7206 70.0817 55.9524 71.8467 56.1961 73.6057C56.4962 75.7866 56.826 77.9646 57.1053 80.1485C57.1855 80.7814 57.3876 81.1291 58.0739 81.3311C61.9515 82.4602 64.593 86.3972 64.1295 90.2481C63.5798 94.7883 60.2965 97.9082 55.8187 98.1399C51.8609 98.345 48.0665 95.4033 47.1543 91.4218C46.358 87.9423 47.8377 84.3351 50.8803 82.3592C51.2577 82.1156 51.6054 81.9403 51.5162 81.343C50.919 77.3377 50.3574 73.3264 49.772 69.223C42.4418 68.9764 36.7844 65.7228 32.7137 59.5959C32.4284 59.6939 32.161 59.7682 31.9055 59.8752C27.5287 61.7234 23.1579 63.5864 18.7752 65.4167C18.2047 65.6544 17.9848 65.9308 17.9491 66.5874C17.7441 70.1916 15.9999 72.8688 12.6691 74.2564C9.38578 75.6262 6.27777 75.0438 3.57684 72.6876C2.13574 71.4307 1.28297 69.8083 0.905613 67.9364C0.861043 67.7195 0.792703 67.5085 0.733276 67.2976C0.733276 66.6587 0.733276 66.0199 0.733276 65.3811C0.780818 65.2622 0.849158 65.1493 0.869957 65.0275C1.42262 61.8036 3.22919 59.5157 6.24212 58.342C9.45709 57.0881 12.4581 57.6734 15.0551 59.9822C15.5513 60.4249 15.9405 60.416 16.4962 60.1783C20.864 58.3093 25.2437 56.4671 29.6205 54.613C29.9028 54.4941 30.1702 54.3456 30.4049 54.2267C28.4765 46.2992 30.7169 39.7207 36.3892 34.1405C33.9794 30.5274 31.5994 26.938 29.1718 23.3814C29.0114 23.1466 28.4617 23.0367 28.1259 23.0872C24.8753 23.6042 21.3573 22.0591 19.5953 19.2928C17.7144 16.3453 17.756 12.4885 19.6963 9.71624C22.4061 5.8446 27.6594 4.82246 31.5756 7.40752C35.4502 9.96286 36.5229 15.0943 34.0716 19.168C33.9111 19.4354 33.8933 19.9733 34.0597 20.2228C36.2733 23.6191 38.5404 26.9796 40.7719 30.364C41.072 30.8186 41.3246 30.9672 41.8475 30.7057C42.4745 30.3967 43.1371 30.15 43.8056 29.9421C49.3769 28.2068 54.7074 28.7624 59.7616 31.7041C60.3173 32.0279 60.6441 32.0636 61.1106 31.5169C66.1559 25.5772 71.228 19.6613 76.3149 13.7543C76.7249 13.2789 76.7992 12.9461 76.5169 12.3488C74.8976 8.91101 75.8514 4.73332 78.6771 2.22255C80.038 1.01322 81.6455 0.4249 83.3569 0.00891475H85.2734L85.2764 0Z" />
                        </svg>
                    </div>
                    <figcaption class="feature-card-caption">
                        <h1 class="feature-card-caption-item feature-card-caption-item-title">
                            Data-First Domain <br> Expertise
                        </h1>
                        <ul class="feature-card-caption-item-description">
                            <li class="primary-text-color">
                                Leverage deep industry insights for strategic decisions
                            </li>
                            <li class="primary-text-color">
                                Unlock actionable data to maximize operational ROI
                            </li>
                        </ul>
                    </figcaption>
                </figure>
                <figure class="feature-card" data-aos="zoom-in-down" data-aos-duration="1000">
                    <div class="feature-card-img-wrapper">
                        <!-- <img src="./icons/AI-Driven  Predictions.jpg" alt="" class="feature-icon"> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="98" height="110" viewBox="0 0 98 110"
                            fill="none">
                            <path
                                d="M47.3023 109.601C46.8028 109.429 46.3033 109.26 45.807 109.081C42.3335 107.851 39.9086 104.605 39.9119 100.87C39.9119 99.4445 39.4289 98.7299 38.1982 98.0352C30.7284 93.8173 23.3114 89.5034 15.8912 85.1962C15.2527 84.8256 14.816 84.7462 14.1478 85.2292C9.59904 88.5176 3.67079 85.957 1.54363 82.3114C-0.973893 77.9909 0.686813 72.2843 5.19586 69.9951C6.05598 69.5584 6.36695 69.1184 6.36034 68.1458C6.31733 59.3494 6.33056 50.5529 6.3438 41.7565C6.3438 41.0452 6.25447 40.5986 5.46713 40.2446C0.852221 38.177 -0.983817 32.4506 1.46093 27.9713C3.90898 23.4854 9.81738 21.9471 14.075 24.7723C14.8987 25.3181 15.4314 25.3082 16.2518 24.8252C23.5662 20.5048 30.9004 16.2074 38.2611 11.9697C39.2668 11.3907 39.6704 10.7919 39.7101 9.59769C39.8887 4.27814 43.713 0.500204 48.7116 0.54321C53.3861 0.582908 57.3096 4.23844 57.4419 8.91951C57.4882 10.5637 58.0407 11.437 59.4599 12.2376C66.7544 16.3464 73.9861 20.5709 81.2211 24.7822C82.0415 25.2619 82.6138 25.3612 83.5103 24.7624C87.758 21.9372 93.6863 23.5119 96.1079 28.0011C98.5328 32.5002 96.6835 38.1704 92.062 40.2711C91.45 40.549 91.2018 40.8467 91.2052 41.5414C91.2283 50.543 91.2382 59.5479 91.1952 68.5494C91.1919 69.4393 91.6948 69.6345 92.2902 69.9355C96.227 71.9105 98.1523 76.1119 97.0672 80.3067C96.0384 84.2765 92.191 87.105 87.9201 86.7245C86.3818 86.5889 84.8601 85.8611 83.421 85.2094C82.7958 84.9249 82.412 84.7628 81.7768 85.1333C74.039 89.6291 66.288 94.1051 58.527 98.5645C57.9183 98.9152 57.6999 99.2989 57.6933 100.01C57.6338 105.098 55.4173 107.96 50.4517 109.452C50.3822 109.472 50.3293 109.554 50.2665 109.607H47.2924L47.3023 109.601ZM54.6101 93.8967C62.7416 89.2057 70.8499 84.5345 78.9384 79.8171C79.2362 79.6417 79.4545 79.0264 79.4247 78.636C79.1502 74.8349 80.9366 71.5466 84.3208 69.9454C85.0784 69.5849 85.3067 69.178 85.3034 68.3675C85.2637 59.5313 85.2504 50.6952 85.267 41.859C85.267 41.0585 85.0685 40.635 84.3043 40.2678C81.0193 38.6865 79.0774 35.3121 79.4446 31.8055C79.5438 30.8726 79.2726 30.4392 78.4786 29.986C70.8136 25.6093 63.1717 21.1962 55.543 16.7599C54.8483 16.3563 54.3984 16.3265 53.7003 16.8128C50.6932 18.9102 46.9087 18.9301 43.9578 16.8591C43.2333 16.3497 42.7503 16.3464 42.0059 16.7731C34.3277 21.2061 26.6328 25.6093 18.9215 29.9893C18.2433 30.3763 18.0481 30.77 18.1143 31.5441C18.4319 35.2162 16.5561 38.5641 13.2612 40.1421C12.5036 40.506 12.2687 40.8997 12.272 41.7168C12.3018 50.5959 12.3018 59.4718 12.272 68.3509C12.272 69.1515 12.4705 69.5816 13.238 69.9421C16.5793 71.5069 18.4848 74.8614 18.1143 78.4971C18.0349 79.2811 18.2532 79.6682 18.9182 80.0486C26.4344 84.3526 33.9307 88.6863 41.4336 93.0101C41.9596 93.3144 42.4922 93.6055 43.005 93.8934C46.9186 91.002 50.766 91.0748 54.6002 93.9066L54.6101 93.8967Z" />
                            <path
                                d="M28.0388 46.5798C28.4556 46.7882 28.7798 46.9305 29.0875 47.1091C34.374 50.1593 39.667 53.2028 44.9337 56.2893C45.3207 56.5176 45.7773 57.0469 45.7806 57.4406C45.8335 64.004 45.8169 70.5707 45.8169 77.2764C45.4365 77.1044 45.1454 76.9985 44.8774 76.8463C39.8722 73.9682 34.8768 71.0736 29.8649 68.2054C28.6971 67.5371 27.976 66.6406 27.976 65.2479C27.976 59.2171 27.976 53.1896 27.9793 47.1588C27.9793 47.0066 28.009 46.8577 28.0388 46.5798Z" />
                            <path
                                d="M66.516 41.4092C64.4749 42.5869 62.4867 43.7414 60.4919 44.8894C56.8826 46.9669 53.2833 49.061 49.6477 51.0922C49.2407 51.3204 48.513 51.3965 48.1358 51.1848C42.6409 48.0851 37.1824 44.9257 31.714 41.7731C31.5056 41.654 31.3237 41.4952 31.0458 41.2934C36.1139 38.3524 41.1026 35.4511 46.098 32.5664C46.7365 32.1959 47.3882 31.7129 48.0829 31.6103C48.8074 31.5012 49.7105 31.5839 50.3324 31.9378C55.6421 34.945 60.9054 38.0315 66.1819 41.0982C66.2779 41.1544 66.3506 41.2537 66.516 41.4092Z" />
                            <path
                                d="M51.7649 77.4055C51.7649 71.7055 51.9899 66.2437 51.6789 60.815C51.5003 57.6921 52.5126 56.0512 55.265 54.6684C59.7542 52.4155 64.0118 49.6995 68.3687 47.182C68.7127 46.9835 69.0733 46.8115 69.5398 46.5667C69.5729 46.8412 69.6026 46.9901 69.6026 47.1357C69.6026 53.1235 69.6026 59.1113 69.6126 65.0991C69.6126 66.2569 69.2586 67.2692 68.2562 67.8548C62.8506 71.0174 57.4219 74.1337 51.7649 77.4022V77.4055Z" />
                        </svg>
                    </div>
                    <figcaption class="feature-card-caption">
                        <h1 class="feature-card-caption-item feature-card-caption-item-title">
                            Rapid Integration & <br> Deployment
                        </h1>
                        <ul class="feature-card-caption-item-description">
                            <li class="primary-text-color">
                                Integrate legacy assets and OEM systems seamlessly
                            </li>
                            <li class="primary-text-color">
                                Deploy quickly to minimize downtime
                            </li>
                        </ul>
                    </figcaption>
                </figure>
                <figure class="feature-card" data-aos="zoom-in-down" data-aos-duration="1000">
                    <div class="feature-card-img-wrapper">
                        <!-- <img src="./icons/Future-Ready  Architecture.jpg" alt="" class="feature-icon"> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="102" height="99" viewBox="0 0 102 99"
                            fill="none">
                            <path
                                d="M72.0452 0.0749512C73.0056 0.315482 73.9757 0.524364 74.9266 0.796544C82.6581 2.99614 88.0139 9.9304 88.0584 17.9375C88.1093 26.8562 88.0775 35.7717 88.0679 44.6903C88.0679 46.8393 86.799 47.5988 84.7667 46.8994C83.3673 46.4183 81.8885 46.1018 80.4191 45.9119C78.759 45.6967 78.0529 45.0733 78.0529 43.3547C78.0465 35.2241 78.0529 27.0967 78.0497 18.9661C78.0497 13.3232 74.7199 10.0317 69.0206 10.0317C52.3459 10.0317 35.6743 10.0317 18.9996 10.0317C13.3194 10.0317 10.0087 13.3358 10.0055 19.0009C10.0055 35.5913 10.0055 52.1816 10.0055 68.7751C10.0055 74.4307 13.3258 77.738 19.0091 77.738C28.1782 77.738 37.3504 77.757 46.5194 77.719C47.9506 77.7127 48.7711 78.2476 49.4835 79.4914C50.3836 81.058 51.5413 82.4885 52.6957 83.8905C53.3223 84.6533 53.7961 85.378 53.4145 86.3528C53.0169 87.3719 52.1773 87.7042 51.1151 87.7042C39.9869 87.6916 28.8556 87.7517 17.7274 87.6726C9.09271 87.6124 1.62199 81.077 0.244889 72.5761C0.200364 72.3007 0.0826899 72.0349 0 71.7659C0 53.1785 0 34.5943 0 16.007C0.0795095 15.7791 0.184462 15.5576 0.228988 15.3202C1.7015 7.72764 6.20174 2.87271 13.612 0.647794C14.3976 0.410428 15.2086 0.264844 16.01 0.0749512C34.6884 0.0749512 53.3668 0.0749512 72.0452 0.0749512Z" />
                            <path
                                d="M80.2281 55.5427C80.7147 56.201 81.1059 56.565 81.2903 57.0144C82.3844 59.6539 83.4594 62.3029 84.4803 64.9709C85.9464 68.8099 88.6116 71.3893 92.4662 72.8262C95.1123 73.8136 97.7393 74.858 100.344 75.9531C100.799 76.1429 101.314 76.6683 101.39 77.1082C101.438 77.3962 100.808 77.9628 100.373 78.14C97.7615 79.216 95.1282 80.2446 92.4821 81.2384C88.5925 82.6974 85.9051 85.3148 84.4389 89.2044C83.4466 91.8376 82.3876 94.4486 81.284 97.0407C81.0932 97.4901 80.5684 97.9996 80.1263 98.0724C79.8401 98.1199 79.274 97.4996 79.0927 97.0691C77.9541 94.36 76.8823 91.6224 75.8042 88.8848C74.4239 85.3812 72.0036 82.8968 68.4957 81.4853C65.7192 80.3681 62.9173 79.3142 60.1567 78.1653C59.6956 77.9723 59.0945 77.4469 59.0786 77.0576C59.0658 76.6905 59.6733 76.1366 60.1281 75.9467C62.6183 74.8991 65.1245 73.8895 67.6592 72.9591C71.7397 71.4589 74.5289 68.7371 76.0364 64.6639C76.9841 62.1004 78.0241 59.5716 79.0736 57.0492C79.2708 56.5776 79.7097 56.2042 80.2249 55.5491L80.2281 55.5427Z" />
                            <path
                                d="M41.9174 55.878H25.5861C25.0582 57.5459 24.4603 59.2518 23.9928 60.9893C23.6334 62.3217 22.9305 62.98 21.5025 62.8155C20.8855 62.7427 20.2526 62.8091 19.6293 62.8028C17.8896 62.787 17.3617 62.0939 17.8864 60.4481C19.0822 56.7009 20.2972 52.96 21.5057 49.2128C24.1613 40.9746 26.8456 32.7491 29.4439 24.4919C29.8733 23.131 30.5666 22.6056 31.9596 22.6974C33.2445 22.7829 34.5453 22.767 35.8333 22.7006C37.0737 22.6341 37.7097 23.131 38.0882 24.3242C40.9601 33.3599 43.886 42.3798 46.7961 51.4061C47.7629 54.4 48.7393 57.394 49.6966 60.3912C50.2468 62.1097 49.7316 62.806 47.9092 62.7965C43.6761 62.7743 44.3854 63.2775 43.0464 59.2993C42.6648 58.1694 42.3022 57.0332 41.9237 55.8749L41.9174 55.878ZM27.6088 49.8015H40.0092C37.9578 43.5097 35.9351 37.3033 33.9124 31.1002C33.817 31.1192 33.7215 31.135 33.6261 31.154C31.632 37.3318 29.6411 43.5097 27.6088 49.8046V49.8015Z" />
                            <path
                                d="M65.0386 42.804C65.0386 48.7761 65.0386 54.7514 65.0386 60.7235C65.0386 62.3851 64.6379 62.7839 62.9936 62.7934C62.2844 62.7965 61.5752 62.8029 60.8691 62.7934C59.5238 62.7712 59.0595 62.325 59.0436 61.0084C59.0245 59.5968 59.0404 58.1885 59.0404 56.7769C59.0404 46.1587 59.0404 35.5374 59.0404 24.9192C59.0404 23.0804 59.3902 22.7323 61.2094 22.726C61.7501 22.726 62.2939 22.726 62.8346 22.726C64.6824 22.7291 65.0418 23.0773 65.0418 24.8812C65.0418 30.8534 65.0418 36.8287 65.0418 42.8008L65.0386 42.804Z" />
                        </svg>
                    </div>
                    <figcaption class="feature-card-caption">
                        <h1 class="feature-card-caption-item feature-card-caption-item-title">
                            Continuous Innovation & <br> End-to-End Support
                        </h1>
                        <ul class="feature-card-caption-item-description">
                            <li class="primary-text-color">
                                Receive monthly updates and agile feature roadmaps
                            </li>
                            <li class="primary-text-color">
                                Access AI alerts, analytics, and dedicated support
                            </li>
                        </ul>
                    </figcaption>
                </figure>
            </div>
        </div>
    </section>

    <section class="slider-section section-common-margin priamry-product-slider" data-aos="fade-up"
        data-aos-duration="1000">
        <div class="container">
            <!-- Slider main container -->
            <div class="product-slider-wrapper">
                <div class="swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="29" viewBox="0 0 28 29" fill="none">
                        <path
                            d="M14 28.5C6.56055 28.5 0.500001 22.2487 0.500001 14.5C0.500002 6.75133 6.56055 0.499998 14 0.499999C21.4395 0.499999 27.5 6.75133 27.5 14.5C27.5 22.2487 21.4395 28.5 14 28.5Z"
                            fill="white" stroke="#063E63" />
                        <path
                            d="M8.46967 13.4697C8.17678 13.7626 8.17678 14.2374 8.46967 14.5303L13.2426 19.3033C13.5355 19.5962 14.0104 19.5962 14.3033 19.3033C14.5962 19.0104 14.5962 18.5355 14.3033 18.2426L10.0607 14L14.3033 9.75736C14.5962 9.46447 14.5962 8.98959 14.3033 8.6967C14.0104 8.4038 13.5355 8.4038 13.2426 8.6967L8.46967 13.4697ZM18.5 14L18.5 13.25L9 13.25L9 14L9 14.75L18.5 14.75L18.5 14Z"
                            fill="#063E63" />
                    </svg>
                </div>
                <div class="swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="29" viewBox="0 0 28 29" fill="none">
                        <path
                            d="M14 0.5C21.4395 0.5 27.5 6.75133 27.5 14.5C27.5 22.2487 21.4395 28.5 14 28.5C6.56055 28.5 0.5 22.2487 0.5 14.5C0.5 6.75133 6.56055 0.5 14 0.5Z"
                            fill="white" stroke="#063E63" />
                        <path
                            d="M19.5303 15.5303C19.8232 15.2374 19.8232 14.7626 19.5303 14.4697L14.7574 9.6967C14.4645 9.40381 13.9896 9.40381 13.6967 9.6967C13.4038 9.98959 13.4038 10.4645 13.6967 10.7574L17.9393 15L13.6967 19.2426C13.4038 20.2269 13.4038 20.7018 13.6967 20.9947C13.9896 21.2876 14.4645 21.2876 14.7574 20.9947L19.5303 16.2217ZM9.5 15L9.5 15.75L19 15.75L19 15L19 14.25L9.5 14.25L9.5 15Z"
                            fill="#063E63" />
                    </svg>
                </div>
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides 1-->
                        <div class="swiper-slide">
                            <div class="slider-card priamry-product-slider-card">
                                <div class="slider-card-img-wrapper">
                                    <img src="./img/Product images/Nexus.jpg" alt="" class="slider-card-img">
                                    <div class="slider-card-caption-wrapper">
                                        <div class="slider-card-caption" data-aos="fade-up" data-aos-duration="1000">
                                            <div class="btn-con-swip">
                                                <a href="./Trugreen.html#Products" class="primary-cta ">
                                                    Nexus
                                                </a>
                                                <a href="./Trugreen.html#Products" class="arrow-btn-swip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30"
                                                        viewBox="0 0 28 30" fill="none">
                                                        <path
                                                            d="M27.5 15.1914C27.5 22.9401 21.4395 29.1914 14 29.1914C6.56055 29.1914 0.5 22.9401 0.5 15.1914C0.5 7.44274 6.56055 1.19141 14 1.19141C21.4395 1.19141 27.5 7.44274 27.5 15.1914Z"
                                                            fill="#00AD6F" stroke="#063E63" />
                                                        <path
                                                            d="M19.5303 16.2217C19.8232 15.9288 19.8232 15.454 19.5303 15.1611L14.7574 10.3881C14.4645 10.0952 13.9896 10.0952 13.6967 10.3881C13.4038 10.681 13.4038 11.1559 13.6967 11.4488L17.9393 15.6914L13.6967 19.934C13.4038 20.2269 13.4038 20.7018 13.6967 20.9947C13.9896 21.2876 14.4645 21.2876 14.7574 20.9947L19.5303 16.2217ZM9.5 16.4414L19 16.4414L19 14.9414L9.5 14.9414L9.5 16.4414Z"
                                                            fill="white" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <p class="slider-card-caption-item slider-card-caption-item-description">
                                                Renewable Procurement Simplified Transparently
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slides 2 Flow -->
                        <div class="swiper-slide">
                            <div class="slider-card priamry-product-slider-card">
                                <div class="slider-card-img-wrapper">
                                    <img src="./img/Product images/Flow.jpg" alt="" class="slider-card-img">
                                    <div class="slider-card-caption-wrapper">
                                        <div class="slider-card-caption" data-aos="fade-up" data-aos-duration="1000">
                                            <div class="btn-con-swip">
                                                <a href="./Trugreen.html#Products" class="primary-cta">
                                                    Flow
                                                </a>
                                                <a href="./Trugreen.html#Products" class="arrow-btn-swip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30"
                                                        viewBox="0 0 28 30" fill="none">
                                                        <path
                                                            d="M27.5 15.1914C27.5 22.9401 21.4395 29.1914 14 29.1914C6.56055 29.1914 0.5 22.9401 0.5 15.1914C0.5 7.44274 6.56055 1.19141 14 1.19141C21.4395 1.19141 27.5 7.44274 27.5 15.1914Z"
                                                            fill="#00AD6F" stroke="#063E63" />
                                                        <path
                                                            d="M19.5303 16.2217C19.8232 15.9288 19.8232 15.454 19.5303 15.1611L14.7574 10.3881C14.4645 10.0952 13.9896 10.0952 13.6967 10.3881C13.4038 10.681 13.4038 11.1559 13.6967 11.4488L17.9393 15.6914L13.6967 19.934C13.4038 20.2269 13.4038 20.7018 13.6967 20.9947C13.9896 21.2876 14.4645 21.2876 14.7574 20.9947L19.5303 16.2217ZM9.5 16.4414L19 16.4414L19 14.9414L9.5 14.9414L9.5 16.4414Z"
                                                            fill="white" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <p class="slider-card-caption-item slider-card-caption-item-description">
                                                Digitalize Renewable Site Operations for Unmatched Efficiency
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slides 3 Assure -->
                        <div class="swiper-slide">
                            <div class="slider-card priamry-product-slider-card">
                                <div class="slider-card-img-wrapper">
                                    <img src="./img/Product images/Assure.jpg" alt="" class="slider-card-img">
                                    <div class="slider-card-caption-wrapper">
                                        <div class="slider-card-caption" data-aos="fade-up" data-aos-duration="1000">
                                            <div class="btn-con-swip">
                                                <a href="./Trugreen.html#Products" class="primary-cta">
                                                    Assure
                                                </a>
                                                <a href="./Trugreen.html#Products" class="arrow-btn-swip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30"
                                                        viewBox="0 0 28 30" fill="none">
                                                        <path
                                                            d="M27.5 15.1914C27.5 22.9401 21.4395 29.1914 14 29.1914C6.56055 29.1914 0.5 22.9401 0.5 15.1914C0.5 7.44274 6.56055 1.19141 14 1.19141C21.4395 1.19141 27.5 7.44274 27.5 15.1914Z"
                                                            fill="#00AD6F" stroke="#063E63" />
                                                        <path
                                                            d="M19.5303 16.2217C19.8232 15.9288 19.8232 15.454 19.5303 15.1611L14.7574 10.3881C14.4645 10.0952 13.9896 10.0952 13.6967 10.3881C13.4038 10.681 13.4038 11.1559 13.6967 11.4488L17.9393 15.6914L13.6967 19.934C13.4038 20.2269 13.4038 20.7018 13.6967 20.9947C13.9896 21.2876 14.4645 21.2876 14.7574 20.9947L19.5303 16.2217ZM9.5 16.4414L19 16.4414L19 14.9414L9.5 14.9414L9.5 16.4414Z"
                                                            fill="white" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <p class="slider-card-caption-item slider-card-caption-item-description">
                                                Govern. Digitize. Energize - Streamlining Compliance for a Greener
                                                Future
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slides 4 Pulse  -->
                        <div class="swiper-slide">
                            <div class="slider-card priamry-product-slider-card">
                                <div class="slider-card-img-wrapper">
                                    <img src="./img/Product images/product-slider-card-Pulse-img.jpg" alt=""
                                        class="slider-card-img">
                                    <div class="slider-card-caption-wrapper">
                                        <div class="slider-card-caption" data-aos="fade-up" data-aos-duration="1000">
                                            <div class="btn-con-swip">
                                                <a href="./Trugreen.html#Products" class="primary-cta">
                                                    Pulse
                                                </a>
                                                <a href="./Trugreen.html#Products" class="arrow-btn-swip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30"
                                                        viewBox="0 0 28 30" fill="none">
                                                        <path
                                                            d="M27.5 15.1914C27.5 22.9401 21.4395 29.1914 14 29.1914C6.56055 29.1914 0.5 22.9401 0.5 15.1914C0.5 7.44274 6.56055 1.19141 14 1.19141C21.4395 1.19141 27.5 7.44274 27.5 15.1914Z"
                                                            fill="#00AD6F" stroke="#063E63" />
                                                        <path
                                                            d="M19.5303 16.2217C19.8232 15.9288 19.8232 15.454 19.5303 15.1611L14.7574 10.3881C14.4645 10.0952 13.9896 10.0952 13.6967 10.3881C13.4038 10.681 13.4038 11.1559 13.6967 11.4488L17.9393 15.6914L13.6967 19.934C13.4038 20.2269 13.4038 20.7018 13.6967 20.9947C13.9896 21.2876 14.4645 21.2876 14.7574 20.9947L19.5303 16.2217ZM9.5 16.4414L19 16.4414L19 14.9414L9.5 14.9414L9.5 16.4414Z"
                                                            fill="white" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <p class="slider-card-caption-item slider-card-caption-item-description">
                                                360° Renewable Insights - Drive Performance with Data
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slides 5 Horizon  -->
                        <div class="swiper-slide">
                            <div class="slider-card priamry-product-slider-card">
                                <div class="slider-card-img-wrapper">
                                    <img src="./img/Product images/Horizon_.jpg" alt="" class="slider-card-img">
                                    <div class="slider-card-caption-wrapper">
                                        <div class="slider-card-caption">
                                            <div class="btn-con-swip">
                                                <a href="./Trugreen.html#Products" class="primary-cta">
                                                    Horizon
                                                </a>
                                                <a href="./Trugreen.html#Products" class="arrow-btn-swip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30"
                                                        viewBox="0 0 28 30" fill="none">
                                                        <path
                                                            d="M27.5 15.1914C27.5 22.9401 21.4395 29.1914 14 29.1914C6.56055 29.1914 0.5 22.9401 0.5 15.1914C0.5 7.44274 6.56055 1.19141 14 1.19141C21.4395 1.19141 27.5 7.44274 27.5 15.1914Z"
                                                            fill="#00AD6F" stroke="#063E63" />
                                                        <path
                                                            d="M19.5303 16.2217C19.8232 15.9288 19.8232 15.454 19.5303 15.1611L14.7574 10.3881C14.4645 10.0952 13.9896 10.0952 13.6967 10.3881C13.4038 10.681 13.4038 11.1559 13.6967 11.4488L17.9393 15.6914L13.6967 19.934C13.4038 20.2269 13.4038 20.7018 13.6967 20.9947C13.9896 21.2876 14.4645 21.2876 14.7574 20.9947L19.5303 16.2217ZM9.5 16.4414L19 16.4414L19 14.9414L9.5 14.9414L9.5 16.4414Z"
                                                            fill="white" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <p class="slider-card-caption-item slider-card-caption-item-description">
                                                Precision Forecasting for Renewable Energy - Optimize, Save, and Succeed
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slides 6 SolarVision.AI   -->
                        <div class="swiper-slide">
                            <div class="slider-card priamry-product-slider-card">
                                <div class="slider-card-img-wrapper">
                                    <img src="./img/Product images/TruGreen Core app.jpg" alt=""
                                        class="slider-card-img">
                                    <div class="slider-card-caption-wrapper">
                                        <div class="slider-card-caption">
                                            <div class="btn-con-swip">
                                                <a href="./Trugreen.html#Products" class="primary-cta">
                                                    SolarVision.AI
                                                </a>
                                                <a href="./Trugreen.html#Products" class="arrow-btn-swip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30"
                                                        viewBox="0 0 28 30" fill="none">
                                                        <path
                                                            d="M27.5 15.1914C27.5 22.9401 21.4395 29.1914 14 29.1914C6.56055 29.1914 0.5 22.9401 0.5 15.1914C0.5 7.44274 6.56055 1.19141 14 1.19141C21.4395 1.19141 27.5 7.44274 27.5 15.1914Z"
                                                            fill="#00AD6F" stroke="#063E63" />
                                                        <path
                                                            d="M19.5303 16.2217C19.8232 15.9288 19.8232 15.454 19.5303 15.1611L14.7574 10.3881C14.4645 10.0952 13.9896 10.0952 13.6967 10.3881C13.4038 10.681 13.4038 11.1559 13.6967 11.4488L17.9393 15.6914L13.6967 19.934C13.4038 20.2269 13.4038 20.7018 13.6967 20.9947C13.9896 21.2876 14.4645 21.2876 14.7574 20.9947L19.5303 16.2217ZM9.5 16.4414L19 16.4414L19 14.9414L9.5 14.9414L9.5 16.4414Z"
                                                            fill="white" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <p class="slider-card-caption-item slider-card-caption-item-description">
                                                Intelligent Diagnostic Tool for Solar
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <!-- <div class="swiper-pagination"></div> -->

                    <!-- If we need navigation buttons -->


                    <!-- If we need scrollbar -->
                    <!-- <div class="swiper-scrollbar"></div> -->
                </div>
            </div>
        </div>
    </section>


    <section class="service-section section-common-margin">
        <div class="container">
            <div class="section-header" data-aos="zoom-in" data-aos-duration="1000">
                <h1 class="section-header-title">
                    Asset Life Cycle Management Services
                </h1>
                <p class="section-header-description primary-text-color">
                    End-to-end services for energy assets, including feasibility studies, engineering support,
                    commissioning, and audits
                </p>
            </div>

            <div class="tab-container">
                <div class="tab-content-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="tab-content" id="tabContent1">
                        <img src="./img/offering/Design Engineering & LIE.jpg" alt="" srcset="" class="tab-content-img">
                    </div>
                    <div class="tab-content" id="tabContent2">
                        <img src="./img/offering/PMC & PMO Services.jpg" alt="" srcset="" class="tab-content-img">
                    </div>
                    <div class="tab-content" id="tabContent3">
                        <img src="./img/offering/Technical, Financial & Commercial Asset Management.jpg" alt=""
                            srcset="" class="tab-content-img">
                    </div>
                    <div class="tab-content" id="tabContent4">
                        <img src="./img/offering/Capital Structuring & Advisory.jpg" alt="" srcset=""
                            class="tab-content-img">
                    </div>
                </div>
                <div class="toggle-tab-btn-wrapper">
                    <h1 class="toggle-tab-btn-wrapper-title" data-aos="fade-left" data-aos-duration="1000">
                        Offerings
                    </h1>
                    <label for="tabContent1" class="toggle-tab-btn toggle-tab-btn-active" data-aos="fade-left"
                        data-aos-duration="1000">
                        <h1 class="toggle-tab-btn-name">Design Engineering & LIE </h1>
                        <div class="arrow-con">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 28 30"
                                fill="none">
                                <ellipse cx="14" cy="15" rx="14" ry="14.5" fill="#00AD6F"></ellipse>
                                <path
                                    d="M19.5303 16.0303C19.8232 15.7374 19.8232 15.2626 19.5303 14.9697L14.7574 10.1967C14.4645 9.90381 13.9896 9.90381 13.6967 10.1967C13.4038 10.4896 13.4038 10.9645 13.6967 11.2574L17.9393 15.5L13.6967 19.7426C13.4038 20.0355 13.4038 20.5104 13.6967 20.8033C13.9896 21.0962 14.4645 21.0962 14.7574 20.8033L19.5303 16.0303ZM9.5 15.5L9.5 16.25L19 16.25L19 15.5L19 14.75L9.5 14.75L9.5 15.5Z"
                                    fill="white"></path>
                            </svg>
                        </div>
                    </label>
                    <label for="tabContent2" class="toggle-tab-btn" data-aos="fade-left" data-aos-duration="1000">
                        <h1 class="toggle-tab-btn-name">PMC & PMO Services </h1>
                        <div class="arrow-con">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 28 30"
                                fill="none">
                                <ellipse cx="14" cy="15" rx="14" ry="14.5" fill="#00AD6F"></ellipse>
                                <path
                                    d="M19.5303 16.0303C19.8232 15.7374 19.8232 15.2626 19.5303 14.9697L14.7574 10.1967C14.4645 9.90381 13.9896 9.90381 13.6967 10.1967C13.4038 10.4896 13.4038 10.9645 13.6967 11.2574L17.9393 15.5L13.6967 19.7426C13.4038 20.0355 13.4038 20.5104 13.6967 20.8033C13.9896 21.0962 14.4645 21.0962 14.7574 20.8033L19.5303 16.0303ZM9.5 15.5L9.5 16.25L19 16.25L19 15.5L19 14.75L9.5 14.75L9.5 15.5Z"
                                    fill="white"></path>
                            </svg>
                        </div>
                    </label>
                    <label for="tabContent3" class="toggle-tab-btn" data-aos="fade-left" data-aos-duration="1000">
                        <h1 class="toggle-tab-btn-name">Technical, Financial & Commercial Asset Management</h1>
                        <div class="arrow-con">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 28 30"
                                fill="none">
                                <ellipse cx="14" cy="15" rx="14" ry="14.5" fill="#00AD6F"></ellipse>
                                <path
                                    d="M19.5303 16.0303C19.8232 15.7374 19.8232 15.2626 19.5303 14.9697L14.7574 10.1967C14.4645 9.90381 13.9896 9.90381 13.6967 10.1967C13.4038 10.4896 13.4038 10.9645 13.6967 11.2574L17.9393 15.5L13.6967 19.7426C13.4038 20.0355 13.4038 20.5104 13.6967 20.8033C13.9896 21.0962 14.4645 21.0962 14.7574 20.8033L19.5303 16.0303ZM9.5 15.5L9.5 16.25L19 16.25L19 15.5L19 14.75L9.5 14.75L9.5 15.5Z"
                                    fill="white"></path>
                            </svg>
                        </div>
                    </label>
                    <label for="tabContent4" class="toggle-tab-btn" data-aos="fade-left" data-aos-duration="1000">
                        <h1 class="toggle-tab-btn-name">Capital Structuring & Advisory </h1>
                        <div class="arrow-con">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 28 30"
                                fill="none">
                                <ellipse cx="14" cy="15" rx="14" ry="14.5" fill="#00AD6F"></ellipse>
                                <path
                                    d="M19.5303 16.0303C19.8232 15.7374 19.8232 15.2626 19.5303 14.9697L14.7574 10.1967C14.4645 9.90381 13.9896 9.90381 13.6967 10.1967C13.4038 10.4896 13.4038 10.9645 13.6967 11.2574L17.9393 15.5L13.6967 19.7426C13.4038 20.0355 13.4038 20.5104 13.6967 20.8033C13.9896 21.0962 14.4645 21.0962 14.7574 20.8033L19.5303 16.0303ZM9.5 15.5L9.5 16.25L19 16.25L19 15.5L19 14.75L9.5 14.75L9.5 15.5Z"
                                    fill="white"></path>
                            </svg>
                        </div>
                    </label>
                </div>
            </div>

            <div class="section-header section-header-secondary" data-aos="zoom-in" data-aos-duration="1000">
                <h1 class="section-header-title">
                    Who We Serve
                </h1>
                <p class="section-header-description primary-text-color">
                    Renewable energy asset owners seeking to maximize efficiency and performance, capital providers
                    aiming to optimize financial viability and returns, asset managers focused on smarter
                    decision-making through data-driven insights, EPCs and O&M contractors looking to enhance efficiency
                    through automation, and vendors and suppliers eager to streamline procurement and financing.
                </p>
                <a href="./Asset-Lifecycle-Management.html" class="primary-cta cta">
                    Explore Our Services
                </a>
            </div>

        </div>
    </section>

    <!-- case study section start here -->
    <section class="case-study-section section-common-margin">
        <div class="container">
            <div class="case-study-row">
                <div class="col-left">
                    <h1 class="case-study-section-title">Case Studies</h1>
                    <div class="case-studies">
                        <label for="case-study-1" class="case-study " data-aos="fade-right" data-aos-duration="1000">
                            <div class="col-left">
                                <h1 class="case-study-title">
                                    Case Study 1: TruBuyer - Transforming Renewable Procurement
                            </div>
                            </h1>
                            <div class="col-right">
                                <h5 class="date">08 April, 2025</h5>
                                <a href="#" class="read-more-cta">
                                    READ MORE
                                </a>
                            </div>
                        </label>
                        <label for="case-study-2" class="case-study" data-aos="fade-right" data-aos-duration="1000">
                            <div class="col-left">
                                <h1 class="case-study-title">
                                    Case Study 2: TruOps - Centralizing Renewable Site Operations
                            </div>
                            </h1>
                            <div class="col-right">
                                <h5 class="date">08 April, 2025</h5>
                                <a href="#" class="read-more-cta">
                                    READ MORE
                                </a>
                            </div>
                        </label>
                        <label for="case-study-3" class="case-study" data-aos="fade-right" data-aos-duration="1000">
                            <div class="col-left">
                                <h1 class="case-study-title">
                                    Case Study 3: TruCovenant - Streamlining Renewable Compliance
                            </div>
                            </h1>
                            <div class="col-right">
                                <h5 class="date">08 April, 2025</h5>
                                <a href="#" class="read-more-cta">
                                    READ MORE
                                </a>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="col-right" data-aos="zoom-in" data-aos-duration="1000">
                    <img id="case-study-1" class="case-study-thumbnail-img " src="./img/case-study/case-study-1.png"
                        alt="" srcset="">
                    <img id="case-study-2" class="case-study-thumbnail-img " src="./case-study/case-study-2.jpg" alt=""
                        srcset="">
                    <img id="case-study-3" class="case-study-thumbnail-img " src="./case-study/case-study-3.jpg" alt=""
                        srcset="">
                </div>
            </div>
        </div>
    </section>
    <!-- case study section end here -->

    <!-- cta section starts here  -->
    <section class="cta-sec-lst ready-for-transformation-section">
        <div class="container">
            <div class="cta-sec-lst-row">
                <h1 class="heading-tab section-header-title">
                    Ready for Transformation?
                </h1>
                <div class="subhead section-header-description">
                    Speak to one of our experts and find out how TruBoard can take your Renewable Energy vision journey
                    to the next level.
                </div>
                <div class="btn-container">
                    <a href="./Contact-us.html#letsConnect" class="cta-btn cta-btn-lst primary-cta-btn">
                        Book a Demo
                        <span class="primary-cta-btn-active-underline"></span>
                    </a>
                    <a href="./Contact-us.html#letsConnect" class="cta-btn-2 primary-cta-btn">
                        SIGN UP FOR UPDATES
                        <span class="primary-cta-btn-active-underline"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <footer>
        <div class="container">
            <div class="footer-brand">
                <div class="footer-logo-wrapper">
                    <img src="./img/brand-logo/Truboard-Cleantech-logo-white-08.png" alt="" srcset="">
                </div>

                <div class="social-icons">
                    <a href="mailto:contact@truboardpartners.com" class="social-link">
                        <img src="./icons/message-icon-2.png" alt="" srcset="">
                    </a>
                    <!-- <a href="#" class="social-link">
                        <img src="./icons/x-icon-2.png" alt="" srcset="">
                    </a> -->
                    <a href="https://www.linkedin.com/company/truboard-partners/posts/?feedView=all" class="social-link">
                        <img src="./icons/linkedIn-icon-2.png" alt="" srcset="">
                    </a>
                </div>
            </div>

            <div class="footer-nav">
                <div class="footer-menu">
                    <h4 class="footer-menu-title">Useful links</h4>
                    <ul class="footer-menu footer-flex">
                        <li class="footer-menu-item">
                            <a href="./index.html" class="footer-menu-link">
                                Home
                            </a>
                        </li>
                        <li class="footer-menu-item">
                            <a href="./Trugreen.html" class="footer-menu-link">
                                TruGreen
                            </a>
                        </li>
                        <li class="footer-menu-item">
                            <a href="./Asset-Lifecycle-Management.html" class="footer-menu-link">
                                Assets Lifecycle Management
                            </a>
                        </li>
                        <li class="footer-menu-item">
                            <a href="./TruEleqtric.html" class="footer-menu-link">
                                TruEleqtric
                            </a>
                        </li>
                        <li>
                            <a href="#" class="footer-menu-link">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-contact-wrpaper">
                <div class="footer-content-title footer-menu-title">
                    Get in Touch
                </div>
                <p class="footer-content-address">
                   Unit 502-506, 5th Floor, UNITECH COMMERCIAL TOWER 2, Arya Samaj Road, Block B, Greenwood City, Sector 45, Gurugram, Haryana 122003
                </p>
                <a href="Contact-us.html#letsConnect" class="footer-contact-cta">
                    Contact Now
                </a>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="col-left">
                <p class="footer-primary-text">
                    &copy; All Rights Reserved by TruBoard Cleantech Private Limited
                </p>
                <p class="footer-secondary-text">
                    Subsidiary of Truboard
                </p>
            </div>
            <div class="col-right">
                <a href="#" class="footer-cta" style="display: none;">
                    Privacy policy
                </a>
            </div>
        </div>
    </footer>


    <div class="toast-container" id="toastContainer"></div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js">
    </script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });

        AOS.init();
    </script>
    <script src="js/common-script.js"></script>

    <script>
        function showToast(message, type = 'success') {
            const toastContainer = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;

            const icon = type === 'success' ?
                '<svg class="toast-icon success" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>' :
                '<svg class="toast-icon error" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';

            toast.innerHTML = `
                ${icon}
                <span class="toast-message">${message}</span>
                <button class="toast-close" onclick="this.parentElement.remove()">×</button>
            `;

            toastContainer.appendChild(toast);

            // Trigger animation
            setTimeout(() => toast.classList.add('show'), 10);

            // Auto remove after 5 seconds
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 300);
            }, 5000);
        }

        function submitEmail() {
            const email = document.getElementById('userEmail').value;

            // Basic email validation
            if (!email || !email.includes('@')) {
                showToast('Please enter a valid email address', 'error');
                return;
            }

            // Create form data
            const formData = new FormData();
            formData.append('email', email);
            formData.append('to', 'aakash@pivotmkg.com');

            // Show loading state
            const submitButton = document.querySelector('#emailForm button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.textContent = 'Sending...';
            submitButton.disabled = true;

            // Send AJAX request
            fetch('send_email.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Thank you! We will get back to you soon.');
                        document.getElementById('emailForm').reset();
                    } else {
                        showToast('Sorry, there was an error sending your message. Please try again later.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Sorry, there was an error sending your message. Please try again later.', 'error');
                })
                .finally(() => {
                    // Reset button state
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                });
        }
    </script>
</body>

</html>