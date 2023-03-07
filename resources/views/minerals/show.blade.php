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
                            <div class="row">
                                <div class="card product-details h-100 border-0 col-7">
                                    <div class="product-item d-flex p-sm-50 p-20">
                                        <div class="row">
                                            <div class="col-lg-6">

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
                                            <div class=" col-lg-6">
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
                                                                    {{-- <input type="button" value="-"
                                                                        class="qty-minus bttn bttn-left wh-36">
                                                                    <input type="number" value="1"
                                                                        class="qh-36 input" id="quantity-input">
                                                                    <input type="button" value="+"
                                                                        class="qty-plus bttn bttn-right wh-36"> --}}
                                                                </div>
                                                                <span
                                                                    class="fs-13 fw-400 color-light my-sm-0 my-10">{{ $mineral->quantity }}
                                                                    Tonage available</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div
                                        class="card order-summery bg-dark p-sm-25 p-15 order-summery--width mt-lg-0 mt-20">
                                        <div class="card-header border-bottom-0 p-0 pb-25">
                                            <h5 class="fw-500 text-white">Order Summary</h5>
                                        </div>
                                        <div class="card-body px-sm-25 px-20">

                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <div class="total">
                                                <div class="subtotalTotal">
                                                    Export Value:
                                                    <span>{{ $mineral->exported_value }}</span>
                                                </div>
                                                <div class="taxes">
                                                    Percentage Payment:
                                                    <span>{{ env('PAYMENT_PERCENTAGE') }} %</span>
                                                </div>
                                            </div>

                                            <form method="POST" action="{{ route('orders.store') }}">
                                                @csrf
                                                <div class="promo-code">
                                                    <label for="exampleInputEmail1">Quantity In Tonnage</label>
                                                    <div class="d-flex align-items-center mt-2">
                                                        <input id="exampleInputEmail1" type="number"
                                                            placeholder="Enter the quantity" name="quantity"
                                                            class="form-control" value="1"
                                                            max="{{ $mineral->quantity - 1 }}" />

                                                        <input id="exampleInputEmail1" type="number"
                                                            placeholder="Enter the quantity" name="availablequantity"
                                                            class="form-control d-none"
                                                            value="{{ $mineral->quantity - 1 }}" />
                                                    </div>
                                                </div>
                                                <div class="total-money d-flex justify-content-between">
                                                    <h6>Total :</h6>
                                                    <h5>$
                                                        {{ ($mineral->exported_value * env('PAYMENT_PERCENTAGE')) / 100 }}
                                                    </h5>
                                                </div>
                                                <div class="form-group d-none">
                                                    <label for="client_id">Client ID:</label>

                                                    <input type="number" class="form-control" id="client_id"
                                                        name="client_id" value="{{ auth()->user()->id }}">

                                                    <input type="email" class="form-control" id="email"
                                                        name="email" value="{{ auth()->user()->email }}">

                                                    <input type="text" class="form-control" id="phone"
                                                        name="phone" value="{{ auth()->user()->phone }}">

                                                    <input type="text" class="form-control" id="name"
                                                        name="names" value="{{ auth()->user()->name }}">

                                                    <input type="number" class="form-control" id="amount"
                                                        name="mineral_id" value="{{ $mineral->id }}">

                                                    <input type="number" class="form-control" id="amount"
                                                        name="amount"
                                                        value="{{ ($mineral->exported_value * env('PAYMENT_PERCENTAGE')) / 100 }}">
                                                </div>

                                                <button class="checkout btn-warning content-center w-100 btn-lg mt-20">
                                                    proceed
                                                    to
                                                    Payment<i class="las la-arrow-right"></i>

                                                </button>

                                            </form>

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
