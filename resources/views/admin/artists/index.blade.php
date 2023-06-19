@extends('admin.layout.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ml-0">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Artists</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Artists</li>
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
                <h3 class="card-title">Artists</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">ID</th>
                            <th style="width: 20%">Name</th>
                            <th style="width: 30%">Short Description</th>
                            <th>Status</th>
                            <th style="width: 8%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artists as $artist)
                        <tr>
                            <td>{{ $artist->id }}</td>
                            <td>
                                <a>{{ $artist->name }}</a>
                                <br />
                            </td>
                            <td>{{ Str::words( $artist->short_description, 30, '...') }}</td>
                            <td class="project-state">
                                <span class="badge badge-{{ $artist->active ? 'success' : 'danger' }}">{{ $artist->active ? 'Active' : 'Inactive' }}</span>
                            </td>
                            <td class="project-actions text-right">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-info btn-sm" href="{{ route('artists.edit', $artist->id) }}">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>
                                    <form id="delete-artist-{{ $artist->id }}" action="{{ route('artists.destroy', $artist->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this artist?')) document.getElementById('delete-artist-{{ $artist->id }}').submit();">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
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
