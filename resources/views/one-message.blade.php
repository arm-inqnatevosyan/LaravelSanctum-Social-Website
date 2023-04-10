@extends('layouts.app')

@section('title-block')
$data->subject
@endsection

@section('content')
<div class="pt-16 tex-center flex items-center flex-col justify-center">
<h1 class="text-3xl">{{ $data->subject }}</h1>
  <div role="alert" class="w-3/6 flex items-center flex-col  border border-t-0 mt-16 border-sky-400 rounded-b bg-sky-100 px-4 py-3 text-sky-700">
    <h1>Name : <b>{{ $data->name }}</b></h1>
    <h1>{{ $data->email }}</h1>
    <h1>Your Message : <b>{{ $data->subject }}</b></h1>
    <h1>{{ $data->created_at }}</h1>
    <button class="p-1 px-3 mt-2 bg-sky-800 text-white"><a href="{{ route('contact-update', $data->id ) }}">Change Profile</a></button>
    <button class="p-1 px-3 mt-2 bg-sky-800 text-white"><a href="{{ route('contact-delete', $data->id ) }}">Delete Profile</a></button>
</div>
</div>
@endsection
