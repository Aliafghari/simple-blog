@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">بازگشت</div>

                    <div class="card-body">
                        <ul>
                            <li><a href="{{ route('home.index') }}">تنظیمات خانه</a></li>
                        </ul>
                    </div>
                </div>

                @foreach (['title', 'description', 'link'] as $field)
                    @error($field)
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                @endforeach


            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">افزودن مقادیر جدید </div>

                    <div class="card-body">
                        {{-- برای ارسال عکس در فرم :
                        enctype="multipart/form-data" --}}
                        <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mt-3">
                                <label for="">عنوان</label>
                                <input type="text" value="{{ $about->title }}" class="form-control" name="title">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">توضیحات</label>
                                <textarea type="text" value="{{ $about->description }}" class="form-control" name="description">{{ $about->description }}</textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">لینک</label>
                                <input type="text" value="{{ $about->link }}" class="form-control" name="link">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-success px-4">ذخیره</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
