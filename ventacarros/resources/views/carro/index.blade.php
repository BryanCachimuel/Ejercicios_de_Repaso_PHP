@extends('welcome')

@section('content')

<button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#crearcarro">
    Agregar Nuevo Carro
</button>

    <div class="table-responsive mt-5">
        <table class="table text-center">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">MARCA</th>
                    <th scope="col">PROPIETARIO</th>
                    <th scope="col">DESCRIPCIÓN</th>
                    <th scope="col">PRECIO</th>
                    <th scope="col">CANTIDAD</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carros as $carro)
                    <tr class="">
                        <td scope="row">{{$carro->id_carro}}</td>
                        <!--<td>{{$carro->id_marca}}</td>-->
                        <td>{{$carro->Marca->nombre_marca}}</td>
                        <td>{{$carro->nombre_propietario}}</td>
                        <td>{{$carro->descripcion_carro}}</td>
                        <td>$ {{$carro->precio_carro}}</td>
                        <td>{{$carro->cantidad_carro}}</td>
                        <td scope="row">$ {{$carro->valor_total_carro}}</td>
                        <td>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editarcarro{{$carro->id_carro}}"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarcarro{{$carro->id_carro}}"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                <!-- invocando al modal de actualización marca -->
                @include('carro.info')
                @endforeach
            </tbody>
        </table>
    </div>

<!-- invocando al modal de creacion marca -->
@include('carro.create')

@endsection
