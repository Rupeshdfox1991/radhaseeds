@extends('frontend.layout.app')
@section('title', 'Careers')
@section('content')

<section class="internal-banners" style="background: url({{ asset('frontend_assets/images/internal-banner.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h3>Careers</h3>
                <div class="breadcrumb-pane">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Careers</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- First Section -->


<section class="contact-us-first">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6 align-self-center">
                <div class="imgdiv">
                    <img src="{{ asset('frontend_assets/images/careers-img.jpg')}}" class="img-fluid" alt="">

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6 align-self-center">
                <div class="title-red-left">
                    <h2>Join the Radha Seeds Team!</h2>
                </div>
                <div class="career-para">
                    <h2>Why Radha Seeds’s?</h2>
                    <p>At Radha Seeds, we believe that a passionate and skilled team is the key to driving agricultural
                        innovation. As we continue to grow, we welcome individuals who are eager to contribute to our
                        mission of empowering farmers with high-quality, research-driven seeds. Join us in shaping the
                        future of agriculture!</p>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- second section -->
<section class="contact-us-second sec-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-xl-8 offset-xl-2">
                <div class="career-para">
                    <h2>How to Apply:</h2>
                    <p>Ready to take the next step in your career? Fill out the form below and submit your details. We
                        look forward to learning more about you and how your skills and expertise can contribute to the
                        success of Jainson Products.</p>
                </div>
                <div class="second ">
                    <div class="form-container">
                        <form id="careersForm" action="{{ route('submit-careers') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="first-name">First Name</label>
                                <input type="text" id="first_name" name="first_name" placeholder="Enter Your First Name"
                                    required="">
                            </div>

                            <div>
                                <label for="last-name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Enter Your Last Name"
                                    required="">
                            </div>
                            <div>
                                <label for="email-add">Email Address</label>
                                <input type="email" id="email" name="email"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                    placeholder="Enter Your Email Address" required="">
                            </div>

                            <div>
                                <label for="contact">Contact No.</label>
                                <div class="contact-container">
                                    <input type="tel" id="contact_phone" name="phone" required="">
                                </div>
                            </div>

                            <div class="full-width">
                                <label for="comments">Comments</label>
                                <textarea id="comment" name="comment" rows="4"></textarea>
                            </div>

                            <div class="upload-container">
                                <label for="cv-input" class="file-label">Upload CV</label>
                                <input type="file" id="file" name="file" accept=".pdf,.doc,.docx"
                                    onchange="showFileName()">
                                <label>Files must be less than 20MB, Allowed file types : PDF &amp; DOCS</label>

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
    $('#careersForm').validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
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
            file: {
                required: true,
            },

        },
        messages: {
            // Define error messages for your form fields
            first_name: {
                required: "Please enter your first name",
            },
            last_name: {
                required: "Please enter your last name",
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
            file: {
                required: "Please upload file",
            },
        },
        submitHandler: function(form) {
            // If form is valid, submit it

            form.submit();
        }
    });
});
</script>
<script>
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
        action: 'submitCareersForm'
    }).then(function(token) {
        // You can pass the token in a hidden input field or send it via AJAX
        document.getElementById('recaptcha-token').value = token;
    });
});
</script>
@endpush
@endsection