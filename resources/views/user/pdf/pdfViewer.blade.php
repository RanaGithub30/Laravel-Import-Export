@extends('common.header')
@section('content')

<div style="margin: 20px;">
    <center><h2>{{ $title }}</h2></center>
    <p>{{ $date }}</p>
</div>

<table class="table" style="margin-top: 25px;">
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
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection