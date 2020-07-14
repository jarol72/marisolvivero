<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>@lang('Orders List')</title>
</head>

<body>
    <table id="infTable" class="display table-sm table table-hover table-striped responsive nowrap">
            <tr>
                <th>@lang('ID')</th>
                <th>@lang('Date')</th>
                <th>@lang('Elapsep Time')</th>
                <th>@lang('Common Name')</th>
                <th>@lang('Scientific Name')</th>
                <th>@lang('Quantity')</th>
                <th>@lang('Cost')</th>
                <th>@lang('Total')</th>
                <th>@lang('Status')</th>
            </tr>
            @foreach ($orders as $order)
            @foreach($order->products as $product)
            <tr class="align-items-center">
                <td class="align-middle py-0">{{ $order->user_id }}</td>
                <td class="align-middle text-center py-0">{{ $order->created_at }}</td>
                <td class="align-middle py-0">{{ $order->created_at->diffForHumans() }}</td>
                <td class="align-middle"><small><i>{{ $product->common_name}}</i></small></td>
                <td class="align-middle"><small><i>{{ $product->scientific_name}}</i></small></td>
                <td class="align-middle text-center"><small><i>{{ $product->pivot->quantity }}</i></small></td>
                <td class="align-middle text-right "><small><i>{{ $product->cost }}</i></small></td>
                <td class="align-middle text-right"><small><i>{{ $product->pivot->quantity * $product->cost }}</i></small></td>
                <td class="align-middle text-right"><small><i>{{ $order->status }}</i></small></td>
            </tr>
            {{-- <tr class="bg-btn-lightgreen">

                <td class="align-middle py-2 font-weight-bold"><small><i>@lang('Common Name')</i></small></td>
                <td class="align-middle text-center py-2 font-weight-bold"><small><i>@lang('Quantity')</i></small></td>
                <td class="align-middle text-right py-2 font-weight-bold"><small><i>@lang('Cost')</i></small></td>
                <td class="align-middle text-right py-2 font-weight-bold"><small><i>@lang('Total')</i></small></td>
            </tr>
            @foreach($order->products as $product) {{-- @php dd($product->pivot); @endphp
            <tr class="align-order_products-center">
                

            </tr>
            @endforeach
            <tr class="bg-white">
                <td colspan="4"></td>
            </tr> --}}
            @endforeach
            @endforeach
        
    </table>


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