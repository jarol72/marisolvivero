<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class HelpController extends Controller
{
    public function getDownload()
    {
       //PDF file is stored under project/public/download/info.pdf
       $file = public_path(). "/manual/manual_usuario.pdf";
       $headers = array(
                 'Content-Type: application/pdf',
               );

       return Response::download($file, 'manual_usuario.pdf', $headers);
    }
}
