<x-table title="Data Sayembara" id="dt">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Konsep</th>
            <th>Gambar</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach ($detail as $k)
        <tr>
            <td>{{$no}}</td>
            <td>{{$k->desain->nama}}</td>
            <td>{{$k->sayembara->konsep->nama}}</td>
            <td>
                <a href="{{ Storage::url($k->desain->gambar) }}" target="_blank" rel="noopener noreferrer">detail
                    desain</a>
            </td>
            <td>{{number_format($k->total)}}</td>
            <td>
                @if ($k->desain_id != null)
                @if ($k->status == 'diproses')
                <x-button.button wire:click="setuju({{$k->id}})" color="primary" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Setuju
                </x-button.button>
                <x-button.button wire:click="tolak({{$k->id}})" color="danger" class="btn-sm">
                    <x-icon type="pencil-alt" />
                    Tolak
                </x-button.button>
                @elseif($k->status == 'dipilih')
                <span class="badge badge-success">{{$k->status}}</span>
                @else
                <span class="badge badge-danger">{{$k->status}}</span>
                @endif
                @endif
            </td>
            <?php $no++ ?>
        </tr>
        @endforeach
    </tbody>
</x-table>
