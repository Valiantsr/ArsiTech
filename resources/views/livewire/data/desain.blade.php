<x-table title="Data Konsep Bangunan" id="dt">
    <x-slot name="button">
        @if (Auth::user()->role == "arsitek")
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
            <th>Gambar</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach ($data as $k)
        <tr>
            <td>{{$no}}</td>
            <td>{{$k->nama}}</td>
            <td><img src="{{ asset('storage/'.$k->gambar) }}" alt="desain" class="img-circle img-thumbnail" width="150" height="150"></td>
            {{-- {{$k->gambar}} --}}
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
