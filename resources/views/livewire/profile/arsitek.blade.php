<x-container class="row">
    <x-container class="col-md-4 col-sm-12">
        <x-container class="card card-primary card-outline">
            <x-container class="card-body box-profile">
                <x-container class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{auth()->user()->avatar}}"
                        alt="User profile picture">
                </x-container>

                <h3 class="profile-username text-center">{{$nama}}</h3>
                @if (auth()->user()->role == 'arsitek')
                <p class="text-muted text-center">Arsitek</p>
                @else
                <p class="text-muted text-center">Pelanggan</p>
                @endif
                <x-container class="text-center mt-5">
                    <img class="img-fluid img-circle"
                        src="{{asset('storage/'. auth()->user()->arsitek->ktp)}}"
                        alt="Foto Ktp">
                </x-container>
                
            </x-container>
        </x-container>
    </x-container>
    <x-container class="col-md-8 col-sm-12">
        <x-form>
            <x-slot name="title">Data {{$nama}}</x-slot>

            {{-- <form wire:submit.prevent="changePass"> --}}
            <x-input.input wire:model="nik" readonly>
                <x-slot name="label">NIK</x-slot>
            </x-input.input>

            <x-input.input wire:model="email" type="email" readonly>
                <x-slot name="label">email</x-slot>
            </x-input.input>

            <x-input.input wire:model="jenis_kelamin" readonly>
                <x-slot name="label">Jenis Kelamin</x-slot>
            </x-input.input>

            <x-input.input wire:model="tanggal_lahir" readonly>
                <x-slot name="label">Tanggal Lahir</x-slot>
            </x-input.input>

            <x-input.textarea value="{{$alamat}}" placeholder="{{$alamat}}" readonly>
                <x-slot name="label">Alamat</x-slot>
            </x-input.textarea>

            <x-input.input wire:model="no_hp" readonly>
                <x-slot name="label">No Handphone</x-slot>
            </x-input.input>

            <x-button.button wire:click="edit" color="primary" class="float-right">Ganti Profil
            </x-button.button>
            {{-- </form> --}}

        </x-form>
    </x-container>
</x-container>