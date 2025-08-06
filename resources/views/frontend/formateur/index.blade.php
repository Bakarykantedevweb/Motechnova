@extends('layouts.frontend')
@section('content')
    @livewire('frontend.formateur.index',['formateur' => $formateur])
@endsection