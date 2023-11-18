    {!!Form::vertical_open()
    ->method('PUT')
    ->id('form-edit')
    ->enctype('multipart/form-data')
    ->action(guard_url('employee/employe/'. $data['id']))!!}
    <div class="page-title-container mb-15">
        <div class="row w-100 no-gutters">
            <div class="col-auto mb-3 mb-lg-0 mr-auto col">
                <h1 class="m-0 pb-0">{!!__('Edit')!!} {!!$data['title']!!}</h1>
            </div>
            <div class="d-flex align-items-end justify-content-md-end mb-2 mb-sm-0 order-sm-3 col-sm-auto col-12">
                <a href="{{guard_url('employee/employe')}}" class="btn btn-default mr-10"><i class="las la-arrow-left mr-5"></i>
                    <span>{{__('Back')}}</span></a>
                <button type="submit" class="btn btn-theme"><i class="las la-save mr-5"></i> <span>{{__('Update')}}</span></button>
            </div>
        </div>
    </div>
    @include('notifications')
    @include('employee::employe.entry', ['mode' => 'edit'])
    {!! Form::close() !!}