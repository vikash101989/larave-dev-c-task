@extends('layouts.app')

@section('content')
   <div class="row d-block">
        <div class="col-sm-12">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
        </div>
  </div>
  <div class="row">
    <div class="col-md-6">    
        <h2>Add users</h2>
    </div>
    <div class="col-md-6">    
    <a href="{{ route('userlist')}}"> <button type="button" class="btn btn-primary pull-right">Show List</button></a>
    </div>
  </div>
  @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
  <form action="{{ route('save') }}" method="post">
  @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" value="{{old('name')}}" placeholder="Enter name" name="name">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" value="{{old('email')}}" placeholder="Enter email" name="email">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="password">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
            <label for="interest">Chooes Interest</label><br>
            <select id="example-getting-started" class="form-control" name="interest[]" multiple="multiple">
                <option value="sports">Sports</option>
                <option value="reading">Reading</option>
                <option value="news">News</option>
                <option value="traveling">Traveling</option>
                <option value="pooding">Fooding</option>
            </select>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-offset-11 col-sm-1">    
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
  </form>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });
</script>
@endsection
