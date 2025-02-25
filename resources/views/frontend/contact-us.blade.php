@extends('frontend.layout.app')
@section('title', 'Contact-us')
@section('content')

<section class="internal-banners"
    style="background-image:url({{ asset('frontend_assets/images/contact-breadcrumb-bg.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h2>Contact Us</h2>
                <div class="breadcrumb-pane">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-first">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="title-blk-center">
                    <h2>Get in touch</h2>
                </div>
                <p>Have questions or need more information? Our team is ready to help you every step of the way. Contact
                    us today via phone, email, or the form below, and we'll get back to you as soon as possible.</p>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
                <div class="map-sec">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3748.4281602464625!2d73.79260907427756!3d20.032501121251528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddeba961191f75%3A0xbfa7ce35d9b214b0!2sVraj%20Life%20Space!5e0!3m2!1sen!2sin!4v1726127252589!5m2!1sen!2sin"
                        width="100%" height="505" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
                <div class="contact-address">
                    <div class="info">
                        <div class="img-sec"><img src="{{ asset('frontend_assets/images/contact-icon-1.png') }}"></div>
                        <div class="content-sec">Admin Offc. 303, A Wing, 3rd Floor, vajra Life Space Complex, Opposite
                            RTO. Office, Peth Road, Nashik, Maharashtra. Pin - 422004</div>
                    </div>
                    <div class="info">
                        <div class="img-sec"><img src="{{ asset('frontend_assets/images/contact-icon-2.png') }}"></div>
                        <div class="content-sec">
                            <h4>Send us a message</h4>
                            agrohitechc3@gmail.com
                        </div>
                    </div>
                    <div class="info">
                        <div class="img-sec"><img src="{{ asset('frontend_assets/images/contact-icon-3.png') }}"></div>
                        <div class="content-sec">
                            <h4>Give us a call</h4>
                            +91 94228 75726
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xl-8 offset-xl-2">
                <div class="col-md-6 offset-md-3">
                    @include('flash_data')
                    @if($errors->any())
                    @error('g-recaptcha-response')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                    @endif
                </div>
                <div class="contact-page-form">
                    <form id="contactForm" action="{{ route('contact-submit') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFirstName">Full Name<span>*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail">Email Address:<span>*</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputContact">Contact No.<span>*</span></label>
                                <input type="test" class="form-control" id="phone" name="phone" required="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputReference">Products:<span>*</span></label>
                                <select name="product" id="product" class="form-control form-select">
                                    @foreach ($productData as $value)
                                    <option value="{{ $value->product_name }}">{{ $value->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputcomment">Comments<span>*</span></label>
                                <textarea class="form-control" id="comment" rows="8" name="comment" maxlength="500"
                                    data-gramm="false" wt-ignore-input="true"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha"
                                    id="hiddenRecaptcha" required>
                                <div id="g-recaptcha" class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"
                                    data-callback="correctCaptcha">
                                </div>
                                <label id="hiddenRecaptcha-error" class="error" for="hiddenRecaptcha"></label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn-form-submit btn swingimage">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
$(document).ready(function() {
    var savedValue = localStorage.getItem('product_name');
    if (savedValue) {
        $('#product').val(savedValue);
    }

    $('#contactForm').validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
            },
            comment: {
                required: true,
            },

        },
        messages: {
            // Define error messages for your form fields
            name: {
                required: "Please enter your full name",
            },
            email: {
                required: "Please enter email",
            },
            phone: {
                required: "Please enter phone number",
            },
            comment: {
                required: "Please enter comment",
            },
        },
        submitHandler: function(form) {
            // If form is valid, submit it

            form.submit();
        }
    });
});
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
@endsection