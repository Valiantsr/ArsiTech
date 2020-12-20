<x-table title="Data Sayembara" id="dt">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Akhir</th>
            <th>Konsep</th>
            <th>Luas Bangunan</th>
            <th>Status</th>
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
                @if ($k->status == 'terverifikasi')
                <span class="badge badge-success">{{$k->status}}</span>
                @elseif ($k->status == 'menunggu')
                <span class="badge badge-primary">{{$k->status}} penawaran</span>
                @else
                <span class="badge badge-danger">{{$k->status}}</span>
                @endif
            </td>
            <td>
                @if ($k->transaksi == null)
                <span class="badge badge-danger">Belum ada penawaran</span>
                @else
                @if ($k->transaksi->status == 'diproses')
                <x-button.button wire:click="detail({{$k->id}})" color="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Detail
                </x-button.button>
                @elseif ($k->transaksi->status == 'dipilih')
                @if ($k->status == 'verif pembayaran')
                <span class="badge badge-danger">{{$k->status}}</span>
                @else
                <x-button.button wire:click="bayar({{$k->id}})" color="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Bayar
                </x-button.button>
                @endif
                @endif
                @endif
                {{-- {{dd($k->transaksi)}} --}}
            </td>
            <?php $no++ ?>
        </tr>
        @endforeach
    </tbody>
</x-table>
