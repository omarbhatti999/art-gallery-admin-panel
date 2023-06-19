@extends('admin.layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper ml-0">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Video</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">Videos</a></li>
                            <li class="breadcrumb-item active">Edit Video</li>
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
                    <h3 class="card-title">Edit Video</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ $video->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="short_description">Short Description</label>
                            <textarea name="short_description" id="short_description" class="form-control" required>{{ $video->short_description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="long_description">Long Description</label>
                            <textarea name="long_description" id="long_description" class="form-control" required>{{ $video->long_description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="video_link">YouTube Video Link</label>
                            <input type="text" name="video_link" id="video_link" class="form-control"
                                value="{{ $video->video_link }}" required>
                        </div>

                        <div class="form-group">
                            <label for="seo_title">SEO Title</label>
                            <input type="text" name="seo_title" id="seo_title" class="form-control"
                                value="{{ $video->seo_title }}">
                        </div>

                        <div class="form-group">
                            <label for="seo_meta">SEO Meta</label>
                            <textarea name="seo_meta" id="seo_meta" class="form-control">{{ $video->seo_meta }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="seo_image">SEO Image</label>
                            <input type="text" name="seo_image" id="seo_image" class="form-control"
                                value="{{ $video->seo_image }}">
                        </div>

                        <div class="form-group">
                            <label for="active">Status</label>
                            <select name="active" id="active" class="form-control" required>
                                <option value="0" {{ !$video->active ? 'selected' : '' }}>Inactive</option>
                                <option value="1" {{ $video->active ? 'selected' : '' }}>Active</option>
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
