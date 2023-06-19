@extends('admin.layout.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ml-0">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blogs</a></li>
                        <li class="breadcrumb-item active">Edit Blog</li>
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
                <h3 class="card-title">Edit Blog</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" id="short_description" class="form-control" required>{{ $blog->short_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="long_description">Long Description</label>
                        <textarea name="long_description" id="long_description" class="form-control" required>{{ $blog->long_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" name="type" id="type" class="form-control" value="{{ $blog->type }}" required>
                    </div>

                   

                    <div class="form-group">
                        <label for="video_link">Video Link</label>
                        <input type="text" name="video_link" id="video_link" class="form-control" value="{{ $blog->video_link }}">
                    </div>

                    <div class="form-group">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" name="seo_title" id="seo_title" class="form-control" value="{{ $blog->seo_title }}">
                    </div>

                    <div class="form-group">
                        <label for="seo_meta">SEO Meta</label>
                        <textarea name="seo_meta" id="seo_meta" class="form-control">{{ $blog->seo_meta }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="seo_image">SEO Image</label>
                        <input type="file" name="seo_image" id="seo_image" class="form-control-file">
                        @if($blog->seo_image)
                            <div>
                                <img src="{{ asset('storage/'.$blog->seo_image) }}" alt="SEO Image" style="max-width: 200px;">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="thumbnail_image">Thumbnail Image</label>
                        <input type="file" name="thumbnail_image" id="thumbnail_image" class="form-control-file">
                        @if($blog->thumbnail_image)
                            <div>
                                <img src="{{ asset('storage/'.$blog->thumbnail_image) }}" alt="Thumbnail Image" style="max-width: 200px;">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="banner_image">Banner Image</label>
                        <input type="file" name="banner_image" id="banner_image" class="form-control-file">
                        @if($blog->banner_image)
                            <div>
                                <img src="{{ asset('storage/'.$blog->banner_image) }}" alt="Banner Image" style="max-width: 200px;">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="active">Active</label>
                        <select name="active" id="active" class="form-control" required>
                            <option value="0" {{ $blog->active == 0 ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ $blog->active == 1 ? 'selected' : '' }}>Active</option>
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
