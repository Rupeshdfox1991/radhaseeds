@extends('frontend.layout.app')
@section('title', 'Careers')
@section('content')

<section class="internal-banners"
    style="background-image:url({{ asset('frontend_assets/images/careers-breadcrumb-bg.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h2>Careers</h2>
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
<section class="career-first">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="title-blk-center">
                    <h2>Join the Agro Hi-techchemical’s Team!</h2>
                </div>
                <p>At Agro Hi-techchemical’s, we believe in the power of a dedicated and skilled team to drive
                    innovation and success. As we continue to grow, we are always on the lookout for passionate
                    individuals who are ready to contribute to our dynamic work environment.</p>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 col-xl-7">
                <div class="career-form">
                    <h4>How to Apply:</h4>
                    <p>Ready to take the next step in your career? Fill out the form below and submit your details. We
                        look forward to learning more about you and how your skills and expertise can contribute to the
                        success of Jainson Products.</p>
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
                    <form id="careersForm" action="{{ route('submit-careers') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name:<span>*</span></label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="Enter Your First Name" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name:<span>*</span></label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Enter Your Last Name" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email:<span>*</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                    placeholder="Enter Your Email Address" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Contact No.<span>*</span></label>
                                <input type="test" class="form-control" id="phone" name="phone" required="">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="comment">Comments<span>*</span></label>
                                <textarea class="form-control" id="comment" rows="8" name="comment" maxlength="500"
                                    data-gramm="false" wt-ignore-input="true"></textarea>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="file">Upload CV:<span>*</span></label>
                                <input type="file" id="file" name="file" accept=".pdf, .doc, .docx" required="">
                                <label>Files must be less than 20MB, Allowed file types : PDF &amp; DOCS</label>
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
                            <div class="form-group col-md-12">
                                <input type="submit" class="btn btn-form-submit" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-xl-5">
                <div class="img-section"><img src="{{ asset('frontend_assets/images/careers-1.jpg') }}"></div>
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
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
@endsection