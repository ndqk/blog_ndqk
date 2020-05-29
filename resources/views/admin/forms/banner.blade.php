@extends('widgets/adminfull')

@section('title', 'AdminLTE 3 | Banner')

@section('css')

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change Banner</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Banner List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                        <thead style="text-align: center">                  
                            <tr>
                                <th>#</th>
                                <th>BannerID</th>
                                <th>BannerImage</th>
                                <th>BannerName</th>
                                <th>Change</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            @if (isset($Banners))
                                <?php $index = 0;?>
                                @foreach ($Banners as $banner)
                                    <?php $index++;?>
                                    <tr>
                                        <td>{{$index}}</td>
                                        <td>{{$banner->banner_id}}</td>
                                        <td>{{$banner->post->spost_inimage}}</td>
                                        <td>{{$banner->post->spost_title}}</td>
                                        <td>
                                            <a href="#">Change</a>
                                        </td>
                                        <td>
                                            <a href="#">x</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
    
@endsection