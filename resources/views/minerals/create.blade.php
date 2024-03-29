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
                                        <div class="card-header">{{ __('Register Mineral') }}</div>

                                        <div class="card-body">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif


                                            <form method="POST" action="{{ route('minerals.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group row">
                                                    <label for="name"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" value="{{ old('name') }}"
                                                            autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="mine_tag"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Mine Tag') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="mine_tag" type="text"
                                                            class="form-control @error('mine_tag') is-invalid @enderror"
                                                            name="mine_tag" value="{{ old('mine_tag') }}"
                                                            autocomplete="mine_tag">

                                                        @error('mine_tag')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="quantity"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="quantity" type="number"
                                                            class="form-control @error('quantity') is-invalid @enderror"
                                                            name="quantity" value="{{ old('quantity') }}"
                                                            autocomplete="quantity">

                                                        @error('quantity')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="picture"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="picture" type="file"
                                                            class="form-control-file @error('picture') is-invalid @enderror"
                                                            name="picture" accept="image/*">

                                                        @error('picture')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="content"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                                                    <div class="col-md-6">
                                                        <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" rows="3">{{ old('content') }}</textarea>

                                                        @error('content')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="source"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Source') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="source" type="text"
                                                            class="form-control @error('source') is-invalid @enderror"
                                                            name="source" value="{{ old('source') }}"
                                                            autocomplete="source">

                                                        @error('source')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="weight"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Weight (kg)') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="weight" type="number" step="0.01"
                                                            class="form-control @error('weight') is-invalid @enderror"
                                                            name="weight" value="{{ old('weight') }}"
                                                            autocomplete="weight">

                                                        @error('weight')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="exported_value"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Exported Value') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="exported_value" type="number" step="0.01"
                                                            class="form-control @error('exported_value') is-invalid @enderror"
                                                            name="exported_value" value="{{ old('exported_value') }}"
                                                            autocomplete="exported_value">

                                                        @error('exported_value')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Save') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
