<table>
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Pembiayaan</th>
          <th scope="col">Jumlah Bulan</th>
          <th scope="col">Total Biaya</th>
          <th scope="col">Biaya per Bulan</th>
        </tr>
    </thead>
    @php
        $no = 1;
    @endphp
    <tbody>
      @foreach ($payments as $payment)
        <tr>
          <td>
            {{$no++}}
          </td>
          <td>
            {{$payment->debt->name}}
          </td>
          <td>
            {{$payment->month}}
          </td>
          <td>
            {{$payment->debt->price}}
          </td>
          <td>
            {{$payment->debt->price / $payment->month}}
          </td>
        </tr>
      @endforeach
        
    </tbody>
</table>