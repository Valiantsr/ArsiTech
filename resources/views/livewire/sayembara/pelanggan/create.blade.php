<x-form>
    {{-- {{dd($data)}} --}}
    <x-slot name="title">Data Sayembara</x-slot>
    <form wire:submit.prevent="store" method="POST">
        @csrf
        <x-input.input wire:model="nama">
            <x-slot name="label">Nama</x-slot>
        </x-input.input>

        <x-input.select2 data="$konsep" select-type="label" id="konsep" name="konsep">
            <x-slot name="label">Konsep</x-slot>
            <x-slot name="opt">
                @foreach ($konsep as $k)
                    <option value="{{$k->id}}">{{$k->nama}} Harga = Rp. {{number_format($k->harga)}} /m<sup>2</sup></option>
                @endforeach
            </x-slot>
            @error('konsep')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </x-input.select2>

        <x-container class="row">
            <x-container class="col-sm-12 col-md-6">
                <x-input.datepicker name="awal" id="awal" data-date-format="yyyy/mm/dd">
                    <x-slot name="label">Tanggal Mulai</x-slot>
                    @error('awal')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </x-input.datepicker>
            </x-container>
            <x-container class="col-sm-12 col-md-6">
                <x-input.datepicker name="akhir" id="akhir" data-date-format="yyyy/mm/dd">
                    <x-slot name="label">Tanggal Akhir</x-slot>
                    @error('akhir')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </x-input.datepicker>
            </x-container>
        </x-container>

        <x-input.input wire:model="luas_bangunan">
            <x-slot name="label">Luas Bangunan</x-slot>
        </x-input.input>

        <x-button.button type="submit" color="primary" class="float-right">Tambah Data Sayembara
        </x-button.button>
    </form>

</x-form>

@push('script')
<script>
    $(document).ready(function(){
        $("#awal").datepicker({
            autoclose: true,
        });
        $('#awal').on('change', function(){
            @this.awal = $(this).val()
        });
        $("#akhir").datepicker({
            autoclose: true,
        });
        $('#akhir').on('change', function(){
            @this.akhir = $(this).val()
        });
        $('#konsep').select2();
        $('#konsep').on('select2:select', function () {});
        $('#konsep').on('change', function(){
            @this.data = $(this).val()
        });
    });
</script>
@endpush

