@extends('layouts.app')

@section('title', 'Quiénes Somos')

@section('content')

<div class="container">
  <div class="row d-flex">
    <div class="liana col-2 align-self-stretch">
        <img loading="lazy" src="{{asset('siteimg/Liana vertical.png')}}" alt="" class="img-fluid h-100 w-100">
    </div>

    <!-- Información de la empresa -->
    <div class="d-flex align-content-start flex-wrap text-justify col-md-10 col-sm-12 ">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem deserunt enim saepe pariatur vero fugit reprehenderit iure iste, placeat modi? Dignissimos ullam tenetur odit ipsum, voluptate, earum laborum molestias ut, suscipit ex neque, consequuntur ab ad fugiat explicabo eveniet! Rerum dolorum sit animi sequi maiores magni aut error illum itaque.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem voluptatum amet, fugit minus iste iusto assumenda. Consequatur quasi, ducimus maxime. Distinctio voluptas natus, sit aliquam nobis autem odit, incidunt ab aliquid quos, aperiam quibusdam deleniti culpa dignissimos officiis id saepe laboriosam quam dolore eius deserunt. Sit esse nam, rerum hic?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem voluptatum amet, fugit minus iste iusto assumenda. Consequatur quasi, ducimus maxime. Distinctio voluptas natus, sit aliquam nobis autem odit, incidunt ab aliquid quos, aperiam quibusdam deleniti culpa dignissimos officiis id saepe laboriosam quam dolore eius deserunt. Sit esse nam, rerum hic?</p>
    <!-- Imágenes en barra lateral -->
    <div class="d-flex flex-wrap align-content-between mt-2">
        <img loading="lazy" src="{{asset('siteimg/Vivero2.png')}}" class="col-sm img-fluid mb-1 pt-0" alt="">
        <img loading="lazy" src="{{asset('siteimg/Vivero3.png')}}" class="col-sm img-fluid mb-1 pt-0" alt="">
        <img loading="lazy" src="{{asset('siteimg/Vivero1.png')}}" class="col-sm img-fluid mb-1 pt-0" alt="">
    </div>
    </div>
  </div>
</div>
@endsection
