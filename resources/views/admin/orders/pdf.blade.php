<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

   <title>@lang('Employees List')</title>
</head>

<body>
   <header>
   </header>
   <div class="d">
      <img src="{{ asset('siteimg/solo_arbol.png') }}" class="float-left" height="70" alt="">
      </header>
      <div class="d-inline-block text-center w-100 mb-2">
         <p class="h3 mb-0 font-weight-bold">Marisol Vivero</p>
         <p class="mb-0">@lang('Orders pending for delivery')</p>
         <small class="mb-0"><?= date('Y-m-d') ?></small>
      </div>
   </div>
   Total pedidos por entregar: {{ count($orders) }}
   <main>
      @forelse ($orders as $order)
      <hr style="border-color: black">
      <table id="infTable" class="display table-sm table table-hover table-striped responsive nowrap">
            <thead>
               {{-- Encabezados del pedido --}}
               <tr class="bg-btn-lightgreen">
                  <th class="align-middle py-2">@lang('ID')</th>
                  <th class="align-middle text-center py-2">@lang('Order Date')</th>
                  <th class="align-middle py-2">@lang('Elapsed Time')</th>
                  <th class="align-middle text-center py-2">@lang('Delivered')</th>
               </tr> {{-- Fin encabezados del pedido --}}
            </thead>
            <tbody>
               {{-- Datos del pedido --}}
               <tr class="align-items-center">
                  <td class="align-middle py-0">{{ $order->user_id }}</td>
                  <td class="align-middle text-center py-0">{{ $order->created_at }}</td>
                  <td class="align-middle py-0">{{ $order->created_at->diffForHumans() }}</td>
                  <td class="align-middle text-center py-0">
                  <input type="checkbox" class="mr-0" name="" id="">_______________
               </tr>{{-- Fin datos del pedido --}}
               {{-- Encabezados de la sección de detalles del pedido --}}
               <tr class="bg-btn-lightgreen">
                  <td class="align-middle py-2 font-weight-bold"><small><i>@lang('Common Name')</i></small></td>
                  <td class="align-middle text-center py-2 font-weight-bold"><small><i>@lang('Quantity')</i></small></td>
                  <td class="align-middle text-right py-2 font-weight-bold"><small><i>@lang('Cost')</i></small></td>
                  <td class="align-middle text-right py-2 font-weight-bold"><small><i>@lang('Total Producto')</i></small></td>
               </tr> {{-- Fin de los ncabezados de la sección de detalles del pedido --}}
               
               {{-- Detalles del pedido --}}
               @foreach($order->products as $product) {{-- @php dd($product->pivot); @endphp --}}
                  <tr class="align-order_products-center">
                        <td class="align-middle"><small><i>{{ $product->common_name}}</i></small></td>
                        <td class="align-middle text-center"><small><i>{{ number_format($product->pivot->quantity,0,',','.') }}</i></small></td>
                        <td class="align-middle text-right "><small><i>$ {{ $product->cost }}</i></small></td>
                        <td class="align-middle text-right"><small><i>$ {{ number_format($product->pivot->quantity * $product->cost,0,',','.') }}</i></small></td>
                        
                  </tr>
               @endforeach
               {{-- Fin detalles del pedido --}}
               <tr>
                  <td colspan="4"  class="text-right font-weight-bold">Total Pedido $ {{ number_format($order->total,0,',','.') }}</td>
               </tr>      
            </tbody>
         </table>
         @empty
            <p>No hay empleados para mostrar</p>
         @endforelse
   </main>
   <script type="text/php">
      if (isset($pdf)) {
          $text = "page {PAGE_NUM} / {PAGE_COUNT}";
          $size = 10;
          $font = $fontMetrics->getFont("Verdana");
          $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
          $x = ($pdf->get_width() - $width) / 2;
          $y = $pdf->get_height() - 35;
          $pdf->page_text($x, $y, $text, $font, $size);
      }
  </script>
</body>

</html>