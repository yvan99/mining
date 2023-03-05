@include('components.dashcss')

<body class="layout-light side-menu">
    @include('components.loader')
    <div class="mobile-author-actions"></div>
    {{-- @include('admin.components.header') --}}
    <main class="main-content">
        @include('client.components.sidebar')
        <div class="contents">
            <div class="demo2 mb-25 t-thead-bg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-main">
                                <h4 class="text-capitalize breadcrumb-title">Dashboard</h4>
                                <div class="breadcrumb-action justify-content-center flex-wrap">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"><i
                                                        class="uil uil-estate"></i>Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">{{ env('APP_NAME') }}
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row product-page-list justify-content-center">
                                @foreach ($minerals as $mineral)
                                    <div class="cus-xl-3 col-lg-4 col-md-11 col-12 mb-30 px-10">
                                        <div class="card product product--grid">
                                            <div class="h-100">
                                                <div class="product-item">
                                                    <div class="product-item__image">
                                                        <span class="like-icon">
                                                            <button type="button" class="content-center">
                                                                <i class="lar la-heart icon"></i>
                                                            </button>
                                                        </span>
                                                        <a href="#"><img class="card-img-top img-fluid"
                                                                src="{{ asset($mineral->picture) }}"
                                                                alt="{{ $mineral->name }}"></a>
                                                    </div>
                                                    <div class="card-body px-20 pb-25 pt-25">
                                                        <div class="product-item__body text-capitalize">
                                                            <a href="product-details.html">
                                                                <h6 class="card-title">{{ $mineral->name }}</h6>
                                                            </a>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="d-flex align-items-center flex-wrap">
                                                                <span class="product-desc-price"> Export Price :
                                                                    {{ $mineral->exported_value }}</span>
                                                                {{-- <span class="product-price">$100.00</span>
                                                                <span class="product-discount">50% Off</span> --}}
                                                            </div>
                                                        </div>
                                                        <div class="product-item__button d-flex mt-20 flex-wrap">
                                                            <a class="btn btn-primary btn-default btn-squared border-0 px-25"
                                                                href="/client/view-minerals/{{ $mineral->id }}">buy
                                                                now
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>




                    </div>
                </div>
            </div>
            @include('components.dashfooter')
    </main>
    @include('components.dashjs')
