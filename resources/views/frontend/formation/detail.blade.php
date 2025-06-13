@extends('layouts.frontend')
@section('content')
    @livewire('frontend.formation.detail',['formation' => $formation])
@endsection