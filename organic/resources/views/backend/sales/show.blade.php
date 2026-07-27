@extends('backend.layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h1 class="h2 fs-16 mb-0">{{ translate('Order Details') }}</h1>
        </div>
        <div class="card-body">
            <div class="row gutters-5">
                <div class="col text-md-left text-center">
                </div>
                @php
                    $delivery_status = $order->delivery_status;
                    $payment_status = $order->payment_status;
                    $admin_user_id = get_admin()->id;
                @endphp
                @if ($order->seller_id == $admin_user_id || get_setting('product_manage_by_admin') == 1)

                    <!--Assign Delivery Boy-->
                    @if (addon_is_activated('delivery_boy'))
                        <div class="col-md-3 ml-auto">
                            <label for="assign_deliver_boy">{{ translate('Assign Deliver Boy') }}</label>
                            @if (($delivery_status == 'pending' || $delivery_status == 'confirmed' || $delivery_status == 'picked_up') && auth()->user()->can('assign_delivery_boy_for_orders'))
                                <select class="form-control aiz-selectpicker" data-live-search="true"
                                    data-minimum-results-for-search="Infinity" id="assign_deliver_boy">
                                    <option value="">{{ translate('Select Delivery Boy') }}</option>
                                    @foreach ($delivery_boys as $delivery_boy)
                                        <option value="{{ $delivery_boy->id }}"
                                            @if ($order->assign_delivery_boy == $delivery_boy->id) selected @endif>
                                            {{ $delivery_boy->name }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" class="form-control" value="{{ optional($order->delivery_boy)->name }}"
                                    disabled>
                            @endif
                        </div>
                    @endif

                    <div class="col-md-3 ml-auto">
                        <label for="update_payment_status">{{ translate('Payment Status') }}</label>
                        @if (auth()->user()->can('update_order_payment_status') && $payment_status == 'unpaid')
                            {{-- <select class="form-control aiz-selectpicker" data-minimum-results-for-search="Infinity" id="update_payment_status"> --}}
                            <select class="form-control aiz-selectpicker" data-minimum-results-for-search="Infinity" id="update_payment_status" onchange="confirm_payment_status()">
                                <option value="unpaid" @if ($payment_status == 'unpaid') selected @endif>
                                    {{ translate('Unpaid') }}
                                </option>
                                <option value="paid" @if ($payment_status == 'paid') selected @endif>
                                    {{ translate('Paid') }}
                                </option>
                            </select>
                        @else
                            <input type="text" class="form-control" value="{{ ucfirst($payment_status) }}" disabled>
                        @endif
                    </div>
                    <div class="col-md-3 ml-auto">
                        <label for="update_delivery_status">{{ translate('Delivery Status') }}</label>
                        @if (auth()->user()->can('update_order_delivery_status') && $delivery_status != 'cancelled')
                            <select class="form-control aiz-selectpicker" data-minimum-results-for-search="Infinity"
                                id="update_delivery_status">
                                <option value="pending" @if ($delivery_status == 'pending') selected @endif>
                                    {{ translate('Pending') }}
                                </option>
                                <option value="confirmed" @if ($delivery_status == 'confirmed') selected @endif>
                                    {{ translate('Confirmed') }}
                                </option>
                                <option value="picked_up" @if ($delivery_status == 'picked_up') selected @endif>
                                    {{ translate('Picked Up') }}
                                </option>
                                <option value="on_the_way" @if ($delivery_status == 'on_the_way') selected @endif>
                                    {{ translate('On The Way') }}
                                </option>
                                <option value="delivered" @if ($delivery_status == 'delivered') selected @endif>
                                    {{ translate('Delivered') }}
                                </option>
                                <option value="cancelled" @if ($delivery_status == 'cancelled') selected @endif>
                                    {{ translate('Cancel') }}
                                </option>
                            </select>
                        @else
                            <input type="text" class="form-control" value="{{ $delivery_status }}" disabled>
                        @endif
                    </div>
                    <div class="col-md-3 ml-auto">
                        <label for="update_tracking_code">
                            {{ translate('Tracking Code (optional)') }}
                        </label>
                        <input type="text" class="form-control" id="update_tracking_code"
                            value="{{ $order->tracking_code }}">
                    </div>
                @endif
            </div>
            <div class="mb-3">
                @php
                    $removedXML = '<?xml version="1.0" encoding="UTF-8"?>';
                @endphp
                {!! str_replace($removedXML, '', QrCode::size(100)->generate($order->code)) !!}
            </div>
            <div class="row gutters-5">
                <div class="col text-md-left text-center">
                    @if(json_decode($order->shipping_address))
                        <address>
                            <strong class="text-main">
                                {{ json_decode($order->shipping_address)->name }}
                            </strong><br>
                            {{ json_decode($order->shipping_address)->email }}<br>
                            {{ json_decode($order->shipping_address)->phone }}<br>
                            {{ json_decode($order->shipping_address)->address }}, {{ json_decode($order->shipping_address)->city }}, @if(isset(json_decode($order->shipping_address)->state)) {{ json_decode($order->shipping_address)->state }} - @endif {{ json_decode($order->shipping_address)->postal_code }}<br>
                            {{ json_decode($order->shipping_address)->country }}
                        </address>
                    @else
                        <address>
                            <strong class="text-main">
                                {{ $order->user->name }}
                            </strong><br>
                            {{ $order->user->email }}<br>
                            {{ $order->user->phone }}<br>
                        </address>
                    @endif
                    @if ($order->manual_payment && is_array(json_decode($order->manual_payment_data, true)))
                        <br>
                        <strong class="text-main">{{ translate('Payment Information') }}</strong><br>
                        {{ translate('Name') }}: {{ json_decode($order->manual_payment_data)->name }},
                        {{ translate('Amount') }}:
                        {{ single_price(json_decode($order->manual_payment_data)->amount) }},
                        {{ translate('TRX ID') }}: {{ json_decode($order->manual_payment_data)->trx_id }}
                        <br>
                        <a href="{{ uploaded_asset(json_decode($order->manual_payment_data)->photo) }}" target="_blank">
                            <img src="{{ uploaded_asset(json_decode($order->manual_payment_data)->photo) }}" alt=""
                                height="100">
                        </a>
                    @endif
                    <div class="mb-3">
                        <label for="order_remarks" class="form-label">{{ translate('Order Remarks') }}</label>
                        <input type="text"
                            class="form-control"
                            id="order_remarks"
                            value="{{ $order->remarks ?? '' }}"
                            placeholder="{{ translate('Add remarks here') }}"
                            {{ in_array($delivery_status, ['delivered', 'cancelled']) ? 'disabled' : '' }}>
                        <button type="button"
                            class="btn mt-2 btn-sm {{ in_array($delivery_status, ['delivered', 'cancelled']) ? 'btn-secondary' : 'btn-primary' }}"
                            id="update_remarks_btn"
                            {{ in_array($delivery_status, ['delivered', 'cancelled']) ? 'disabled' : '' }}>
                            {{ translate('Update Remarks') }}
                        </button>
                    </div>



                </div>
                @php
                    $subtotal = $order->orderDetails->sum(function($detail) {
                        return $detail->price * $detail->quantity;
                    });

                    $shipping = $order->orderDetails->sum('shipping_cost');
                    $coupon  = $order->coupon_discount ?? 0;
                    $tax     = $order->orderDetails->sum('tax');

                    // your desired total calculation
                    $computed_total = $subtotal + $shipping; // Add tax if needed
                @endphp
                <div class="col-md-4">
                    <table class="ml-auto">
                        <tbody>
                            <tr>
                                <td class="text-main text-bold">{{ translate('Order #') }}</td>
                                <td class="text-info text-bold text-right"> {{ $order->code }}</td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">{{ translate('Order Status') }}</td>
                                <td class="text-right">
                                    @if ($delivery_status == 'delivered')
                                        <span class="badge badge-inline badge-success">
                                            {{ translate(ucfirst(str_replace('_', ' ', $delivery_status))) }}
                                        </span>
                                    @else
                                        <span class="badge badge-inline badge-info">
                                            {{ translate(ucfirst(str_replace('_', ' ', $delivery_status))) }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">{{ translate('Order Date') }} </td>
                                <td class="text-right">{{ date('d-m-Y h:i A', $order->date) }}</td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">
                                    {{ translate('Total amount') }}
                                </td>
                                <td class="text-right">
                                    {{ single_price($computed_total) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">{{ translate('Payment method') }}</td>
                                <td class="text-right">
                                    {{ translate(ucfirst(str_replace('_', ' ', $order->payment_type))) }}</td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">{{ translate('Additional Info') }}</td>
                                <td class="text-right">{{ $order->additional_info }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr class="new-section-sm bord-no">

            <div class="mb-3">
                <input
                    type="text"
                    id="searchProduct"
                    class="form-control"
                    placeholder="Search for a product..."
                    autocomplete="off">
                <div id="searchResults" class="list-group position-absolute" style="z-index: 1050; width: 40%; max-height: 300px; overflow-y: auto;"></div>
            </div>

            <div class="row">
                <div class="col-lg-12 table-responsive">
                    <table class="table-bordered aiz-table invoice-summary table">
                        <thead>
                            <tr class="bg-trans-dark">
                                <th data-breakpoints="lg" class="min-col">#</th>
                                <th width="10%">{{ translate('Photo') }}</th>
                                <th class="text-uppercase">{{ translate('Description') }}</th>
                                <th data-breakpoints="lg" class="text-uppercase">{{ translate('Delivery Type') }}</th>
                                <th data-breakpoints="lg" class="min-col text-uppercase text-center">
                                    {{ translate('Qty') }}
                                </th>
                                <th data-breakpoints="lg" class="min-col text-uppercase text-center">
                                    {{ translate('Price') }}</th>
                                <th data-breakpoints="lg" class="min-col text-uppercase text-right">
                                    {{ translate('Total') }}</th>
                                    <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderDetails as $key => $orderDetail)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if ($orderDetail->product != null && $orderDetail->product->auction_product == 0)
                                            <a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank">
                                                <img height="50" src="{{ uploaded_asset($orderDetail->product->thumbnail_img) }}">
                                            </a>
                                        @elseif ($orderDetail->product != null && $orderDetail->product->auction_product == 1)
                                            <a href="{{ route('auction-product', $orderDetail->product->slug) }}" target="_blank">
                                                <img height="50" src="{{ uploaded_asset($orderDetail->product->thumbnail_img) }}">
                                            </a>
                                        @else
                                            <strong>{{ translate('N/A') }}</strong>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($orderDetail->product != null && $orderDetail->product->auction_product == 0)
                                            <strong>
                                                <a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank"
                                                    class="text-muted">
                                                    {{ $orderDetail->product->getTranslation('name') }}
                                                </a>
                                            </strong>
                                            <small>
                                                {{ $orderDetail->variation }}
                                            </small>
                                            <br>
                                            <small>
                                                @php
                                                    $product_stock = find_product_stock_by_variant($orderDetail->product, $orderDetail->variation, empty($orderDetail->variation));
                                                @endphp
                                                {{translate('SKU')}}: {{ $product_stock['sku'] ?? '' }}
                                            </small>
                                        @elseif ($orderDetail->product != null && $orderDetail->product->auction_product == 1)
                                            <strong>
                                                <a href="{{ route('auction-product', $orderDetail->product->slug) }}" target="_blank"
                                                    class="text-muted">
                                                    {{ $orderDetail->product->getTranslation('name') }}
                                                </a>
                                            </strong>
                                        @else
                                            <strong>{{ translate('Product Unavailable') }}</strong>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->shipping_type != null && $order->shipping_type == 'home_delivery')
                                            {{ translate('Home Delivery') }}
                                        @elseif ($order->shipping_type == 'pickup_point')
                                            @if ($order->pickup_point != null)
                                                {{ $order->pickup_point->getTranslation('name') }}
                                                ({{ translate('Pickup Point') }})
                                            @else
                                                {{ translate('Pickup Point') }}
                                            @endif
                                        @elseif($order->shipping_type == 'carrier')
                                            @if ($order->carrier != null)
                                                {{ $order->carrier->name }} ({{ translate('Carrier') }})
                                                <br>
                                                {{ translate('Transit Time').' - '.$order->carrier->transit_time }}
                                            @else
                                                {{ translate('Carrier') }}
                                            @endif
                                        @endif
                                    </td>
                                    <!--<td class="text-center">-->
                                    <!--    {{ $orderDetail->quantity }}-->
                                    <!--</td>-->
                                    <td class="text-center">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-sm btn-light decrease-qty" data-id="{{ $orderDetail->id }}">-</button>
                                            <input type="number" class="form-control form-control-sm qty-input" value="{{ $orderDetail->quantity }}" data-id="{{ $orderDetail->id }}" min="1" style="width: 50px; text-align: center;">
                                            <button type="button" class="btn btn-sm btn-light increase-qty" data-id="{{ $orderDetail->id }}">+</button>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{ single_price($orderDetail->price) }}
                                    </td>
                                    <td class="text-center">
                                        {{ single_price($orderDetail->price * $orderDetail->quantity) }}
                                    </td>
                                    <td class="text-center">
                                         <!--Add delete button -->
                                        <button type="button" class="btn btn-danger btn-sm delete-product" data-id="{{ $orderDetail->id }}">
                                            <i class="las la-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix float-right">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <strong class="text-muted">{{ translate('Sub Total') }} :</strong>
                            </td>
                            <td>
                            {{ single_price($order->orderDetails->sum(function($detail) {
                                return $detail->price * $detail->quantity;
                            })) }}
                         </td>
                        </tr>
                        <tr>
                            <td>
                                <strong class="text-muted">{{ translate('Tax') }} :</strong>
                            </td>
                            <td>
                                {{ single_price($order->orderDetails->sum('tax')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong class="text-muted">{{ translate('Shipping') }} :</strong>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="number" id="shipping_cost" value="{{ intval($order->orderDetails->sum('shipping_cost')) }}" class="form-control" step="1" min="0">
                                    <div class="input-group-append">
                                        <button id="update_shipping" class="btn btn-primary btn-sm">{{ translate('Update') }}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong class="text-muted">{{ translate('Coupon') }} :</strong>
                            </td>
                            <td>
                                {{ single_price($order->coupon_discount) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong class="text-muted">{{ translate('TOTAL') }} :</strong>
                            </td>
                            <td class="text-muted h5">
                                 {{ single_price($computed_total) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="no-print text-right">
                    <a href="{{ route('invoice.download', $order->id) }}" target="_blank" type="button" class="btn btn-icon btn-light">
                        <i class="las la-print"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('modal')

    <!-- confirm payment Status Modal -->
    <div id="confirm-payment-status" class="modal fade">
        <div class="modal-dialog modal-md modal-dialog-centered" style="max-width: 540px;">
            <div class="modal-content p-2rem">
                <div class="modal-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="64" viewBox="0 0 72 64">
                        <g id="Octicons" transform="translate(-0.14 -1.02)">
                          <g id="alert" transform="translate(0.14 1.02)">
                            <path id="Shape" d="M40.159,3.309a4.623,4.623,0,0,0-7.981,0L.759,58.153a4.54,4.54,0,0,0,0,4.578A4.718,4.718,0,0,0,4.75,65.02H67.587a4.476,4.476,0,0,0,3.945-2.289,4.773,4.773,0,0,0,.046-4.578Zm.6,52.555H31.582V46.708h9.173Zm0-13.734H31.582V23.818h9.173Z" transform="translate(-0.14 -1.02)" fill="#ffc700" fill-rule="evenodd"/>
                          </g>
                        </g>
                    </svg>
                    <p class="mt-3 mb-3 fs-16 fw-700">{{translate('Are you sure you want to change the payment status?')}}</p>
                    <button type="button" class="btn btn-light rounded-2 mt-2 fs-13 fw-700 w-150px" data-dismiss="modal">{{ translate('Cancel') }}</button>
                    <button type="button" onclick="update_payment_status()" class="btn btn-success rounded-2 mt-2 fs-13 fw-700 w-150px">{{translate('Confirm')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
    $(document).ready(function () {
        $(document).on("click", ".increase-qty, .decrease-qty", function () {
            var orderDetailId = $(this).data("id"); // Order detail ID
            var qtyInput = $('input[data-id="' + orderDetailId + '"]');
            var currentQty = parseInt(qtyInput.val());
            var newQty = currentQty + ($(this).hasClass("increase-qty") ? 1 : -1);

            if (newQty < 1) return; // Prevent quantity from being less than 1

            // Send AJAX request
            $.ajax({
                url: "/update-quantity",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"), // CSRF token
                    order_id: orderDetailId, // ID of the order detail
                    quantity: newQty, // New quantity
                },
                success: function (response) {
                    if (response.success) {
                        location.reload();
                        // Update quantity input
                        qtyInput.val(newQty);

                        // Update price and total for this order detail
                        $("#price-" + orderDetailId).text(response.price);
                        $("#total-" + orderDetailId).text(response.total);

                        // Update order totals
                        recalculateOrderTotals(response.order);
                    } else {
                        alert(response.message || "Failed to update quantity.");
                    }
                },
                error: function () {
                    alert("An error occurred while updating the quantity.");
                },
            });
        });
    });

    $(document).ready(function () {
    // Update Remarks
        $(document).on("click", "#update_remarks_btn", function () {
            var order_id = {{ $order->id }};
            var remarks = $('#order_remarks').val();

            // Simple validation
            if (remarks.trim() === '') {
                alert('Please enter remarks before updating.');
                return;
            }

            $.ajax({
                url: "{{ route('order.update_remarks', $order->id) }}",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    remarks: remarks
                },
                success: function (response) {
                    if (response.success) {
                        AIZ.plugins.notify('success', 'Remarks updated successfully');
                        // Optionally reload or update UI
                        // location.reload();
                    } else {
                        alert(response.message || 'Failed to update remarks.');
                    }
                },
                error: function () {
                    alert('An error occurred while updating remarks.');
                }
            });
        });
    });

    // Update order totals dynamically
    function recalculateOrderTotals(order) {
        $("#sub-total").text(order.sub_total);
        $("#tax").text(order.tax);
        $("#shipping").text(order.shipping);
        $("#coupon").text(order.coupon_discount);
        $("#grand-total").text(order.grand_total);
    }



    // delete product row
    $(document).on('click', '.delete-product', function () {
        var orderDetailId = $(this).data('id');
        if (confirm('Are you sure you want to delete this product?')) {
            $.ajax({
                url: '/delete-product',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    order_id: orderDetailId
                },
                success: function (response) {
                    if (response.success) {
                        location.reload();
                        $('#row-' + orderDetailId).remove();
                        updateOrderTotals(response.order);
                    } else {
                        alert('Failed to delete the product. Please try again.');
                    }
                },
            });
        }
    });

    // Function to update the order totals in the UI
    function updateOrderTotals(order) {
        $('#subTotal').text(order.sub_total.toFixed(2));
        $('#tax').text(order.tax.toFixed(2));
        $('#shipping').text(order.shipping.toFixed(2));
        $('#couponDiscount').text(order.coupon_discount.toFixed(2));
        $('#grandTotal').text(order.grand_total.toFixed(2));
    }




    $(document).ready(function () {
        // Handle real-time search as the user types
        $('#searchProduct').on('input', function () {
            let query = $(this).val();
            if (query.length > 2) {
                $.ajax({
                    url: '/products/search',
                    method: 'GET',
                    data: { query: query },
                    success: function (products) {
                        let results = '';
                        if (products.length > 0) {
                            products.forEach(product => {
                                results += `
                                    <a href="#" class="list-group-item list-group-item-action search-result"
                                       data-id="${product.id}"
                                       data-name="${product.name}"
                                       data-sku="${product.sku}"
                                       data-price="${product.discounted_price}"
                                       data-photo="${product.thumbnail_img}">
                                        ${product.name} - <strong>${product.discounted_price} USD - SKU ${product.sku}</strong>
                                    </a>`;
                            });
                        } else {
                            results = '<p class="list-group-item">No products found</p>';
                        }
                        $('#searchResults').html(results).show();
                    }
                });
            } else {
                $('#searchResults').hide();
            }
        });


        // When a user clicks on a product in the search results, add it to the list
        $(document).on('click', '.search-result', function (e) {
            e.preventDefault();

            const productId = $(this).data('id');
            const productName = $(this).data('name');
            const productPrice = parseFloat($(this).data('price'));
            const productPhoto = $(this).data('thumbnail_img');


            // Calculate total for the default quantity of 1
            const productTotal = productPrice * 1;
            var order_id = "{{ $order->id }}";

            $.ajax({
                   url: "{{ route('all_orders.add') }}",
                    method: 'POST',
                    data: { product_id: productId,order_id:order_id,product_price:productPrice, _token: '{{ csrf_token() }}' },
                    success: function (products) {
                        console.log(products);
                        location.reload();
                    }
                });

            console.log(productId);

            const newRow = `
                <tr id="product-${productId}">
                    <td>${productId}</td>
                    <td><img src="${productPhoto}" alt="${productName}" class="img-thumbnail" width="50"></td>
                    <td>${productName}</td>
                    <td class="text-center">
                        <input type="number" class="form-control quantity-input" data-id="${productId}" value="1" min="1">
                    </td>
                    <td class="text-center">${productPrice.toFixed(2)}</td>
                    <td class="text-right">${productTotal.toFixed(2)}</td>
                    <td>
                        <button type="button" class="btn btn-danger delete-product" data-id="${productId}">X</button>
                    </td>
                </tr>
            `;

            console.log(newRow);

            $('.invoice-summary tbody').append(newRow);
             $('#searchResults').hide(); // Hide the search results after adding product
            $('#searchProduct').val(''); // Clear the search input
        });

        // Remove product from the list
        $(document).on('click', '.delete-product', function () {
            const productId = $(this).data('id');
            $('#product-' + productId).remove();
        });

        // Update total when quantity is changed
        $(document).on('input', '.quantity-input', function () {
            const productId = $(this).data('id');
            const quantity = parseInt($(this).val());
            const price = parseFloat($(`#product-${productId} td:nth-child(6)`).text());
            const newTotal = quantity * price;

            // Update the total in the row
            $(`#product-${productId} td:nth-child(7)`).text(newTotal.toFixed(2));
        });
    });

        $('#assign_deliver_boy').on('change', function() {
            var order_id = {{ $order->id }};
            var delivery_boy = $('#assign_deliver_boy').val();
            $.post('{{ route('orders.delivery-boy-assign') }}', {
                _token: '{{ @csrf_token() }}',
                order_id: order_id,
                delivery_boy: delivery_boy
            }, function(data) {
                AIZ.plugins.notify('success', '{{ translate('Delivery boy has been assigned') }}');
            });
        });


        $('#update_delivery_status').on('change', function() {
            var order_id = {{ $order->id }};
            var status = $(this).val();

            if(status === 'cancelled') {
                // Prompt admin for remarks
                var cancelRemarks = prompt("Please enter remarks for cancellation:");
                if(cancelRemarks === null || cancelRemarks.trim() === "") {
                    // If no remarks provided, reset the select
                    $(this).val('{{ $order->delivery_status }}');
                    return;
                }

                // Save remarks and cancel order
                $.post('{{ route('orders.update_delivery_status') }}', {
                    _token: '{{ csrf_token() }}',
                    order_id: order_id,
                    status: status,
                    remarks: cancelRemarks
                }, function(data){
                    if(data.success){
                        $('#order_remarks').val(cancelRemarks); // Update the remarks input
                        AIZ.plugins.notify('success', '{{ translate("Order cancelled with remarks") }}');
                        location.reload();
                    } else {
                        alert(data.message || 'Failed to cancel the order.');
                    }
                });
            } else {
                // Normal delivery status update
                $.post('{{ route('orders.update_delivery_status') }}', {
                    _token: '{{ csrf_token() }}',
                    order_id: order_id,
                    status: status
                }, function(data){
                    AIZ.plugins.notify('success', '{{ translate("Delivery status has been updated") }}');
                    location.reload();
                });
            }
        });


        // Payment Status Update
        function confirm_payment_status(value){
            $('#confirm-payment-status').modal('show');
        }

        function update_payment_status(){
            $('#confirm-payment-status').modal('hide');
            var order_id = {{ $order->id }};
            $.post('{{ route('orders.update_payment_status') }}', {
                _token: '{{ @csrf_token() }}',
                order_id: order_id,
                status: 'paid'
            }, function(data) {
                $('#update_payment_status').prop('disabled', true);
                AIZ.plugins.bootstrapSelect('refresh');
                AIZ.plugins.notify('success', '{{ translate('Payment status has been updated') }}');
                location.reload();
            });
        }

        $('#update_tracking_code').on('change', function() {
            var order_id = {{ $order->id }};
            var tracking_code = $('#update_tracking_code').val();
            $.post('{{ route('orders.update_tracking_code') }}', {
                _token: '{{ @csrf_token() }}',
                order_id: order_id,
                tracking_code: tracking_code
            }, function(data) {
                AIZ.plugins.notify('success', '{{ translate('Order tracking code has been updated') }}');
            });
        });

        $('#update_shipping').on('click', function() {
            var order_id = {{ $order->id }};
            var shipping_cost = $('#shipping_cost').val();
            $.post('{{ route('orders.update_shipping_cost') }}', {
                _token: '{{ csrf_token() }}',
                order_id: order_id,
                shipping_cost: shipping_cost
            }, function(data) {
                if(data.success){
                    AIZ.plugins.notify('success', '{{ translate('Shipping cost updated successfully') }}');
                    location.reload();
                } else {
                    AIZ.plugins.notify('error', data.message || '{{ translate('Failed to update shipping cost') }}');
                }
            });
        });



    </script>
@endsection
