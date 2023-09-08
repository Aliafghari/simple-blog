<div class="home">
    <div class="container-flued">
        <div class="d-flex align-items-center">
            {{-- <div class="row min-vh-100 align-items-center"> --}}
            <div class="col-lg-6">
                <div class="home-text">
                    <h1 class="fw-bold pb-3">{{ $home->title }}</h1>
                    <h2 class="fw-bold pb-2">{{ $home->subject }}</h2>
                    <h3 class="fw-bold pb-2">{{ $home->job }}</h3>
                    <p class="text-muted pb-2">
                        {{ $home->description }}
                    </p>
                    <a href="{{ $home->link }}" class="btn btn-danger px-5">شروع</a>
                </div>
            </div>
            <div class="col-lg-6 home-img min-vh-100 d-none d-lg-block">
                <div class="circle"></div>
                <img src="{{ asset('admin/images/home/' . $home->image) }}" width="90%" alt="">
            </div>
        </div>
    </div>
</div>
