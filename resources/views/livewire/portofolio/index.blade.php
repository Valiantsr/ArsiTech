<x-container>
    @if ($portoId)
     <x-form>
        <x-slot name="title">Data {{$nama}}</x-slot>

        <x-input.input wire:model="nama" readonly>
            <x-slot name="label">Nama</x-slot>
        </x-input.input>

        <x-input.textarea value="{{$deskripsi}}" placeholder="{{$deskripsi}}" readonly>
            <x-slot name="label">Deskripsi</x-slot>
        </x-input.textarea>

        @if ($portoId == null) 
        <x-button.button wire:click="edit" color="primary" class="float-right">Ganti Profil
        </x-button.button>
        @endif
    </x-form>
    @endif

    <x-table title="Data Portofolio" id="dt">
        @if ($portoId == null)
        <x-button.button wire:click="tambah" color="success" class="btn-sm float-right mb-2">
            <x-icon type="plus" />
            Tambah
        </x-button.button>
        @endif
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Desain</th>
                <th>Konsep</th>
                <th>Action</th>
            </tr>
        </thead>
        {{-- {{dd($data)}} --}}
        <tbody>
            <?php $no=1 ?>
            @foreach ($detail as $k)
            <tr>
                <td>{{$no}}</td>
                <td>{{$k->desain->nama}}</td>
                <td>{{$k->konsep->nama}}</td>
                <td>
                    <x-button.button wire:click="detail({{$k->id}})" color="primary" class="btn-sm">
                        <x-icon type="pencil-alt" />
                        Detail
                    </x-button.button>
                </td>
                <?php $no++ ?>
            </tr>
            @endforeach
        </tbody>
    </x-table>
</x-container>