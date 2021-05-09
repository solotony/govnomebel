<!-- field_type_name -->
@include('crud::fields.inc.wrapper_start')
<label>{!! $field['label'] !!}</label>
@php
    $activity = collect();
    if(isset($entry)){
        $activity = Spatie\Activitylog\Models\Activity::inLog(class_basename($crud->getModel()))->where('subject_id', $entry->id)->get();
    }
@endphp
@if($activity->count()>0)
    <table cellpadding="4" cellspacing="4" border="1" width="100%">
        <tr>
            <th>Действие</th>
            <th>Дата/Время</th>
            <th>User Id</th>
            <th>Инфо</th>
        </tr>

        @foreach ($activity as $item)
            <tr>
                <th>{{$item->description}}</th>
                <td>{{$item->created_at}}</td>
                <td align="center">{{$item->causer_id}}</td>
                <td>{!! str_replace(['"old"','attributes'], ['<br>"old"',',<br>attributes'],unicode_escape_decode($item->changes))  !!}</td>
            </tr>
        @endforeach

    </table>
@else
    <br><p>История пока пуста</p>
@endif

{{-- HINT --}}
@if (isset($field['hint']))
    <p class="help-block">{!! $field['hint'] !!}</p>
@endif
@include('crud::fields.inc.wrapper_end')

@if ($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp

    {{-- FIELD EXTRA CSS  --}}
    {{-- push things in the after_styles section --}}
    @push('crud_fields_styles')
        <!-- no styles -->
    @endpush

    {{-- FIELD EXTRA JS --}}
    {{-- push things in the after_scripts section --}}
    @push('crud_fields_scripts')
        <!-- no scripts -->
    @endpush
@endif
