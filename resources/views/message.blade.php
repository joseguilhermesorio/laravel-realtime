@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }}</div>
    @endif

    <form action="{{ route('messages') }}" method="post">
        @csrf
        <input type="text" name="title" class="form-control" placeholder="Título"><br>
        <textarea name="body" cols="30" rows="10" class="form-control" placeholder="Mensagem"></textarea><br>
        <button class="btn btn-success">Enviar</button>
    </form>
</div>
@endsection