<x-form>
    <x-slot name="title">Data Portofolio</x-slot>
    <form wire:submit.prevent="store" method="POST">
        @csrf
        @if ($portoId == null)
        <x-input.input wire:model="nama">
            <x-slot name="label">Nama</x-slot>
        </x-input.input>

        <x-input.textarea wire:model="deskripsi">
            <x-slot name="label">Deskripsi</x-slot>
        </x-input.textarea>
        @endif
        
        <x-input.select2 data="$konsep" select-type="label" id="konsep" name="konsep">
            <x-slot name="label">Konsep</x-slot>
            <x-slot name="opt">
                @foreach ($datakonsep as $k)
                    <option value="{{$k->id}}">{{$k->nama}} Harga = Rp. {{number_format($k->harga)}} /m<sup>2</sup></option>
                @endforeach
            </x-slot>
        </x-input.select2>
        @error('konsep')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <x-input.select2 data="$desain" select-type="label" id="desain" name="desain">
            <x-slot name="label">Desain</x-slot>
            <x-slot name="opt">
                @foreach ($datadesain as $d)
                    <option value="{{$d->id}}">{{$d->nama}}</option>
                @endforeach
            </x-slot>
        </x-input.select2>
        @error('desain')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <x-button.button type="submit" color="primary" class="float-right">Tambah Data Portofolio
        </x-button.button>
    </form>

</x-form>

@push('script')
<script>
    $(document).ready(function() {
        $('#konsep').select2();
        $('#konsep').on('select2:select', function () {});
        $('#konsep').on('change', function(){
            @this.konsep = $(this).val()
        });

        $('#desain').select2({});
        $('#desain').on('select2:select', function () {});
        $('#desain').on('change', function(){
            @this.desain = $(this).val()
        });
    });

</script>
@endpush


{{-- <x-input.input wire:model="nama" readonly>
    <x-slot name="label">Nama</x-slot>
</x-input.input>

<x-input.textarea wire:model="deskripsi" readonly>
    <x-slot name="label">Deskripsi</x-slot>
</x-input.textarea> --}}