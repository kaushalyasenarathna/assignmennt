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
                                <h4 class="card-title">COUNTRY FORM</h4>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('department.store')}}" method="POST" class="form-card">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Department Name:</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
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