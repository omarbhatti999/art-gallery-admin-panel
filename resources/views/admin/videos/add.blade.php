@extends('admin.layout.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ml-0">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Video</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">Videos</a></li>
                        <li class="breadcrumb-item active">Add Video</li>
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
                <h3 class="card-title">Add Video</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" id="short_description" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="long_description">Long Description</label>
                        <textarea name="long_description" id="long_description" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="video_link">YouTube Video Link</label>
                        <input type="text" name="video_link" id="video_link" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" name="seo_title" id="seo_title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="seo_meta">SEO Meta</label>
                        <textarea name="seo_meta" id="seo_meta" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="seo_image">SEO Image</label>
                        <input type="text" name="seo_image" id="seo_image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="active">Status</label>
                        <select name="active" id="active" class="form-control" required>
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                    </div>

                   

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
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
