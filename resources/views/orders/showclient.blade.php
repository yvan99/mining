@include('components.dashcss')

<body class="layout-light side-menu">
    @include('components.loader')
    <div class="mobile-author-actions"></div>
    {{-- @include('admin.components.header') --}}
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
                                            <li class="breadcrumb-item active" aria-current="page">{{ env('APP_NAME') }}
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">{{ __('Client Orders Report') }}</div>
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Client</th>
                                                        <th>Mineral</th>
                                                        <th>Quantity</th>
                                                        <th>Payment Status</th>
                                                        <th>Verif. Status</th>
                                                        <th>Created At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->order_code }}</td>
                                                            <td>{{ $order->client->name }}</td>
                                                            <td>{{ $order->mineral->name }}</td>
                                                            <td>{{ $order->quantity }}</td>
                                                            <td>
                                                                @if ($order->payment_status == 'pending')
                                                                    <span
                                                                        class="order-bg-opacity-warning  text-warning rounded-pill active">Pending</span>
                                                                @else
                                                                    <span
                                                                        class="order-bg-opacity-success  text-success rounded-pill active">Paid</span>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if ($order->inspection_status == 'pending')
                                                                    <span
                                                                        class="order-bg-opacity-warning  text-warning rounded-pill active">Pending</span>
                                                                @else
                                                                    <span
                                                                        class="order-bg-opacity-success  text-success rounded-pill active">Paid</span>
                                                                @endif
                                                            </td>

                                                            <td>{{ $order->created_at }}</td>
                                                            <td>
                                                                <a href=""
                                                                    class="btn btn-sm btn-primary">More</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>


                                            </table>
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
