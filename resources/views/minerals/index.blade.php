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
                                            <li class="breadcrumb-item active" aria-current="page">{{env("APP_NAME")}}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">{{ __('Minerals List') }}
                                        <a href="/admin/daily-pdf" class="btn btn-sm btn-success">Download Report</a>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Mine Tag</th>
                                                        <th>Quantity</th>
                                                        <th>Picture</th>
                                                        <th>Content</th>
                                                        <th>Source</th>
                                                        <th>Weight (in kgs)</th>
                                                        <th>Exported Value</th>
                                                        <th>Created At</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($minerals as $mineral)
                                                        <tr>
                                                            <td>{{ $mineral->name }}</td>
                                                            <td>{{ $mineral->mine_tag }}</td>
                                                            <td>{{ $mineral->quantity }}</td>
                                                            <td><img src="{{ asset($mineral->picture) }}"
                                                                    alt="{{ $mineral->name }}" width="100"></td>
                                                            <td>{{ $mineral->content }}</td>
                                                            <td>{{ $mineral->source }}</td>
                                                            <td>{{ $mineral->weight }}</td>
                                                            <td>{{ $mineral->exported_value }}</td>
                                                            <td>{{ $mineral->created_at }}</td>
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
