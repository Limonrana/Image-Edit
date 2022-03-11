@extends('admin.layout.layout')

@section('title', 'Menu Builder - Car Image Editing')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('menus.index') }}">Menus</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Menu</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Edit Menu</h1>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <form action="{{ route('menus.update', $type) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row justify-content-lg-center">
                <div class="col-lg-8">
                    <!-- Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Menu information</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="title" class="input-label">Menu Name</label>
                                <input type="text" class="form-control" placeholder="Main Menu" value="{{ $type }}" disabled>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <!-- Body -->
                    </div>
                    <!-- End Card -->

                    <!-- Addon menu Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Menu Options</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form Group -->
                            <div class="js-add-field"
                                 data-hs-add-field-options='{
                                    "template": "#addVariantTemplate",
                                    "container": "#addVariantContainer",
                                    "defaultCreated": 0
                                 }'>

                                @forelse($menus as $key => $option)
                                    <div id="{{ $key }}">
                                        <div class="form-group mb-0">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <!-- Form Group -->
                                                    <div class="form-group mb-0">
                                                        <label class="input-label">Menu Type</label>
                                                        <select class="custom-select" name="type[]">
                                                            <option value="{{ null }}">Choose one...</option>
                                                            <option value="pages" @if($option['type'] === 'pages') selected @endif>Pages</option>
                                                            <option value="services" @if($option['type'] === 'services') selected @endif>Services</option>
                                                        </select>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>

                                                <div class="col-md-4">
                                                    <!-- Form Group -->
                                                    <div class="form-group mb-0">
                                                        <label class="input-label">Select Page</label>
                                                        <select class="custom-select" name="page[]" onchange="pageHandleChange(this)">
                                                            <option value="{{ null }}">Choose one...</option>
                                                            <!-- Pages -->
                                                            <option disabled>Pages</option>
                                                            @foreach($pages as $page)
                                                                <option value="/{{ $page->slug }}" @if($option['page'] === '/'.$page->slug) selected @endif>{{ $page->title }}</option>
                                                            @endforeach
                                                        <!-- End Pages -->
                                                            <!-- Services -->
                                                            <option disabled>Services</option>
                                                            @foreach($services as $service)
                                                                <option value="/services/{{ $service->slug }}" @if($option['page'] === '/services/'.$service->slug) selected @endif>{{ $service->title }}</option>
                                                            @endforeach
                                                        <!-- End Pages -->
                                                            <!-- StaticPages -->
                                                            <option disabled>Static Pages</option>
                                                            @foreach($static_pages as $static_page)
                                                                <option value="{{ $static_page['slug'] }}" @if($option['page'] === $static_page['slug']) selected @endif>{{ $static_page['title'] }}</option>
                                                        @endforeach
                                                        <!-- End Pages -->
                                                        </select>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>

                                                <div class="col-md-4">
                                                    <!-- Form Group -->
                                                    <div class="form-group mb-0">
                                                        <label class="input-label">Page Title (Optional)</label>
                                                        <input type="text" class="form-control page-title" name="title[]" placeholder="eg. HomePage" value="{{ $option['title'] }}">
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                            </div>
                                            <div class="remove-section text-right mt-1">
                                                <button class="btn btn-sm btn-no-focus btn-ghost-danger" onclick="removeMenu({{ $key }})">
                                                    <i class="tio-remove-from-trash"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="form-group mb-0">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!-- Form Group -->
                                                <div class="form-group mb-0">
                                                    <label class="input-label">Menu Type</label>
                                                    <select class="custom-select" name="type[]">
                                                        <option value="{{ null }}" selected>Choose one...</option>
                                                        <option value="pages">Pages</option>
                                                        <option value="services">Services</option>
                                                    </select>
                                                </div>
                                                <!-- End Form Group -->
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Form Group -->
                                                <div class="form-group mb-0">
                                                    <label class="input-label">Select Page</label>
                                                    <select class="custom-select" name="page[]" onchange="pageHandleChange(this)">
                                                        <option value="{{ null }}" selected>Choose one...</option>
                                                        <!-- Pages -->
                                                        <option disabled>Pages</option>
                                                        @foreach($pages as $page)
                                                            <option value="/{{ $page->slug }}">{{ $page->title }}</option>
                                                        @endforeach
                                                    <!-- End Pages -->
                                                        <!-- Services -->
                                                        <option disabled>Services</option>
                                                        @foreach($services as $service)
                                                            <option value="/services/{{ $service->slug }}">{{ $service->title }}</option>
                                                        @endforeach
                                                    <!-- End Pages -->
                                                        <!-- StaticPages -->
                                                        <option disabled>Static Pages</option>
                                                        @foreach($static_pages as $static_page)
                                                            <option value="{{ $static_page['slug'] }}">{{ $static_page['title'] }}</option>
                                                    @endforeach
                                                    <!-- End Pages -->
                                                    </select>
                                                </div>
                                                <!-- End Form Group -->
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Form Group -->
                                                <div class="form-group mb-0">
                                                    <label class="input-label">Page Title (Optional)</label>
                                                    <input type="text" class="form-control page-title" name="title[]" placeholder="eg. HomePage">
                                                </div>
                                                <!-- End Form Group -->
                                            </div>
                                        </div>
                                    </div>
                                @endforelse

                                <!-- Container For Input Field -->
                                <div id="addVariantContainer"></div>

                                <a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary text-right">
                                    <i class="tio-add"></i> Add New
                                </a>
                            </div>
                            <!-- End Form Group -->

                            <!-- Add Menu Input Field -->
                            <div id="addVariantTemplate" style="display: none;">
                                <div class="input-group-add-field">
                                    <div class="form-group mb-0">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!-- Form Group -->
                                                <div class="form-group mb-0">
                                                    <label class="input-label">Menu Type</label>
                                                    <select class="custom-select" name="type[]">
                                                        <option value="{{ null }}" selected>Choose one...</option>
                                                        <option value="pages">Pages</option>
                                                        <option value="services">Services</option>
                                                    </select>
                                                </div>
                                                <!-- End Form Group -->
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Form Group -->
                                                <div class="form-group mb-0">
                                                    <label class="input-label">Select Page</label>
                                                    <select class="custom-select" name="page[]" onchange="pageHandleChange(this)">
                                                        <option value="{{ null }}" selected>Choose one...</option>
                                                        <!-- Pages -->
                                                        <option disabled>Pages</option>
                                                        @foreach($pages as $page)
                                                            <option value="/{{ $page->slug }}">{{ $page->title }}</option>
                                                        @endforeach
                                                    <!-- End Pages -->
                                                        <!-- Services -->
                                                        <option disabled>Services</option>
                                                        @foreach($services as $service)
                                                            <option value="/services/{{ $service->slug }}">{{ $service->title }}</option>
                                                        @endforeach
                                                    <!-- End Pages -->
                                                        <!-- StaticPages -->
                                                        <option disabled>Static Pages</option>
                                                        @foreach($static_pages as $static_page)
                                                            <option value="{{ $static_page['slug'] }}">{{ $static_page['title'] }}</option>
                                                    @endforeach
                                                    <!-- End Pages -->
                                                    </select>
                                                </div>
                                                <!-- End Form Group -->
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Form Group -->
                                                <div class="form-group mb-0">
                                                    <label class="input-label">Page Title (Optional)</label>
                                                    <input type="text" class="form-control page-title" name="title[]" placeholder="eg. HomePage">
                                                </div>
                                                <!-- End Form Group -->
                                            </div>
                                        </div>
                                    </div>
                                    <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                        <i class="tio-clear"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- End Add Phone Input Field -->

                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Addon Variants Card -->
                </div>
            </div>
            <!-- End Row -->

            <div class="position-fixed bottom-0 content-centered-x w-100 z-index-99 mb-3" style="max-width: 40rem;">
                <!-- Card -->
                <div class="card card-sm bg-dark border-dark mx-2">
                    <div class="card-body">
                        <div class="row justify-content-center justify-content-sm-between">
                            <div class="col">
                                <a href="{{ route('menus.index') }}" class="btn btn-ghost-danger">Discard</a>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </form>
    </div>
    <!-- End Content -->
@endsection

@section('script')
    <script>
        // INITIALIZATION OF ADD INPUT FILED
        // =======================================================
        $('.js-add-field').each(function () {
            new HSAddField($(this), {
                addedField: function() {
                    $('.js-add-field .js-select2-custom-dynamic').each(function () {
                        var select2dynamic = $.HSCore.components.HSSelect2.init($(this));
                    });
                }
            }).init();
        });

        function pageHandleChange(element) {
            let title = null;
            let getTitle = element.parentNode.parentNode.parentNode;
            let getSelectOption = element.children;

            for(let i = 0; i<getSelectOption.length; i++){
                if (getSelectOption[i].selected) {
                    title = getSelectOption[i].innerText;
                    break;
                }
            }
            getTitle.querySelector('.page-title').value = title;
        }

        function removeMenu($key) {
            let element = document.getElementById($key);
            element.remove();
        }

    </script>
@endsection
