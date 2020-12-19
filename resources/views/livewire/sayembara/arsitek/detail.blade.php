<x-form>
    <x-slot name="title">Data {{$nama}}</x-slot>

    <form wire:submit.prevent="desain" enctype="multipart/form-data" method="POST">

        <x-input.input wire:model="nama" readonly>
            <x-slot name="label">nama</x-slot>
        </x-input.input>

        <x-input.input wire:model="awal" readonly>
            <x-slot name="label">Tanggal Mulai</x-slot>
        </x-input.input>

        <x-input.input wire:model="akhir" readonly>
            <x-slot name="label">Tanggal Selesai</x-slot>
        </x-input.input>

        <x-input.input wire:model="luas" readonly>
            <x-slot name="label">Luas</x-slot>
        </x-input.input>

        <x-input.input wire:model="konsep" readonly>
            <x-slot name="label">Konsep</x-slot>
        </x-input.input>

        <x-input.input wire:model="pelanggan" readonly>
            <x-slot name="label">Pelanggan</x-slot>
        </x-input.input>
        {{-- dd() --}}
        @if ($desain)
        <x-container class="text-center">
            <x-input.label>Desain</x-input.label>
            <img src="{{ asset('storage/'.$desain) }}" alt="Desain" srcset="">
        </x-container>
        @else
        <x-input.input wire:model.lazy="desain" type="file">
            <x-slot name="label">Desain</x-slot>
        </x-input.input>
        @endif
        @if ($status == 'menunggu')
        <x-button.button type="submit" color="primary" class="float-right">Tambah Desain
        </x-button.button>
        @endif

    </form>
    <x-button.button wire:click="kembali" color="danger" class="mt-3">Kembali
    </x-button.button>
</x-form>
