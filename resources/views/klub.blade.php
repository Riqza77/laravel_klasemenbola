@extends('main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-hastag" aria-hidden="true"></i> Form Klub
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('form-klub') }}"><i class="fa fa-hashtag"></i> Home</a></li>
                <li class="active">Form Klub</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            @error('nama_klub')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('kota')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                </div>
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->



                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Masukkan Data Klub</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" action="{{ route('post-klub') }}" method="post" role="form">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_klub">Nama Klub</label>
                                            <input type="text" value="{{ old('nama_klub') }}" class="form-control"
                                                name="nama_klub" autofocus>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="kota">Kota Klub</label>
                                            <input type="text" value="{{ old('kota') }}"
                                                class="form-control"name="kota">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Submit" />
                                <input type="reset" class="btn btn-default" value="Reset" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
