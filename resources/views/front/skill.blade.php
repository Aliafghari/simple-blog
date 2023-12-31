    <section>
        <div class="skill py-5">
            <div class="skill-title text-center py-4">
                <h2 class="fw-bold">مهارت ها</h2>
                <p>
                    در این قسمت میتوانید مهارت های من را مشاهده کنید.
                </p>
            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="skill-text">
                            <h4 class="fs-4 fw-bold pb-3">{{ $about->title }}</h4>
                            <p class="text-muted">
                                {{ $about->description }}
                            </p>
                            <a href="{{ $about->link }}" class="btn btn-danger px-4">با من حرف بزن ...</a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        @foreach ($skill as $item)
                            <div class="progress mt-4">
                                <div class="progress-bar" role="progressbar" style="width: {{ $item->percentage }}%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    {{ $item->percentage }}% &nbsp &nbsp{{ $item->title }}
                                </div>
                            </div>
                        @endforeach

                        {{-- <div class="progress mt-4 ">
                            <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">
                                65% laravel
                            </div>
                        </div>
                        <div class="progress mt-4">
                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">
                                75% Html&css
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
