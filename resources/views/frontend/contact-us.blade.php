@extends('frontend.layout.app')
@section('title', 'Contact-us')
@section('content')

<section class="internal-banners" style="background: url({{ asset('frontend_assets/images/internal-banner.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h3>Contact us</h3>
                <div class="breadcrumb-pane">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Contact us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-us-section">
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="title-main">
                <h2>Connect with Us</h2>
                <p>Our experts are ready to assist you with <strong> personalized solutions and expert
                        guidance</strong>. Whether you have questions, need support, or want to explore our offerings,
                    we’re here to help. Reach out to us via <strong> phone, email, or the contact form</strong>, and
                    we’ll get back to you promptly!</p>
            </div>
            <div class="mapdiv">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7496.856564815996!2d73.795184!3d20.032496!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddeba961191f75%3A0xbfa7ce35d9b214b0!2sVraj%20Life%20Space!5e0!3m2!1sen!2sin!4v1741164494328!5m2!1sen!2sin"
                    width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<!-- second section -->
<section class="contact-us-second">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xl-5">
                <div class="contact-iconsec">
                    <div class="icondiv">
                        <img src="{{ asset('frontend_assets/images/location-icon.png') }}" alt="">
                    </div>
                    <div class="textdiv">
                        <p>Admin Offc. 303, A Wing, 3rd Floor, vajra Life Space Complex, Opposite RTO. Office, Peth
                            Road, Nashik, Maharashtra. Pin - 422004</p>

                    </div>
                </div>

                <div class="contact-iconsec">
                    <div class="icondiv">
                        <img src="{{ asset('frontend_assets/images/message-icon.png') }}" alt="">
                    </div>
                    <div class="textdiv">
                        <h3>Send us a message</h3>
                        <a href="mailto:agrohitechc3@gmail.com">agrohitechc3@gmail.com </a>
                    </div>
                </div>

                <div class="contact-iconsec">
                    <div class="icondiv">
                        <img src="{{ asset('frontend_assets/images/phone.png')}}" alt="">
                    </div>
                    <div class="textdiv">
                        <h3>Give us a call</h3>
                        <a href="tel:9422875726">+91 94228 75726</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xl-7">
                <div class="second">
                    <div class="form-container">
                        <form id="contactForm" action="{{ route('contact-submit') }}" method="post">
                            @csrf
                            <div>
                                <label for="first-name">Full Name</label>
                                <input type="text" id="name" name="name" required="">
                            </div>

                            <div>
                                <label for="email-add">Email Address</label>
                                <input type="email" id="email" name="email"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="">
                            </div>

                            <div>
                                <label for="contact">Contact No.</label>
                                <div class="contact-container">
                                    <input type="tel" id="contact_phone" name="phone" required="">
                                </div>
                            </div>

                            <div>
                                <label for="products">Products</label>
                                <select id="product" name="product" required>
                                    @foreach ($productData as $value)
                                    <option value="{{ $value->product_name }}">{{ $value->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="full-width">
                                <label for="comments">Comments</label>
                                <textarea id="comment" rows="4" name="comment"></textarea>
                            </div>
                            <div class="full-width button-container">
                                <button type="submit">Submit</button>
                            </div>
                            <input type="hidden" name="recaptcha_token" id="recaptcha-token">
                            @if ($errors->has('recaptcha'))
                            <div class="alert alert-danger">
                                {{ $errors->first('recaptcha') }}
                            </div>
                            @endif
                        </form>
                    </div>
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
// Initialize the plugin on the correct phone input

var input = document.querySelector("#contact_phone");
var iti = window.intlTelInput(input, {
    separateDialCode: true,
    excludeCountries: ["pk", "bd"],
    preferredCountries: ["in", "us", "ae", "ca"],
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
});

// Listen for form submission
const form = document.querySelector('form');
form.addEventListener('submit', function(event) {
    event.preventDefault();

    // Update hidden input with selected country code
    const countryCode = iti.getSelectedCountryData().dialCode;
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'country_code';
    hiddenInput.value = countryCode;
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
});
</script>
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('{{ env("RECAPTCHA_SITE_KEY") }}', {
        action: 'submitContactForm'
    }).then(function(token) {
        // You can pass the token in a hidden input field or send it via AJAX
        document.getElementById('recaptcha-token').value = token;
    });
});
</script>

@endpush
@endsection