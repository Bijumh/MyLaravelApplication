@extends('layout')
@section('header')
<div class="page-header">
        <h1>People / Show #{{$person->id}}</h1>
        <form action="{{ route('people.destroy', $person->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('people.edit', $person->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="first_name">FIRST NAME</label>
                     <p class="form-control-static">{{$person->first_name}}</p>
                </div>
                    <div class="form-group">
                     <label for="last_name">LAST NAME</label>
                     <p class="form-control-static">{{$person->last_name}}</p>
                </div>
                    <div class="form-group">
                     <label for="address">ADDRESS</label>
                     <p class="form-control-static">{{$person->address}}</p>
                </div>
                    <div class="form-group">
                     <label for="city">CITY</label>
                     <p class="form-control-static">{{$person->city}}</p>
                </div>
                    <div class="form-group">
                     <label for="state">STATE</label>
                     <p class="form-control-static">{{$person->state}}</p>
                </div>
                    <div class="form-group">
                     <label for="zip_code">ZIP CODE</label>
                     <p class="form-control-static">{{$person->zip_code}}</p>
                </div>
                    <div class="form-group">
                     <label for="country">COUNTRY</label>
                     <p class="form-control-static">{{$person->country}}</p>
                </div>
                    <div class="form-group">
                     <label for="dob">DOB</label>
                     <p class="form-control-static">{{$person->dob}}</p>
                </div>
                    <div class="form-group">
                     <label for="height">HEIGHT</label>
                     <p class="form-control-static">{{$person->height}}</p>
                </div>
                    <div class="form-group">
                     <label for="weight">WEIGHT</label>
                     <p class="form-control-static">{{$person->weight}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('people.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection