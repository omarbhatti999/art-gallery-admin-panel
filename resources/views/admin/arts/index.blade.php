@extends('admin.layout.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ml-0">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Art Management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Art Management</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Art List</h3>
        <div class="card-tools">
          <a href="{{ route('arts.create') }}" class="btn btn-primary">Add New Art</a>
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
              <th>Artist</th>
              <th>Category</th>
              <th>Year</th>
              <th>Featured</th>
              <th>Sort Number</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($arts as $art)
            <tr>
              <td>{{ $art->title }}</td>
              <td>{{ $art->artist->name }}</td>
              <td>{{ $art->category->name }}</td>
              <td>{{ $art->year }}</td>
              <td>{{ $art->featured ? 'Yes' : 'No' }}</td>
              <td>{{ $art->sort_number }}</td>
              <td>
                <div class="btn-group">
                  <a href="{{ route('arts.edit', $art->id) }}" class="btn btn-sm btn-info">Edit</a>
                  <form action="{{ route('arts.destroy', $art->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this art?')">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7">No arts found.</td>
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
