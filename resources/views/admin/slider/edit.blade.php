@extends('admin.layout.index')
@section('content')

    <h1 class="text-uppercase">Sửa slider</h1>
    <!-- Content Header (Page header) -->

    <form class="form-horizontal" action="admin/slider/edit/<?php  echo $getInfo->id?>" method="post">

        <div class="box-body">
            @if($errors->any())
                @foreach($errors->all() as $err)
                    {{ $err }} <br>
                @endforeach
            @endif

            @if(session('message'))
                <div class="alert">
                    {{ session('message') }}
                </div>
            @endif

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="col-md-2">Tiêu đề</label>
                <div class="col-md-10">
                    <input class="form-control title" type="text" name="name" value="{{ $getInfo->name }}"
                           placeholder="Tiêu đề"></div>
            </div>

            <div class="form-group">
                <label class="col-md-2">Ảnh </label>
                <div class="col-md-10">
                    <input type="text" size="48" readonly name="image" value="{{$getInfo->image}}" id="image"/> <span
                            onclick="openPopup()" class="btn btn-default">Chọn file</span>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Cập nhập</button>
                </div>
            </div>

        </div>
    </form>
    <!-- /.content -->
    <script>
        function openPopup() {
            CKFinder.popup({
                chooseFiles: true,
                onInit: function (finder) {
                    finder.on('files:choose', function (evt) {
                        var file = evt.data.files.first();
                        document.getElementById('image').value = file.getUrl();
                    });
                    finder.on('file:choose:resizedImage', function (evt) {
                        document.getElementById('image').value = evt.data.resizedUrl;
                    });
                }
            });
        }
    </script>
@endsection