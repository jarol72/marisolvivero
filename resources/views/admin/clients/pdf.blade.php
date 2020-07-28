<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

   <title>@lang('Clients List')</title>
</head>

<body>
   <header>
   </header>
   <div class="d">
      <img src="{{ asset('siteimg/solo_arbol.png') }}" class="float-left" height="70" alt="">
      </header>
      <div class="d-inline-block text-center w-100 mb-2">
         <p class="h3 mb-0 font-weight-bold">Marisol Vivero</p>
         <p class="mb-0">@lang('Clients List')</p>
         <small class="mb-0"><?= date('Y-m-d') ?></small>
      </div>
   </div>

   <main>
      <table id="infTable" class="display table-sm table table-hover table-striped responsive nowrap">
         <thead>
            <tr class="bg-btn-lightgreen">
               <!-- th>Id</th -->
               <th class="align-middle py-2">@lang('Name')</th>
               <th class="align-middle py-2">@lang('E-mail Address')</th>
               <th class="align-middle py-2">@lang('Client Since')</th>
            </tr>
         </thead>
         <tbody>
            @forelse ($clients as $client)
            <tr class="align-items-center">
               <!-- td>{{ $client->id }}</td -->
               <td class="align-middle py-0">{{ $client->name }}</td>
                  <td class="align-middle py-0">{{ $client->email }}</td>
                  <td class="align-middle py-0">{{ $client->created_at->diffForHumans() }}</td>
            </tr>
            @empty
            <p>No hay empleados para mostrar</p>
            @endforelse
         </tbody>
      </table>
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