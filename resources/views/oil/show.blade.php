@extends('layouts.app')

@section('title', 'Condemning Limit')

@section('contents')
<div class="container mt-4">
  <hr>

  <div class="row">
    @foreach ($columns as $column)
      <div class="col-md-2 mb-3">
        <label for="{{ Str::slug($column) }}" class="form-label">{{ $column }}</label>
        <input type="text" id="{{ Str::slug($column) }}" class="form-control" value="{{ $oil[$column] }}" readonly>
      </div>
    @endforeach
  </div>

  <div class="mt-3">
    <a href="{{ url('/oil') }}" class="btn btn-primary">Back to Index</a>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="oil-detail-modal" tabindex="-1" role="dialog" aria-labelledby="oil-detail-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="oil-detail-modal-label">Condemning Limit Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Column</th>
                <th>Value</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($oil->getAttributes() as $column => $value)
                <tr>
                  <td>{{ $column }}</td>
                  <td>{{ $value }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
