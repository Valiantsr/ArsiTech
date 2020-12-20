@extends('layouts.myview')

@section('content')
@livewire('sayembara.admin.detail', ['id'=>$id])
@endsection
