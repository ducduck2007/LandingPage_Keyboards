@extends('layouts.app')

@section('content')
    @include('client.sub.header')
    @include('client.sub.titleMenu')
    @include('client.sub.contentHeader')
    @include('client.sub.deal_sale')
    @include('client.sub.phimCo')
    @include('client.sub.phimVanPhong')
    @include('client.sub.keycaps')
    @include('client.sub.switch')
    @include('client.sub.tk_view')
    @include('client.sub.footer')

    @include('client.sub.modal')
    @include('client.sub.scrollTop')
@endsection
