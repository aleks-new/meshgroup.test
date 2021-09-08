@extends('template')
@section('main')
    <upload-component upload-url="{{ route('api.upload') }}" />
@endsection
