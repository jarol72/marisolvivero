
@if(Cart::count())

<a class="viewcart text-decoration-none text-white" href="{{ route('cart.index') }}" class="text-white  text-decoration-none">@lang('View Cart')<br/><small>{{ Cart::content()->count() }} @lang('item(s)')</small></a>

@endif