@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> People / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('people.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('first_name')) has-error @endif">
                       <label for="first_name-field">First Name</label>
                    <input type="text" id="first_name-field" name="first_name" class="form-control" value="{{ old("first_name") }}"/>
                       @if($errors->has("first_name"))
                        <span class="help-block">{{ $errors->first("first_name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('last_name')) has-error @endif">
                       <label for="last_name-field">Last Name</label>
                    <input type="text" id="last_name-field" name="last_name" class="form-control" value="{{ old("last_name") }}"/>
                       @if($errors->has("last_name"))
                        <span class="help-block">{{ $errors->first("last_name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field">Address</label>
                    <input type="text" id="address-field" name="address" class="form-control" value="{{ old("address") }}"/>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('city')) has-error @endif">
                       <label for="city-field">City</label>
                    <input type="text" id="city-field" name="city" class="form-control" value="{{ old("city") }}"/>
                       @if($errors->has("city"))
                        <span class="help-block">{{ $errors->first("city") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('state')) has-error @endif">
                       <label for="state-field">State</label>
                    <input type="text" id="state-field" name="state" class="form-control" value="{{ old("state") }}"/>
                       @if($errors->has("state"))
                        <span class="help-block">{{ $errors->first("state") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('zip_code')) has-error @endif">
                       <label for="zip_code-field">Zip Code</label>
                    <input type="text" id="zip_code-field" name="zip_code" class="form-control" value="{{ old("zip_code") }}"/>
                       @if($errors->has("zip_code"))
                        <span class="help-block">{{ $errors->first("zip_code") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('country')) has-error @endif">
                       <label for="country-field">Country</label>
                    <input type="text" id="country-field" name="country" class="form-control" value="{{ old("country") }}"/>
                       @if($errors->has("country"))
                        <span class="help-block">{{ $errors->first("country") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('dob')) has-error @endif">
                       <label for="dob-field">DOB</label>
                    <input type="text" id="dob-field" name="dob" class="form-control date-picker" value="{{ old("dob") }}"/>
                       @if($errors->has("dob"))
                        <span class="help-block">{{ $errors->first("dob") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('height')) has-error @endif">
                       <label for="height-field">Height</label>
                    <input type="text" id="height-field" name="height" class="form-control" value="{{ old("height") }}"/>
                       @if($errors->has("height"))
                        <span class="help-block">{{ $errors->first("height") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('weight')) has-error @endif">
                       <label for="weight-field">Weight</label>
                    <input type="text" id="weight-field" name="weight" class="form-control" value="{{ old("weight") }}"/>
                       @if($errors->has("weight"))
                        <span class="help-block">{{ $errors->first("weight") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('people.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
