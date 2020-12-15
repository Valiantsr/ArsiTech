<x-table title="Data Sayembara" id="dt">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Akhir</th>
            <th>Konsep</th>
            <th>Luas Bangunan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        {{-- {{dd($data)}} --}}
        <?php $no=1 ?>
        @foreach ($data as $k)
        <tr>
            <td>{{$no}}</td>
            <td>{{$k->nama}}</td>
            <td>{{$k->tanggal}}</td>
            <td>{{$k->akhir}}</td>
            <td>{{$k->konsep->nama}}</td>
            <td>{{$k->luas_bangunan}} m<sup>2</sup></td>
            <td>
                <x-button.button wire:click="ikut({{$k->id}})" color="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Join
                </x-button.button>
            </td>
            <?php $no++ ?>
        </tr>
        @endforeach
    </tbody>
</x-table>
