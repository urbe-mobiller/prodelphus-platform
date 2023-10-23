<header class="s-header">

    <div class="header-logo">
        <a class="site-logo" href="/">
            <img src="{{ asset('landing/images/logo.png') }}" alt="Homepage">
        </a>
    </div>

    <nav class="header-nav">

        <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

        <div class="header-nav__content">
            <h3>Menu</h3>

            <ul class="header-nav__list">
                <li class="current"><a class="smoothscroll" href="#home" title="Home">{{__('landing.menu.home')}}</a></li>
                <li><a class="smoothscroll" href="#about" title="Sobre">{{__('landing.menu.prodelphus')}}</a></li>
                <li><a class="smoothscroll" href="#services" title="Serviços">{{__('landing.menu.services')}}</a></li>
                <li><a class="smoothscroll" href="#simulators" title="Simuladores">{{__('landing.menu.simulators')}}</a></li>
                <li><a class="smoothscroll" href="#clients" title="Clientes">{{__('landing.menu.clients')}}</a></li>
                <li><a class="smoothscroll" href="#products" title="Produtos">{{__('landing.menu.products')}}</a></li>
                <li><a class="smoothscroll" href="#contact" title="Contato">{{__('landing.menu.contact')}}</a></li>
                <li><a class="smoothscroll" href="#contact" title="Torne-se Parceiro">{{__('landing.menu.partner')}}</a></li>
            </ul>

            <p class="header-text">{{__('landing.menu.text')}}</p>

            <ul class="header-nav__social">
                <li>
                    <a href="https://www.youtube.com/channel/UC4tlsT1o_6SSmagqpGOf1vA"><i class="fa fa-youtube"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/prodelphus_simuladores/"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                    <a href="https://www.facebook.com/ProDelphus/"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="https://prodelphus.lojaintegrada.com.br/"><i class="fa fa-shopping-cart"></i></a>
                </li>


            </ul>

        </div> <!-- end header-nav__content -->

    </nav> <!-- end header-nav -->

    <a class="header-menu-toggle" href="#0">
        <!-- <span class="header-menu-text">Menu</span> -->
        <span class="header-menu-icon"></span>
    </a>

</header>
