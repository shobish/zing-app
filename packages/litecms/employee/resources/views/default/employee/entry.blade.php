@php
$data = form_merge_form($form['fields'], $data, true)
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            @foreach($data as $key => $fields)
            <div class="app-entry-form-section mb-10 pb-20" id="{!!$key!!}">
                <div class="section-title">{!!$form['groups'][$key]!!}</div>
                <div class="row">
                    @foreach($fields as $key => $field)
                    <div class="col-{!!$field['col'] ?? '12'!!}">
                        {!! 
                        Form::input($key)
                        ->apply($field) 
                        ->mode($mode) 
                        !!}
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <div class="col-lg-4 d-none d-lg-block">
            <aside class="app-create-steps"> 
                <h5 class="steps-header">{!!__('Steps')!!}</h5>
                <div class="steps-wrap" id="steps_nav">
                @foreach($form['groups'] as $key => $value)
                <a class="step-item active" href="#{!!$key!!}"><span>{!!$loop->index+1!!}</span> {!!$value!!} </a>
                @endforeach
                </div>
            </aside>
        </div>
    </div>
</div>