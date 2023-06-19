@extends('admin.layout.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper ml-0">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Art</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Art</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
 <!-- Display validation errors -->
 @if ($errors->any())
 <div class="alert alert-danger mt-3">
     <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
     </ul>
 </div>
@endif
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                           
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('arts.update', $art->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="inputTitle">Title</label>
                                        <input type="text" id="inputTitle" class="form-control" name="title"
                                            value="{{ $art->title }}" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="slug">Slug</label>
                                        <input type="text" id="slug" class="form-control" name="slug"
                                            value="{{ $art->slug }}" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="inputSliderCaption">Slider Caption</label>
                                        <input type="text" id="inputSliderCaption" class="form-control"
                                            name="slider_caption" value="{{ $art->slider_caption }}">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="inputShortDescription">Short Description</label>
                                        <textarea id="inputShortDescription" class="form-control" rows="4" name="short_description">{{ $art->short_description }}</textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="inputLongDescription">Long Description</label>
                                        <textarea id="inputLongDescription" class="form-control" rows="8" name="long_description">{{ $art->long_description }}</textarea>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputYear">Year</label>
                                        <input type="number" id="inputYear" class="form-control" name="year"
                                            value="{{ $art->year }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputMaterials">Materials</label>
                                        <input type="text" id="inputMaterials" class="form-control" name="materials"
                                            value="{{ $art->materials }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputSize">Size</label>
                                        <input type="text" id="inputSize" class="form-control" name="size"
                                            value="{{ $art->size }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputEdition">Edition</label>
                                        <input type="text" id="inputEdition" class="form-control" name="edition"
                                            value="{{ $art->edition }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputCategory">Category</label>
                                        <select id="inputCategory" class="form-control" name="category_id">
                                            <option selected disabled>Select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $art->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputSeries">Series</label>
                                        <input type="text" id="inputSeries" class="form-control" name="series"
                                            value="{{ $art->series }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputArtist">Artist</label>
                                        <select id="inputArtist" class="form-control" name="artist_id">
                                            <option selected disabled>Select an artist</option>
                                            @foreach ($artists as $artist)
                                                <option value="{{ $artist->id }}"
                                                    {{ $artist->id == $art->artist_id ? 'selected' : '' }}>
                                                    {{ $artist->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="location">Location</label>
                                        <input type="text" id="location" class="form-control" name="location"
                                            value="{{ $art->location }}" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputAvailability">Availability</label>
                                        <select id="inputAvailability" class="form-control" name="availability">
                                            <option value="0" {{ $art->availability == 0 ? 'selected' : '' }}>
                                                Unavailable</option>
                                            <option value="1" {{ $art->availability == 1 ? 'selected' : '' }}>
                                                Available</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputFeatured">Featured</label>
                                        <select id="inputFeatured" class="form-control" name="featured">
                                            <option value="0" {{ $art->featured == 0 ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ $art->featured == 1 ? 'selected' : '' }}>Yes
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputSortNumber">Sort Number</label>
                                        <input type="number" id="inputSortNumber" class="form-control"
                                            name="sort_number" value="{{ $art->sort_number }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputActive">Active</label>
                                        <select id="inputActive" class="form-control" name="active">
                                            <option value="0" {{ $art->active == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                            <option value="1" {{ $art->active == 1 ? 'selected' : '' }}>Active
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputHidden">Hidden</label>
                                        <select id="inputHidden" class="form-control" name="hidden">
                                            <option value="0" {{ $art->hidden == 0 ? 'selected' : '' }}>Visible
                                            </option>
                                            <option value="1" {{ $art->hidden == 1 ? 'selected' : '' }}>Hidden
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputBannerImage">Banner Image</label>
                                        <input type="file" id="inputBannerImage" class="form-control-file"
                                            name="banner_image">
                                        @if ($art->banner_image)
                                            <img src="{{ asset('storage/art/' . $art->banner_image) }}"
                                                alt="Banner Image" width="200">
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputThumbImage">Thumbnail Image</label>
                                        <input type="file" id="inputThumbImage" class="form-control-file"
                                            name="thumb_image">
                                        @if ($art->thumb_image)
                                            <img src="{{ asset('storage/art/' . $art->thumb_image) }}"
                                                alt="Thumbnail Image" width="200">
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputSEOImage">SEO Image</label>
                                        <input type="file" id="inputSEOImage" class="form-control-file"
                                            name="seo_image">
                                        @if ($art->seo_image)
                                            <img src="{{ asset('storage/art/' . $art->seo_image) }}" alt="SEO Image"
                                                width="200">
                                        @endif
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label for="inputSEOKeywords">SEO Keywords</label>
                                        <input type="text" id="inputSEOKeywords" class="form-control"
                                            name="seo_keywords" value="{{ $art->seo_keywords }}">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="inputSEOMeta">SEO Meta</label>
                                        <input type="text" id="inputSEOMeta" class="form-control" name="seo_meta"
                                            value="{{ $art->seo_meta }}">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="inputSEOTitle">SEO Title</label>
                                        <input type="text" id="inputSEOTitle" class="form-control" name="seo_title"
                                            value="{{ $art->seo_title }}">
                                    </div>
                                    {{-- <div class="form-group col-sm-12">
                  <label for="inputTags">Tags</label>
                  <select id="inputTags" class="form-control" name="tags[]" multiple>
                    @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}" {{ in_array($tag->id, $art->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                  </select>
                </div> --}}
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('arts.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Media</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Existing code in edit.blade.php -->

                            <!-- Display success message -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Display error messages -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <!-- Add the following code to display existing images -->
                            <div class="art-images">
                                <h3>Art Images</h3>
                                <ul>
                                    @foreach ($art->artImages as $image)
                                        <li>
                                            <img src="{{ asset('art_images/' . $image->image_path) }}" alt="Art Image">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="{{ route('art.images.update', $image->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="featured_image">Featured
                                                                Image:</label>
                                                            <select name="featured_image" id="featured_image"
                                                                class="form-control">
                                                                <option value="0"
                                                                    @if ($image->featured_image === 0) selected @endif>
                                                                    No</option>
                                                                <option value="1"
                                                                    @if ($image->featured_image === 1) selected @endif>
                                                                    Yes</option>
                                                            </select>
                                                        </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="image_type">Image Type:</label>
                                                        <select name="image_type" id="image_type" class="form-control">
                                                            <option value="vertical"
                                                                @if ($image->image_type === 'vertical') selected @endif>
                                                                Vertical</option>
                                                            <option value="horizontal"
                                                                @if ($image->image_type === 'horizontal') selected @endif>
                                                                Horizontal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-5">
                                                    <div class="btn-group" role="group">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        <button type="button" class="btn btn-danger delete-btn"
                                                            data-toggle="modal"
                                                            data-target="#confirm-delete-{{ $image->id }}">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>

                                            <!-- Confirmation Modal -->
                                            <div class="modal fade" id="confirm-delete-{{ $image->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="confirm-delete-label"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirm-delete-label">Confirmation
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this image?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $image->id }}').submit();">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Add the following code to upload new images -->
                            <div class="upload-images">
                                <h3>Upload Images</h3>
                                <form action="{{ route('art.images.create', $art) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="images[]" multiple>
                                    <button type="submit">Upload</button>
                                </form>
                            </div>

                            <!-- Existing code in edit.blade.php -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
