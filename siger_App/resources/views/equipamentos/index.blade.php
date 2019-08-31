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
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          
          <td width="101" height="40" align="left">Descrição:</td>
          <td width="101" height="40" align="left">Etiqueta:</td>
          <td width="101" height="40" align="left">Marca:</td>
          <td width="101" height="40" align="left">Modelo:</td>
          <td width="101" height="40" align="left">Número de série:</td>
          <td width="101" height="40" align="left" colspan="2">Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($equipamentos as $equipamento)
        <tr>
            
            <td width="101" height="40">{{$equipamento->descricao}}</td>
            <td width="101" height="40">{{$equipamento->etiqueta}}</td>
            <td width="101" height="40">{{$equipamento->marca}}</td>
            <td width="101" height="40">{{$equipamento->modelo}}</td>
            <td width="101" height="40">{{$equipamento->numero_serie}}</td>
            <td><a href="{{ route('equipamentos.edit', $equipamento->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
            <form action="{{ route('equipamentos.destroy', $equipamento->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
    
@stop
