 <!-- Modal para crear -->
 <div class="modal fade" id="crearcarro" tabindex="-1" aria-labelledby="crearcarroLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Nuevo Carro</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>

             <form action="{{ route('carros.store') }}" method="post" autocomplete="off">
                 @csrf
                 <div class="modal-body">

                     <div class="mb-3">
                         <label for="nombre_marca" class="form-label">Marca: </label>
                         <select name="id_marca" class="form-control">
                            @foreach ($marcas as $marca)
                                <option value="{{$marca->id_marca}}">{{$marca->nombre_marca}}</option>
                            @endforeach
                         </select>
                     </div>

                     <div class="mb-3">
                         <label for="nombre_propietario" class="form-label">Propietario: </label>
                         <input type="text" class="form-control" name="nombre_propietario" id="nombre_propietario"/>
                     </div>

                     <div class="mb-3">
                         <label for="descripcion_carro" class="form-label">Descripción: </label>
                         <input type="text" class="form-control" name="descripcion_carro" id="descripcion_carro"/>
                     </div>

                     <div class="mb-3">
                         <label for="precio_carro" class="form-label">Precio: </label>
                         <input type="number" step="0.01" class="form-control" name="precio_carro" id="precio_carro"/>
                     </div>

                     <div class="mb-3">
                        <label for="cantidad_carro" class="form-label">Cantidad: </label>
                        <input type="number" class="form-control" name="cantidad_carro" id="cantidad_carro"/>                   
                     </div>

                 </div>

                 <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                     <button type="submit" class="btn btn-primary">Guardar</button>
                 </div>

             </form>
         </div>
     </div>
 </div>
