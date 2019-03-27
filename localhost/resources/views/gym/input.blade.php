@extends('layouts.main')


@push('titleCurrent')
    {{ $titleGym }}
@endpush


@section('gym')
    @include('common.formGymRelation')
    @stack('formGymRelation')
@endsection

