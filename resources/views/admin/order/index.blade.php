@extends('admin.layout.index')
@section('content')
    <!-- Content Header (Page header) -->

    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new">  <a href="{{url('admin/order/add')}}" class="pull-right">  <span class="icon-32-new"></span>Thêm mới  </a></li>
            </ul>
        </div>
        <div class="pagetitle icon-48-nhomtin">
            <h1>Đơn hàng</h1>
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
            <th>Danh mục</th>
            <th>Danh mục con</th>
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
                <td>
                    <?php $type =''; if($item->type==1){
                        $type = 'Nhận sự công ty';
                    }else if($item->type ==2){
                        $type = 'Nhân sự đi Nhật';
                    }
                    echo $type;
                    ?>
                </td>
                <td>
                    <?php
                    switch ($item->sub_type){
                        case 1:$sub_type ='Đơn hàng cho Nam';break;
                        case 2:$sub_type ='Đơn hàng cho nữ';break;
                        case 3:$sub_type ='Đơn hàng cho Nam - nữ';break;
                        default:$sub_type='';break;
                    }
                    echo $sub_type;
                    ?>
                </td>
                <td>@if($item->status == 1)
                        Đang hoạt động
                    @elseif ($item->status == -1)
                        Đã xóa
                    @endif
                </td>
                <td>
                    <a href="{{ url("admin/order/edit/{$item->id}") }}"><img src="{{ asset('public/css/image/pencil.png') }}"> </a>
                    @if($item->status == 1)
                        <a href="{{ url("admin/order/delete/{$item->id}") }}">| <img src="{{ asset('public/css/image/cross.png') }}"></a>
                    @endif
                </td>

            </tr>
            <?php $i++ ?>
        @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
