<x-form>
    <x-slot name="title">Data Desain</x-slot>
    <form wire:submit.prevent="store" method="POST">
        @csrf

        <x-input.input wire:model="nama">
            <x-slot name="label">Nama</x-slot>
        </x-input.input>

        <x-input.input wire:model="gambar" type="file">
            <x-slot name="label">Gambar</x-slot>
        </x-input.input>

        <x-button.button type="submit" color="primary" class="float-right">Tambah Data Konsep
        </x-button.button>
    </form>

</x-form>
