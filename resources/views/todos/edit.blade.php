@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Todos / Edit #{{$todo->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('todo')) has-error @endif">
                       <label for="todo-field">Todo</label>
                    <input type="text" id="todo-field" name="todo" class="form-control" value="{{ $todo->todo }}"/>
                       @if($errors->has("todo"))
                        <span class="help-block">{{ $errors->first("todo") }}</span>
                       @endif
                    </div>
                <div class="form-group @if($errors->has('due_date')) has-error @endif">
                       <label for="todo-field">Due Date</label>
                    <input type="text" id="due-date-field" name="due_date" class="form-control date-picker" value="{{ $todo->due_date }}"/>
                       @if($errors->has("due_date"))
                        <span class="help-block">{{ $errors->first("due_date") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('todos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
