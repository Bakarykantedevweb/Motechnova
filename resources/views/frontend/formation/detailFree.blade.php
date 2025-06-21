@extends('layouts.frontend')
@section('content')
    @livewire('frontend.formation.detail-free',["formation" => $formation])
@endsection

