@extends('admin.layout.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ml-0">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
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
                <h3 class="card-title">Edit Category</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ $category->slug }}" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $category->description }}</textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="seo_title">SEO Meta Title</label>
                            <input type="text" name="seo_title" id="seo_title" class="form-control" value="{{ $category->seo_title }}" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="seo_meta">SEO Meta Description</label>
                            <textarea name="seo_meta" id="seo_meta" class="form-control" rows="4" required>{{ $category->seo_meta }}</textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="seo_image">SEO OG Image</label>
                            <input type="file" name="seo_image" id="seo_image" class="form-control" accept="image/*">
                            @if ($category->seo_image)
                                <img src="{{ asset('storage/category/seo_images/' . $category->seo_image) }}" alt="SEO OG Image" class="img-fluid mt-2">
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            <label for="icon_image">Category Image</label>
                            <input type="file" name="icon_image" id="icon_image" class="form-control" accept="image/*">
                            @if ($category->icon_image)
                                <img src="{{ asset('storage/category/category_images/' . $category->icon_image) }}" alt="Category Image" class="img-fluid mt-2">
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sort_number">Sort Number</label>
                            <input type="number" name="sort_number" id="sort_number" class="form-control" value="{{ $category->sort_number }}" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="active">Status</label>
                            <select name="active" id="active" class="form-control" required>
                                <option value="1" @if($category->active == 1) selected @endif>Active</option>
                                <option value="0" @if($category->active == 0) selected @endif>Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
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
