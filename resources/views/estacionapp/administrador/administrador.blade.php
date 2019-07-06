@extends('layouts.admin')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/b-1.5.6/b-flash-1.5.6/datatables.min.css" />
<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/b-1.5.6/b-flash-1.5.6/datatables.min.js"></script>
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/b-1.5.6/b-flash-1.5.6/datatables.min.css" />

    <div class="container">
            <h3>Listado usuarios</h3>
    <table id="tblUsers" class="striped">
        <thead>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>
        </thead>
    </table>
    <a href="{{route('pdf.users')}}" class="btn"></i> <span>Pdf</span> </a>
    <a href="{{route('xlsx.users')}}" class="btn"></i> <span>xlsx</span> </a>
</div>
<script type="text/javascript">
    $(function() {
                   $('#tblUsers').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('datatable.users') !!}',
                    "columns": [
                        {data: 'rut', name: 'rut'},
                        {data: 'name', name: 'name'},
                        {data: 'last_name', name: 'last_name'},
                        {data: 'email', name: 'email'},
                        {data: 'phone', name: 'phone'}
                    ]
                });
            });
</script>
@endsection