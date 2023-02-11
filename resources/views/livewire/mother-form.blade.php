<div>
    @if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parents.mother_ar_name')}}</label>
                        <input type="text" wire:model="mother_name_ar" class="form-control">
                        @error('mother_name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parents.mother_en_name')}}</label>
                        <input type="text" wire:model="mother_name_en" class="form-control">
                        @error('mother_name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">{{trans('parents.mother_ar_job')}}</label>
                        <input type="text" wire:model="mother_job_ar" class="form-control">
                        @error('mother_job_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">{{trans('parents.mother_en_job')}}</label>
                        <input type="text" wire:model="mother_job_en" class="form-control">
                        @error('mother_job_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('parents.mother_nationalid')}}</label>
                        <input type="text" wire:model="mother_nationaid" class="form-control">
                        @error('mother_nationaid')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parents.mother_passportid')}}</label>
                        <input type="text" wire:model="mother_passportid" class="form-control">
                        @error('mother_passportid')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('parents.mother_phone')}}</label>
                        <input type="text" wire:model="mother_phone" class="form-control">
                        @error('mother_phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">{{trans('parents.mother_nationality')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mothernationality_id">
                            <option selected>{{trans('parents.select_nationality')}}...</option>
                            @foreach($nationalities as $nationality)
                                <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                            @endforeach
                        </select>
                        @error('mothernationality_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">{{trans('parents.mother_bloodtype')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="motherbloodtype_id">
                            <option selected>{{trans('parents.select_blood')}}...</option>
                            @foreach($bloods as $blood)
                                <option value="{{$blood->id}}">{{$blood->name}}</option>
                            @endforeach
                        </select>
                        @error('motherbloodtype_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">{{trans('parents.mother_religion')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="motherreligion_id">
                            <option selected>{{trans('parents.select_religion')}}...</option>
                            @foreach($religions as $religion)
                                <option value="{{$religion->id}}">{{$religion->name}}</option>
                            @endforeach
                        </select>
                        @error('motherreligion_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{trans('parents.mother_address')}}</label>
                    <textarea class="form-control" wire:model="mother_address" id="exampleFormControlTextarea1"
                            rows="4"></textarea>
                    @error('mother_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
                    {{trans('parents.back')}}
                </button>
                @if($updateForm)
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondStepSubmitEdit"
                            type="button">{{trans('parents.next')}}
                </button>
                @else
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondStepSubmit"
                            type="button">{{trans('parents.next')}}
                </button>
                @endif
            </div>
        </div>
    </div>

</div>
