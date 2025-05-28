@if(session('success'))
    <div class="alert alert-success alert-dismissable fade show text-center">
        <button class="close" data-dismiss="alert" aria-label="Kapat">×</button>
        {{session('success')}}
    </div>
@endif


@if(session('error'))
    <div class="alert alert-danger alert-dismissable fade show text-center">
        <button class="close" data-dismiss="alert" aria-label="Kapat">×</button>
        {{session('error')}}
    </div>
@endif