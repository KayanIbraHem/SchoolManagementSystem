@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students.promotion_management_title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('students.promotion_management_page_title')}}
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
                                <button type="button" class="btn btn-danger btn-sm"
                                        data-toggle="modal"
                                        data-target="#Delete_all"
                                        title="#">
                                        {{ trans('students.promotion_back') }}
                                </button>
                                <br>
                                <br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('students.name')}}</th>
                                            <th class="alert-danger">{{ trans('students.old_grade') }}</th>
                                            <th class="alert-danger">{{ trans('students.old_class') }}</th>
                                            <th class="alert-danger">{{ trans('students.old_section') }}</th>
                                            <th class="alert-danger">{{ trans('students.old_year') }}</th>
                                            <th class="alert-success">{{ trans('students.current_grade') }}</th>
                                            <th class="alert-success">{{ trans('students.current_class') }}</th>
                                            <th class="alert-success">{{ trans('students.current_section') }}</th>
                                            <th class="alert-success">{{ trans('students.current_year') }}</th>
                                            <th class="alert-warning">{{trans('students.actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->f_grade->name}}</td>
                                                <td>{{$promotion->f_classgrade->name}}</td>
                                                <td>{{$promotion->f_section->name}}</td>
                                                <td>{{$promotion->from_academic_year}}</td>
                                                <td>{{$promotion->t_grade->name}}</td>
                                                <td>{{$promotion->t_classgrade->name}}</td>
                                                <td>{{$promotion->t_section->name}}</td>
                                                <td>{{$promotion->to_academic_year}}</td>
                                                <td>
                                                    <a href="#"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true">
                                                       <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_one{{$promotion->id}}"
                                                            title="#">
                                                            <i class="fa fa-trash"></i>
                                                    </button>
                                                    <a href="#"
                                                       class="btn btn-warning btn-sm" role="button" aria-pressed="true">
                                                       <i class="far fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @include('students.promotions.delete_one')
                                        @endforeach
                                        @include('students.promotions.delete_all')

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