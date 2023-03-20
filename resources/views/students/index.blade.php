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
                                    <div class="dropdown show">
                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           {{ trans('students.actions') }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{route('students.show',$student->id)}}">
                                                <i  style="color: #ffc107" class="far fa-eye "></i>
                                                &nbsp;{{ trans('students.student_view') }}
                                            </a>
                                            <a class="dropdown-item" href="{{route('students.edit',$student->id)}}">
                                                <i  style="color:green" class="fa fa-edit"></i>
                                                &nbsp;{{ trans('students.student_edit') }}
                                            </a>
                                            <a class="dropdown-item" href="{{route('feeinvoices.show',$student->id)}}">
                                                <i style="color: #0000cc" class="fa fa-edit"></i>
                                                &nbsp;{{ trans('students.student_fees') }}
                                            </a>
                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#delete_student{{ $student->id }}" title="{{ trans('students.student_delete') }}">
                                                <i style="color: red" class="fa fa-trash"></i>
                                                &nbsp;{{ trans('students.student_delete') }}
                                            </button>
                                        </div>
                                    </div>
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
