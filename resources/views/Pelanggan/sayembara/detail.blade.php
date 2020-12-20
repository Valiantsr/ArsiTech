@extends('layouts.myview')

@section('content')
@livewire('sayembara.pelanggan.detail', ['id'=>$id])
@endsection
