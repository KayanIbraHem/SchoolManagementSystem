<div>
    @if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parents.parent_email')}}</label>
                        <input type="email" wire:model="email"  class="form-control">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parents.parent_password')}}</label>
                        <input type="text" wire:model="password" class="form-control" >
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parents.father_ar_name')}}</label>
                        <input type="text" wire:model="father_name_ar" class="form-control" >
                        @error('father_name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parents.father_en_name')}}</label>
                        <input type="text" wire:model="father_name_en" class="form-control" >
                        @error('father_name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">{{trans('parents.father_ar_job')}}</label>
                        <input type="text" wire:model="father_job_ar" class="form-control">
                        @error('father_job_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">{{trans('parents.father_en_job')}}</label>
                        <input type="text" wire:model="father_job_en" class="form-control">
                        @error('father_job_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parents.father_nationalid')}}</label>
                        <input type="text" wire:model="father_nationaid" class="form-control">
                        @error('father_nationaid')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parents.father_passportid')}}</label>
                        <input type="text" wire:model="father_passportid" class="form-control">
                        @error('father_passportid')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parents.father_phone')}}</label>
                        <input type="text" wire:model="father_phone" class="form-control">
                        @error('father_phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">{{trans('parents.father_nationality')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="fathernationality_id">
                            <option selected>{{trans('parents.select_nationality')}}...</option>
                            @foreach($nationalities as $nationality)
                                <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                            @endforeach
                        </select>
                        @error('fathernationality_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">{{trans('parents.father_bloodtype')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="fatherbloodtype_id">
                            <option selected>{{trans('parents.select_blood')}}...</option>
                            @foreach($bloods as $blood)
                                <option value="{{$blood->id}}">{{$blood->name}}</option>
                            @endforeach
                        </select>
                        @error('fatherbloodtype_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">{{trans('parents.father_religion')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="fatherreligion_id">
                            <option selected>{{trans('parents.select_religion')}}...</option>
                            @foreach($religions as $religion)
                                <option value="{{$religion->id}}">{{$religion->name}}</option>
                            @endforeach
                        </select>
                        @error('fatherreligion_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{trans('parents.father_address')}}</label>
                    <textarea class="form-control" wire:model="father_address" id="exampleFormControlTextarea1" rows="4"></textarea>
                    @error('father_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                @if($updateForm)
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmitEdit"
                            type="button">{{trans('parents.next')}}
                </button>
                @else
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                            type="button">{{trans('parents.next')}}
                </button>
                @endif
            </div>
        </div>
    </div>
</div>
