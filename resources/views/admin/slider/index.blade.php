@extends('admin.layout.index')
@section('content')
    <!-- Content Header (Page header) -->

    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new">  <a href="{{url('admin/slider/add')}}" class="pull-right">  <span class="icon-32-new"></span>Thêm mới  </a></li>
            </ul>
        </div>
        <div class="pagetitle icon-48-nhomtin">
            <h1>Danh sách Slider</h1>
        </div>
        <div class="clr"></div>
    </div>
    @if(session('message'))
        <div class="alert">
            {{ session('message') }}
        </div>
    @endif
    <table class="table table-bordered table-hover dataTable">
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>

        </tr>
        <tbody>
        <?php  $i = 1;
        ?>
        @foreach ($data as $item)
            <tr>
                <td> {{ $i }} </td>
                <td> {{ $item->name }} </td>
                <td>@if($item->status == 1)
                        Đang hoạt động
                    @elseif ($item->status == -1)
                        Đã xóa
                    @endif
                </td>
                <td>
                    <a href="{{ url("admin/slider/edit/{$item->id}") }}"><img src="{{ asset('public/css/image/pencil.png') }}"> </a>
                    @if($item->status == 1)
                        <a href="{{ url("admin/slider/delete/{$item->id}") }}">| <img src="{{ asset('public/css/image/cross.png') }}"></a>
                    @endif
                </td>
            </tr>
            <?php $i++ ?>
        @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
