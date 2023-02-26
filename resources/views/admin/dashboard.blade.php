@include('components.dashcss')

<body class="layout-light side-menu">
    @include('components.loader')
    <div class="mobile-author-actions"></div>
    @include('admin.components.header')
    <main class="main-content">
      @include('admin.components.sidebar')
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
                                            <li class="breadcrumb-item active" aria-current="page">Demo 2</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-sm-4  col-ssm-12 mb-25">
                            <div
                                class="ap-po-details ap-po-details--luodcy  overview-card-shape radius-xl d-flex justify-content-between">
                                <div class=" ap-po-details-content d-flex flex-wrap justify-content-between w-100">
                                    <div class="ap-po-details__titlebar">
                                        <p>Total Products</p>
                                        <h1>100+</h1>
                                    </div>
                                    <div class="ap-po-details__icon-area color-primary">
                                        <i class="uil uil-arrow-growth"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xxl-3 col-sm-4  col-ssm-12 mb-25">

                            <div
                                class="ap-po-details ap-po-details--luodcy  overview-card-shape radius-xl d-flex justify-content-between">
                                <div class=" ap-po-details-content d-flex flex-wrap justify-content-between w-100">
                                    <div class="ap-po-details__titlebar">
                                        <p>Total Orders</p>
                                        <h1>30,825</h1>
                                    </div>
                                    <div class="ap-po-details__icon-area color-secondary">
                                        <i class="uil uil-users-alt"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xxl-3 col-sm-4  col-ssm-12 mb-25">

                            <div
                                class="ap-po-details ap-po-details--luodcy  overview-card-shape radius-xl d-flex justify-content-between">
                                <div class=" ap-po-details-content d-flex flex-wrap justify-content-between w-100">
                                    <div class="ap-po-details__titlebar">
                                        <p>Total Sales</p>
                                        <h1>$30,825</h1>
                                    </div>
                                    <div class="ap-po-details__icon-area color-success">
                                        <i class="uil uil-usd-circle"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
           
                        <div class="col-xxl-6 mb-25">
                            <div class="card revenueChartTwo border-0">
                                <div class="card-header border-0">
                                    <h6>Sales Revenue</h6>
                                    <div class="card-extra">
                                        <ul class="card-tab-links nav-tabs nav" role="tablist">
                                            <li>
                                                <a class="active" href="#tl_revenue-today" data-bs-toggle="tab"
                                                    id="tl_revenue-today-tab" role="tab"
                                                    aria-selected="false">Today</a>
                                            </li>
                                            <li>
                                                <a href="#tl_revenue-week" data-bs-toggle="tab"
                                                    id="tl_revenue-week-tab" role="tab"
                                                    aria-selected="false">Week</a>
                                            </li>
                                            <li>
                                                <a href="#tl_revenue-month" data-bs-toggle="tab"
                                                    id="tl_revenue-month-tab" role="tab"
                                                    aria-selected="false">Month</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body pt-0 pb-40">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="tl_revenue-today"
                                            role="tabpanel" aria-labelledby="tl_revenue-today-tab">
                                            <div class="cashflow-display cashflow-display2 d-flex">
                                            </div>

                                            <div class="wp-chart">
                                                <div class="parentContainer">
                                                    <div>
                                                        <canvas id="saleRevenueToday"></canvas>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="tl_revenue-week" role="tabpanel"
                                            aria-labelledby="tl_revenue-week-tab">
                                            <div class="cashflow-display cashflow-display2 d-flex">
                                            </div>

                                            <div class="wp-chart">
                                                <div class="parentContainer">
                                                    <div>
                                                        <canvas id="saleRevenueWeek"></canvas>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="tl_revenue-month" role="tabpanel"
                                            aria-labelledby="tl_revenue-month-tab">
                                            <div class="cashflow-display cashflow-display2 d-flex">
                                            </div>

                                            <div class="wp-chart">
                                                <div class="parentContainer">
                                                    <div>
                                                        <canvas id="saleRevenueMonth"></canvas>
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
        <footer class="footer-wrapper">
            <div class="footer-wrapper__inside">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-copyright">
                                <p><span>© 2023</span><a href="#">Sovware</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-menu text-end">
                                <ul>
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Team</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>
    <div class="customizer-wrapper">
        <div class="customizer">
            <div class="customizer__head">
                <h4 class="customizer__title">Customizer</h4>
                <span class="customizer__sub-title">Customize your overview page layout</span>
                <a href="#" class="customizer-close">
                    <img class="svg" src="img/svg/x2.svg" alt="">
                </a>
            </div>
            <div class="customizer__body">
                <div class="customizer__single">
                    <h4>Layout Type</h4>
                    <ul class="customizer-list d-flex layout">
                        <li class="customizer-list__item">
                            <a href="https://demo.dashboardmarket.com/hexadash-html/ltr" class="active">
                                <img src="img/ltr.png" alt="">
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                        <li class="customizer-list__item">
                            <a href="https://demo.dashboardmarket.com/hexadash-html/rtl">
                                <img src="img/rtl.png" alt="">
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="customizer__single">
                    <h4>Sidebar Type</h4>
                    <ul class="customizer-list d-flex l_sidebar">
                        <li class="customizer-list__item">
                            <a href="#" data-layout="light" class="dark-mode-toggle active">
                                <img src="img/light.png" alt="">
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                        <li class="customizer-list__item">
                            <a href="#" data-layout="dark" class="dark-mode-toggle">
                                <img src="img/dark.png" alt="">
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="customizer__single">
                    <h4>Navbar Type</h4>
                    <ul class="customizer-list d-flex l_navbar">
                        <li class="customizer-list__item">
                            <a href="#" data-layout="side" class="active">
                                <img src="img/side.png" alt="">
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                        <li class="customizer-list__item top">
                            <a href="#" data-layout="top">
                                <img src="img/top.png" alt="">
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </li>
                        <li class="colors"></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
@include('components.dashjs')
