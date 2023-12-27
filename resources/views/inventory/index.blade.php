@extends('layouts.app')

@section('contents')
    <div class="container">
        <h1>Inventory List</h1>

        <a class="btn btn-primary" href="{{ route('inventory.create') }}">Add Inventory</a>

        <table class="table">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $rowNumber = 1;
                @endphp

                @foreach($inventories as $inventory)
                    <tr>
                        {{-- <td>{{ $inventory->id }}</td> --}}
                        <td>{{ $rowNumber++ }}</td>
                        <td>{{ $inventory->nama }}</td>
                        <td>{{ $inventory->jenis }}</td>
                        <td>{{ $inventory->jumlah }}</td>
                        <td>{{ $inventory->status }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $inventory->gambar) }}" alt="{{ $inventory->nama }}" style="max-width: 80px;">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('inventory.edit', $inventory->id) }}">Edit</a>
                            <form action="{{ route('inventory.destroy', $inventory->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Ingin di Hapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
