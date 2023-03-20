@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
   {{ trans('fees.edit_title') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('fees.edit_page_title') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('fees.update','id')}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4"> {{ trans('fees.name_ar') }}</label>
                                <input type="text" value="{{$fee->getTranslation('name','ar')}}" name="name_ar" class="form-control">
                                <input type="hidden" value="{{$fee->id}}" name="id" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees.name_en') }}</label>
                                <input type="text" value="{{$fee->getTranslation('name','en')}}" name="name_en" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees.amount') }}</label>
                                <input type="number" value="{{$fee->amount}}" name="amount" class="form-control">
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputState">{{ trans('fees.grade') }}</label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}" {{$grade->id == $fee->grade_id ? 'selected' : ""}}>{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">{{ trans('fees.classgrade') }}</label>
                                <select class="custom-select mr-sm-2" name="classgrade_id">
                                    <option value="{{$fee->classgrade_id}}">{{$fee->classgrade->name}}</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputZip">{{ trans('fees.year') }}</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    @php
                                        $current_year = date("Y")
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}" {{$year == $fee->year ? 'selected' : ' '}}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{ trans('fees.descriptions') }}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                      rows="4">{{$fee->description}}</textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">{{ trans('fees.submit') }}</button>

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
