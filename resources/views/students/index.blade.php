@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('students.list_title') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students.list_page_topic') }}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('dashboard.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('students.list_page_title') }}
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a href="{{route('students.create')}}" class="btn btn-success btn-sm" role="button"
                aria-pressed="true">{{trans('students.new')}}</a><br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                            data-page-length="50"
                            style="text-align: center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('students.student_name')}}</th>
                            <th>{{trans('students.student_email')}}</th>
                            <th>{{trans('students.student_gender')}}</th>
                            <th>{{trans('students.student_garde')}}</th>
                            <th>{{trans('students.student_class')}}</th>
                            <th>{{trans('students.student_section')}}</th>
                            <th>{{trans('students.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->gender->name}}</td>
                            <td>{{$student->grade->name}}</td>
                            <td>{{$student->classgrade->name}}</td>
                            <td>{{$student->section->name}}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{route('students.show',$student->id)}}"><i class="far fa-eye "></i>&nbsp; </a>
                                    <a class="btn btn-info btn-sm" href="{{route('students.edit',$student->id)}}"><i class="fa fa-edit"></i>&nbsp;</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_student{{ $student->id }}" title="{{ trans('students.delete') }}"><i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @include('students.delete')
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
