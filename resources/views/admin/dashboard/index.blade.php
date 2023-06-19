@extends('admin.layout.master')
@section('content')
<div class="content-header">
    <!-- Existing code... -->
</div>

<div class="row">
    <div class="col-lg-4 col-md-6 col-12">
        <!-- Category Count -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $categoryCount }}</h3>
                <p>Categories</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-folder"></i>
            </div>
            <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
        <!-- Art Count -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $artCount }}</h3>
                <p>Arts</p>
            </div>
            <div class="icon">
                <i class="ion ion-paintbrush"></i>
            </div>
            <a href="{{ route('arts.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
        <!-- Artist Count -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $artistCount }}</h3>
                <p>Artists</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="{{ route('artists.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@endsection
