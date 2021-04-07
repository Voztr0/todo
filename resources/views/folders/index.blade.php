@extends('layouts.app')

@section('navegacion')
    @include('layouts.nav')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Folders List</h1>
                @if (count($folders) > 0)
                <table class="text-center table table-striped table-hover mt-4">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    @foreach ($folders as $folder)
                        <tbody>
                            <tr>
                                <td>{{ $folder->id }}</td>
                                <td>{{ $folder->nombre }}</td>
                                <td class="form-inline justify-content-center">
                                    <form  action="{{ route('folders.show' , ['folder' => $folder->id]) }}">
                                        <button type="submit" class="btn btn-warning btn-sm">View Items</button>
                                    </form>
                                    <form action="{{ route('folders.destroy', $folder->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
                @else
                    <p class="text-center mt-5"> No hay carpetas</p>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <form class="card p-2" action=" {{ route('folders.store') }} " method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="nombre" class="form-control" placeholder="carpeta nueva">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
