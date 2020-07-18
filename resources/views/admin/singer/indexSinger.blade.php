@extends('layouts.home_admin')

@section('title', 'Ca sĩ')

@section('sidebar')
@parent
<p>Ca sĩ.</p>
@endsection

@section('content')
<div class="col-12">

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Tên ca sĩ</th>
                <th>Ghi chú</th>
                <th>Sử dụng</th>
                <th>Ngày tạo</th>
                <th>Người tạo</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($singers as $value)
            <tr>
                <td>{{$value->singername}}</td>
                <td>{{$value->note}}</td>
                <td>{{$value->ActiveText}}</td>
                <td>{{$value->created_at}}</td>
                <td>{{$value->nguoitao->name}}</td>
                <td>
                    <a href="{{route('singer.edit',$value->id)}}" class="btn btn-warning" role="button">Edit</a>
                </td>
                <td>
                    <form action="{{route('singer.destroy',$value->id)}}" method="post">
                        {!! method_field('delete') !!}
                        {!! csrf_field() !!}
                        <button onclick="return confirm('Are you sure you want to delete this item?');" type="submit"
                            class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('singer.create')}}" class="btn btn-primary" role="button">Thêm mới ca sĩ</a>
</div>


<script type="text/javascript">
$(document).ready(function() {

    
    $('#example thead tr').clone(true).appendTo('#example thead');
    $('#example thead tr:eq(1) th').each(function(i) {
        var title = $(this).text();
        var myarray=["Edit","Delete"]
        if(jQuery.inArray(title, myarray) == -1){
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table.column(i).search(this.value).draw();
                }
            });
        }else{
            $(this).html('');
        }
    });

    var table = $('#example').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        "responsive": true,
        "lengthChange": false,
        "sDom": 'lrtip',
        "pageLength": 5,
        "bInfo": false,
        "order": [],
    });
});
</script>
@endsection