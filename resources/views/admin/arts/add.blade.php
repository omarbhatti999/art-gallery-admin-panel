  @extends('admin.layout.master')
  @section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ml-0">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New ART</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New ART</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>
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
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ route('arts.store') }}" method="POST">
                @csrf
                <div class="row">
                <div class="form-group col-sm-12">
                  <label for="inputTitle">Title</label>
                  <input type="text" id="inputTitle" class="form-control" name="title" required>
                </div>
                <div class="form-group col-sm-12">
                  <label for="slug">Slug</label>
                  <input type="text" id="slug" class="form-control" name="slug" required>
                </div>
                <div class="form-group col-sm-12">
                  <label for="inputSliderCaption">Slider Caption</label>
                  <input type="text" id="inputSliderCaption" class="form-control" name="slider_caption">
                </div>
                <div class="form-group col-sm-12">
                  <label for="inputShortDescription">Short Description</label>
                  <textarea id="inputShortDescription" class="form-control" rows="4" name="short_description"></textarea>
                </div>
                <div class="form-group col-sm-12">
                  <label for="inputLongDescription">Long Description</label>
                  <textarea id="inputLongDescription" class="form-control" rows="8" name="long_description"></textarea>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputYear">Year</label>
                  <input type="number" id="inputYear" class="form-control" name="year">
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputMaterials">Materials</label>
                  <input type="text" id="inputMaterials" class="form-control" name="materials">
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputSize">Size</label>
                  <input type="text" id="inputSize" class="form-control" name="size">
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputEdition">Edition</label>
                  <input type="text" id="inputEdition" class="form-control" name="edition">
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputCategory">Category</label>
                  <select id="inputCategory" class="form-control" name="category_id">
                    <option selected disabled>Select a category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputSeries">Series</label>
                  <input type="text" id="inputSeries" class="form-control" name="series">
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputArtist">Artist</label>
                  <select id="inputArtist" class="form-control" name="artist_id">
                    <option selected disabled>Select an artist</option>
                    @foreach ($artists as $artist)
                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-sm-6">
                  <label for="location">Location</label>
                  <input type="text" id="location" class="form-control" name="location" required>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputAvailability">Availability</label>
                  <select id="inputAvailability" class="form-control" name="availability">
                    <option value="0">Unavailable</option>
                    <option value="1">Available</option>
                  </select>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputFeatured">Featured</label>
                  <select id="inputFeatured" class="form-control" name="featured">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                  </select>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputSortNumber">Sort Number</label>
                  <input type="number" id="inputSortNumber" class="form-control" name="sort_number">
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputActive">Active</label>
                  <select id="inputActive" class="form-control" name="active">
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                  </select>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputHidden">Hidden</label>
                  <select id="inputHidden" class="form-control" name="hidden">
                    <option value="0">Visible</option>
                    <option value="1">Hidden</option>
                  </select>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputBannerImage">Banner Image</label>
                  <input type="file" id="inputBannerImage" class="form-control-file" name="banner_image">
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputThumbImage">Thumbnail Image</label>
                  <input type="file" id="inputThumbImage" class="form-control-file" name="thumb_image">
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputSEOImage">SEO Image</label>
                  <input type="file" id="inputSEOImage" class="form-control-file" name="seo_image">
                </div>
                
                <div class="form-group col-sm-12">
                  <label for="inputSEOKeywords">SEO Keywords</label>
                  <input type="text" id="inputSEOKeywords" class="form-control" name="seo_keywords">
                </div>
                <div class="form-group col-sm-12">
                  <label for="inputSEOMeta">SEO Meta</label>
                  <input type="text" id="inputSEOMeta" class="form-control" name="seo_meta">
                </div>
                <div class="form-group col-sm-12">
                  <label for="inputSEOTitle">SEO Title</label>
                  <input type="text" id="inputSEOTitle" class="form-control" name="seo_title">
                </div>
                {{-- <div class="form-group col-sm-12">
                  <label for="inputTags">Tags</label>
                  <select id="inputTags" class="form-control" name="tags[]" multiple>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                  </select>
                </div> --}}

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Save</button>
                  <a href="{{ route('arts.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
              
              </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
