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
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">DEPARTMENT FORM</h4>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('department.update', $department->id) }}" method="POST"
                                    class="form-card">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="registration_number">DEPARTMENT NAME:</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{$department->name}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                                    <a class="btn btn-danger rounded-pill"
                                        href="{{route('department.index') }}">Cansel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection