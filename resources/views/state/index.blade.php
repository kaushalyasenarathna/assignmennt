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
                                            <h4 class="card-title"> COUNTRY TABLE</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <div id="table" class="table-editable">
                                            <span class="table-add float-right mb-3 mr-2">
                                                <a class="btn btn-primary rounded-pill"
                                                    href="{{route('state.create') }}">create</a>
                                            </span>
                                            @if ($msg = Session::get('add'))
                                            <div class="alert alert-info">
                                                <p>{{ $msg }}</p>
                                            </div>
                                            @endif
                                            <form action="{{ route('state.index') }}" method="GET">
                                                <input type="text" name="search" required />
                                                <button type="submit" class="btn btn-info">Search</button>
                                            </form>
                                            <table
                                            class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>STATE NAME</th>
                                                        <th>COUNTRY </th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($state as $data)
                                                    <tr>
                                                        <td>
                                                            {{ $data->name }}</td>
                                                        <td>
                                                            {{ $data->country }}
                                                        </td>
                                                        <td>
                                                            <div class="float-right">
                                                                <form action="{{ route('state.destroy', $data->id) }}"
                                                                    method="post">
                                                                    <a class="btn btn-success mr-3"
                                                                        href="{{ route('state.edit', $data->id) }}">edit</a>
                                                                    <div class="float-right">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Delete
                                                                        </button>
                                                                    </div>
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