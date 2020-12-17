<x-container>
    <x-table title="Data Permintaan Sayembara" id="dt">
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
            @foreach ($verif as $k)
            <tr>
                <td>{{$no}}</td>
                <td>{{$k->nama}}</td>
                <td>{{$k->tanggal}}</td>
                <td>{{$k->akhir}}</td>
                <td>{{$k->konsep->nama}}</td>
                <td>{{$k->luas_bangunan}} m<sup>2</sup></td>
                <td>
                    <x-button.button wire:click="join({{$k->id}})" color="primary" class="btn-sm">
                        <x-icon type="pencil-alt" />
                        Join
                    </x-button.button>
                </td>
                <?php $no++ ?>
            </tr>
            @endforeach
        </tbody>
    </x-table>
    <x-card>
        <x-slot name="header">Menunggu Desain</x-slot>
        <x-basic-table class="table table-bordered">
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
                @foreach ($waiting as $w)
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$w->sayembara->nama}}</td>
                    <td>{{$w->sayembara->tanggal}}</td>
                    <td>{{$w->sayembara->akhir}}</td>
                    <td>{{$w->sayembara->konsep->nama}}</td>
                    <td>{{$w->sayembara->luas_bangunan}} m<sup>2</sup></td>
                    <td>
                        @if ($w->desain_id)
                        <x-button.button wire:click="desain({{$w->sayembara->id}})" color="primary" class="btn-sm">
                            <x-icon type="pencil-alt" />
                            Detail
                        </x-button.button>
                        @else
                        <x-button.button wire:click="desain({{$w->sayembara->id}})" color="primary" class="btn-sm">
                            <x-icon type="pencil-alt" />
                            Upload Desain
                        </x-button.button>
                        @endif
                    </td>
                    <?php $no++ ?>
                </tr>
                @endforeach
            </tbody>
        </x-basic-table>
    </x-card>
</x-container>