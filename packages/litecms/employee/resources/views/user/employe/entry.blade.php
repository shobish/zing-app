@php
$data = form_merge_form($form['fields'], compact('data', 'meta'), true)
@endphp
<div class="entry-form-wrap">
    @foreach($data['form'] as $key => $fields)
    <div class="mb-30 card" id="{!!$key!!}">
        <div class="card-body">
            <div class="mb-20 d-flex justify-content-between">
                <h2 class="small-title text-theme">{!!$form['groups'][$key]!!}</h2>
            </div>
            <div class="row">
                @foreach($fields as $key => $field)
                <div class="col-md-{!!$field['col'] ?? '12'!!}">
                    {!! Form::input($key)
                    ->apply($field)
                    ->mode($mode) !!}
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>