@extends('gaseosas.principal')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Gaseosa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('gaseosas.index') }}"> Regresar</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Vaya!</strong> Tenemos algunos problemas en los datos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('gaseosas.update',$gaseosa->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" value="{{ $gaseosa->nombre }}" class="form-control" placeholder="nombre">
                </div>
                <div class="form-group">
                    <strong>Tamaño:</strong>
                    <input type="text" name="mililitros" value="{{ $gaseosa->mililitros }}" class="form-control" placeholder="tamaño">
                </div>
                <div class="form-group">
                    <strong>Precio:</strong>
                    <input type="text" name="precio" value="{{ $gaseosa->precio }}" class="form-control" placeholder="precio">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detalles:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion" placeholder="descripcion">{{ $gaseosa->descripcion }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
   
    </form>
@endsection