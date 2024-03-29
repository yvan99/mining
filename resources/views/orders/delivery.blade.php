@include('components.dashcss')

<body class="layout-light side-menu">
    @include('components.loader')
    <div class="mobile-author-actions"></div>
    {{-- @include('admin.components.header') --}}
    <main class="main-content">
        @include('delivery.components.sidebar')
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
                                        <div class="card-header">{{ __('Assigned Orders Report') }}
                                        <a href="/delivery/order-pdf" class="btn btn-sm btn-success">Download Report</a>
                                        </div>
                                        <div class="card-body">
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Mineral</th>
                                                        <th>Client</th>
                                                        <th>Telephone</th>
                                                        <th>Address</th>
                                                        <th>Quantity</th>
                                                        <th>Tonnage</th>
                                                        <th>Tag</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->order_code }}</td>
                                                            <td>{{ $order->mineral->name }}</td>
                                                            <td>{{ $order->client->name }}</td>
                                                            <td>{{ $order->client->phone }}</td>
                                                            <td>{{ $order->client->address }}</td>
                                                            <td>{{ $order->quantity }}</td>
                                                            <td>{{ $order->mineral->weight }}</td>
                                                            <td>{{ $order->mineral->mine_tag }}</td>
                                                            <td>
                                                              @if ($order->delivery_status === 'delivered')

                                                              <a href="#"
                                                                class="btn btn-sm btn-success">Delivered</a>    
                                                              @else
                                                              <a href="/delivery/shipping/approve/{{ $order->id }}"
                                                                class="btn btn-sm btn-warning"  onclick="return confirm('Are you sure you want to proceed?')"> Deliver</a>    
                                                              
                                                              @endif
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
