@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">بازگشت</div>

                    <div class="card-body">
                        <ul>
                            <li><a href="{{ route('skill.index') }}">نمایش مهارت ها</a></li>
                            <li><a href="{{ route('home') }}">داشبورد</a></li>
                        </ul>
                    </div>

                </div>

                @foreach (['title', 'percentage'] as $field)
                    @error($field)
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                @endforeach

            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">افزودن مقادیر جدید </div>
                    <div class="card-body">
                        <form action="{{ route('skill.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="">عنوان مهارت</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">درصد</label>
                                <input type="number" class="form-control" name="percentage">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-success px-4">ذخیره</button>
                            </div>
                        </form>
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
            document.querySelector('#deleted-' + id).submit();
        }
    </script>
@endsection
