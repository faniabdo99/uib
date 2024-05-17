@extends('admin.layout.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gallery ({{ $Gallery->count() }})</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display min-w850 table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Url</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Gallery as $Image)
                                        <tr>
                                            <td>{{ $Image->id }}</td>
                                            <td><img src="{{ $Image->imagePath }}" style="height: 100px; width: auto;" /></td>
                                            <td>{{ $Image->url }}</td>
                                            <td>{{ $Image->created_at->format('Y-m-d h:i A') }}</td>											
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.gallery.getEdit', $Image->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('admin.gallery.delete', $Image->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>												
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection