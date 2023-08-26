@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">تنظیمات اصلی سایت</div>

                    <div class="card-body">
                        <ul>
                            <li><a href="">تنظیمات بخش خانه</a></li>
                            <li><a href="">تنظیمات بخش مهارت ها</a></li>
                            <li><a href="">تنظیمات بخش بلاگ ها</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">داشبورد</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
