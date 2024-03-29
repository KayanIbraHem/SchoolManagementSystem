@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
   {{ trans('fees.title') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('fees.page_title') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('fees.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('fees.new_fees') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('fees.name') }}</th>
                                            <th>{{ trans('fees.amount') }}</th>
                                            <th>{{ trans('fees.grade') }}</th>
                                            <th>{{ trans('fees.classgrade') }}</th>
                                            <th>{{ trans('fees.year') }}</th>
                                            <th>{{ trans('fees.feetype') }}</th>
                                            <th>{{ trans('fees.descriptions') }}</th>
                                            <th>{{ trans('fees.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($fees as $fee)
                                            <tr>
                                            <td>{{$loop->iteration }}</td>
                                            <td>{{$fee->name}}</td>
                                            <td>{{number_format($fee->amount, 2)}}</td>
                                            <td>{{$fee->grade->name}}</td>
                                            <td>{{$fee->classgrade->name}}</td>
                                            <td>{{$fee->year}}</td>
                                            <td>{{$fee->feetype->name}}</td>
                                            <td>{{$fee->description}}</td>
                                                <td>
                                                    <a href="{{route('fees.edit',$fee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_fee{{ $fee->id }}" ><i class="fa fa-trash"></i></button>
                                                    <a href="#" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>

                                                </td>
                                            </tr>
                                        @include('fees.delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
