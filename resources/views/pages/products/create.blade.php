@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Barang</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{route('products.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name" class="form-control-label">Nama Barang</label>
            <input  type="text" 
                    name="name" 
                    value="{{old('name')}}" 
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Masukan Nama Barang">

        @error('name') <div class="text-muted">{{$message}}</div> @enderror 
        </div>

        <div class="form-group">
            <label for="type" class="form-control-label">Tipe Barang</label>
            <input  type="text" 
                    name="type" 
                    value="{{old('type')}}" 
                    class="form-control @error('type') is-invalid @enderror"
                    placeholder="Masukan Tipe Barang">

            @error('type') <div class="text-muted">{{$message}}</div> @enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-control-label">Deskripsi Barang</label>
            <textarea   name="description"
                        id="description"
                        class="form-control @error('description') is-invalid @enderror" placeholder="Masukan Deskripsi Barang">{{old('description')}}</textarea>

            @error('description') <div class="text-muted">{{$message}}</div> @enderror
        </div> 

            <div class="form-group">
            <label for="price" class="form-control-label">Harga Barang</label>
            <input  type="number" 
                    name="price" 
                    value="{{old('price')}}"
                    placeholder="Masukan Harga Barang" 
                    class="form-control @error('price') is-invalid @enderror">

            @error('price') <div class="text-muted">{{$message}}</div> @enderror
        </div>

        <div class="form-group">
            <label for="quantity" class="form-control-label">Kuantitas Barang</label>
            <input  type="number" 
                    name="quantity" 
                    value="{{old('quantity')}}"
                    placeholder="Masukan kuantitas Barang" 
                    class="form-control @error('quantity') is-invalid @enderror">

            @error('quantity') <div class="text-muted">{{$message}}</div> @enderror 
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">
                Tambah Barang
            </button>
        </div>

        </form>
    </div>
</div>
    
@endsection