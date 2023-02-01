@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('classes.title')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('classes.page_title')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{trans('dashboard.home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('classes.page_topic')}}</li>
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
                <div class="row">
                    <div class="col-xl-12 mb-30">
                        <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                            {{trans('classes.add_class')}}
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChecked" id="btnDeleteChecked" >
                            {{trans('classes.btn_delete_checked')}}
                        </button>
                        <form action="{{route('class.filter')}}" method="POST">
                            @csrf
                            @method('get')
                            <select class="form-select" data-style="btn-info" name="grade_id" required
                                    onchange="this.form.submit()">
                                <option value="" selected disabled>{{trans('classes.grade_select')}}</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                        </form>
                        <br><br>
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="30"
                                    style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box', this)" /></th>
                                            <th>#</th>
                                            <th>{{trans('classes.class_name')}}</th>
                                            <th>{{trans('classes.grade_name')}}</th>
                                            <th>{{trans('classes.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($details))
                                            @php
                                                $showClasses=$details;
                                            @endphp
                                            @else
                                            @php
                                                $showClasses=$classes;
                                            @endphp
                                        @endif
                                    @foreach ($showClasses as $class )
                                        <tr>
                                            <td><input name="select_one" type="checkbox"  value="{{$class->id}}" class="box" ></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$class->name}}</td>
                                            <td>{{$class->grade->name}}</td>
                                            <td>
                                            <button type="button" class="btn btn-info btn-sm edit" data-toggle="modal"
                                                data-target="#editgrade"
                                                data-ar="{{$class->getTranslation('name', 'ar')}}"
                                                data-id="{{$class->id}}"
                                                data-idgrade="{{$class->grade->id}}"
                                                data-en="{{$class->getTranslation('name', 'en')}}"
                                                title=""><i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm delete" data-toggle="modal"
                                                data-deleteid="{{$class->id}}"
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
    </div>

    <!-- ADD -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('schoolgrade.modal_title') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row mb-30" action="{{route('classes.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="data_list">
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="col">
                                                <label for="name_ar" class="mr-sm-2">{{trans('classes.class_ar')}}
                                                    :</label>
                                                <input id="name_ar" type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror">
                                                @error('name_ar') <div class="form-text text-danger">{{ $message }}</div> @enderror
                                            </div>
                                            <div class="col">
                                                <label for="name_en" class="mr-sm-2">{{trans('classes.class_en')}}
                                                    :</label>
                                                <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en">
                                                @error('name_en') <div class="form-text text-danger">{{ $message }}</div> @enderror
                                            </div>
                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{trans('classes.grade_name')}}:</label>
                                                <div class="box">
                                                    <select class="fancyselect" name="grade_id">
                                                        @foreach ($grades as $grade)
                                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="name_ar" class="mr-sm-2">{{trans('classes.actions')}}
                                                    :</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                    type="button" value="{{trans('classes.delete_row')}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row mt-20">
                                        <div class="col-12">
                                            <input class="button" data-repeater-create type="button" value="{{ trans('classes.new_row') }}"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{trans('schoolgrade.close')}}</button>
                                        <button type="submit" class="btn btn-success">{{trans('schoolgrade.submit')}}</button>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--END ADD -->

    <!--EDIT -->
    <div class="modal fade" id="editgrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{route('classes.update','id')}}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="name_ar" class="mr-sm-2">{{trans('classes.class_ar')}}
                                    :</label>
                                <input type="hidden" id="id" name="id" class="form-control">
                                <input id="namear" type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror">
                                @error('name_ar') <div class="form-text text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col">
                                <label for="name_en" class="mr-sm-2">{{trans('classes.class_en')}}
                                    :</label>
                                <input id="nameen" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en">
                                @error('name_en') <div class="form-text text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{trans('classes.select_grade')}}
                                :</label>
                            <select class="form-control form-control-lg"
                                    id="grade_id" name="grade_id">
                                    {{-- <option value="{{$class->grade->id}}">
                                        {{$class->grade->name}}
                                    </option> --}}
                                @foreach ($grades as $grade)
                                    <option value="{{$grade->id}}">
                                        {{$grade->name}}
                                    </option>
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

    <!-- DELETE -->
    <div class="modal fade" id="deletegrade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title fs-5" id="exampleModalLabel">{{trans('schoolgrade.deletegrade')}}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
			<form action="{{route('classes.destroy','id')}}" method="post">
            @csrf
            @method('delete')
            </div>
            <div class="modal-body">
                {{trans('schoolgrade.deletemsg')}}
                <input type="hidden" id="iddelete" name="id" class="form-control">
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

    <!--DELETE CHECKED-->
    <div class="modal fade" id="deleteChecked" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{trans('classes.modaltitle_delete_checked')}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('delete.all')}}" method="POST">
                @csrf
                @method('post')
                <div class="modal-body">
                    {{ trans('classes.modalbody_delete_checked') }}
                    <input class="text" type="hidden" id="deleteCheckedID" name="CheckedID" value="">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('schoolgrade.close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('schoolgrade.submit') }}</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <!--END DELETE CHECKED-->
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script type="text/javascript">
    $(document).ready(function(){
        // <!--Edit -->
        $(document).on('click', '.edit', function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var idGrade = $(this).data('idgrade');
            var name_ar = $(this).data('ar');
            var name_en = $(this).data('en');
            $('#id').val(id);
            $('#grade_id').val(idGrade);
            $('#namear').val(name_ar);
            $('#nameen').val(name_en);
        });
        // <!--Delete -->
        $(document).on('click', '.delete', function(event){
            event.preventDefault();
            var id = $(this).data('deleteid');
            $('#iddelete').val(id);
        });
         // <!--CHECKEDBOX-->
        $(document).on('click','#btnDeleteChecked',function(event) {
            event.preventDefault();
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });
            if (selected.length > 0) {
                $('#deleteChecked').modal('show');
                $('input[id="deleteCheckedID"]').val(selected);
            }
        });
         // <!--SHOWBTN-->
        var $delete = $("#btnDeleteChecked").hide(),
            $checked = $('input[name="select_all"]').click(function() {
            $delete.toggle( $checked.is(":checked") );
        });
        var $delete = $("#btnDeleteChecked").hide(),
            $checked = $('input[name="select_one"]').click(function() {
            $delete.toggle( $checked.is(":checked") );
        });
    });
</script>
@endsection
