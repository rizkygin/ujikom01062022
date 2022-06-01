@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('delete') }}
                        </div>
                    @endif
                  <div style="display:flex;" >
                    
                      <div class="btn btn-success">
                        <a class="badge" href={{route('downloadExcel')}} style ="text-decoration:none">Expor Excel</a>
                    
                      </div>
                    
                      <div class="btn btn-success">
                        <a class="badge" href={{route('exportPdf')}} style ="text-decoration:none">Cetak</a>
                    
                      </div>
                      <div style="float: right;margin-left:10px">
                        <div class="btn btn-primary">
                          <a class="badge" style ="text-decoration:none"href={{ route('tambah') }}>Tambah Pemesanan</a>
                      
                        </div>
                      </div>
                      
                  </div>
                  <br>
                  <table class="table table-striped" >
                    @php
                        function rupiah($angka){
	
                          $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                          return $hasil_rupiah;
                        
                        }
                    @endphp
                    <tbody>
                      @if ($payments->count() > 0)
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pembiayaan</th>
                            <th scope="col">Jumlah Bulan</th>
                            <th scope="col">Total Biaya</th>
                            <th scope="col">Biaya per Bulan</th>
                            <th scope="col" colspan="2">Aksi</th>
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
                                {{rupiah($payment->debt->price)}}
                              </td>
                              <td>
                                {{rupiah($payment->debt->price / $payment->month + 25000)}}
                              </td>
                              <td>
                                <div class="row">
                                  <div class="col-5">
                                    <a href={{route('editPayment',[$payment->id])}} class="btn btn-warning">Edit</a>
                                  </div>
                                  <div class="col-2">
                                    <form action={{route('deletePayment',[$payment->id])}} method='POST'> @csrf @method('DELETE')<button class="btn btn-danger">Hapus</button></form>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                            
                        </tbody>
                      @else
                          Data Kosong !!!
                      @endif
                      
                    </tbody>
                  </table>
                  <div class="d-flex">
                    {!! $payments->links() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
