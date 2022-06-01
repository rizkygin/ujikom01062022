@extends('layouts.app')

@section('content')
<div class="container">
    @php
        if(@$edit){
            $action = route('updatePembiayaan',[$edit->id]);
        }else{
            $action = route('storePembiayaan');
        }   
    @endphp
    @php
    function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
  
    }
    @endphp
    <form action={{$action}} method="POST">
        @csrf
        <div class="form-group">
            <label for="jumlah_bulan">Jumlah Bulan</label>
            @if (@$edit)
            <input type="number" name="jumlah_bulan" class="form-control" placeholder="Jumlah Bulan" value="{{$edit->month}}"/>
            @else
            <input type="number" name="jumlah_bulan" class="form-control" placeholder="Jumlah Bulan"/>

            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Jenis Pembiayaan</label>
            <select class="form-select" aria-label="Default select example" name="debt">
                @if (@$edit)
                    @foreach ($debts as $debt)
                        @if ($debt->id == $edit->debt->id)
                            <option selected value={{$debt->id}}>{{$debt->name}} || {{rupiah($debt->price)}}</option>
                        @else
                            <option value={{$debt->id}}>{{$debt->name}} || {{rupiah($debt->price)}}</option>
                        @endif
                    @endforeach
                @else
                    @foreach ($debts as $debt)
                        <option value={{$debt->id}}>{{$debt->name}} || {{rupiah($debt->price)}}</option>
                    @endforeach
                @endif
            </select>
            <br>
            @if (@$edit)
            <button type="submit" class="btn btn-warning">Ubah</button>
                
            @else
            <button type="submit" class="btn btn-success">Buat</button>

            @endif

        </div>
    </form>
       
        
</div>

@endsection
