@extends('main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-hastag" aria-hidden="true"></i> Form Score
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('form-skor') }}"><i class="fa fa-hashtag"></i> Home</a></li>
                <li class="active">Form Score</li>
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
                            @error('klub_id1')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('klub_id2')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('score1')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('score2')
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
                            <h3 class="box-title">Masukkan Data Score</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" action="{{ route('post-skor') }}" method="post" role="form">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="klub_id1">Klub 1</label>
                                            <select class="form-control" name="klub_id1">
                                                <option value="">-Pilih Klub-</option>
                                                @if ($klub)
                                                    @foreach ($klub as $item)
                                                        <option value="{{ $item->id_klub }}">{{ $item->nama_klub }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="score1">Score Klub</label>
                                            <input type="number" class="form-control"name="score1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="klub_id2">Klub 2</label>
                                            <select class="form-control" name="klub_id2">
                                                <option value="">-Pilih Klub-</option>
                                                @if ($klub)
                                                    @foreach ($klub as $item)
                                                        <option value="{{ $item->id_klub }}">
                                                            {{ $item->nama_klub }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="score2">Score Klub</label>
                                            <input type="number" class="form-control"name="score2">
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
