<x-table title="Data Konsep Bangunan" id="dt">
    <x-slot name="button">
        @if (Auth::user()->role == "admin")
            <x-button.button wire:click="tambah" color="success" class="btn-sm float-right mb-2">
                <x-icon type="plus" />
                Tambah
            </x-button.button>
        @endif
    </x-slot>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach ($data as $k)
        <tr>
            <td>{{$no}}</td>
            <td>{{$k->nama}}</td>
            <td>{{number_format($k->harga)}} /m<sup>2</sup></td>
            <td>
                <x-button.button wire:click="edit({{$k->id}})" color="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Ubah
                </x-button.button>
            </td>
            <?php $no++ ?>
        </tr>
        @endforeach
    </tbody>
</x-table>
