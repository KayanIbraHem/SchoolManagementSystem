@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
 {{ trans('fees.create_title') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('fees.create_page_title') }}
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

                    <form method="post" action="{{ route('fees.store') }}" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees.name_ar') }}</label>
                                <input type="text" value="{{ old('name_ar') }}" name="name_ar" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees.name_en') }}</label>
                                <input type="text" value="{{ old('name_en') }}" name="name_en" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees.amount') }}</label>
                                <input type="number" value="{{ old('amount') }}" name="amount" class="form-control">
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputState">{{ trans('fees.grade') }}</label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    <option selected disabled>{{trans('students.select_grade')}}...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">{{ trans('fees.classgrade') }}</label>
                                <select class="custom-select mr-sm-2" name="classgrade_id">

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputZip">{{ trans('fees.year') }}</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    <option selected disabled>{{trans('fees.select_year')}}...</option>
                                    @php
                                        $current_year = date("Y")
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputState">{{ trans('fees.feetype') }}</label>
                                <select class="custom-select mr-sm-2" name="feetype_id">
                                    <option selected disabled>{{ trans('fees.select_feetype') }}...</option>
                                    @foreach($feetype as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{ trans('fees.descriptions') }}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
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
