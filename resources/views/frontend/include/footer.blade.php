<section class="footer-pane">
    <div class="container">
        <div class="row">
            <div class="footer-first">
                <div class="footer-abt">
                    <h3>About Company</h3>
                    <p>Agro Hi-Tech Chemicals is a trusted and reputed manufacturer and exporter in India. Our company
                        has been operating since 2006, with a dedicated R&D center focused on extensive studies and
                        various innovations.</p>
                    <div class="social-footer">
                        <ul>
                            <li><a target="_blank" href="#"><i class="fa fa-facebook fb"></i></a></li>
                            <li><a target="_blank" href="#"><i class="fa fa-youtube-play yt"></i></a></li>
                            <li><a target="_blank" href="#"><i class="fa fa-instagram insta"></i></a></li>
                            <li><a target="_blank" href="#"><i class="fa fa-linkedin ld"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="quick-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('blogs') }}">Blog</a></li>
                        <li><a href="{{ route('careers') }}">Careers</a></li>
                        <li><a href="{{ route('contact-us') }}" class="contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="quick-links">
                    <h3>Products</h3>
                    @if (count(getMenu()))
                    <ul>
                        @foreach (getMenu() as $menu)
                        <li><a href="{{ route('product-listing', $menu->slug) }}">{{$menu->name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="footer-abt">
                    <h3>Office Address</h3>
                    <p>Admin Offc. 303, A Wing, 3rd Floor, vajra Life Space Complex, Opposite RTO. Office, Peth Road,
                        Nashik, Maharashtra. Pin - 422004</p>
                    <h3>Factory Address</h3>
                    <p>Gat no. 339/3 Rasegaon, Tal-Dindori, Dist-Nashik, Maharashtra<br>
                        GSTIN/UIN: 27ABPH9030FIZL</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="copy-right">
                <p>Copyright Agro Hi-Tech Chemicals <?= date('Y'); ?> All Rights Reserved</p>
                <p>Design and developed by <a href="https://www.dfoxmedia.com/" target="_blank"><img
                            src="{{ asset('frontend_assets/images/dfox.png') }}"></a></p>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/intlTelInput.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend_assets/js/menu-script.js') }}"></script>
<script src="{{ asset('frontend_assets/js/main.js') }}"></script>
<script src="{{ asset('frontend_assets/js/responsive-tabs.js') }}"></script>
<script src="{{ asset('frontend_assets/js/lightbox-plus-jquery.min.js') }}"></script>
<!-- validate js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
(function($) {
    $('.nav-tabs').responsiveTabs();
})(jQuery);
</script>
<script type="text/javascript">
$(document).ready(function() {
    // WOW animation initialize
    new WOW().init();

    $('.contact').click(function() {
        localStorage.removeItem('product_name');
    });
});
</script>
<script>
const input = document.querySelector("#phone");
const iti = window.intlTelInput(input, {
    separateDialCode: true,
    excludeCountries: ["pk", "bd"],
    preferredCountries: ["in", "us", "ae", "ca"]
});
// Listen for form submission
const form1 = document.querySelector('form');
form1.addEventListener('submit', function(event) {
    event.preventDefault();

    // Update hidden input with selected country code
    const countryCode = iti.getSelectedCountryData().dialCode;
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'country_code';
    hiddenInput.value = countryCode;
    form1.appendChild(hiddenInput);

    // Submit the form
    // form1.submit();
});
</script>
</body>

</html>