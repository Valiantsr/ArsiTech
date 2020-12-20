<x-form>
    <x-slot name="title">Data Pembayaran Sayembara {{$namaSayembara}}</x-slot>
    <form wire:submit.prevent="store" method="POST" enctype="multipart/form-data">
        @csrf
        <x-input.input wire:model="atas">
            <x-slot name="label">Atas Nama</x-slot>
        </x-input.input>

        <x-input.input wire:model="nomor">
            <x-slot name="label">Nomor Rekening</x-slot>
        </x-input.input>

        <x-input.input value="Rp. {{number_format($total)}}" readonly>
            <x-slot name="label">Total Biaya</x-slot>
        </x-input.input>

        <x-input.input wire:model.lazy="temp" type="file">
            <x-slot name="label">Bukti</x-slot>
        </x-input.input>

        <x-button.button type="submit" color="primary" class="float-right">Tambah Data Pembayaran
        </x-button.button>
    </form>

</x-form>
