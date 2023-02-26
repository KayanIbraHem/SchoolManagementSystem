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
                                                        <th>{{trans('sections.status')}}</th>
                                                        <th>{{trans('sections.actions')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($grade->sections as $section )
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$section->name}}</td>
                                                        <td>{{$section->classgrade->name}}</td>
                                                        <td>
                                                            @if ($section->status === 1)
                                                                <label
                                                                    class="badge badge-success">{{ trans('classes.status_on') }}</label>
                                                            @else
                                                                <label
                                                                    class="badge badge-danger">{{ trans('classes.status_off') }}</label>
                                                            @endif
                                                        </td>
                                                        <td>
                                                        <button type="button" class="btn btn-info btn-sm edit" data-toggle="modal"
                                                            data-target="#editsection{{$section->id}}"
                                                            title=""><i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm delete" data-toggle="modal"
                                                            data-deleteid="{{$section->id}}"
                                                            data-target="#deletesection"
                                                            title=""><i
                                                                class="fa fa-trash"></i>
                                                        </button>
                                                        </td>
                                                    </tr>
                                                    <!--EDIT -->
                                                    <div class="modal fade" id="editsection{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                                        {{ trans('classes.modal_title') }}
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('sections.update','id')}}" method="POST">
                                                                        @method('patch')
                                                                        @csrf
                                                                        <div class="row">
                                                                            <input type="text" value="{{$section->id}}" id="id" name="id" class="form-control">

                                                                            <div class="col">
                                                                                <label for="name_s_ar" class="mr-sm-2">{{trans('sections.section_ar')}}:</label>
                                                                                <input type="text" id="namear" name="name_s_ar" value="{{$section->getTranslation('name','ar')}}" class="form-control">
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="name_s_ar" class="mr-sm-2">{{trans('sections.section_en')}}:</label>
                                                                                <input type="text" id="nameen" name="name_s_en" value="{{$section->getTranslation('name','en')}}" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlTextarea1">{{trans('classes.select_grade')}}:</label>
                                                                            <select class="form-control form-control-lg"  name="grade_id">
                                                                                @foreach ($gradeList as $grade)
                                                                                <option value="{{$grade->id}}" {{($grade->id == $section->grade->id) ? 'selected' : "" }}>{{$grade->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlTextarea1">{{trans('sections.select_class')}}:</label>
                                                                            <select class="form-control form-control-lg"  name="class_id">
                                                                                <option value="{{$section->classgrade->id}}">{{$section->classgrade->name}}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-check">
                                                                                @if ($section->status === 1)
                                                                                    <input type="checkbox" checked class="form-check-input"name="status"  id="exampleCheck1">
                                                                                @else
                                                                                    <input type="checkbox" class="form-check-input" name="status" id="exampleCheck1">
                                                                                @endif
                                                                                <label
                                                                                    class="form-check-label"
                                                                                    for="exampleCheck1">{{ trans('sections.status') }}</label><br>
                                                                            </div>
                                                                        </div>
                                                                        <BR>
                                                                        <div class="col">
                                                                            <label for="inputName" class="control-label">{{ trans('sections.teacher_select') }}</label>
                                                                            <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                                                @foreach($section->teachers as $teacher)
                                                                                <option selected value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                                                 @endforeach
                                                                                @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                                                @endforeach

                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{trans('schoolgrade.close')}}</button>
                                                                    <button type="submit" class="btn btn-success">{{trans('schoolgrade.submit')}}</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--END EDIT -->
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
                            <select  id="grade_id" name="grade_id" class="custom-select" onchange="console.log($(this).val())">
                                <option value="" selected disabled>{{ trans('sections.select_grade') }}</option>
                                @foreach ($gradeList as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="col">
                            <label for="inputName" class="control-label">{{ trans('sections.select_class') }}</label>
                            <select  id="class_id" name="class_id" class="custom-select">

                            </select>
                        </div>
                        <br>
                        <div class="col">
                            <label for="inputName" class="control-label">{{ trans('sections.teacher_select') }}</label>
                            <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endforeach
                            </select>
                        </div>

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
    <!-- DELETE -->
    <div class="modal fade" id="deletesection" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title fs-5" id="exampleModalLabel">{{trans('schoolgrade.deletegrade')}}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
			<form action="{{route('sections.destroy','id')}}" method="post">
            @csrf
            @method('delete')
            </div>
            <div class="modal-body">
                {{trans('schoolgrade.deletemsg')}}
                <input type="hidden" id="iddelete" name="sectionID" class="form-control">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('schoolgrade.close')}}</button>
            <button type="submit" class="btn btn-success">{{trans('schoolgrade.submit')}}</button>
            </div>
			</form>
        </div>
        </div>
    </div>
    <!--END DELETE -->

</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    $(document).ready(function () {
        // <!--Push ClassName In Modal -->
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
       // <!--Edit -->
        // $(document).on('click', '.edit', function(event){
        //     event.preventDefault();
        //     var id = $(this).data('id');
        //     var idGrade = $(this).data('idgrade');
        //     var idClass = $(this).data('idclass');
        //     var idStatus = $(this).data('sid');
        //     var name_ar = $(this).data('ar');
        //     var name_en = $(this).data('en');
        //     $('#id').val(id);
        //     $('#grade_iid').val(idGrade);
        //     $('#classsid').val(idClass);
        //     $('#status_id').val(idStatus);
        //     $('#namear').val(name_ar);
        //     $('#nameen').val(name_en);
        // });
        // <!--Delete -->
        $(document).on('click', '.delete', function(event){
            event.preventDefault();
            var id = $(this).data('deleteid');
            $('#iddelete').val(id);
        });
    });
</script>
@endsection
