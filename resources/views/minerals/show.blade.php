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

                        <div class="products">
                            <div class="container">
                                <div class="card product-details h-100 border-0">
                                    <div class="product-item d-flex p-sm-50 p-20">
                                        <div class="row">
                                            <div class="col-lg-5">

                                                <div class="product-item__image">
                                                    <div class="wrap-gallery-article carousel slide carousel-fade"
                                                        id="carouselExampleCaptions" data-bs-ride="carousel">
                                                        <div>
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <img class="img-fluid d-flex bg-opacity-primary "
                                                                        src="{{ asset($mineral->picture) }}"
                                                                        alt="{{ $mineral->name }}" title="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class=" col-lg-7">

                                                <div class=" b-normal-b mb-25 pb-sm-35 pb-15 mt-lg-0 mt-15">
                                                    <div class="product-item__body">

                                                        <div class="product-item__title">
                                                            <a href="#">
                                                                <h1 class="card-title">
                                                                    {{ $mineral->name }}
                                                                </h1>
                                                            </a>
                                                        </div>
                                                        <div class="product-item__content text-capitalize">

                                                            <span class="product-details-brandName">Mine
                                                                Tag:<span>{{ $mineral->mine_tag }}</span></span>
                                                            <span
                                                                class="product-details-brandName">Source:<span>{{ $mineral->source }}</span></span>
                                                            <span class="product-details-brandName">Weight (in kgs):
                                                                <span>{{ $mineral->weight }}</span></span>
                                                            <span class="product-desc-price">
                                                                <sub>Export
                                                                    Value</sub>{{ $mineral->exported_value }}</span>
                                                            <p class=" product-deatils-pera">
                                                                {{ $mineral->content }}
                                                            </p>


                                                            <div class="product-details__availability">
                                                                <div class="title">
                                                                    <p>Availability:</p>
                                                                    @if ($mineral->quantity >= 0)
                                                                        <span class="stock">In stock</span>
                                                                    @else
                                                                        <span class="stock">Out Of Stock</span>
                                                                    @endif

                                                                </div>
                                                            </div>


                                                            <div class="quantity product-quantity flex-wrap">
                                                                <div class="me-15 d-flex align-items-center flex-wrap">
                                                                    <p class="fs-14 fw-500 color-dark">Quantity:</p>
                                                                    <input type="button" value="-"
                                                                        class="qty-minus bttn bttn-left wh-36">
                                                                    <input type="number" value="1"
                                                                        class="qh-36 input" id="quantity-input">
                                                                    <input type="button" value="+"
                                                                        class="qty-plus bttn bttn-right wh-36">
                                                                </div>
                                                                <span
                                                                    class="fs-13 fw-400 color-light my-sm-0 my-10">{{ $mineral->quantity }}
                                                                    Tonage available</span>
                                                            </div>


                                                            <div
                                                                class="product-item__button mt-lg-30 mt-sm-25 mt-20 d-flex flex-wrap">
                                                                <div
                                                                    class=" d-flex flex-wrap product-item__action align-items-center">
                                                                    <button
                                                                        class="btn btn-primary btn-default btn-squared border-0 me-10 my-sm-0 my-2">buy
                                                                        now</button>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     
        @include('components.dashfooter')
    </main>
    @include('components.dashjs')
    <script>
        $(document).ready(function() {
            $("#quantity-input").attr("max", {{ $mineral->quantity - 1 }});
        });
    </script>
