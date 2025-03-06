<footer class="footer-pane">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="footer-first-section">
                    <div class="content-sec">
                        <h3>About Radha Seeds</h3>
                        <p>
                            Radha Seeds is a trusted name in the seed
                            industry, committed to providing
                            high-quality, research-driven
                            seeds for farmers.
                            With 5+ years of agricultural research and
                            30+ years of
                            expertise, we develop superior vegetable and
                            crop seeds that
                            ensure higher yields, resilience, and
                            sustainable growth.
                        </p>
                    </div>
                    <div class="quick-links">
                        <h3>Quick links</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Blogs</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="quick-links">
                        <h3>Products</h3>
                        <ul>
                            @foreach (getMenu() as $menu)
                            <li><a href="{{ route('product-listing', $menu->slug) }}">{{$menu->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="content-sec">
                        <h3>Office Address</h3>
                        <p>
                            Admin Offc. 303, A Wing, 3rd Floor, vajra
                            Life Space Complex,
                            Opposite RTO. Office, Peth Road, Nashik,
                            Maharashtra. Pin -
                            422004
                        </p>
                        <h3>Factory Address</h3>
                        <p>
                            Gat no. 339/3 Rasegaon, Tal-Dindori,
                            Dist-Nashik,
                            Maharashtra<br />
                            GSTIN/UIN: 27ABPH9030FIZL
                        </p>
                    </div>
                </div>
                <div class="footer-second-section">
                    <div class="social-footer">
                        <ul>
                            <li><a target="_blank" href="#"><i class="fab fa-facebook-f fb"></i></a></li>
                            <li><a target="_blank" href="#"><i class="fab fa-youtube yt"></i></a></li>
                            <li><a target="_blank" href="#"><i class="fab fa-instagram insta"></i></a></li>
                            <li><a target="_blank" href="#"><i class="fab fa-linkedin-in ld"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="copy-right">
                    <p>© <?= date('Y');?> Radha Seeds All Rights
                        Reserved</p>
                    <p>Design and developed by <span class="dfox-img"><a href="https://dfoxmedia.com/" target="_blank">
                                DFOX MEDIA
                                <img src="{{ asset('frontend_assets/images/dfox.png') }}" alt></a></span></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('frontend_assets/js/lightbox-plus-jquery.min.js') }}"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="{{ asset('frontend_assets/js/lightbox-plus-jquery.min.js') }}"></script>
<script>
const menu = document.querySelector(".menu");
const menuMain = menu.querySelector(".menu-main");
const goBack = menu.querySelector(".go-back");
const menuTrigger = document.querySelector(".mobile-menu-trigger");
const closeMenu = menu.querySelector(".mobile-menu-close");
let subMenu;

menuMain.addEventListener("click", (e) => {
    if (!menu.classList.contains("active")) {
        return;
    }
    if (e.target.closest(".menu-item-has-children")) {
        const hasChildren = e.target.closest(".menu-item-has-children");
        showSubMenu(hasChildren);
    }
});

goBack.addEventListener("click", () => {
    hideSubMenu();
});

menuTrigger.addEventListener("click", () => {
    toggleMenu();
});

closeMenu.addEventListener("click", () => {
    toggleMenu();
});

document.querySelector(".menu-overlay").addEventListener("click", () => {
    toggleMenu();
});

function toggleMenu() {
    menu.classList.toggle("active");
    document.querySelector(".menu-overlay").classList.toggle("active");
}

function showSubMenu(hasChildren) {
    subMenu = hasChildren.querySelector(".sub-menu");
    subMenu.classList.add("active");
    subMenu.style.animation = "slideLeft 0.5s ease forwards";
    const menuTitle = hasChildren.querySelector("i").parentNode.childNodes[0].textContent;
    menu.querySelector(".current-menu-title").innerHTML = menuTitle;
    menu.querySelector(".mobile-menu-head").classList.add("active");
}

function hideSubMenu() {
    subMenu.style.animation = "slideRight 0.5s ease forwards";
    setTimeout(() => {
        subMenu.classList.remove("active");
    }, 300);
    menu.querySelector(".current-menu-title").innerHTML = "";
    menu.querySelector(".mobile-menu-head").classList.remove("active");
}

window.onresize = function() {
    if (this.innerWidth > 991) {
        if (menu.classList.contains("active")) {
            toggleMenu();
        }
    }
};
</script>
<script>
var swiper = new Swiper(".mySwiper, .mySwiper1", {
    loop: true, // Infinite loop
    autoplay: {
        delay: 8000, // Auto-slide every 2 seconds
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
</script>
<script>
var swiper = new Swiper(".mySwiper1", {
    loop: true, // Infinite loop
    autoplay: {
        delay: 8000, // Auto-slide every 2 seconds
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
</script>

</body>

</html>