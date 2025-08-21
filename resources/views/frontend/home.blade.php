@extends('layouts.app2')

@section('main-content')
    <!-- Hero area started -->
    <section class="hero-img">
        <div class="hero-section d-flex align-items-center justify-content-center flex-column text-center">
            <div class="container px-3">
                <div class="quaternary-color">
                    <h1 class="text-h1">Words That Work for<br />Your Brand</h1>
                    <p class="body-text-two">
                        From ideation to impact, EdenProse nurtures your narrative with
                        top-quality content writing services. Our seasoned writers craft
                        engaging, SEO-enhanced content that cultivates your brand’s
                        influence and drives real results.
                    </p>
                </div>

                <div class="mt-4 d-flex flex-column flex-md-row justify-content-center gap-3">
                    <a href="/"
                        class="btn-design-two text-decoration-none secondary-bg-color quaternary-color button-one">Get
                        Content Now</a>
                    <a href="/"
                        class="btn-design-two text-decoration-none border border-white quaternary-color button-one">Sample
                        the Prose</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero area ended -->

    <!-- trusted by area started -->
    <section class="trusted-section quaternary-bg-color">
        <div class="mx-auto trusted-area">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-center mb-2">
                        <hr class="flex-grow-1 mx-3" />
                        <div class="">
                            <h2 class="mt-4 text-h1">Trusted by</h2>
                            <p class="mb-0 text-h3">Industry leading such as</p>
                        </div>
                        <hr class="flex-grow-1 mx-3" />
                    </div>
                </div>
            </div>
            <div class="trusted-logos-wrapper overflow-hidden">
                <div class="row trusted-logos flex-nowrap">
                    <!-- First set of logos -->
                    <div class="col-auto">
                        <img src="assets/img/2ndsource.png" alt="Second Source Logo" class="img-fluid" />
                    </div>
                    <div class="col-auto">
                        <img src="assets/img/2ndsource.png" alt="Second Source Logo" class="img-fluid" />
                    </div>
                    <div class="col-auto">
                        <img src="assets/img/2ndsource.png" alt="Second Source Logo" class="img-fluid" />
                    </div>
                    <div class="col-auto">
                        <img src="assets/img/2ndsource.png" alt="Second Source Logo" class="img-fluid" />
                    </div>
                    <div class="col-auto">
                        <img src="assets/img/2ndsource.png" alt="Second Source Logo" class="img-fluid" />
                    </div>

                    <!-- Duplicate logos for seamless scroll -->
                    <div class="col-auto">
                        <img src="assets/img/2ndsource.png" alt="Second Source Logo" class="img-fluid" />
                    </div>
                    <div class="col-auto">
                        <img src="assets/img/2ndsource.png" alt="Second Source Logo" class="img-fluid" />
                    </div>
                    <div class="col-auto">
                        <img src="assets/img/2ndsource.png" alt="Second Source Logo" class="img-fluid" />
                    </div>
                    <div class="col-auto">
                        <img src="assets/img/2ndsource.png" alt="Second Source Logo" class="img-fluid" />
                    </div>
                    <div class="col-auto">
                        <img src="assets/img/2ndsource.png" alt="Second Source Logo" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- trusted by area ended -->

    <!-- EdenProse Offers started -->
    <section class="edenprose-offer-section edenprose-bg py-5 quaternary-bg-color">
        <div class="mx-3">
            <div class="text-center mb-4">
                <h2 class="mt-4 text-h1">EdenProse Offers</h2>
            </div>

            <div class="swiper edenprose-swiper px-4">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide px-2">
                        <div class="card text-center h-100 hover-border">
                            <img src="assets/img/notepad-laptop.jfif" class="card-img-top img-fluid" alt="Offer 1" />
                            <div class="card-body h-card">
                                <h5 class="card-title">Content Creation</h5>
                                <p class="card-text py-3">
                                    We create strategic content that captivates and converts
                                    your audience.
                                </p>
                                <a href="/"
                                    class="btn-design-two py-2 btn-custom text-decoration-none secondary-bg-color quaternary-color button-one">Get
                                    Content Now</a>
                                <!-- <a href="#" class="btn btn-custom">Get Content Now</a> -->
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide px-2">
                        <div class="card text-center h-100">
                            <img src="assets/img/notepad-laptop.jfif" class="card-img-top img-fluid" alt="Offer 2" />
                            <div class="card-body h-card">
                                <h5 class="card-title">Content Creation</h5>
                                <p class="card-text py-3">
                                    We create strategic content that captivates and converts
                                    your audience.
                                </p>
                                <a href="/"
                                    class="btn-design-two py-2 btn-custom text-decoration-none secondary-bg-color quaternary-color button-one">Get
                                    Content Now</a>
                                <!-- <a href="#" class="btn btn-custom">Get Content Now</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide px-2">
                        <div class="card text-center h-100">
                            <img src="assets/img/notepad-laptop.jfif" class="card-img-top img-fluid" alt="Offer 2" />
                            <div class="card-body h-card">
                                <h5 class="card-title">Content Creation</h5>
                                <p class="card-text py-3">
                                    We create strategic content that captivates and converts
                                    your audience.
                                </p>
                                <a href="/"
                                    class="btn-design-two py-2 btn-custom text-decoration-none secondary-bg-color quaternary-color button-one">Get
                                    Content Now</a>
                                <!-- <a href="#" class="btn btn-custom">Get Content Now</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- Add more slides as needed -->
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>



    <!-- EdenProse Offers ended -->

    <!-- working process started -->
    <section class="py-5 quaternary-bg-color">
        <div class="px-5">
            <h2 class="mb-5 text-h2 text-dark text-center text-md-start">
                Our Working Process
            </h2>
            <div class="row align-items-center">
                <!-- Left Image -->
                <div class="col-md-6 mb-4 mb-md-0 text-center text-md-start">
                    <img src="assets/img/working-process.png" alt="Working Process" class="img-fluid rounded w-100" />
                </div>

                <!-- Right Process List -->
                <div class="col-md-6">
                    <div class="process-step d-flex mb-4">
                        <div class="icon-circle me-3 flex-shrink-0">
                            <span>1</span>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Lorem Ipsum amid</h6>
                            <p class="mb-0 text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod
                            </p>
                        </div>
                    </div>

                    <div class="process-step d-flex mb-4 position-relative">
                        <div class="icon-circle me-3 flex-shrink-0">
                            <span>2</span>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Lorem Ipsum amid</h6>
                            <p class="mb-0 text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod
                            </p>
                        </div>

                        <!-- Hide SVG on small screens -->
                        <svg class="position-absolute top-50 start-0 translate-middle-y d-none d-md-block" width="100%"
                            height="60" viewBox="0 0 500 60" fill="none" xmlns="http://www.w3.org/2000/svg"
                            style="z-index: -1">
                            <path d="M0,30 C150,60 350,0 500,30" stroke="#a8c3a0" stroke-width="1" fill="none" />
                        </svg>
                    </div>

                    <div class="process-step d-flex">
                        <div class="icon-circle me-3 flex-shrink-0">
                            <span>3</span>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Lorem Ipsum amid</h6>
                            <p class="mb-0 text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center py-5">
                <!-- Text Column -->
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <h2 class="text-h3">Why Us</h2>
                    <p class="body-text-two">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem
                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum
                        dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit
                        amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit
                        amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem
                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum
                        dolor sit amet.
                    </p>
                </div>

                <!-- Image Column -->
                <div class="col-12 col-md-6 text-center text-md-start">
                    <img src="assets/img/why-us.png" alt="Working Process" class="img-fluid rounded w-100" />
                </div>
            </div>
        </div>
    </section>
    <!-- working process ended -->

    <!-- request a sample started -->
    <section class="sample-request-section py-5 text-white quaternary-bg-color"
        style="
        background-image: url('./assets/img/form.png');
        background-repeat: no-repeat;
        background-size: cover;
      ">
        <!-- Optional SVG Curve (Top Decoration) -->
        <div style="position: absolute; top: 0; left: 0; right: 0; overflow: hidden"></div>

        <div class="container w-75 mx-auto position-relative mt-5 pt-5">
            <h2 class="text-center text-h1 mb-5">Request a sample</h2>

            <form>
                <div class="row g-4">
                    <!-- First Name -->
                    <div class="col-md-6">
                        <label class="form-label text-white body-text-two">First Name *</label>
                        <input type="text" class="form-control input-line text-white" required />
                    </div>

                    <!-- Last Name -->
                    <div class="col-md-6">
                        <label class="form-label body-text-two">Last Name *</label>
                        <input type="text" class="form-control input-line text-white" required />
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <label class="form-label body-text-two">Email Address *</label>
                        <input type="email" class="form-control input-line text-white" required />
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6">
                        <label class="form-label body-text-two">Phone *</label>
                        <input type="tel" class="form-control input-line text-white" required />
                    </div>

                    <!-- Company -->
                    <div class="col-md-6">
                        <label class="form-label body-text-two">Company *</label>
                        <input type="text" class="form-control input-line text-white" required />
                    </div>

                    <!-- Address -->
                    <div class="col-md-6">
                        <label class="form-label body-text-two">Address *</label>
                        <input type="text" class="form-control input-line text-white" required />
                    </div>

                    <!-- Message -->
                    <div class="col-12">
                        <label class="form-label body-text-two">Please describe your content needs *</label>
                        <textarea class="form-control input-line text-white" rows="3" required></textarea>
                    </div>
                </div>

                <!-- Submit button (optional) -->
                <div class="text-center mt-4">
                    <a href="/"
                        class="btn-design-two py-2 btn-custom text-decoration-none secondary-bg-color quaternary-color button-one">Submit
                    </a>
                </div>
            </form>
        </div>
    </section>
    <!-- request a sample ended -->

    <!-- testimonial started -->
    <section class="py-5 px-3 quaternary-bg-color">
        <h2 class="text-center text-h1 mb-5">Testimonials</h2>

        <!-- Start Swiper -->
        <div class="swiper mySwiper container">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="row justify-content-center g-3">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card testimonial-card p-2">
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/testimonials.png" class="me-3" alt="user"
                                        style="width: 170px; height: 195px; object-fit: cover" />
                                    <div>
                                        <h5 class="mb-1 body-text-two">Robert Fox</h5>
                                        <small class="d-block mb-1 body-text-three">Business Man</small>
                                        <div class="text-warning mb-1">★★★★★</div>
                                        <p class="text-muted mb-0 body-text-four">
                                            Excellent service! The team was punctual, thorough, and
                                            left my home sparkling clean.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card testimonial-card p-2">
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/testimonials.png" class="me-3" alt="user"
                                        style="width: 170px; height: 195px; object-fit: cover" />
                                    <div>
                                        <h5 class="mb-1 body-text-two">Robert Fox</h5>
                                        <small class="d-block mb-1 body-text-three">Business Man</small>
                                        <div class="text-warning mb-1">★★★★★</div>
                                        <p class="text-muted mb-0 body-text-four">
                                            Excellent service! The team was punctual, thorough, and
                                            left my home sparkling clean.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card testimonial-card p-2">
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/testimonials.png" class="me-3" alt="user"
                                        style="width: 170px; height: 195px; object-fit: cover" />
                                    <div>
                                        <h5 class="mb-1 body-text-two">Robert Fox</h5>
                                        <small class="d-block mb-1 body-text-three">Business Man</small>
                                        <div class="text-warning mb-1">★★★★★</div>
                                        <p class="text-muted mb-0 body-text-four">
                                            Excellent service! The team was punctual, thorough, and
                                            left my home sparkling clean.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- You can duplicate this swiper-slide block for additional slides -->
            </div>

            <!-- Swiper Pagination -->
            <div class="swiper-pagination mt-4 d-flex justify-content-center"></div>
        </div>
    </section>


    <!-- testimonial ended -->

    <!-- newslater started -->
    <section class="py-5 px-3 quaternary-bg-color">
        <div class="row tertiary-bg-color p-3 container mx-auto align-items-center">
            <!-- Left: Text + Input -->
            <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                <h2 class="text-h1" style="color: #f9f9f9">Newsletter</h2>
                <p class="body-text-three" style="color: #dfccbd">
                    Kindly subscribe to our newsletter to get latest deals on our rooms
                    and vacation discount.
                </p>

                <!-- Newsletter Form -->
                <form class="d-flex flex-column flex-sm-row justify-content-center justify-content-md-start gap-2 mt-3">
                    <input type="email" class="form-control" placeholder="Enter your email" required />
                    <button type="submit" class="btn primary-bg-color text-white px-4">
                        Subscribe
                    </button>
                </form>
            </div>

            <!-- Right: Image -->
            <div class="col-md-6 text-center">
                <img src="assets/img/news.png" alt="Newsletter" class="img-fluid"
                    style="max-width: 100%; height: auto" />
            </div>
        </div>
    </section>

    <!-- newslater ended -->
@endsection
@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".edenprose-swiper", {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            spaceBetween: 20,
            slidesPerView: 1,
            breakpoints: {
                576: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
            },
        });
    </script>


    <script>
        const swiper = new Swiper(".mySwiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
@endpush
