@extends('gaseosas.principal')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>GASEOSAS</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('gaseosas.create') }}"> Crear Nueva Gaseosa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Tamaño</th>
            <th width="200px">botones</th>
        </tr>
        @foreach ($gaseosas as $gaseosa)
        <tr>
            <td>{{ $gaseosa->id }}</td>
            <td>{{ $gaseosa->nombre }}</td>
            <td>{{ $gaseosa->descripcion }}</td>
            <td>{{ $gaseosa->precio }}</td>
            <td>{{ $gaseosa->mililitros }}</td>
            <td>
                <form action="{{ route('gaseosas.destroy',$gaseosa->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('gaseosas.edit',$gaseosa->id) }}">editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection