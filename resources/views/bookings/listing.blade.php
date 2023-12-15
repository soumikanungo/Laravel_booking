@extends('layouts.header')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>All Booking Details</h2>
        </div>
        <br/>
        <div class="pull-right">
            <a class="btn btn-info"  href="/">Back To Dashboard</a>
            
    </div>
</div>

<table class="table  table-bordered">
    <tr>
        <th>Sl no.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
        <th>TimeSlot</th>
        <th>Actions</th>
    </tr>

        @foreach($users as $user)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->dateslot}}</td>
            <td>{{$user->timeslot}}</td>
            
            <td>
                <form action="{{ route('bookings.destroy',$user->id)}}" method="POST">
                <a class="btn btn-info" href="{{ route('bookings.show',$user->id) }}">Show</a>
                    <a class="btn btn-success" href="{{route('bookings.edit',$user->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    
                    </form>

         
      </td>
    </tr>
    @endforeach
</table>       

<div class="row">
    <div class="col-lg-12 margin-tb">
        
        <div >
           <a class="btn btn-primary" style="float:left" href="/logout"></i>Logout</a>
           <a class="btn btn-success" href="{{ route('export',$user->id) }}">Export Users</a>
        </div>
    </div>
</div>
@endsection