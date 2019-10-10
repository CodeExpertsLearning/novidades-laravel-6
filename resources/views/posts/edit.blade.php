@extends('layouts.app')

@section('content')
    <form action="{{route('posts.update', ['post' => $post->id])}}" method="post">
        <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->

        {{-- csrf_field() --}}

        @csrf
        @method("PUT")
        <div class="form-group">
            <label>Titulo</label>
            <input type="text" class="form-control" name="title" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea name="description" cols="30" rows="10" class="form-control">{{$post->description}}</textarea>
        </div>

        <button type="submit" class="btn btn-lg btn-success">Atualizar Post</button>
    </form>
    <hr>

    <form action="{{route('posts.destroy', ['post' => $post->id])}}" method="post">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-lg btn-danger">Remover Post</button>
    </form>

@endsection
