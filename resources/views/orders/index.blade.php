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
                                                                        <div class="modal-body col-6">
                                                                            <form {{-- action="{{ route('records.update', $record->id) }}" --}} method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="form-group">
                                                                                    <label for="name">Assign
                                                                                        Delivery Partner</label>
                                                                                    <select name=""
                                                                                        id=""
                                                                                        class="form-control form-select mt-3">
                                                                                        @foreach ($deliveries as $delivery)
                                                                                            <option value="">
                                                                                                Delivery Agent</option>
                                                                                        @endforeach

                                                                                    </select>
                                                                                </div>

                                                                                <!-- add additional form fields as needed -->
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-danger btn-sm btn-outline"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary btn-sm">Save
                                                                                changes</button>
                                                                        </div>
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
