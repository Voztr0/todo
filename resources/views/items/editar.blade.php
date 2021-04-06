@extends('layouts.app')

@section('navegacion')
    @include('layouts.nav')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">editando {{$item->nombre}} </h1>
                <div class="row justify-content-center">
                    <form class="card p-2" action=" {{ route('items.update', ['item' => $item->id]) }} " method="POST">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <input type="text" name="nombre" class="form-control" value="{{$item->nombre}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success">Guardar cambio</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
