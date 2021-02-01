@extends('admin.layout.index')
@section('content')

    <h1 class="text-uppercase">Sửa đơn hàng</h1>
    <!-- Content Header (Page header) -->

    <form class="form-horizontal" action="admin/order/edit/<?php  echo $getInfo->id?>" method="post">

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
                <label class="col-md-2">Tiêu đề tiếng Nhật</label>
                <div class="col-md-10">
                    <input class="form-control title" type="text" name="name_jp" value="{{ $getInfo->name_jp }}"
                           placeholder="Tiêu đề"></div>
            </div>
            <div class="form-group">
                <label class="col-md-2">Url</label>
                <div class="col-md-10">
                    <input class="form-control slug" type="text" name="url" value="{{ $getInfo->url }}"
                           placeholder=""></div>
            </div>

            <div class="form-group">
                <label class="col-md-2">Ảnh đại điện</label>
                <div class="col-md-10">
                    <input type="text" size="48" readonly name="image" value="{{$getInfo->image}}" id="image"/> <span
                            onclick="openPopup()" class="btn btn-default">Chọn file</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2">Nội dung</label>
                <div class="col-md-10">
                    <textarea class="form-control" id="description"
                              name="description">{{$getInfo->description }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2">Mô tả ngắn</label>
                <div class="col-md-10">
                    <textarea class="form-control" id="short_description"
                              name="short_description">{{$getInfo->short_description }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2">Nội dung tiếng Nhật</label>
                <div class="col-md-10">
                    <textarea class="form-control" id="description_jp"
                              name="description_jp">{{$getInfo->description_jp }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2">Mô tả ngắn tiếng Nhật</label>
                <div class="col-md-10">
                    <textarea class="form-control" id="short_description_jp"
                              name="short_description_jp">{{$getInfo->short_description_jp }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2">Phân loại</label>
                <div class="col-md-2">
                    <select class="form-control" name="type">
                        <option value="1" <?php if ($getInfo->type == 1) {
                            echo 'selected';
                        } ?>>NHân sự công ty
                        </option>
                        <option value="2" <?php if ($getInfo->type == 2) {
                            echo 'selected';
                        } ?>>Nhân sự đi Nhật
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2">Phân loại con</label>
                <div class="col-md-2">
                    <select class="form-control" name="sub_type">
                        <option>Chọn</option>
                        <option value="1" <?php if ($getInfo->sub_type == 1) {
                            echo 'selected';
                        } ?>>Đơn hàng cho nam
                        </option>
                        <option value="2" <?php if ($getInfo->sub_type == 2) {
                            echo 'selected';
                        } ?>>Đơn hàng cho nữ
                        </option>
                        <option value="3" <?php if ($getInfo->sub_type == 3) {
                            echo 'selected';
                        } ?>>Đơn hàng nam - nữ
                        </option>
                    </select>
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
        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('description_jp', {
            filebrowserBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });

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


        $(document).ready(function () {
            $('.title').keyup(function () {
                var str = $(this).val();
                $('.slug').val(get_alias(str));
            });

            function get_alias(str) {
                str = str.toLowerCase();
                str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
                str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
                str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
                str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
                str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
                str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
                str = str.replace(/đ/g, "d");
                str = str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g, "-");
                str = str.replace(/-+-/g, "-"); //thay thế 2- thành 1-
                return str;
            }
        });
    </script>

@endsection
