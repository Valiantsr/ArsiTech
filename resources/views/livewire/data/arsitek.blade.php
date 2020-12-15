<x-table title="Data Arsitek" id="dt">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>KTP</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>No Handphone</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    {{-- {{dd($data)}} --}}
    <tbody>
        <?php $no=1 ?>
        @foreach ($data as $k)
        <tr>
            <td>{{$no}}</td>
            <td>{{$k->nama_depan . ' ' . $k->nama_belakang}}</td>
            <td>{{$k->nik}}</td>
            <td><img src="{{ asset('storage/'.$k->ktp) }}" alt="ktp" class="img-circle img-fluid"></td>
            <td>{{$k->jenis_kelamin}}</td>
            <td>{{$k->tanggal_lahir}}</td>
            <td>{{$k->no_hp}}</td>
            <td>
                @if ($k->user->status == 'terverifikasi')
                <span class="badge badge-success">{{$k->user->status}}</span>
                @else
                <span class="badge badge-danger">{{$k->user->status}}</span>
                @endif
            </td>
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
