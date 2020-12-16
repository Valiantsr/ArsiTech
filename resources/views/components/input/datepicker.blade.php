<div wire:ignore class="form-group">
    <x-input.label for="{{$label}}">{{ucfirst($label)}}</x-input.label>
    <input {{ $attributes->merge(['class' => 'form-control']) }}>
    @if (isset($error))
    {{$error}}
    @else
    @error(strtolower(substr($label, 0, strrpos($label, ' ') ? strrpos($label, ' ') : strlen($label))))
    <span class="text-danger">{{$message}}</span>
    @enderror    
    @endif
</div>

@push('css')
<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
@endpush

@push('js')
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
@endpush
