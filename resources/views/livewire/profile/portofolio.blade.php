<x-form>
    <x-slot name="title">Data Portofolio {{$nama}}</x-slot>

    {{-- <form wire:submit.prevent="changePass"> --}}

    <x-input.input wire:model="konsep" readonly>
        <x-slot name="label">Konsep</x-slot>
    </x-input.input>

    <x-input.input wire:model="nama" readonly>
        <x-slot name="label">Nama</x-slot>
    </x-input.input>

    <x-input.textarea wire:model="keterangan" readonly>
        <x-slot name="label">Keterangan</x-slot>
    </x-input.textarea>

    <x-input.input wire:model="tanggal_lahir" readonly>
        <x-slot name="label">Tanggal Lahir</x-slot>
    </x-input.input>

    <x-button.button wire:click="edit" color="primary" class="float-right">Ganti Profil</x-button.button>
    {{-- </form> --}}

</x-form>
