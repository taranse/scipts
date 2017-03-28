@extends('master')
@section('title', 'Записная книжка')
@section('header1', 'Записная книжка')
@section('form')
    <div class="container">
        <h3>Добавить в записную книжку</h3>
        @if(!empty($err))
            <div class="row">
                <div class="col-xs-12">
                    <p class="text-danger">{{$err}}</p>
                </div>
            </div>
        @endif
        <form action="{{url('phone-methods/add')}}" method="post" role="form">

            <div class="row">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group col-xs-3">
                    <label for="nameForm"> Имя:</label><br>
                    <input class="form-control" id="nameForm" type="text" name="name" pattern="[Aa-Zz-Аа-Яя]{2,25}"
                           required>
                </div>
                <div class="form-group col-xs-3">
                    <label for="phoneForm"> Телефон:</label><br>
                    <input class="form-control" id="phoneForm" type="text" name="phone" pattern="[0-9]{6,12}" required>
                </div>
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-default">Добавить</button>
                </div>

            </div>
        </form>
    </div>
@endsection
@section('phone-book')
    <div class="row">
        <div class="col-xs-6">
            <table class="table table-striped">
                <thead>
                <tr class="danger">
                    <th>#</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($phoneBook as $phone)
                    <tr>
                        <td>{{$phone->id}}</td>
                        <td>
                            <div class="hidden hidden-table-name-{{$phone->id}}">
                                <input type="text" name="phone" class="input-table-name-{{$phone->id}}"
                                       pattern="[Aa-Zz-Аа-Яя]{2,25}" value="{{$phone->name}}">
                            </div>
                            <div class="visible-table-name-{{$phone->id}}">
                                {{$phone->name}}
                            </div>
                        </td>
                        <td>
                            <div class="hidden hidden-table-phone-{{$phone->id}}">
                                <input type="text" name="phone" class="input-table-phone-{{$phone->id}}"
                                       pattern="[0-9]{6,12}" value="{{$phone->phone}}">
                            </div>
                            <div class="visible-table-phone-{{$phone->id}}">
                                {{$phone->phone}}
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-danger delete-button" data-id="{{$phone->id}}">Удалить</button>
                        </td>
                        <td>
                            <button class="btn btn-success update-button" data-id="{{$phone->id}}">Редактировать
                            </button>
                            <button class="hidden btn btn-success update-button-success" data-id="{{$phone->id}}">Сохранить
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(function () {
            var inputs = ['phone', 'name'];
            $('.delete-button').click(function () {
                var id     = $(this).attr('data-id');
                var _token = '{{ csrf_token() }}';
                $.ajax({
                    url: '/phone-methods/delete',
                    type: 'delete',
                    data: {id: id, _token: _token},
                    success: function () {
                        location.reload();
                    }
                });
            });
            $('.update-button').click(function () {
                $(this).addClass('hidden');
                $(this.nextElementSibling).removeClass('hidden');
                var id = $(this).attr('data-id');
                inputs.forEach(function (inputName) {
                    $('.hidden-table-' + inputName + '-' + id).removeClass('hidden');
                    $('.visible-table-' + inputName + '-' + id).addClass('hidden');
                })
            });
            $('.update-button-success').click(function () {
                $(this).addClass('hidden');
                $(this.previousElementSibling).removeClass('hidden');
                var id = $(this).attr('data-id');
                var _token = '{{ csrf_token() }}';
                $.ajax({
                    url: '/phone-methods/update',
                    type: 'put',
                    data: {
                        id: id,
                        _token: _token,
                        name: $('.hidden-table-name-' + id + ' input').val(),
                        phone: $('.hidden-table-phone-' + id + ' input').val()
                    },
                    success: function () {
                        location.reload();
                    }
                });
                inputs.forEach(function (inputName) {
                    $('.hidden-table-' + inputName + '-' + id).addClass('hidden');
                    $('.visible-table-' + inputName + '-' + id).removeClass('hidden');
                });
            })
        })
    </script>
@endsection