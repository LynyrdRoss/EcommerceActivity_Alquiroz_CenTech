@extends ('master')

@section ('nav')
@include ('partials.nav-white-v3')
@endsection

@section ('content')
<!-- 	<div class="table-responsive text-center"> -->
	<div class="container" style="padding-top: 90px">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-header">Confirmation</h1>
				<table class="table table-hover">
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Quantity</th>
						<th>Price</th>
					</tr>

					<tbody>
						@foreach ($cart_items as $cart_item)
						<tr>
							<td>
								<img style="height:70px;width:85px;" class="img-responsive" src="{{$cart_item->product()->first()->product_thumb}}" alt="">
							</td>
							<td>{{$cart_item->product()->first()->name}}</td>
							<td>{{$cart_item->product()->first()->quantity}}</td>
							<td>${{$cart_item->product()->first()->price}}</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="3"></td>
							<td><u>${{ $total_price }}</u></td>
						</tr>
					</tfoot>
				</table>

				<form>
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="upload" value="1">
					<input type="hidden" name="business" value="centech@gmail.com">
					
					<?php $count=0; ?>
					@foreach($cart_items as $cart_item)
						<?php $count++; ?>
						<input type="hidden" name="item_name_{{ $count }}" value="{{ $cart_item->product()->first()->name }}">
						<input type="hidden" name="amount_{{ $count }}" value="{{ $cart_item->product()->first()->price }}">
						<input type="hidden" name="shipping_{{ $count }}" value="1.00">
					@endforeach
					<input type="image" name="submit" value="PayPal" class="pull-right" formaction="https://www.sandbox.paypal.com/cgi-bin/webscr" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_150x38.png" >
				</form>
			</div>
		</div>
	</div>
<!-- 	</div> -->
@endsection

@section ('footer')
@include ('partials.footer')
@endsection