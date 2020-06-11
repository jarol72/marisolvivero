@extends('layouts.app')

@section('title', 'Quiénes Somos')

@section('content')

<div class="row row-cols-2">
<div class="col col-2 float-left mr-auto">
      <img loading="lazy" src="{{asset('siteimg/Liana vertical.png')}}" alt="" class="img-fluid h-100 w-100">
    </div>

    <!-- Información de la empresa -->
    <div class="text-justify m-auto">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem deserunt enim saepe pariatur vero fugit reprehenderit iure iste, placeat modi? Dignissimos ullam tenetur odit ipsum, voluptate, earum laborum molestias ut, suscipit ex neque, consequuntur ab ad fugiat explicabo eveniet! Rerum dolorum sit animi sequi maiores magni aut error illum itaque.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem voluptatum amet, fugit minus iste iusto assumenda. Consequatur quasi, ducimus maxime. Distinctio voluptas natus, sit aliquam nobis autem odit, incidunt ab aliquid quos, aperiam quibusdam deleniti culpa dignissimos officiis id saepe laboriosam quam dolore eius deserunt. Sit esse nam, rerum hic?</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem voluptatum amet, fugit minus iste iusto assumenda. Consequatur quasi, ducimus maxime. Distinctio voluptas natus, sit aliquam nobis autem odit, incidunt ab aliquid quos, aperiam quibusdam deleniti culpa dignissimos officiis id saepe laboriosam quam dolore eius deserunt. Sit esse nam, rerum hic?</p>
    </div>
    <!-- Imágenes en barra lateral -->
    <div class="col col-3 ml-auto">
      <img loading="lazy" src="{{asset('siteimg/Vivero2.png')}}" class="img-fluid mb-5 pt-0 shadow" alt="">
      <img loading="lazy" src="{{asset('siteimg/Vivero3.png')}}" class="img-fluid mb-5 pt-0 shadow" alt="">
      <img loading="lazy" src="{{asset('siteimg/Vivero1.png')}}" class="img-fluid mb-5 pt-0 shadow" alt="">
    </div>
    </div>

@endsection