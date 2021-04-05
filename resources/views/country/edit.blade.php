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
                                <form action="{{ route('country.update', $country->id) }}" method="POST"
                                    class="form-card">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="registration_number">COUNTRY NAME:</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{$country->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="country_code">COUNTRY CODE:</label>
                                        <input type="text" class="form-control" id="country_code" name="country_code"
                                            value="{{$country->country_code}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                                    <a class="btn btn-danger rounded-pill" href="{{route('country.index') }}">Cansel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection