<div>
    <select name="prov" wire:model="selected_prov" wire:change="refreshData">
        <option value="">--filter--</option>
        @foreach ($allProv as $key => $item)
        <option value="{{$key}}">{{$item[0]['wilayah']['r101n']}}</option>
        @endforeach
    </select>
    <table>
        <thead>
            <th>Kode Provinsi</th>
            <th>Nama Provinsi</th>
            <th>Jumlah Penduduk</th>
            <th>Penduduk Miskin</th>
            <th>% Miskin</th>
        </thead>
        <tbody>
            @foreach ($susenas as $key => $item)
            <tr>
                <td>{{$key}}</td>
                <td>{{$item[0]['wilayah']['r101n']}}</td>
                <td>{{$item->sum('weind')}}</td>
                <td>{{$item->where('poor',1)->sum('weind')}}</td>
                <td>{{number_format($item->where('poor',1)->sum('weind') / $item->sum('weind') * 100, 1)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
