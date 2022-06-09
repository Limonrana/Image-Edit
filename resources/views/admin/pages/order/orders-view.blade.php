@extends('admin.layout.layout')

@section('title', 'Orders - Car Image Editing')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('orders.index', ['status' => 'all']) }}">Orders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order details</li>
                        </ol>
                    </nav>

                    <div class="d-sm-flex align-items-sm-center">
                        <h1 class="page-header-title">#ORDER-{{ $order->order_number }}</h1>
                        <span class="badge ml-sm-3 @if($order->payment_status === 'Paid') badge-soft-success @else badge-soft-danger @endif">
                            <span class="legend-indicator @if($order->payment_status === 'Paid') bg-success @else bg-danger @endif"></span>{{ $order->payment_status }}
                        </span>
                        @if ($order->status === 0)
                            <span class="badge badge-soft-warning ml-2 ml-sm-3">
                                <span class="legend-indicator bg-warning"></span>UnderReview
                            </span>
                        @elseif($order->status === 1)
                            <span class="badge badge-soft-info ml-2 ml-sm-3">
                                <span class="legend-indicator bg-info"></span>Open
                            </span>
                        @elseif($order->status === 2)
                            <span class="badge badge-soft-dark ml-2 ml-sm-3">
                                <span class="legend-indicator btn-ghost-dark"></span>Delivered
                            </span>
                        @elseif($order->status === 3)
                            <span class="badge badge-soft-success ml-2 ml-sm-3">
                                <span class="legend-indicator bg-success"></span>Completed
                            </span>
                        @else
                            <span class="badge badge-soft-danger ml-2 ml-sm-3">
                                <span class="legend-indicator bg-danger"></span>Cancelled
                            </span>
                        @endif
                        <span class="ml-2 ml-sm-3">
                          <i class="tio-date-range"></i> {{ $order->created_at->format('M d, Y H:i A') }}
                        </span>
                    </div>

                    <div class="mt-2">
                        <a class="text-body mr-3" href="javascript:;" onclick="window.print(); return false;">
                            <i class="tio-print mr-1"></i> Print order
                        </a>

                        <!-- Unfold -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker text-body" href="javascript:;"
                               data-hs-unfold-options='{
                       "target": "#moreOptionsDropdown",
                       "type": "css-animation"
                     }'>
                                More options <i class="tio-chevron-down"></i>
                            </a>

                            <div id="moreOptionsDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu mt-1">
                                <a class="dropdown-item" href="#">
                                    <i class="tio-clear dropdown-item-icon"></i> Cancel order
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="tio-archive dropdown-item-icon"></i> Archive
                                </a>
                            </div>
                        </div>
                        <!-- End Unfold -->
                    </div>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle mr-1" href="#" data-toggle="tooltip" data-placement="top" title="Previous order">
                        <i class="tio-arrow-backward"></i>
                    </a>
                    <a class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle" href="#" data-toggle="tooltip" data-placement="top" title="Next order">
                        <i class="tio-arrow-forward"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-lg-8 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Order details <span class="badge badge-soft-dark rounded-circle ml-1">{{ count($order->order_details) }}</span></h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Service -->
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="h5 d-block" href="#">{{ $order->complexity->name }}</div>
                                <div class="font-size-sm text-body"><span>Image complexity</span></div>
                            </div>
                            <div class="col col-md-2 align-self-center"><h5>${{ number_format(floatval($order->cp_price), 2, '.', '') }}</h5></div>
                            <div class="col col-md-2 align-self-center"><h5>{{ $order->qty }}</h5></div>
                            <div class="col col-md-2 align-self-center text-right"><h5>${{ number_format(floatval($order->cp_price) * $order->qty, 2, '.', '') }}</h5></div>
                        </div>

                        <hr>

                        <!-- Media -->
                        @foreach($order->order_details as $detail)
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="h5 d-block" href="#">{{ $detail->name }}</div>
                                    <div class="font-size-sm text-body"><span>Addon:</span><span class="font-weight-bold">{{ $detail->service->title }}</span></div>
                                </div>
                                <div class="col col-md-2 align-self-center"><h5>${{ number_format(floatval($detail->price), 2, '.', '') }}</h5></div>
                                <div class="col col-md-2 align-self-center"><h5>{{ $detail->qty }}</h5></div>
                                <div class="col col-md-2 align-self-center text-right"><h5>${{ number_format(floatval($detail->total_price), 2, '.', '') }}</h5></div>
                            </div>
                            <hr>
                        @endforeach
                        <!-- End Media -->

                        <div class="row justify-content-md-end mb-3">
                            <div class="col-md-8 col-lg-7">
                                <dl class="row text-sm-right">
                                    <dt class="col-sm-6">Subtotal:</dt>
                                    <dd class="col-sm-6">${{ number_format(floatval($order->total), 2, '.', '') }}</dd>
                                    <dt class="col-sm-6">Extra:</dt>
                                    <dd class="col-sm-6">$0.00</dd>
                                    <dt class="col-sm-6">Total:</dt>
                                    <dd class="col-sm-6">${{ number_format(floatval($order->total), 2, '.', '') }}</dd>
                                    <dt class="col-sm-6">Amount paid:</dt>
                                    <dd class="col-sm-6">
                                        @if($order->payment_status === 'Paid')
                                            ${{ number_format(floatval($order->total), 2, '.', '') }}
                                        @else
                                            $0.00
                                        @endif
                                    </dd>
                                </dl>
                                <!-- End Row -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Body -->

                    @if ($order->status === 0)
                        <div class="card-footer text-right">
                            @if ($order->status === 0 || $order->status === 1 || $order->status === 2)
                                <a href="{{ route('orders.accept', ['id' => $order->order_number, 'status' => 'cancel-order']) }}" class="btn btn-danger">Cancel Order</a>
                            @endif
                            @if ($order->status === 0)
                                <a href="{{ route('orders.accept', ['id' => $order->order_number, 'status' => 'under-review']) }}" class="btn btn-success">Accept Order</a>
                            @endif
                        </div>
                    @endif
                </div>
                <!-- End Card -->

                <!-- Card -->
                @if ($order->status === 1)
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Upload Work & Deliver</h4>
                        </div>
                        <!-- End Header -->
                        <form action="{{ route('orders.deliver', $order->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Body -->
                            <div class="card-body">
                                <!-- Dropzone -->
                                <div id="attachFilesDelivery" class="dropzone-custom custom-file-boxed">
                                    <div id="preview-template" class="row"></div>
                                    <div id="uploadBox" class="dz-message custom-file-boxed-label" onclick="document.getElementById('deliveryFiles').click();">
                                        <img class="avatar avatar-xl avatar-4by3 mb-3" src="{{ asset('assets/svg/illustrations/browse.svg') }}" alt="Image Description">
                                        <h5 class="mb-1">Choose files to upload</h5>
                                        <p class="mb-2">or</p>
                                        <span class="btn btn-sm btn-primary">Browse files</span>
                                    </div>
                                    <div id="secondUploadBox" class="mt-3" style="display: none;" onclick="document.getElementById('deliveryFiles').click();">
                                        <span class="btn btn-sm btn-primary">Browse another files</span>
                                    </div>
                                </div>
                                <input type="file" name="files[]" id="deliveryFiles" multiple="multiple" class="d-none" onchange="handleAttchFile(this)" />
                                <!-- End Dropzone -->
                            </div>
                            <!-- Body -->
                            <!-- Footer -->
                            <div class="card-footer text-right">
                                @if ($order->status === 0 || $order->status === 1 || $order->status === 2)
                                    <a href="{{ route('orders.accept', ['id' => $order->order_number, 'status' => 'cancel-order']) }}" class="btn btn-danger">Cancel Order</a>
                                @endif
                                @if ($order->status === 1)
                                    <button class="btn btn-success" type="submit">Deliver Order</button>
                                @endif
                            </div>
                            <!-- End Footer -->
                        </form>
                    </div>
                @elseif($order->status !== 0)
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Upload Work & Deliver</h4>
                        </div>
                        <!-- End Header -->
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                <h3 class="alert-heading">Order Delivered!</h3>
                                <p class="text-inherit">Your order has been delivered. Please wait for the client to review your work.</p>
                            </div>

                            <!-- Gallery -->
                            <div class="row gx-2">
                                @foreach($order->delivery_files as $file)
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <!-- Card -->
                                        <div class="card card-sm">
                                            <img class="card-img-top" src="{{ asset($file->path) }}" alt="{{ $file->name }}">

                                            <div class="card-body text-center">
                                                <a class="js-fancybox text-body" href="javascript:;" data-toggle="tooltip" data-placement="top" title="View"
                                                   data-src="{{ asset($file->path) }}"
                                                   data-caption="{{ $file->name }}">
                                                    <i class="tio-visible-outlined mr-1"></i> View
                                                </a>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>
                                @endforeach
                            </div>
                            <!-- End Gallery -->
                        </div>
                    </div>
                @endif
                <!-- End Card -->

                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Order activity
                        </h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Step -->
                        <ul class="step step-icon-xs">
                            @if($order->delivery_accepted)
                                <!-- Step Item -->
                                    <li class="step-item">
                                        <div class="step-content-wrapper">
                                            <small class="step-divider">{{ $order->delivery_accepted->format('l, d F') }}</small>
                                        </div>
                                    </li>
                                <!-- End Step Item -->
                                <!-- Step Item -->
                                    <li class="step-item">
                                        <div class="step-content-wrapper">
                                            <span class="step-icon step-icon-soft-dark step-icon-pseudo"></span>

                                            <div class="step-content">
                                                <h5 class="mb-1">
                                                    <a class="text-dark" href="#">Order was Completed</a>
                                                </h5>
                                                <p class="font-size-sm mb-0">#ORDER-{{ $order->order_number }}</p>
                                                <p class="font-size-sm mb-0">{{ $order->delivery_accepted->format('H:i A') }}</p>
                                            </div>
                                        </div>
                                    </li>
                                <!-- End Step Item -->

                                <!-- Step Item -->
                                    <li class="step-item">
                                        <div class="step-content-wrapper">
                                            <span class="step-icon step-icon-soft-dark step-icon-pseudo"></span>

                                            <div class="step-content">
                                                <h5 class="mb-1">
                                                    <a class="text-dark" href="#">Order was Accepted</a>
                                                </h5>
                                                <p class="font-size-sm mb-0">#ORDER-{{ $order->order_number }}</p>
                                                <p class="font-size-sm mb-0">{{ $order->delivery_accepted->format('H:i A') }}</p>
                                            </div>
                                        </div>
                                    </li>
                                 <!-- End Step Item -->
                            @endif

                            @if($order->delivered)
                                <!-- Step Item -->
                                    <li class="step-item">
                                        <div class="step-content-wrapper">
                                            <small class="step-divider">{{ $order->delivered->format('l, d F') }}</small>
                                        </div>
                                    </li>
                                <!-- End Step Item -->

                                <!-- Step Item -->
                                    <li class="step-item">
                                        <div class="step-content-wrapper">
                                            <span class="step-icon step-icon-soft-dark step-icon-pseudo"></span>

                                            <div class="step-content">
                                                <h5 class="mb-1">
                                                    <a class="text-dark" href="#">Order was Delivered</a>
                                                </h5>
                                                <p class="font-size-sm mb-0">#ORDER-{{ $order->order_number }}</p>
                                                <p class="font-size-sm mb-0">{{ $order->delivered->format('H:i A') }}</p>
                                            </div>
                                        </div>
                                    </li>
                                <!-- End Step Item -->
                            @endif

                            @if($order->status > 0 && $order->status !== 4)
                            <!-- Step Item -->
                                <li class="step-item">
                                    <div class="step-content-wrapper">
                                        <small class="step-divider">{{ $order->updated_at->format('l, d F') }}</small>
                                    </div>
                                </li>
                                <!-- End Step Item -->

                                <!-- Step Item -->
                                <li class="step-item">
                                    <div class="step-content-wrapper">
                                        <span class="step-icon step-icon-soft-dark step-icon-pseudo"></span>

                                        <div class="step-content">
                                            <h5 class="mb-1">
                                                <a class="text-dark" href="#">Order was accepted</a>
                                            </h5>
                                            <p class="font-size-sm mb-0">#ORDER-{{ $order->order_number }}</p>
                                            <p class="font-size-sm mb-0">{{ $order->updated_at->format('H:i A') }}</p>
                                        </div>
                                    </div>
                                </li>
                            <!-- End Step Item -->
                            @endif

                            <!-- Step Item -->
                                <li class="step-item">
                                    <div class="step-content-wrapper">
                                        <small class="step-divider">{{ $order->created_at->format('l, d F') }}</small>
                                    </div>
                                </li>
                            <!-- End Step Item -->

                            <!-- Step Item -->
                            <li class="step-item">
                                <div class="step-content-wrapper">
                                    <span class="step-icon step-icon-soft-dark step-icon-pseudo"></span>

                                    <div class="step-content">
                                        <h5 class="mb-1">
                                            <a class="text-dark" href="#">Order was placed</a>
                                        </h5>
                                        <p class="font-size-sm mb-0">#ORDER-{{ $order->order_number }}</p>
                                        <p class="font-size-sm mb-0">{{ $order->created_at->format('H:i A') }}</p>
                                    </div>
                                </div>
                            </li>
                            <!-- End Step Item -->
                        </ul>
                        <!-- End Step -->

                        <small>Times are shown in the local time zone.</small>
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->

                <!-- Chat Card -->
                <div class="card mt-5 card-bordered">
                    <div class="card-header">
                        <h4 class="card-header-title"><strong>Chat</strong></h4>
                        <a class="btn btn-xs btn-secondary" href="#" data-abc="true">Let's Chat App</a>
                    </div>
                    <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height: 38.5rem !important;">
                        <div class="media-section media-chat"> <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                            <div class="media-body">
                                <p>Hi</p>
                                <p>How are you ...???</p>
                                <p>What are you doing tomorrow?<br> Can we come up a bar?</p>
                                <p class="meta"><time datetime="2018">23:58</time></p>
                            </div>
                        </div>
                        <div class="media-section media-meta-day">Today</div>
                        <div class="media-section media-chat media-chat-reverse">
                            <div class="media-body">
                                <p>Hiii, I'm good.</p>
                                <p>How are you doing?</p>
                                <p>Long time no see! Tomorrow office. will be free on sunday.</p>
                                <p class="meta"><time datetime="2018">00:06</time></p>
                            </div>
                        </div>
                        <div class="media-section media-chat"> <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                            <div class="media-body">
                                <p>Okay</p>
                                <p>We will go on sunday? </p>
                                <p class="meta"><time datetime="2018">00:07</time></p>
                            </div>
                        </div>
                        <div class="media-section media-chat media-chat-reverse">
                            <div class="media-body">
                                <p>That's awesome!</p>
                                <p>I will meet you Sandon Square sharp at 10 AM</p>
                                <p>Is that okay?</p>
                                <p class="meta"><time datetime="2018">00:09</time></p>
                            </div>
                        </div>
                        <div class="media-section media-chat"> <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                            <div class="media-body">
                                <p>Okay i will meet you on Sandon Square </p>
                                <p class="meta"><time datetime="2018">00:10</time></p>
                            </div>
                        </div>
                        <div class="media-section media-chat media-chat-reverse">
                            <div class="media-body">
                                <p>Do you have pictures of Matley Marriage?</p>
                                <p class="meta"><time datetime="2018">00:10</time></p>
                            </div>
                        </div>
                        <div class="media-section media-chat"> <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                            <div class="media-body">
                                <p>Sorry I don't have. i changed my phone.</p>
                                <p class="meta"><time datetime="2018">00:12</time></p>
                            </div>
                        </div>
                        <div class="media-section media-chat media-chat-reverse">
                            <div class="media-body">
                                <p>Okay then see you on sunday!!</p>
                                <p class="meta"><time datetime="2018">00:12</time></p>
                            </div>
                        </div>
                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
                        </div>
                    </div>
                    <div class="publisher bt-1 border-light">
                        <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                        <input class="publisher-input" type="text" placeholder="Write your message...">
                        <span class="publisher-btn file-group">
                            <i class="fa fa-paperclip file-browser"></i> <input type="file">
                        </span>
                        <a class="publisher-btn text-info" href="#" data-abc="true"><i class="fa fa-paper-plane"></i></a>
                    </div>
                </div>
                <!-- End Chat Card -->
            </div>

            <div class="col-lg-4">
                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Customer</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <a class="media align-items-center" href="{{ route('customers.edit', $order->user->id) }}">
                            @if ($order->user->profile_photo_path !== null)
                                <div class="avatar avatar-circle mr-3">
                                    <img class="avatar-img" src="{{asset($order->user->profile_photo_path) }}" alt="{{$order->user->name}}">
                                </div>
                            @else
                                <div class="avatar avatar-soft-primary avatar-circle mr-3">
                                    <span class="avatar-initials">{{ substr($order->user->name, 0, 1) }}</span>
                                </div>
                            @endif
                            <div class="media-body">
                                <span class="text-body text-hover-primary">{{ $order->user->name }}</span>
                            </div>
                            <div class="media-body text-right">
                                <i class="tio-chevron-right text-body"></i>
                            </div>
                        </a>

                        <hr>

                        <a class="media align-items-center" href="{{ route('customers.edit', $order->user->id) }}">
                            <div class="icon icon-soft-info icon-circle mr-3">
                                <i class="tio-shopping-basket-outlined"></i>
                            </div>
                            <div class="media-body">
                                <span class="text-body text-hover-primary">{{ $orders }} @if($orders > 1) orders @else order @endif</span>
                            </div>
                            <div class="media-body text-right">
                                <i class="tio-chevron-right text-body"></i>
                            </div>
                        </a>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Contact info</h5>
                        </div>

                        <ul class="list-unstyled list-unstyled-py-2">
                            <li><i class="tio-online mr-2"></i> {{ $order->user->email }}</li>
                            <li><i class="tio-android-phone-vs mr-2"></i> {{ $order->user->phone }}</li>
                        </ul>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Billing address</h5>
                        </div>

                        <span class="d-block">
                            @if ($address)
                                @if($address->address_line_1) {{ $address->address_line_1 }}<br> @endif
                                @if($address->address_line_2) {{ $address->address_line_2 }}<br> @endif
                                @if($address->city) {{ $address->city }}, @endif @if($address->state) {{ $address->state }}<br> @endif
                                @if($address->country) {{ $address->country }}, @endif @if($address->zip_code) {{ $address->zip_code }} @endif
                            @else
                                <span class="text-muted">No billing address</span>
                            @endif
                        </span>
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card mt-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Order Meta Data</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Returned File Details</h5>
                        </div>

                        <ul class="list-unstyled list-unstyled-py-2">
                            <li>Returned File Type: <span class="font-weight-bold badge badge-soft-dark">{{ $order->return_file_types }}</span></li>
                            <li>Background Options: <span class="font-weight-bold badge badge-soft-dark">{{ $order->background_type }}</span></li>
                        </ul>

                        <hr>
                        @if($order->instructions)
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Order Instruction</h5>
                            </div>
                            <span class="d-block">{{ $order->instructions }}</span>
                        @endif

                        <hr>

                        <div class="mt-3">
                            <h5 class="mb-1">Transaction & Payment</h5>
                            <span class="d-block">
                                @if ($order->payment_method === 'Paypal')
                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="{{ asset('assets/svg/brands/paypal.svg') }}" alt="PaypalPay">
                                    <span class="badge badge-soft-info" style="font-size: 12px;">{{ $order->transaction_id ? $order->transaction_id : 'UNPAID' }}</span>
                                @else
                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="{{ asset('assets/svg/brands/mastercard.svg') }}" alt="CardPay">
                                    <span class="badge badge-soft-info" style="font-size: 12px;">{{ $order->transaction_id ? $order->transaction_id : 'UNPAID' }}</span>
                                @endif
                            </span>
                        </div>

                        <hr>

                        @if($order->delivered == null)
                            <div class="mt-3">
                                <h5 class="mb-3">Time Left To Deliver</h5>
                                <div class="content-count-down">
                                    <div class="wrapper-count-down">
                                        <div class="digit">
                                            <div class="label"><div class="inner"><span id="delivery_days">00</span></div></div>
                                            <span>DAYS</span>
                                        </div>

                                        <span>:</span>

                                        <div class="digit">
                                            <div class="label"><div class="inner"><span id="delivery_hours">00</span></div></div>
                                            <span>HOURS</span>
                                        </div>

                                        <span>:</span>

                                        <div class="digit">
                                            <div class="label"><div class="inner"><span id="delivery_minutes">00</span></div></div>
                                            <span>MINUTES</span>
                                        </div>

                                        <span>:</span>

                                        <div class="digit">
                                            <div class="label"><div class="inner"><span id="delivery_seconds">00</span></div></div>
                                            <span>SECONDS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card mt-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Order Uploads</h4>

                        <!-- Download Button -->
                        <a class="js-hs-unfold-invoker btn btn-sm btn-ghost-secondary" href="javascript:;">
                            <i class="tio-download-from-cloud"></i> Download All
                        </a>
                        <!-- Download Button -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Gallery -->
                        <div id="fancyboxGallery" class="js-fancybox row justify-content-sm-center gx-2"
                             data-hs-fancybox-options='{
                               "selector": "#fancyboxGallery .js-fancybox-item"
                             }'>
                            @foreach($order->upload_files as $file)
                                <div class="@if(count($order->upload_files) <= 4) col-{{ 12 / count($order->upload_files) }} @else col-3 @endif mb-3 mb-lg-5">
                                <!-- Card -->
                                <div class="card card-sm">
                                    <img class="card-img-top" src="{{ asset($file->path) }}" alt="{{ $file->name }}">

                                    <div class="card-body">
                                        <div class="row text-center">
                                            <div class="col">
                                                <a class="js-fancybox-item text-body" href="javascript:;" data-toggle="tooltip" data-placement="top" title="View"
                                                   data-src="{{ asset($file->path) }}"
                                                   data-caption="{{ $file->name }}">
                                                    <i class="tio-visible-outlined"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- End Row -->
                                    </div>
                                </div>
                                <!-- End Card -->
                            </div>
                            @endforeach
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <!-- Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
@endsection

