@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1>
    <hr>

    <div class="col-8 m-auto">
        @php
            $user = $book->find($book->id)->relUsers;
        @endphp
        Title: {{$book->title}}<br>
        Pages: {{$book->pages}}<br>
        Price: {{$book->price}}<br>
        Author: {{$user->name}}<br>
        Email: {{$user->email}}<br>

    </div>
@endsection