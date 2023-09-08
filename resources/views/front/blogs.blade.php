<section class="blog-detail py-5">
    <div class="blogs-title text-center py-5">
        <h2 class="fw-bold">بلاگ های من</h2>
        <p>
            در این قسمت میتوانید به بلاگ های من دسترسی داشته باشید.
        </p>
    </div>

    <div class="container">
        <div class="row py-3">
            @foreach ($blog as $item)
            {{-- @dd($item) --}}
                <div class="col-lg-4">
                    <div class="blog-item shadow">
                        <img src="{{ asset('admin/images/blog/' . $item->image) }}" class="w-100" alt="" />
                        <div class="blog-text p-2">
                            <h4 class="p-2 fw-bold fs-5 border-bottom">
                                {{ $item->title }}
                            </h4>
                            <p class="text-muted">
                                {{ $item->description }}
                            </p>
                            <a href="" class="btn btn-danger w-100">بخوانید</a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="col-lg-4">
                <div class="blog-item shadow">
                    <img src="{{ asset('front\picture\blog1.jpg') }}" class="w-100" alt="" />
                    <div class="blog-text p-2">
                        <h4 class="p-2 fw-bold fs-5 border-bottom">
                            بلاگ 2
                        </h4>
                        <p class="text-muted">
                            Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Obcaecati, alias?
                        </p>
                        <a href="" class="btn btn-danger w-100">بخوانید</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog-item shadow">
                    <img src="{{ asset('front\picture\blog1.jpg') }}" class="w-100" alt="" />
                    <div class="blog-text p-2">
                        <h4 class="p-2 fw-bold fs-5 border-bottom">
                            بلاگ 3
                        </h4>
                        <p class="text-muted">
                            Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Obcaecati, alias?
                        </p>
                        <a href="" class="btn btn-danger w-100">بخوانید</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
