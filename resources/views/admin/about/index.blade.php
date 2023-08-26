@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">بازگشت</div>

                    <div class="card-body">
                        <ul>
                            <li><a href="{{ route('home') }}">داشبورد</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">تنظیمات خانه</div>

                    <div class="card-body">

                        شما میتوانید تنظیمات خانه را تغییر دهید.

                        <table id="customers" class="mt-3">
                            <tr>
                                <th>عنوان</th>
                                <th>درباره</th>
                                <th>شغل</th>
                                <th>توضیح</th>
                                <th>لینک</th>
                                <th>عکس</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            {{-- @foreach ($home as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{{ $item->job }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->link }}</td>
                                    <td><img src="{{ asset('admin/images/home/' . $item->image) }}" width="100px"
                                            alt=""></td>
                                    <td><a href="{{ route('home.edit', ['id' => $item->id]) }}"
                                            class="btn btn-warning px-4">ویرایش</a></td>
                                    <td><a href="" onclick="destroyUser(event,{{ $item->id }})"
                                            class="btn btn-danger px-4">حذف</a>


                                        <form action="{{ route('home.destroy',$item->id) }}" id="deleted-{{$item->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>

                                </tr>
                            @endforeach --}}
                        </table>

                        <a href="{{ route('home.create') }}" class="btn btn-success px-4 mt-4">تنظیم بخش خانه</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        function destroyUser(event, id) {
            event.preventDefault();
            //console.log(id);
            document.querySelector('#deleted-'+id).submit();
        }
    </script>
@endsection
