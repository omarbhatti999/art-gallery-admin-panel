@extends('admin.layout.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ml-0">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Tag</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.tags.index') }}">Tags</a></li>
                        <li class="breadcrumb-item active">Edit Tag</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Tag</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Tag Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $tag->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3" required>{{ $tag->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="active">Status</label>
                        <select name="active" id="active" class="form-control" required>
                            <option value="1" {{ $tag->active ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$tag->active ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
