<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                    class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{ trans('parents.father_info') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                    class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{ trans('parents.mother_info') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                    class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                    disabled="disabled">3</a>
                <p>{{ trans('parents.confirm_info') }}</p>
            </div>
        </div>
    </div>
    @include('livewire.father-form')
    @include('livewire.mother-form')
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        @if ($currentStep != 3)
        <div style="display: none" class="row setup-content" id="step-3">
        @endif
            <div class="col-xs-12">
                <div class="col-md-12"><br>
                    {{-- <label style="color: red">{{trans('Parent_trans.Attachments')}}</label>
                    <div class="form-group">
                        <input type="file" wire:model="photos" accept="image/*" multiple>
                    </div>
                    <br> --}}
                    {{-- <input type="hidden" wire:model="Parent_id"> --}}
                    <h3>{{ trans('parents.save_info') }}</h3>
                    <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                            wire:click="back(2)">{{ trans('parents.back') }}
                    </button>
                    <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="SaveParent"
                            type="button">{{ trans('parents.confirm_info') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>