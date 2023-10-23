@push('styles')
    <link rel="stylesheet" href="{{ asset('landing/css/products.css') }}">
@endpush

@if (count(getAllProducts()) > 0)
    <section id='products' class="s-services">

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">{{ __('landing.products.title') }}</h3>
                <h1 class="display-2">{{ __('landing.products.subtitle') }}</h1>
            </div>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="products">

                <div class="categories">
                    <span class="active">Todas</span>
                    @foreach (getCategories() as $item)
                        <span>{{ $item->name }}</span>
                    @endforeach
                </div>

                <div class="list">
                    @foreach (getAllProducts() as $item)
                        <div class="item" id="{{ $item->category->name }}">
                            <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/41-cell-stainless-gold-milanese-loop-gold-s9?wid=2000&hei=2000&fmt=jpeg&qlt=95&.v=1695055738491"
                                alt="">
                            <div class="content">
                                <h3>{{ $item->name }}</h3>
                                <small>{{ $item->category->name }}</small>
                                <span>
                                    {{ $item->description }}
                                </span>
                                <button onclick="openModal()">Orçamento</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
