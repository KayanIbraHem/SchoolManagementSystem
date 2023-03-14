@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('students.promotion_title')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('students.promotion_page_title')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (Session::has('error_promotions'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_promotions')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                        <h6 style="color: red;font-family: Cairo">{{ trans('students.current_grades') }}:</h6><br>

                    <form method="post" action="{{ route('promotions.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('students.current_grade')}}</label>
                                <select class="custom-select mr-sm-2" name="grade_id" required>
                                    <option selected disabled>{{trans('students.select_grade')}}...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="classgrade_id">{{trans('students.current_grade')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classgrade_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{trans('students.current_section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('students.academic_year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="from_academic_year">
                                        <option selected disabled>{{trans('students.select_academicy_ear')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br><h6 style="color: red;font-family: Cairo">{{ trans('students.new_grades') }}</h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('students.new_grade')}}</label>
                                <select class="custom-select mr-sm-2" name="newgrade_id" >
                                    <option selected disabled>{{trans('students.select_grade')}}...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="newclassgrade_id">{{trans('students.new_class')}}: <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="newclassgrade_id" >

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="newsection_id">:{{trans('students.new_section')}} </label>
                                <select class="custom-select mr-sm-2" name="newsection_id" >

                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('students.academic_year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="to_academic_year">
                                        <option selected disabled>{{trans('students.select_academicy_ear')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ trans('students.submit') }}</button>
                    </form>

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