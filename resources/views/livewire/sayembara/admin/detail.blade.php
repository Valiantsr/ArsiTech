<x-form>
    <x-slot name="title">Data {{$nama}}</x-slot>

    <form>

        <x-input.input wire:model="nama" readonly>
            <x-slot name="label">nama</x-slot>
        </x-input.input>

        <x-input.input wire:model="rek" readonly>
            <x-slot name="label">Nomor Rekening</x-slot>
        </x-input.input>

        <x-input.input wire:model="atas_nama" readonly>
            <x-slot name="label">Atas Nama</x-slot>
        </x-input.input>

        <x-container class="text-center">
            <x-input.label>Bukti</x-input.label>
            <a href="{{ Storage::url($bukti) }}" target="_blank" rel="noopener noreferrer">
                Bukti Pembayaran</a>
        </x-container>

        @if ($status == 'verif pembayaran')
        <x-button.button wire:click='verifikasi' color="primary" class="float-right mt-3">Verifikasi Data Pembayaran
        </x-button.button>
        @endif

    </form>
    <x-button.button wire:click="kembali" color="danger" class="mt-3">Kembali
    </x-button.button>
</x-form>
