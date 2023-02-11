<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showFormNewParent" type="button">{{ trans('parents.new_parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('parents.parent_email') }}</th>
            <th>{{ trans('parents.father_ar_name') }}</th>
            <th>{{ trans('parents.father_nationalid') }}</th>
            <th>{{ trans('parents.father_passportid') }}</th>
            <th>{{ trans('parents.father_phone') }}</th>
            <th>{{ trans('parents.father_ar_job') }}</th>
            <th>{{ trans('parents.action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($parents as $parent)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $parent->email }}</td>
                <td>{{ $parent->father_name }}</td>
                <td>{{ $parent->father_nationaid }}</td>
                <td>{{ $parent->father_passportid }}</td>
                <td>{{ $parent->father_phone }}</td>
                <td>{{ $parent->father_job}}</td>
                <td>
                    <button wire:click="edit({{$parent->id}})" title="{{ trans('parents.edit') }}"
                        class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $parent->id }})" title="{{ trans('parents.delete') }}">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
