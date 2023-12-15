@extends('main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-hastag" aria-hidden="true"></i> Klasemen
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('form-klub') }}"><i class="fa fa-hashtag"></i> Home</a></li>
                <li class="active">Klasemen</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Klasemen</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Klub</th>
                                        <th>Main</th>
                                        <th>Menang</th>
                                        <th>Seri</th>
                                        <th>Kalah</th>
                                        <th>GM</th>
                                        <th>GK</th>
                                        <th>Point</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($kl as $k)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $k->nama_klub }}</td>
                                            <td>{{ $k->main }}</td>
                                            <td>{{ $k->menang }}</td>
                                            <td>{{ $k->seri }}</td>
                                            <td>{{ $k->kalah }}</td>
                                            <td>{{ $k->gm }}</td>
                                            <td>{{ $k->gk }}</td>
                                            <td>{{ $k->point }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
        </section>

    </div>
@endsection
