@extends('layouts.myview')

@section('content')
@livewire('sayembara.arsitek.detail', ['id'=>$id])
@endsection
