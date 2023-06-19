@extends('admin.layout.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ml-0">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Artist</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('artists.index') }}">Artists</a></li>
                        <li class="breadcrumb-item active">Add Artist</li>
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
                <h3 class="card-title">Add Artist</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('artists.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" id="short_description" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="long_description">Long Description</label>
                        <textarea name="long_description" id="long_description" class="form-control" rows="8" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" name="instagram" id="instagram" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" name="facebook" id="facebook" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="youtube">YouTube</label>
                        <input type="text" name="youtube" id="youtube" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" name="twitter" id="twitter" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tiktok">TikTok</label>
                        <input type="text" name="tiktok" id="tiktok" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="active">Status</label>
                        <select name="active" id="active" class="form-control" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sort_number">Sort Number</label>
                        <input type="number" name="sort_number" id="sort_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" name="seo_title" id="seo_title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="seo_meta">SEO Meta</label>
                        <textarea name="seo_meta" id="seo_meta" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="seo_image">SEO Image</label>
                        <input type="file" name="seo_image" id="seo_image" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label for="seo_keywords">SEO Keywords</label>
                        <textarea name="seo_keywords" id="seo_keywords" class="form-control" rows="4"></textarea>
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
