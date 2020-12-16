<x-form>
    <x-slot name="title">Data {{$nama}}</x-slot>

    <form wire:submit.prevent="update" method="POST">
        @method('put')
        <x-input.input wire:model="nama">
            <x-slot name="label">Nama</x-slot>
        </x-input.input>

        <x-input.input wire:model="harga" placeholder="Harga Per Meter persegi">
            <x-slot name="label">Harga</x-slot>
        </x-input.input>

        <x-button.button type="submit" color="primary" class="float-right">Ubah Data
        </x-button.button>
    </form>

</x-form>