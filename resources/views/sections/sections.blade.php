@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('sections.title')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('sections.page_title')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('dashboard.home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('sections.page_topic')}}</li>
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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card card-statistics h-100">
            <div class="card-body">
                <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#exampleModal">
                    {{trans('sections.add_section')}}
                </button>
                <div class="accordion gray plus-icon round">
                    @foreach ($grades as $grade)
                    <div class="acd-group">
                        <a href="#" class="acd-heading">{{$grade->name}}</a>
                        <div class="acd-des">
                            <div class="row">
                                <div class="col-xl-12 mb-30">
                                    <div class="card card-statistics h-100">
                                        <div class="card-body">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{trans('sections.section_name')}}</th>
                                                        <th>{{trans('sections.class_name')}}</th>
                                                        <th>{{trans('sections.statue')}}</th>
                                                        <th>{{trans('sections.actions')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($grade->sections as $section )
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$section->name}}</td>
                                                        <td>{{$section->classgrade->name}}</td>
                                                        <td>{{$section->status}}</td>
                                                        <td>
                                                        <button type="button" class="btn btn-info btn-sm edit" data-toggle="modal"
                                                            data-target="#editgrade"
                                                            data-ar=""
                                                            data-id=""
                                                            data-idgrade=""
                                                            data-en=""
                                                            title=""><i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm delete" data-toggle="modal"
                                                            data-deleteid=""
                                                            data-target="#deletegrade"
                                                            title=""><i
                                                                class="fa fa-trash"></i>
                                                        </button>
                                                        </td>
                                                    </tr>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!--ADD-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                        id="exampleModalLabel">
                        {{ trans('sections.modal_title') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('sections.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="text" name="name_s_ar" class="form-control" placeholder="{{trans('sections.section_ar')}}">
                            </div>
                            <div class="col">
                                <input type="text" name="name_s_en" class="form-control" placeholder="{{trans('sections.section_en')}}">
                            </div>
                        </div>
                        <br>
                        <div class="col">
                            <label for="inputName" class="control-label">{{ trans('sections.select_grade') }}</label>
                            <select name="grade_id" class="custom-select" onchange="console.log($(this).val())">
                                <option value="" selected disabled>{{ trans('sections.select_grade') }}</option>
                                @foreach ($gradeList as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="col">
                            <label for="inputName" class="control-label">{{ trans('sections.select_class') }}</label>
                            <select name="class_id" class="custom-select">
                            </select>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('sections.close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ trans('sections.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--END ADD-->
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    $(document).ready(function () {
        $('select[name="grade_id"]').on('change', function () {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('getclass') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="class_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection
