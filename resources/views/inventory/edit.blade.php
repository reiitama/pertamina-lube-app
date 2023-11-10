@extends('layouts.app')

@section('contents')
    <div class="container">
        <h1>Edit Inventory</h1>

        <form action="{{ route('inventory.update', $inventory->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $inventory->nama }}"
                    required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $inventory->jenis }}"
                    required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $inventory->jumlah }}"
                    required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_active" value="Active" required
                        @if ($inventory->status == 'Active') checked @endif>
                    <label class="form-check-label" for="status_active">Active</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_inactive" value="Inactive"
                        required @if ($inventory->status == 'Inactive') checked @endif>
                    <label class="form-check-label" for="status_inactive">Inactive</label>
                </div>

            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar">
                <img src="{{ asset('storage/' . $inventory->gambar) }}" alt="{{ $inventory->nama }}"
                    style="max-width: 80px;">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
