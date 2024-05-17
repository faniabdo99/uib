@extends('admin.layout.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit slide</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.gallery.postEdit', $Gallery->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <img src="{{ $Gallery->src }}" style="height: 100px; width: auto;">
                                <label class="col-form-label">Image</label>
                                <input name="image" type="file" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">URL</label>
                                <input name="url" type="url" class="form-control" value="{{ $Gallery->url }}">
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection