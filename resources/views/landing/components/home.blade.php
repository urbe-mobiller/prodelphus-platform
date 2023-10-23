<section id="home" class="s-home target-section" data-parallax="scroll"
    data-image-src="{{ asset('landing/images/hero-bg.jpg') }}" data-natural-width=3000 data-natural-height=2000
    data-position-y=center>

    <div class="overlay"></div>
    <div class="shadow-overlay"></div>

    <div class="home-content">

        <div class="row home-content__main">

            <h3>{{ __('landing.home.title') }}</h3>

            <h1>
                {{ __('landing.home.slogan') }}
            </h1>

            <div class="home-content__buttons">
                <a href="#about" class="smoothscroll btn btn--stroke">
                    {{ __('landing.home.button') }}
                </a>
            </div>

        </div>

        <div class="home-content__scroll">
            <a href="#about" class="scroll-link smoothscroll">
                <span>{{ __('landing.home.buttonClick') }}</span>
            </a>
        </div>

        <div class="home-content__line"></div>

    </div> <!-- end home-content -->


    <ul class="home-social">
        <li>
            <a href="https://www.youtube.com/channel/UC4tlsT1o_6SSmagqpGOf1vA"><i class="fa fa-youtube"
                    aria-hidden="true"></i><span>Youtube</span></a>
        </li>
        <li>
            <a href="https://www.instagram.com/prodelphus_simuladores/"><i class="fa fa-instagram"
                    aria-hidden="true"></i><span>Instagram</span></a>
        </li>
        <li>
            <a href="https://www.facebook.com/ProDelphus/"><i class="fa fa-facebook"
                    aria-hidden="true"></i><span>Facebook</span></a>
        </li>
        <li>
            <a href="https://prodelphus.lojaintegrada.com.br/"><i class="fa fa-shopping-cart"
                    aria-hidden="true"></i><span>Shop</span></a>
        </li>
    </ul>
    <!-- end home-social -->

</section>
