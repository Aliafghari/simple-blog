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
                    <div class="card-header">تنظیمات مهارت ها</div>

                    <div class="card-body">

                        شما میتوانید تنظیمات مهارت هارا تغییر دهید.

                        <table id="customers" class="mt-3">
                            <tr>
                                <th>عنوان</th>
                                <th>درصد</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            @foreach ($skill as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->percentage }}</td>
                                    <td><a href="{{ route('skill.edit', ['id' => $item->id]) }}"
                                            class="btn btn-warning px-4">ویرایش</a></td>
                                    <td><a href="" onclick="destroyUser(event,{{ $item->id }})"
                                            class="btn btn-danger px-4">حذف</a>
                                        <form action="{{ route('skill.destroy',$item->id) }}" id="deleted-{{$item->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </table>

                        <a href="{{ route('skill.create') }}" class="btn btn-success px-4 mt-4">تنظیم بخش مهارت</a>
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