@section('styles')
    <style>
        .content-count-down {
            background: #ffffff;
            box-shadow: 3px 3px 7px #a6b0bb, -3px -3px 7px #ffffff73;
            margin: auto;
            /*padding: 10px 10px;*/
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: stretch;
        }
        .content-count-down .wrapper-count-down {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 16px 10px;
        }
        .content-count-down .wrapper-count-down > span {
            color: #2e4a6c;
            font-size: 2rem;
            transform: translateY(-15px);
        }
        .content-count-down .wrapper-count-down .digit {
            display: flex;
            flex-direction: column;
        }
        .content-count-down .wrapper-count-down .digit > span {
            display: flex;
            justify-content: center;
            margin-top: 15px;
            color: #2e4a6c;
        }
        .content-count-down .wrapper-count-down .label {
            display: flex;
            /*width: 180px;*/
            justify-content: space-around;
        }
        .content-count-down .wrapper-count-down .inner {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            height: 3rem;
            /*width: 4rem;*/
            padding: 6px;
            margin: 0 5px;
            /*background-color: #c6d2e0;*/
            box-shadow: inset -3px -3px 7px #ffffff73, inset 3px 3px 7px #a6b0bb;
        }
        .content-count-down .wrapper-count-down .inner > span {
            display: flex;
            flex-direction: column;
            font-size: 2.5rem;
            color: #2e4a6c;
        }
        .content-count-down .labels {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
            color: antiquewhite;
            border: 1px solid lime;
        }
        .drop {
            animation: dropnum 0.5s ease-out forwards;
        }
        @keyframes dropnum {
            0% {
                transform: translateY(-35px);
                opacity: 0;
            }
            40% {
                transform: translateY(30px);
                opacity: 0.7;
            }
            70% {
                transform: translateY(-10px);
                opacity: 0.9;
            }
            100% {
                transform: translateY(0px);
                opacity: 1;
            }
        }

        /*Chat Card CSS*/
        .card-bordered {
            border: 1px solid #ebebeb
        }

        .padding {
            padding: 3rem !important
        }

        .btn-xs {
            font-size: 11px;
            padding: 2px 8px;
            line-height: 18px
        }

        .btn-xs:hover {
            color: #fff !important
        }

        .card-title {
            font-family: Roboto, sans-serif;
            font-weight: 300;
            line-height: 1.5;
            margin-bottom: 0;
            padding: 15px 20px;
            border-bottom: 1px solid rgba(77, 82, 89, 0.07)
        }

        .ps-container {
            position: relative
        }

        .ps-container {
            -ms-touch-action: auto;
            touch-action: auto;
            overflow: hidden !important;
            -ms-overflow-style: none
        }

        .media-chat {
            padding-right: 64px;
            margin-bottom: 0
        }

        .media-section {
            display: flex;
            padding: 16px 12px;
            -webkit-transition: background-color .2s linear;
            transition: background-color .2s linear
        }

        .media-section .avatar {
            flex-shrink: 0
        }

        .avatar {
            position: relative;
            display: inline-block;
            width: 36px;
            height: 36px;
            line-height: 36px;
            text-align: center;
            border-radius: 100%;
            background-color: #f5f6f7;
            color: #8b95a5;
            text-transform: uppercase
        }

        .media-chat .media-body {
            -webkit-box-flex: initial;
            flex: initial;
            display: table
        }

        .media-body {
            min-width: 0
        }

        .media-chat .media-body p {
            position: relative;
            padding: 6px 8px;
            margin: 4px 0;
            background-color: #f5f6f7;
            border-radius: 3px;
            font-weight: 100;
            color: #9b9b9b
        }

        .media-section>* {
            margin: 0 8px
        }

        .media-chat .media-body p.meta {
            background-color: transparent !important;
            padding: 0;
            opacity: .8
        }

        .media-meta-day {
            -webkit-box-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            align-items: center;
            margin-bottom: 0;
            color: #8b95a5;
            opacity: .8;
            font-weight: 400
        }

        .media-section {
            padding: 16px 12px;
            -webkit-transition: background-color .2s linear;
            transition: background-color .2s linear
        }

        .media-meta-day::before {
            margin-right: 16px
        }

        .media-meta-day::before,
        .media-meta-day::after {
            content: '';
            -webkit-box-flex: 1;
            flex: 1 1;
            border-top: 1px solid #ebebeb
        }

        .media-meta-day::after {
            content: '';
            -webkit-box-flex: 1;
            flex: 1 1;
            border-top: 1px solid #ebebeb
        }

        .media-meta-day::after {
            margin-left: 16px
        }

        .media-chat.media-chat-reverse {
            padding-right: 12px;
            padding-left: 64px;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: reverse;
            flex-direction: row-reverse
        }

        .media-chat {
            padding-right: 64px;
            margin-bottom: 0
        }

        .media-section {
            padding: 16px 12px;
            -webkit-transition: background-color .2s linear;
            transition: background-color .2s linear
        }

        .media-chat.media-chat-reverse .media-body p {
            float: right;
            clear: right;
            background-color: #48b0f7;
            color: #fff
        }

        .media-chat .media-body p {
            position: relative;
            padding: 6px 8px;
            margin: 4px 0;
            background-color: #f5f6f7;
            border-radius: 3px
        }

        .border-light {
            border-color: #f1f2f3 !important
        }

        .bt-1 {
            border-top: 1px solid #ebebeb !important
        }

        .publisher {
            position: relative;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            padding: 12px 20px;
            background-color: #f9fafb
        }

        .publisher>*:first-child {
            margin-left: 0
        }

        .publisher>* {
            margin: 0 8px
        }

        .publisher-input {
            -webkit-box-flex: 1;
            flex-grow: 1;
            border: none;
            outline: none !important;
            background-color: transparent
        }

        .publisher-btn {
            background-color: transparent;
            border: none;
            color: #8b95a5;
            font-size: 16px;
            cursor: pointer;
            overflow: -moz-hidden-unscrollable;
            -webkit-transition: .2s linear;
            transition: .2s linear
        }

        .file-group {
            position: relative;
            overflow: hidden
        }

        .publisher-btn {
            background-color: transparent;
            border: none;
            color: #cac7c7;
            font-size: 16px;
            cursor: pointer;
            overflow: -moz-hidden-unscrollable;
            -webkit-transition: .2s linear;
            transition: .2s linear
        }

        .file-group input[type="file"] {
            position: absolute;
            opacity: 0;
            z-index: -1;
            width: 20px
        }
        .upload-card {
            transition: transform .3s;
            box-shadow: 0px 0px 10px #ccc;
        }
        .upload-card:hover {
            transform: scale(1.1);
        }
        .upload-remove {
            position: absolute;
            right: 10px;
            top: 10px;
        }
    </style>
