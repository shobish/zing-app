@forelse($data as $key => $value)
@php
$value = Arr::only($value, ['id', 'slug'])+form_merge_list($form['list'], $value);
@endphp

<div class="card mb-3">
    <div class="card-body media">
        <div class="media-img-box align-self-start position-relative mr-4">
            <a href="{!!guard_url('employee/employe')!!}/{!!@$value['id']!!}">
                {!! Form::list(($value['image'])!!}
            </a>
        </div>

        <div class="media-body">
            <div class="row mb-1 flex-column flex-lg-row">
                <div class="col">
                    <h6 class="m-0"><a href="{!!guard_url('employee/employe')!!}/{!!@$value['id']!!}">
                        {!! Form::list(($value['title'])!!}
                    </a></h6>
                </div>
                <div class="col-auto">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <a href="{!!guard_url('employee/employe')!!}/{!!@$value['id']!!}">
                        {!! Form::list(($value['details'])!!}
                    </a>
                </div>
            </div>
            <div class="row flex-column flex-lg-row">
                <div class="col d-lg-flex">
                </div>
                <div class="col-auto d-lg-flex">
                    {!! Form::list(($value['status'])!!}
                </div>
            </div>
        </div>
    </div>
</div>

@empty
<div class="mb-2 false card">
    <div class="no-gutters h-100 sh-lg-9 position-relative row">
        <div class="positio-relative col-auto">

        </div>
        <div class="py-4 py-lg-0 ps-5 pe-4 h-100 col">
            <div class="no-gutters h-100 align-content-center row">
                No employe found.
            </div>
        </div>
    </div>
</div>
@endif

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".delete").click(function() {
    var id = $(this).attr('id');
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this data!",
        type: "warning",
        icon: "warning",
        buttons: {
            confirm: 'OK',
            cancel: 'Cancel'
        },
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false,
    }).then((willDelete) => {
        if (willDelete) {
            var id = $(this).attr('id');
            $.ajax({
                url: "{{guard_url('employee/employe')}}" + '/' + id,
                type: "DELETE",
                data: {
                    media: id,
                },
                success: function() {
                    location.reload();

                },
                error: function() {
                    swal({
                        title: 'Opps...',
                        text: data.message,
                        type: 'error',
                        timer: '1500'
                    })
                }
            })
        } else {
            return;
        }
    });

});
</script>
