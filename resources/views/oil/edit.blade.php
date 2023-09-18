@extends('layouts.app')

@section('title', 'Edit Condemning Details')

@section('contents')

<div class="container mt-4">
    <hr>

    <form action="{{ route('oil.update', $oil) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row">
        <input type="hidden" name="id" value="{{ $oil->condemnID }}">
        @foreach ($columns as $column)
            <div class="col-md-2 mb-3">
                <label for="{{ $column }}" class="form-label">{{ $column }}</label>
                <input type="text" name="{{ $column }}" value="{{ $oil->{$column} }}" class="form-control">
            </div>
                @if ($loop->iteration % 5 == 0)
                </div><div class="row">
                @endif
        @endforeach
        </div>

    
        <button type="submit" class="btn btn-primary">Update</button>
        {{-- <a href="{{ route('oil.index') }}" class="btn btn-secondary">Back to Index</a> --}}
    </form>
    
    
</div>
@endsection
