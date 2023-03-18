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
                                            <li class="breadcrumb-item active" aria-current="page">{{env("APP_NAME")}}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-12 mb-25">
                            <div class="card banner-feature--18 d-flex">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xl-7">
                                            <div class="card-body px-25">
                                                <h1 class="banner-feature__heading color-white">Welcome , {{Auth::user()->name}}</h1>
                                                <p class="banner-feature__para color-white">
                                                   {{env("CLIENT_BANNER_TEXT")}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div
                                                class="banner-feature__shape px-md-25 px-25 py-sm-0 pt-15 pb-30 d-flex justify-content-sm-end justify-content-center">
                                                <img src=" {{asset('dashboard/img/demo5-banner.png')}}" alt="img" class="svg">
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
