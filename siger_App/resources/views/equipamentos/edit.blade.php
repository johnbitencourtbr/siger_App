@extends('adminlte::page')

@section('title', 'SIGER - Sistema Gerenciador de Reservas')

@section('content_header')
    <h1>Equipamentos</h1>
@stop

@section('content')
    
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
   
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('equipamentos.update', $equipamentos->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="descricao">Descrição:</label>
          <input type="text" class="form-control" name="descricao" value="{{ $equipamentos->descricao }}" />
        </div>
        <div class="form-group">
          <label for="marca ">Marca do equipamento :</label>
          <input type="text" class="form-control" name="marca" value="{{ $equipamentos->marca}}" />
        </div>
        <div class="form-group">
          <label for="modelo">Modelo:</label>
          <input type="text" class="form-control" name="modelo" value="{{ $equipamentos->modelo }}" />
        </div>
        <div class="form-group">
          <label for="numero_serie">Modelo:</label>
          <input type="text" class="form-control" name="numero_serie" value="{{ $equipamentos->numero_serie }}" />
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>
    
@stop
