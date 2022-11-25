@extends('common.header')
@section('content')

<div style="margin: 20px;">
<center><h2>Import Csv File</h2></center>
<form action="{{route('import-csv')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="name">Chose Csv File:</label>
      <input type="file" class="form-control" id="name" name="name">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
  </div>

@endsection