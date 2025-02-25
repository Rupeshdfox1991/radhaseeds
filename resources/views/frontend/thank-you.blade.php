@extends('frontend.layout.app')
@section('title', 'Contact-us')
@section('content')

<section class="internal-banners"
    style="background-image:url({{ asset('frontend_assets/images/contact-breadcrumb-bg.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h2>Thank You</h2>
                <div class="breadcrumb-pane">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Thank You</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="thank-you">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="thank-you-pane">
                    <p>Dear <b>Customer</b>,</p>
                    <p>We have received your details, and our team shall connect with you shortly with the required
                        information.</p>

                    <p>If you have any immediate questions, please don't hesitate to reach out to us at <a
                            target="_blank" href="mailto:agrohitechc3@gmail.com">agrohitechc3@gmail.com</a> OR
                        via WhatsApp at <a target="_blank" href="https://wa.me/9422875726">+91-9422875726</a>.</p>

                    <p>We are here to assist you and guide you through every step of your journey with us.</p>

                    <p>Thanks,</p>
                    <p>Team Agro Hi-tech Chemicals</p>

                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script>
$(document).ready(function() {
    localStorage.removeItem('product_name');
});
</script>
@endpush

@endsection