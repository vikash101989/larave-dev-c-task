

@extends('layouts.app')

@section('content')

 
  <div class="row">
    <div class="col-md-6">    
        <h2>Show Users List</h2>
    </div>
    <div class="col-md-6">    
        <a href="{{ route('home')}}"> <button type="button" class="btn btn-primary pull-right">Add user</button> </a>
    </div>
  </div>
  <div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Interests</th>
        <th>Roles</th>
      </tr>
    </thead>
    <tbody>
      @if($users->count() > 0)
      @php
        $sn = 1
        @endphp
      @foreach($users as $user)
      <tr>
        <td>{{ $sn ++ }}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
        @if($user->interests()->count() > 0)
            @foreach($user->interests as $interest)
            {{$interest->interest}},
            @endforeach
        @endif
        </td>
        <td>
          @if($user->roles()->count() > 0)
          @foreach($user->roles as $role)
          {{$role->name}},
          @endforeach
          @else
          <strong>no role</strong>
          @endif
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="7" class="alert alert-info">No recodes Found..</td>
      </tr>
      @endif
      
    </tbody>
    
  </table>
</div>

@endsection

