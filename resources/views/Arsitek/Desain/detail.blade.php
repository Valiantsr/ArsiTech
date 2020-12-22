@extends('layouts.myview')

@section('content')
@livewire('desain.detail', ['id'=>$id])
@endsection
