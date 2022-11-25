@extends('common.header')
@section('content')

@include('common.session_messages')

<div class="mt-5" style="margin-top: 20px; margin-left: 80%; margin-buttom: 20px;">
<a href="{{route('user-save', ['type' => 'add', 'id' => 0])}}" class="btn btn-primary">Add New</a>

@if($all_details->isEmpty())
<a  class="btn btn-primary" style="cursor: no-drop;">Export in CSV</a>
@else
<a href="{{route('export-data')}}" class="btn btn-primary">Export in CSV</a>
@endif
</div>

@if($all_details->isEmpty())
   <center><div><h2>No Record Found</h2></div></center>
@else
<table class="table">
    <thead>
      <tr>
         <th>SL. No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Street Address</th>
        <th>City</th>
        <th>State</th>
        <th>Country</th>
        <th>Profile Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($all_details as $key => $details)
      <tr>
         <td>{{ ($key + 1) }}</td>
        <td>{{$details->name}}</td>
        <td>{{$details->email}}</td>
        <td>{{$details->phone}}</td>
        <td>{{$details->street_address}}</td>
        <td>{{$details->city}}</td>
        <td>{{$details->state}}</td>
        <td>{{$details->country}}</td>
        <td><img src="{{asset('/images/'.$details->profile_img)}}" alt="" height="50" weight="100"></td>
        <td>
           <a href="{{route('user-save', ['type' => 'edit', 'id' => $details->id])}}" class="btn btn-primary">Edit</a>
           <a href="{{route('delete-data', ['id' => $details->id])}}" onclick="return confirm('Are You Sure You want to delete this?')" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endif
@endsection