@include('employee::public.employe.partial.header')
<section class="listing-page-wrap">
    <div class="container">
        <div class="row">
            @include('employee::public.employe.partial.aside')

            <div class="col-12 col-lg-9 left-sidebar" id="listing_data">
                @forelse($employes as $employe)
                @php 
                $employe = $employe->toArray([]);
                @endphp
                <div class="listing-single-item d-flex align-items-center flex-wrap">
                    <div class="col-12 col-lg-5 p-0 listing-image">
                        <a href="{{trans_url('employee')}}/{{$employee['slug']}}">
                        <img src="{{url($employee['image']['main'])}}" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="col-12 col-lg-6 p-0 listing-text">
                        <div class="listing-content">
                            <h3><a href="{{trans_url('employee')}}/{{$employee['slug']}}">{{$employee['title']}}</a></h3>
                            <div class="listing-metas">
                                <span>By <a
                                        href="{{trans_url('employee')}}/{{$employee['slug']}}">User</a></span>
                                <span><a
                                        href="{{trans_url('employee')}}/{{$employee['slug']}}">Category</a></span>
                            </div>
                            <p>{{ Str::limit($employee['description'], 300 )}}</p>
                        </div>
                        <a href="{{trans_url('employee')}}/{{$employee['slug']}}" class="btn btn-theme">Continue Reading</a>
                    </div>
                </div>
                <nav class="pagination-wrap mb-50" aria-label="Page navigation example">
                    <ul class="pagination">
                        @php 
                        $meta = $employe['meta'];
                        @endphp
                        {!!view('paginator', compact('meta'))!!}
                    </ul>
                </nav>
                @empty
                @endif
            </div>
        </div>
    </div>
</section>
