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
                                <h4 class="card-title">CITY FORM</h4>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('city.update', $city->id) }}" method="POST" class="form-card">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="CITY">CITY NAME:</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{$city->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="State">State :</label>
                                        <select name="state" id="state" class="form-control">
                                            @foreach ($state as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                                    <a class="btn btn-danger rounded-pill" href="{{route('city.index') }}">Cansel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection