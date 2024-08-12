@extends('front.fixe')
@section('titre', $produit->nom)


<head>
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

</head>
@section('body')

<div class="breadcrumb">
    <div class="container">
        <h2>Shop</h2>
        <ul>
            <li>Home</li>
            <li>Shop</li>
            <li class="active">Détail sur le produit</li>
        </ul>
    </div>
</div>

@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="{{ asset('assets/js/main.min.js') }}"></script>
    <!--endbuild-->