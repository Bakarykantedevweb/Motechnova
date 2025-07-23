@php
    $hideFooter = true;
@endphp
@extends('layouts.frontend')
@section('content')
   @livewire('etudiant.formations.index',["formation" => $formation])
@endsection
