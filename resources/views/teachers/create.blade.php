@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    {{ trans('teachers.new_title') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('teachers.new_pagetopic') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('dashboard.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('teachers.new_pagetitle') }}</li>
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
                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('teachers.store')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{trans('teachers.eamil')}}</label>
                                <input type="email" name="email" class="form-control">
                                @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col">
                                <label for="title">{{trans('teachers.password')}}</label>
                                <input type="Password" name="password" class="form-control">
                                @error('password')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{trans('teachers.teacher_name_ar')}}</label>
                                <input type="text" name="teacher_name_ar" class="form-control">
                                @error('teacher_name_ar')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col">
                                <label for="title">{{trans('teachers.teacher_name_en')}}</label>
                                <input type="text" name="teacher_name_en" class="form-control">
                                @error('teacher_name_en')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputCity">{{trans('teachers.teacher_specialization')}}</label>
                                <select class="custom-select my-1 mr-sm-2" name="specialization_id">
                                    <option selected disabled>{{trans('teachers.specialization_choose')}}...</option>
                                    @foreach($specializations as $specialization)
                                        <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                                    @endforeach
                                </select>
                                @error('specialization_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputState">{{trans('teachers.teacher_gender')}}</label>
                                <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                    <option selected disabled>{{trans('teachers.genders_choose')}}...</option>
                                    @foreach($genders as $gender)
                                        <option value="{{$gender->id}}">{{$gender->name}}</option>
                                    @endforeach
                                </select>
                                @error('gender_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{trans('teachers.teacher_dateofhiring')}}</label>
                                <div class='input-group date'>
                                    <input class="form-control" type="text"  id="datepicker-action" name="joining_date" data-date-format="yyyy-mm-dd"  required>
                                </div>
                                @error('joining_date')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{trans('teachers.address')}}</label>
                            <textarea class="form-control" name="address"
                                    id="exampleFormControlTextarea1" rows="4"></textarea>
                            @error('Address')<div class="alert alert-danger">{{ $message }}</div> @enderror
                        </div>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('teachers.submit')}}</button>
                        </form>
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
