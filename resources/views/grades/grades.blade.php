@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    {{trans('schoolgrade.title')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('schoolgrade.page_title')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{trans('dashboard.home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('schoolgrade.page_topic')}}</li>
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
                            {{trans('schoolgrade.new_grade')}}
                        </button>
                        <br><br>
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="30"
                                    style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('schoolgrade.grade_name')}}</th>
                                            <th>{{trans('schoolgrade.grade_note')}}</th>
                                            <th>{{trans('schoolgrade.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($grades as $grade)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$grade->name}}</td>
                                            <td>{{$grade->description}}</td>
                                            <td>
                                            <button type="button" class="btn btn-info btn-sm edit" data-toggle="modal"
                                                data-target="#editgrade"
                                                data-ar="{{$grade->getTranslation('name', 'ar')}}"
                                                data-id="{{$grade->id}}"
                                                data-en="{{$grade->getTranslation('name', 'en')}}"
                                                data-description="{{$grade->description}}"
                                                title="{{trans('schoolgrade.edit_grade')}}"><i class="fa fa-edit"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm delete" data-toggle="modal"
                                                data-deleteid="{{$grade->id}}"
                                                data-target="#deletegrade"
                                                title="{{trans('schoolgrade.delete_grade')}}"><i
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
        <div class="modal-dialog" role="document">
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
                    <form action="{{route('grades.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="name_ar" class="mr-sm-2">{{trans('schoolgrade.grade_ar')}}
                                    :</label>
                                <input id="name_ar" type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror">
                                @error('name_ar') <div class="form-text text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col">
                                <label for="name_en" class="mr-sm-2">{{ trans('schoolgrade.grade_en') }}
                                    :</label>
                                <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en">
                                @error('name_en') <div class="form-text text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ trans('schoolgrade.notes') }}
                                :</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="exampleFormControlTextarea1"
                                rows="3">
                            </textarea>
                            @error('description') <div class="form-text text-danger">{{ $message }}</div> @enderror
                        </div>
                        <br><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('schoolgrade.close') }}</button>
                            <button type="submit" class="btn btn-success">{{ trans('schoolgrade.submit') }}</button>
                        </div>
                    </form>
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
                        {{ trans('schoolgrade.modal_title') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('grades.update','id')}}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="name_ar" class="mr-sm-2">{{trans('schoolgrade.grade_ar')}}
                                    :</label>
                                <input type="hidden" id="id" name="id" class="form-control">
                                <input id="namear" type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror">
                                @error('name_ar') <div class="form-text text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col">
                                <label for="name_en" class="mr-sm-2">{{trans('schoolgrade.grade_en')}}
                                    :</label>
                                <input id="nameen" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en">
                                @error('name_en') <div class="form-text text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{trans('schoolgrade.notes')}}
                                :</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="decription"
                                rows="3">
                            </textarea>
                            @error('description') <div class="form-text text-danger">{{ $message }}</div> @enderror
                        </div>
                        <br><br>
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
			<form action="{{route('grades.destroy','id')}}" method="post">
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

</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    $(document).ready(function(){

        // <!--Edit -->
        $(document).on('click', '.edit', function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var name_ar = $(this).data('ar');
            var name_en = $(this).data('en');
            var description = $(this).data('description');
            $('#id').val(id);
            $('#namear').val(name_ar);
            $('#nameen').val(name_en);
            $('textarea').val(description);
        });
        // <!--Delete -->
        $(document).on('click', '.delete', function(event){
            event.preventDefault();
            var id = $(this).data('deleteid');
            $('#iddelete').val(id);

        });

    });
</script>
@endsection
