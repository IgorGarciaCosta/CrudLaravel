@extends('templates.template')

@section('content')

<!-- //escreve Editar ou Cadastar a depender da entrada 
//que recebe da edit() do bookCOntroller -->
<h1 class="text-center">@if(isset($book)) Editar @else Cadastar @endif</h1>
<hr>

<!-- @csrf serve pra impedir ataques de cross-
site. (é um token). -->
<div class="col-8 m-auto">

    @if(isset($errors)&& count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
        {{$erro}}
        @endforeach
    </div>
    @endif


    @if(isset($book))
        <form name="formEdit" id="formEdit" method="post" action="{{url("books/$book->id")}}">
            @method('PUT')
     @else

        <form name="formCad" id="formCad" method="post" action="{{url('books')}}">
    @endif
    @csrf

    <!-- Obs:input faz ter as textBoxes. 
    placeholder é o texto dentra das textBoxes
    que some quando começamos a digitar. -->
    <input class="form-control" type="text" name="title" id="title" placeholder="Título" value = "{{$book->title ?? ''}}" required>
    <br>
    <select class="form-control" name="id_user" id="id_user">
        <option value="{{$book->relUsers->id?? ''}}">{{$book->relUsers->name ?? 'Autor'}}</option>
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>

        @endforeach
    </select>
    <br>
    <input class="form-control" type="text" name="pages" id="pages" placeholder="Páginas" value = "{{$book->pages ?? ''}}" required>
    <br>
    <input class="form-control" type="text" name="price" id="title" placeholder="Preço" value = "{{$book->price ?? ''}}" required>
    <br>
    <input class="btn btn-primary" type="submit" value="@if(isset($book)) Editar @else Cadastar @endif">

    </form>

</div>
@endsection