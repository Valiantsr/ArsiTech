<x-form>
    <x-slot name="title">Data {{$nama}}</x-slot>
    <form>
        <x-input.input wire:model="nama" readonly>
            <x-slot name="label">nama</x-slot>
        </x-input.input>
        <x-container class="text-center">
            <x-input.label>Gambar Desain</x-input.label>
            <a href="{{ Storage::url($gambar) }}" target="_blank" rel="noopener noreferrer">
                Click For Detail</a>
        </x-container>
    </form>
    <x-button.button wire:click="kembali" color="danger" class="mt-3">Kembali
    </x-button.button>
</x-form>
