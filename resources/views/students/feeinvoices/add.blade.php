@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('fees.fee_invoice_title') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('fees.fee_invoice_page_title') }}{{$student->name}}
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

                        <form class=" row mb-30" action="{{ route('feeinvoices.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="repeater">
                                    <div data-repeater-list="feeList">
                                        <div data-repeater-item>
                                            <div class="row">

                                                <div class="col">
                                                    <label for="Name" class="mr-sm-2">{{ trans('students.name') }}</label>
                                                    <select class="fancyselect" name="student_id" required>
                                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{ trans('fees.fee_invoice_type') }}</label>
                                                    <div class="box">
                                                        <select class="fancyselect" name="fee_id" required>
                                                            <option value="">{{ trans('fees.select_feetype') }}</option>
                                                            @foreach($fees as $fee)
                                                                <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{ trans('fees.amount') }}</label>
                                                    <div class="box">
                                                        <select class="fancyselect" name="amount" required>
                                                            <option value="">{{ trans('fees.fee_invoice_price') }}</option>
                                                            @foreach($fees as $fee)
                                                                <option value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <label for="description" class="mr-sm-2">{{ trans('fees.descriptions') }}</label>
                                                    <div class="box">
                                                        <input type="text" class="form-control" name="description" required>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{ trans('fees.actions') }}:</label>
                                                    <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('fees.delete_row') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-12">
                                            <input class="button" data-repeater-create type="button" value="{{ trans('fees.add_row') }}"/>
                                        </div>
                                    </div><br>
                                    <input type="hidden" name="grade_id" value="{{$student->grade_id}}">
                                    <input type="hidden" name="classgrade_id" value="{{$student->classgrade_id}}">

                                    <button type="submit" class="btn btn-primary">{{ trans('fees.submit') }}</button>
                                </div>
                            </div>
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
