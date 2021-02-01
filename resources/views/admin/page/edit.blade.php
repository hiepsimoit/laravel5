@extends('admin.layout.index')
@section('content')

    <h1 class="text-uppercase">Sửa bài viết</h1>
    <!-- Content Header (Page header) -->

    <form class="form-horizontal" action="admin/page_detail" method="post">

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
                    <input class="form-control title" type="text" name="title" value="{{ $getInfo->title }}"
                           placeholder="Tiêu đề"></div>
            </div>

                <div class="form-group">
                    <label class="col-md-2">Nội dung</label>
                    <div class="col-md-10">
                    <textarea class="form-control" id="description"
                              name="description">{{ $getInfo->content }}</textarea>
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
        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
@endsection
