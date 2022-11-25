@extends('common.header')
@section('content')

@if($type == "add")
<div>
    <center><h2>Fill the Form</h2></center>

    @include('common.validation_error')

<form action="{{route('user-post-save', ['type' => 'add', 'id' => 0])}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>

    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
    </div>

    <div class="form-group">
      <label for="name">Street Address:</label>
      <input type="text" class="form-control" id="street_address" placeholder="Enter street Address" name="street_address">
    </div>

    <div class="form-group">
      <label for="city">City:</label>
      <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
    </div>

    <div class="form-group">
      <label for="state">State:</label>
      <select name="state" id="" class="form-control">
            <option value="select a state">select a state</option>
            <option value="CA">CA</option>
            <option value="NY">NY</option>
            <option value="AT">AT</option>
      </select>
    </div>

    <div class="form-group">
      <label for="country">country:</label>
      <select name="country" id="" class="form-control">
            <option value="select a country">select a country</option>
            <option value="IN">IN</option>
            <option value="US">US</option>
            <option value="EU">EU</option>
      </select>
    </div>

    <div class="form-group">
      <label for="image">Profile Image:</label>
      <input type="file" class="form-control" id="image" placeholder="Enter image" name="image">
    </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@else

     @php
             $details = App\Models\UserDetails::whereId($id)->first();
     @endphp

     <div>
    <center><h2>Fill the Form</h2></center>

    @include('common.validation_error')

<form action="{{route('user-post-save', ['type' => 'edit', 'id' => $details->id])}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{$details->name}}" name="name">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" value="{{$details->email}}" name="email">
    </div>

    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter phone" value="{{$details->phone}}" name="phone">
    </div>

    <div class="form-group">
      <label for="name">Street Address:</label>
      <input type="text" class="form-control" id="street_address" placeholder="Enter street Address" value="{{$details->street_address}}" name="street_address">
    </div>

    <div class="form-group">
      <label for="city">City:</label>
      <input type="text" class="form-control" id="city" placeholder="Enter City" value="{{$details->city}}" name="city">
    </div>

    <div class="form-group">
      <label for="state">State:</label>
      <select name="state" id="" class="form-control">
            <option value="{{$details->state}}">{{$details->state}}</option>
            <option value="select a state">select a state</option>
            <option value="CA">CA</option>
            <option value="NY">NY</option>
            <option value="AT">AT</option>
      </select>
    </div>

    <div class="form-group">
      <label for="country">country:</label>
      <select name="country" id="" class="form-control">
            <option value="{{$details->country}}">{{$details->country}}</option>
            <option value="select a country">select a country</option>
            <option value="IN">IN</option>
            <option value="US">US</option>
            <option value="EU">EU</option>
      </select>
    </div>

    <div class="form-group">
      <label for="image">Profile Image:</label>
      <img src="{{asset('/images/'.$details->profile_img)}}" alt="" height="50" weight="100">
      <input type="file" class="form-control" id="image" placeholder="Enter image" name="image">
    </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@endif
@endsection