@extends('layouts.main')

@section('content')
<script>
$(document).ready(function() {
    $("#sidebarCollapse").on('click', function() {
        $("#sidebar").toggleClass('active');
    });
});
</script>
<div class="backgroundpadding">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">SYSTEM MANAGEMENT</h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="content-page" class="content-page">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title"> DEPARTMENT TABLE</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <div id="table" class="table-editable">
                                            <span class="table-add float-right mb-3 mr-2">
                                                <a class="btn btn-primary rounded-pill"
                                                    href="{{route('department.create') }}">create</a>
                                            </span>
                                            @if ($msg = Session::get('add'))
                                            <div class="alert alert-info" >
                                                <p>{{ $msg }}</p>
                                            </div>
                                            @endif
                                            <form action="{{ route('department.index') }}" method="GET">
    <input type="text" name="search" required/>
    <button type="submit" class="btn btn-info ">Search</button>
</form>

<table
                                            class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>DEPARTMENT NAME</th>
                                                       
                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($department as $data)
                                                    <tr>
                                                        <td>
                                                            {{ $data->name }}</td>
                                                         



                                                        <td>
                                                            <div class="float-right">
                                                                <form action="{{ route('department.destroy', $data->id) }}"
                                                                    method="post">
                                                                    <a class="btn btn-success mr-3"
                                                                        href="{{ route('department.edit', $data->id) }}">edit</a>
                                                                   
                                                                    <div class="float-right">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Delete</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection