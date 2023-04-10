@extends('layouts.app')

@section('title-block')
Contact Page
@endsection

@section('content')
<h1>Contact Page</h1>
@if($errors->any())
<div role="alert">
 <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2 mt-10">
    Errors List
  </div>
    <ul class=" delay-[2000ms]border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
        @foreach($errors->all() as $error)
        <li class=" delay-[2000ms] border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('contact-update-submit',$data->id) }}" method="post" style="margin: 130px;">
    @csrf
    <div class="form-group">
        <label for="name">Write Name</label>
        <input type="text" name="name" value="{{$data->name}}" placeholder="Write Your Name" id="name" class="form-control" >
    </div>
    <div class="form-group">
        <label for="email">Write Email</label>
        <input type="email" name="email" value="{{$data->email}}" placeholder="Write Your Email" id="email" class="form-control" >
    </div>
    <div class="form-group">
        <label for="subject">Write Description</label>
        <input type="text" name="subject" value="{{$data->subject}}" placeholder="Write Discription" id="subject" class="form-control" >
    </div>
    <button type="submit" class="btn bg-green-800 text-white p-2">Change</button>
</form>
@endsection