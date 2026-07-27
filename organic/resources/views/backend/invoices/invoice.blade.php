<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{  translate('INVOICE') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
	<style media="all">
        @page {
			margin: 0;
			padding:0;
		}
		body{
			font-size: 0.875rem;
            font-family: '<?php echo  $font_family ?>';
            font-weight: normal;
            direction: <?php echo  $direction ?>;
            text-align: <?php echo  $text_align ?>;
			padding:0;
			margin:0;
		}
		.gry-color *,
		.gry-color{
			color:#000;
		}
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .25rem .7rem;
		}
		table.padding td{
			padding: .25rem .7rem;
		}
		table.sm-padding td{
			padding: .1rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
		}
		.text-left{
			text-align:<?php echo  $text_align ?>;
		}
		.text-right{
			text-align:<?php echo  $not_text_align ?>;
		}
	</style>
</head>
<body>
	<div>

		@php
			$logo = get_setting('header_logo');
		@endphp

		<div style="padding: 1rem;">
			<table>
				<tr>
					<td>
						@if($logo != null)
							<img src="{{ uploaded_asset($logo) }}" height="30" style="display:inline-block;">
						@else
							<img src="{{ static_asset('assets/img/logo.png') }}" height="30" style="display:inline-block;">
						@endif
					</td>
					<td style="font-size: 1.5rem;" class="text-right strong">{{  translate('INVOICE') }}</td>
				</tr>
				<tr>
				    <td class="text-left mt-4">
                            @php
                                $removedXML = '<?xml version="1.0" encoding="UTF-8"?>';
                            @endphp
                            {!! str_replace($removedXML,"", QrCode::size(100)->generate($order->code)) !!}
			         </td>
				    <td></td>
				</tr>
			</table>
			<table border="1" cellspacing="0" cellpadding="8" style="width: 100%; border-collapse: collapse;">
			    @php
					$shipping_address = json_decode($order->shipping_address);
				@endphp
				<tr>
				    <td style="font-size: 1.5rem;" class="strong">Seller</td>
					<td style="font-size: 1.5rem;" class="strong">Buyer</td>
					<td style="font-size: 1.5rem;" class="strong text-center">ORDER</td>
				</tr>
				<tr>
				    <td style="font-size: 1rem;">{{ get_setting('site_name') }}</td>
				    <td class="strong">{{ $shipping_address->name }}</td>
				    <td><span class="gry-color small">{{  translate('Order ID') }}:</span> <span class="strong">{{ $order->code }}</span></td>
					<!--<td class="gry-color small">{{ get_setting('contact_address') }}</td>-->
					<!--<td class="text-right"></td>-->
				</tr>
				<tr>
					<td class="gry-color small">{{  translate('Email') }}: {{ get_setting('contact_email') }}</td>
					<td class="gry-color small">{{ translate('Email') }}: {{ $shipping_address->email }}</td>
					<td><span class="gry-color small">{{  translate('Order Date') }}:</span> <span class=" strong">{{ date('d-m-Y', $order->date) }}</span></td>
				</tr>
				<tr>
					<td class="gry-color small">{{  translate('Phone') }}: {{ get_setting('contact_phone') }}</td>
					<td class="gry-color small">{{ translate('Phone') }}: {{ $shipping_address->phone }}</td>
					<td>
                        <span class="gry-color small">
                            {{  translate('Payment method') }}:
                        </span>
                        <span class="strong">
                            {{ translate(ucfirst(str_replace('_', ' ', $order->payment_type))) }}
                        </span>
                    </td>
				</tr>
				<tr>
					<td class="gry-color small">BD-BANGLADESH</td>
					<td class="gry-color small">{{ $shipping_address->address }}, {{ $shipping_address->city }},  @if(isset(json_decode($order->shipping_address)->state)) {{ json_decode($order->shipping_address)->state }} - @endif {{ $shipping_address->postal_code }}, {{ $shipping_address->country }}</td>
					<td class="gry-color small"></td>
				</tr>
			</table>
		</div>


	    <div style="padding: 1.5rem; font-family: Arial, sans-serif; font-size: 14px;">
            <table border="1" cellspacing="0" cellpadding="8" style="width: 100%; border-collapse: collapse; text-align: center;">
              <thead style="background: #f3f3f3;">
                <tr>
                  <th>Serial Number</th>
                  <th style="width: 40%;">Product Name</th>
                  <th>Unit Price</th>
                  <th>QTY<br>(Unit Pack)</th>
                  <th>Total Amount</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $totalQty = 0;
                  $subtotal = 0;
                  $shipping = $order->orderDetails->sum('shipping_cost');
                  $tax = $order->orderDetails->sum('tax');
                  $couponDiscount = $order->coupon_discount ?? 0;
                @endphp

                @foreach ($order->orderDetails as $key => $orderDetail)
                  @if ($orderDetail->product != null)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>
                        {{ $orderDetail->product->name }}
                        @if ($orderDetail->variation != null)
                          ({{ $orderDetail->variation }})
                        @endif
                        <br>
                        <small>
                          @php
                            $product_stock = json_decode($orderDetail->product->stocks->first(), true);
                          @endphp
                          {{ translate('SKU') }}: {{ $product_stock['sku'] }}
                        </small>
                      </td>
                      <!--<td>{{ single_price($orderDetail->price / $orderDetail->quantity) }}</td>-->
                      <td>{{ single_price($orderDetail->price) }}</td>
                      <td>{{ $orderDetail->quantity }}</td>
                      <!--<td>{{ single_price($orderDetail->price + $orderDetail->tax) }}</td>-->
                      <td>{{ single_price(($orderDetail->price * $orderDetail->quantity) + $orderDetail->tax) }}</td>
                    </tr>

                    @php
                      $totalQty += $orderDetail->quantity;
                      $subtotal += ($orderDetail->price * $orderDetail->quantity);
                    @endphp
                  @endif
                @endforeach

                <tr style="font-weight: bold;">
                  <td colspan="2" style="text-align: right;">Total Qty</td>
                  <td>{{ $totalQty }}</td>
                  <!--<td colspan="2">{{ single_price($order->orderDetails->sum('price')) }}</td>-->
                  <td colspan="2">{{ single_price($subtotal) }}</td>
                </tr>
                <tr>
                  <td colspan="3" style="text-align: right;">Add: Transport</td>
                  <td colspan="2">{{ single_price($shipping) }}</td>
                </tr>
                <tr>
                  <td colspan="3" style="text-align: right;">Tax</td>
                  <td colspan="2">{{ single_price($tax) }}</td>
                </tr>
                <tr>
                  <td colspan="3" style="text-align: right;">Coupon Discount</td>
                  <td colspan="2">{{ single_price($couponDiscount) }}</td>
                </tr>
                <tr style="font-weight: bold;">
                  <td colspan="3" style="text-align: right;">NET Total to be Paid</td>
                  <!--<td colspan="2">{{ single_price($order->grand_total) }}</td>-->
                  <td colspan="2">{{ single_price($subtotal + $shipping) }}</td>
                </tr>
              </tbody>
            </table>


          <!--<div style="margin-top: 1rem; padding: 0.5rem; border-top: 1px solid #000;">-->
          <!--  <strong>Amount in words :</strong> Thirty-Five Thousand Eight Hundred Ten Only-->
          <!--</div>-->
        </div>



	    <div style="padding: 1rem; font-family: Arial, sans-serif; font-size: 14px; line-height: 1.5;">
          <table class="text-left small" border="1" cellspacing="0" cellpadding="8" style="width: 100%; border-collapse: collapse;">
            <tr>
              <td style="text-decoration: underline;">Return Policy per category :</td>
            </tr>
            <tr>
              <td>
                <ul style="margin: 0; padding-left: 1rem;">
                  <li>Seeds<br>-Non-returnable</li>
                  <li>Seedlings<br>-Non-returnable</li>
                  <li>Tools and instruments<br>
                    - 7 days; return and refund/replacement.<br>
                    - Not eligible for return if the item is ‘no longer needed’
                  </li>
                </ul>
              </td>
            </tr>
            <tr>
              <td style="text-decoration: underline; padding-top: 1rem;">Eligibility for returning an item</td>
            </tr>
            <tr>
              <td>
                The product must be unused, unwashed and without any flaws<br><br>
                If your product is defective, damaged or incorrect/incomplete at the time of delivery, please contact us immediately.
              </td>
            </tr>
            <tr>
              <td style="text-decoration: underline; border-top: 1px solid #000; padding-top: 1rem;">Payment Instructions :</td>
            </tr>
            <tr>
              <td>
                Payment to be made by Pay Cheque to Lal Teer Seed Limited<br>
                Payment via : Bikash, Nogod, Cash on delivery<br>
                Anchor Tower, 108 Br Uttam C.R Dutta Road, Dhaka-1205, Bangladesh
              </td>
            </tr>
          </table>
        </div>


	</div>
</body>
</html>
