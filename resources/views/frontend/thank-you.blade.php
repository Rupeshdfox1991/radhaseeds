@extends('frontend.layout.app')
@section('title', 'Contact-us')
@section('content')

<section class="internal-banners" style="background: url({{ asset('frontend_assets/images/internal-banner.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <h3>Thank You</h3>
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
            <div class="col-lg-8 col-md-12 col-sm-12 col-xl-8 offset-xl-2">
                <div class="thank-you-content">
                    <img src="{{ asset('frontend_assets/images/chk-mark.png')}}" alt="Thank You">
                    <h3>Dear Customer,</h3>
                    <p>We have received your details, and our team shall connect with you shortly with the required
                        information.</p>
                    <p>If you have any immediate questions, please don't hesitate to reach out to us at <a
                            href="mailto:agrohitechc3@gmail.com">agrohitechc3@gmail.com</a> OR via WhatsApp at <a
                            href="https://api.whatsapp.com/send?phone=919422875726&amp;text=Hello Team Agro Hi-Tech Chemicals">+91
                            94228 75726</a></p>
                    <p>We are here to assist you and guide you through every step of your journey with us.</p>
                    <p><strong>Thanks,<br>
                            Team Radha Seeds</strong></p>
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