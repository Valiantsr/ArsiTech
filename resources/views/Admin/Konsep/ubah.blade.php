@extends('layouts.myview')

@section('content')
@livewire('konsep.update', ['id'=>$id])
@endsection
