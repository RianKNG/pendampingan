<table>
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tdatabill as $index => $k)
        <tr>
            <td>{{ $k->jumlah }}</td>
            <td>
                @if($k->cabang == '11')
                    <td>Wado</td>
               @elseif($k->cabang == '12')
                    <td>Cisitu</td>
               @elseif($k->cabang == '3')
                    <td>Darmaraja</td>
               @elseif($k->cabang == '4')
                    <td>Situraja</td>
               @elseif($k->cabang == '9')
                    <td>Tomo</td>
                    @else
             @endif 
            </td>
            <td>{{ $k->tanggal_file }}</td>
        </tr>
        @endforeach
    </tbody>
</table>



