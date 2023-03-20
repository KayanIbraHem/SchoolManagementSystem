<div class="modal fade" id="delete_fee{{$fee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('fees.delete_title')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('fees.destroy','id')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$fee->id}}">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('fees.confirm_delete') }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('fees.close')}}</button>
                        <button  class="btn btn-danger">{{trans('fees.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
