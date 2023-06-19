@extends('admin.layout.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ml-0">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Video Management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Video Management</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Video List</h3>
        <div class="card-tools">
          <a href="{{ route('videos.create') }}" class="btn btn-primary">Add New Video</a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Title</th>
              <th>Short Description</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($videos as $video)
            <tr>
              <td>{{ $video->title }}</td>
              <td>{{ $video->short_description }}</td>
              <td>{{ $video->active ? 'Active' : 'Inactive' }}</td>
              <td>
                <div class="btn-group">
                  <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-sm btn-info">Edit</a>
                  <form action="{{ route('videos.destroy', $video->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this video?')">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4">No videos found.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
