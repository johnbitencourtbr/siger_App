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
      <form method="post" action="{{ route('equipamentos.store') }}">
          <div class="form-group">
              @csrf
              <label for="descricao">Descrição do equipamento:</label>
              <input type="text" class="form-control" name="descricao"/>
          </div>
          <div class="form-group">
              <label for="etiqueta">Etiqueta do equipamento: </label>
              <input type="text" class="form-control" name="etiqueta"/>
          </div>
          <div class="form-group">
              <label for="modelo">Modelo do equipamento:</label>
              <input type="text" class="form-control" name="modelo"/>
          </div>
          <div class="form-group">
              <label for="marca">Marca do equipamento:</label>
              <input type="text" class="form-control" name="marca"/>
          </div>
          <div class="form-group">
              <label for="numero_serie">Número de série do equipamento:</label>
              <input type="text" class="form-control" name="numero_serie"/>
          </div>
          
          <button type="submit" class="btn btn-primary">Incluir</button>
      </form>
  </div>
</div>  

    
@stop
