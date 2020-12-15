<div class="form-group">
    <div class="custom-file">
        
        <input {{ $attributes->merge(['type'=>'file', 'class'=>'custom-file-input']) }} >
        <x-input.label for="{{$label}}">{{ucfirst($label)}}</x-input.label>
        {{-- <input name="ktp" type="file" class="custom-file-input @error('ktp') is-invalid @enderror" id="ktp" value="{{ old('ktp') }}"> --}}
        @error(strtolower(substr($label, 0, strrpos($label, ' ') ? strrpos($label, ' ') : strlen($label))))
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

@push('js')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endpush