@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <p style="padding: 50px;">Descripción: Simple, quiero paginar los items de la tabla con ajax sin recargar la página de la manera más simple y limpia hablando en cuanto código.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td><button class="btn btn-primary">Agregar</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection