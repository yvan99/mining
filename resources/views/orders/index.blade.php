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
                                                        <th>Client</th>
                                                        <th>Mineral</th>
                                                        <th>Quantity</th>
                                                        <th>Payment Status</th>
                                                        <th>Verif. Status</th>
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
                                                                        class="order-bg-opacity-success  text-success rounded-pill active">Approved</span>
                                                                @endif
                                                            </td>

                                                            <td>

                                                                <button type="button" class="btn btn-sm btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editModal{{ $order->id }}">More</button>
                                                            </td>

                                                            {{-- ASSIGN DELIVERY MODAL --}}
                                                            <div class="modal fade" id="editModal{{ $order->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="editModal{{ $order->id }}Label"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="editModal{{ $order->id }}Label">
                                                                                Order #{{ $order->order_code }} Details
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body col-12">
                                                                            <form
                                                                                action="{{ url('/admin/orders/' . $order->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div>
                                                                                    <h6 class="mt-2">Order Created At
                                                                                        : {{ $order->created_at }}</h6>
                                                                                    <h6 class="mt-2 mb-3">Order Status :
                                                                                        @if ($order->order_status == 'pending')
                                                                                            <span
                                                                                                class="order-bg-opacity-warning  text-warning rounded-pill active">Pending</span>
                                                                                        @else
                                                                                            <span
                                                                                                class="order-bg-opacity-success  text-success rounded-pill active">Paid</span>
                                                                                        @endif
                                                                                    </h6>
                                                                                </div>

                                                                                <div>

                                                                                    <h6 class="mt-2 mb-3">Delivery
                                                                                        Status :
                                                                                        @if ($order->delivery_status == 'pending')
                                                                                            <span
                                                                                                class="order-bg-opacity-info  text-warning rounded-pill active">Pending</span>
                                                                                        @elseif($order->delivery_status == 'in_transit')
                                                                                            <span
                                                                                                class="order-bg-opacity-warning  text-warning rounded-pill active">In
                                                                                                Transit</span>
                                                                                        @else
                                                                                            <span
                                                                                                class="order-bg-opacity-success  text-success rounded-pill active">Delivered</span>
                                                                                        @endif
                                                                                    </h6>
                                                                                </div>
                                                                                @if ($order->delivery_status === 'pending')
                                                                                    <div class="form-group col-6">
                                                                                        <label for="name">Assign
                                                                                            Delivery Partner</label>
                                                                                        <select name="delivery"
                                                                                            class="form-control form-select mt-1">
                                                                                            @foreach ($deliveries as $delivery)
                                                                                                <option
                                                                                                    value={{ $delivery->id }}>
                                                                                                    {{ $delivery->name }}
                                                                                                </option>
                                                                                            @endforeach

                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        <label for="name">Route /
                                                                                            Address</label>
                                                                                        <input id="route-name"
                                                                                            type="text"
                                                                                            class="form-control @error('route-name') is-invalid @enderror"
                                                                                            name="route-name"
                                                                                            value="{{ old('route-name') }}"
                                                                                            autocomplete="route-name"
                                                                                            autofocus>

                                                                                        @error('route-name')
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>

                                                                                    <!-- add additional form fields as needed -->
                                                                                @endif

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-danger btn-sm btn-outline"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            @if ($order->delivery_status === 'pending')
                                                                                <button type="submit"
                                                                                    class="btn btn-primary btn-sm">Assign
                                                                                    Delivery</button>
                                                                            @endif

                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
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
