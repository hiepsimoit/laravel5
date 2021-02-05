@extends('admin.layout.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Username</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            <?php  $i = 1; ?>
            @foreach ($data as $list)
                <tr>
                    <td> {{ $i }} </td>
                    <td> {{ $list->username }} </td>
                    <td>
                        <a href="{{ route('admin_user.edit',$list->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('admin_user.destroy',$list->id)}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="delete">
                            <button class="btn btn-sm btn-danger rounded-0">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php $i++ ?>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>

         $('#example1').DataTable()
    </script>
    <!-- /.content -->
@endsection
