@extends('layouts.app')

@section('content')
    <form action="{{route('posts.store')}}" method="post">
        <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->

        {{-- csrf_field() --}}

        @csrf

        <div class="form-group">
            <label>Titulo</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-lg btn-success">Criar Post</button>
    </form>
@endsection