@endsection

@section('script')
    <script>
        function showRemaining() {
            // Time Set
            const _seconds  = 1000;
            const _minutes  = _seconds * 60;
            const _hours    = _minutes * 60;
            const _days     = _hours * 24;

            const timer = setInterval(() => {
                const start = new Date();
                const end = new Date('{{ $order->created_at }}');
                end.setHours( end.getHours() + parseInt({{ $order->deadline }}) );
                console.log()
                const distance = end.getTime() - start.getTime();

                // When time will be finished then clear the interval
                if (distance < 0) {
                    clearInterval(timer);
                    document.getElementById("delivery_days").style.color    = 'red';
                    document.getElementById("delivery_hours").style.color   = 'red';
                    document.getElementById("delivery_minutes").style.color = 'red';
                    document.getElementById("delivery_seconds").style.color = 'red';
                    return;
                }

                // Set UI
                document.getElementById("delivery_days").innerText      = Math.floor(distance / _days).toString().padStart(2, "0");
                document.getElementById("delivery_hours").innerText     = Math.floor((distance % _days) / _hours).toString().padStart(2, "0");
                document.getElementById("delivery_minutes").innerText   = Math.floor((distance % _hours) / _minutes).toString().padStart(2, "0");
                document.getElementById("delivery_seconds").innerText   = Math.floor((distance % _minutes) / _seconds).toString().padStart(2, "0");
            }, 1000);
        }
        // Call Function For CountDown
        @if($order->delivered == null)
            showRemaining();
        @endif

        // Chat Auto Scroll
        function scrollToBottom() {
            const messages = document.getElementById('chat-content');
            messages.scrollTop = messages.scrollHeight;
        }

        scrollToBottom();
        // setInterval(getMessages, 100);

        // INITIALIZATION OF DROPZONE FILE ATTACH MODULE
        // =======================================================
        function handleAttchFile(event) {
            const files = event.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                readerFile(file).then(e => handlePreview(e, i));
            }
        }

        const readerFile = (file) => {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onload = (e) => resolve(e.target.result);
                reader.onerror = (e) => reject(e);
                reader.readAsDataURL(file);
            });
        };

        const handlePreview = (file, index) => {
            const template = document.getElementById('preview-template');
            let itemHtml = `<div class="col py-2" data-index="${index}">
                                <div class="card upload-card" style="min-width: 10rem; max-width: 12.5rem;">
                                    <img class="card-img-top" src="${file}">
                                </div>
                            </div>`;
            template.insertAdjacentHTML('beforeend', itemHtml);
            uploadUIShowHide();
        };

        const uploadUIShowHide = () => {
            // Upload UI Show Hide
            const template = document.getElementById('preview-template');
            const upload = document.getElementById('uploadBox');
            const secondUpload = document.getElementById('secondUploadBox');
            if (template.children.length > 0) {
                upload.style.display = 'none';
                secondUpload.style.display = 'block';
            } else {
                upload.style.display = 'block';
                secondUpload.style.display = 'none';
            }
        }

        const uploadRemove = (e) => {
            const target = e.target;
            if (target.classList.contains('upload-remove') || target.parentElement.classList.contains('upload-remove')) {
                if (target.classList.contains('upload-remove')) {
                    let index = target.parentElement.dataset.index;
                    target.parentElement.parentElement.remove();
                } else {
                    let index = target.parentElement.parentElement.parentElement.dataset.index;
                    target.parentElement.parentElement.parentElement.remove();
                }
                // Upload UI Show Hide
                uploadUIShowHide();
            }
                console.log(document.getElementById('deliveryFiles').files);
        }
        // Call Event Listener
        // document.getElementById('preview-template').addEventListener('click', (e) => uploadRemove(e));
    </script>
@endsection
