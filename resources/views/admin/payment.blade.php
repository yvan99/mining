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
                                        <div class="card-header">{{ __('Payment History Report') }}</div>
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Payment ID</th>
                                                        <th>Amount</th>
                                                        <th>Paid By</th>
                                                        <th>Gateway</th>
                                                        <th>Paid at</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($payment as $pay)

                                                  <tr>
                                                    <td>{{$pay->flw_id}}</td>
                                                    <td>{{$pay->amount}}</td>
                                                    <td>{{$pay->names}}</td>
                                                    <td>{{$pay->gateway}}</td>
                                                    <td>{{$pay->created_at}}</td>
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
