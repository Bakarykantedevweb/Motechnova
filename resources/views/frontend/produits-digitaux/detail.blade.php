@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
@endpush
@extends('layouts.frontend')
@section('content')
    @livewire('frontend.produits-digitaux.detail',['produit' => $produit])
@endsection
