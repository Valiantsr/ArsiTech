@extends('layouts.myview')

@section('content')
@livewire('payment.create', ['id'=>$id])
@endsection
