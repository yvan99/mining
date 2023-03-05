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
                                            <li class="breadcrumb-item active" aria-current="page">Demo 2</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('minerals.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="mine_tag">Mine Tag:</label>
                                <input type="text" name="mine_tag" id="mine_tag" value="{{ old('mine_tag') }}"
                                    required>
                                @error('mine_tag')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}">
                            </div>

                    </div>
                </div>
            </div>
            @include('components.dashfooter')
    </main>
    @include('components.dashjs')
