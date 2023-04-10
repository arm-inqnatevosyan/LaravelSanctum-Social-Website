@extends('layouts.app')

@section('title-block')
Messages Page
@endsection

@section('content')
<div class="pt-16 tex-center flex items-center flex-col justify-center">
<h1 class=" text-3xl">Messages Page</h1>
@foreach($data as $el)
  <div role="alert" class="w-3/6 pb-8 flex items-center flex-col  border border-t-0 mt-16 border-sky-400 rounded-b bg-sky-100 px-4 py-3 text-sky-700">
    <h1 class="pt-5">Name : <b>{{ $el->name }}</b></h1>
    <h1>{{ $el->email }}</h1>
    <h1>Your Message <b>{{ $el->subject }}</b></h1>
    <h1>{{ $el->created_at }}</h1>
    <div class="form-group">
        <label for="title">Comment Site</label>
        <input type="text" name="name" placeholder="Write Your Comment" id="comment" class="form-control" >
    </div>
    <div class="form-group">
        <label for="contact_id">Write Id</label>
        <input type="number" name="contact_id" placeholder="Write Your id" id="contact_id" class="form-control" >
    </div>
    <button class="p-1 px-3 mt-2 bg-sky-800 text-white"><a href="{{ route('contact-data', $el->id ) }}">ADd COmm</a></button>
    <button class="p-1 px-3 mt-2 bg-sky-800 text-white"><a href="{{ route('contact-data-one', $el->id ) }}">View Profile</a></button>
</div>
@endforeach
</div>
@endsection
