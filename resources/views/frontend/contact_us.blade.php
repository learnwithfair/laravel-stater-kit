@extends('layouts.app2')

@section('main-content')
    <!-- Services Hero area started -->
    <section class="about-hero-img">
        <div class="container-fluid h-100">
            <div class="row align-items-center h-100">
                <div class="col-12 col-md-11 mx-auto px-5">
                    <div class="ptop d-none d-md-block">
                        <h1 class="text-h1 quaternary-color">We’d Love to Hear From You</h1>
                        <p class="quaternary-color body-text-two">Whether you have a question about our services or just want
                            to say hello, drop us a message.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Hero area ended -->


    <!-- Contact Form started -->
    <section class="py-5 form-let-bg">

        <div class="container w-75 w-sm-100 px-4 mx-auto position-relative mt-5 pt-5">
            <h2 class="text-center text-h1 mb-5 secondary-color">Request a sample</h2>

            <form>
                <div class="row g-4">

                    <!-- First Name -->
                    <div class="col-md-6">
                        <label class="form-label secondary-color body-text-two">First Name *</label>
                        <input type="text" class="form-control input-line border-bottom-style secondary-color" required>
                    </div>


                    <!-- Last Name -->
                    <div class="col-md-6">
                        <label class="form-label body-text-two secondary-color">Last Name *</label>
                        <input type="text" class="form-control input-line border-bottom-style secondary-color" required>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <label class="form-label body-text-two secondary-color">Email Address *</label>
                        <input type="email" class="form-control input-line border-bottom-style secondary-color" required>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6">
                        <label class="form-label body-text-two secondary-color">Phone *</label>
                        <input type="tel" class="form-control input-line border-bottom-style secondary-color" required>
                    </div>


                    <!-- Message -->
                    <div class="col-12">
                        <label class="form-label body-text-two secondary-color">Message *</label>
                        <textarea class="form-control input-line border-bottom-style secondary-color" rows="3" required></textarea>
                    </div>

                </div>

                <!-- Submit button (optional) -->
                <div class="text-center mt-4 secondary-bg-color send-btn mx-auto">
                    <a href="#" type="submit" class="button-one quaternary-color px-4 text-decoration-none">Send
                        Message</a>
                </div>
            </form>
        </div>
    </section>
    <!-- Contact Form ended -->
@endsection
@push('scripts')
@endpush
