@extends('layouts.main')

@push('titleCurrent')
    {{ $titleGym }}
    @endpush

{{--@section('title', "Тренажерные залы")--}}
@section('gym')
    @include('common.formGym')
    @stack('formGym')
@endsection

{{--{{ session("alert") }} не работает!!! --}}

