@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('students.show_title') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{ trans('students.show_page_topic') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('dashboard.home') }}</a></li>
                <li class="breadcrumb-item active"> {{ trans('students.show_page_title') }}</li>
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
                <div class="tab nav-border">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                role="tab" aria-controls="home-02"
                                aria-selected="true">{{trans('students.show_table_title')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                role="tab" aria-controls="profile-02"
                                aria-selected="false">{{trans('students.show_attachment')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                aria-labelledby="home-02-tab">
                            <table class="table table-striped table-hover" style="text-align:center">
                                <tbody>
                                    <tr>
                                        <th scope="row">{{trans('students.name')}}</th>
                                        <td>{{ $student->name }}</td>
                                        <th scope="row">{{trans('students.email')}}</th>
                                        <td>{{$student->email}}</td>
                                        <th scope="row">{{trans('students.gender')}}</th>
                                        <td>{{$student->gender->name}}</td>
                                        <th scope="row">{{trans('students.nationality')}}</th>
                                        <td>{{$student->nationality->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{trans('students.grade')}}</th>
                                        <td>{{ $student->grade->name }}</td>
                                        <th scope="row">{{trans('students.class_grade')}}</th>
                                        <td>{{$student->classgrade->name}}</td>
                                        <th scope="row">{{trans('students.section')}}</th>
                                        <td>{{$student->section->name}}</td>
                                        <th scope="row">{{trans('students.date_of_birth')}}</th>
                                        <td>{{ $student->date_birth}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{trans('students.parent')}}</th>
                                        <td>{{$student->parent->father_name}}</td>
                                        <th scope="row">{{trans('students.academic_year')}}</th>
                                        <td>{{$student->academic_year}}</td>
                                        <th scope="row"></th>
                                        <td></td>
                                        <th scope="row"></th>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                aria-labelledby="profile-02-tab">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <form action="{{route('upload_attachment',['student_name'=>$student->name,'student_id'=>$student->id])}}" method="post"  enctype="multipart/form-data">
                                       @csrf
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>{{trans('students.show_attachment')}}
                                                    : <span class="text-danger">*</span>
                                                </label>
                                                <input type="file" accept="image/*" name="photos[]" multiple required>
                                            </div>
                                        </div>
                                        <br><br>
                                        <button type="submit" class="button button-border x-small">
                                                {{trans('students.submit')}}
                                        </button>
                                    </form>
                                </div>
                                <br>
                                <table class="table center-aligned-table mb-0 table table-hover"style="text-align:center">
                                    <thead>
                                        <tr class="table-secondary">
                                            <th scope="col">#</th>
                                            <th scope="col">{{trans('students.attachment')}}</th>
                                            <th scope="col">{{trans('students.created_at')}}</th>
                                            <th scope="col">{{trans('students.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($student->images as $attachment)
                                            <tr style='text-align:center;vertical-align:middle'>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$attachment->name}}</td>
                                                <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                <td colspan="2">
                                                    <a class="btn btn-outline-info btn-sm"
                                                    href="{{route('download_attachment',['student_name'=>$attachment->imageable->name,'file_name'=>$attachment->name])}}"
                                                    role="button"><i class="fas fa-download"></i>&nbsp; {{trans('students.download')}}</a>
                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_img{{ $attachment->id }}"
                                                            title="{{ trans('students.delete') }}">{{trans('students.delete')}}
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('students.modal_delete')
                                        @endforeach
                                    </tbody>
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

@endsection
