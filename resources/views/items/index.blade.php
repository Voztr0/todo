@extends('layouts.app')

@section('navegacion')
    @include('layouts.nav')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">TO-DO List</h1>
                <table class="text-center table table-striped table-hover mt-4">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    @foreach ($items as $item)
                        <tbody>
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->estado }}</td>
                                <td class="form-inline justify-content-center">
                                    <form  action="{{ route('items.editar' , ['item' => $item->id]) }}">
                                        <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                                    </form>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <form class="card p-2" action=" {{ route('items.store') }} " method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Tarea nueva" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
