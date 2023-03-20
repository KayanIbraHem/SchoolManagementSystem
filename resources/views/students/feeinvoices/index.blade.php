@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('fees.fee_invoice_add_title') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('fees.fee_invoice_add_page_title') }}
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
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('fees.fee_invoice_student_name') }}</th>
                                            <th>{{ trans('fees.feetype') }}</th>
                                            <th>{{ trans('fees.amount') }}</th>
                                            <th>{{ trans('fees.grade') }}</th>
                                            <th>{{ trans('fees.classgrade') }}</th>
                                            <th>{{ trans('fees.descriptions') }}</th>
                                            <th>{{ trans('fees.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($feeinvoices as $fee)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$fee->student->name}}</td>
                                            <td>{{$fee->fees->name}}</td>
                                            <td>{{ number_format($fee->amount, 2) }}</td>
                                            <td>{{$fee->grade->name}}</td>
                                            <td>{{$fee->classgrade->name}}</td>
                                            <td>{{$fee->description}}</td>
                                                <td>
                                                    <a href="{{route('feeinvoices.edit',$fee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_feeinvoice{{$fee->id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('students.feeinvoices.delete')
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
