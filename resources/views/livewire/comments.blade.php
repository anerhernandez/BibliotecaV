<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @role('Admin')
                <p>Su rol es Admin (Sigma Σ, se le permite eliminar juegos)</p>
                @endrole

                @role('usuario')
                <p>Su rol es usuario (Cringe β)</p>
                @endrole
                <br>
                <h1 class="text-2xl text-green-400">Muestra los datos del juego: <b class="text-red-600">{{$videogamec[0]->titulo}}</b></h1>
                <br>
                <table class="min-w-full bg-white border-slate-900 border-4 rounded-md">
                    <thead class="bg-gray-700 text-white border border-gray-700">
                        <th class="py-4">Título</th>
                        <th>Descripción</th>
                        <th>Carátula</th>
                        <th 
                        @role('Admin')
                        colspan="2"
                        @endrole>Acciones</th>
                    </thead>
                    <tbody>
                            <tr class="border border-gray-700 text-gray-700 bg-white text-center">
                                <td class="text-center py-3 px-4">{{$videogamec[0]->titulo}}</td>
                                <td class="text-center py-3 px-4">{{$videogamec[0]->descripcion}}</td>
                                <td class="text-center">{{$videogamec[0]->caratula}}</td>
                                <td class="text-center"><button wire:click="openaddC"class="bg-slate-400 rounded text-slate-100 p-1 hover:bg-slate-500 duration-200">Añadir comentario</button></td>
                                @role('Admin')
                                <td class="text-center"><button wire:click='deleteVideogame' class="bg-red-600 rounded text-white p-2 hover:bg-red-700 duration-200">Eliminar</button></td>
                                @endrole
                            </tr>
                    </tbody>
                </table>
                <br>
                <h1 class="text-2xl text-slate-400">Comentarios: </h1>
                <hr class="border border-gray-700">
                {{-- Comentarios --}}
                    @foreach ($comments as $comment)
                      @if ($videogamec[0]->id == $comments[0]->videogame_id)
                        
                        @foreach ($users as $user)
                          @if ($user->id == $comment->user_id)
                            <p class="text-2xl text-orange-400">Comentario de {{$user->name}}</p>
                          @endif
                          
                        @endforeach
                        <p class="ml-5">{{$comment->comentario}}</p>
                        <p class="ml-7">Valoración: {{$comment->valoracion}}⭐</p>
                        
                      @endif
                    @endforeach
                {{-- Modal para añadir comentario o editar comentario --}}
                @if ($addvC)
                <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10 text-black">
                    <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
                      <div class="w-full">
                        <div class="m-8 my-20 max-w-[400px] mx-auto">
                          <div class="mb-8">
                            <h1 class="mb-4 text-3xl font-extrabold text-black">Añadir valoración de {{$videogamec[0]->titulo}}</h1>
                          </div>
                          <div class="space-y-4">
                            <div>
                                <label for="titulo" class="block text-sm font-medium text-gray-700">Valoración</label>
                                <div>
                                    <input type="radio" id="valoracion1" name="valoracion" value="1" required wire:model="valoracion"/>
                                    <label for="valoracion1">⭐</label><br>
                              
                                    <input type="radio" id="valoracion2" name="valoracion" value="2" required wire:model="valoracion"/>
                                    <label for="valoracion2">⭐⭐</label><br>
                              
                                    <input type="radio" id="valoracion3" name="valoracion" value="3" required wire:model="valoracion"/>
                                    <label for="valoracion3">⭐⭐⭐</label><br>

                                    <input type="radio" id="valoracion4" name="valoracion" value="4" required wire:model="valoracion"/>
                                    <label for="valoracion4">⭐⭐⭐⭐</label><br>

                                    <input type="radio" id="valoracion5" name="valoracion" value="5" required wire:model="valoracion"/>
                                    <label for="valoracion5">⭐⭐⭐⭐⭐</label><br>
                                  </div>
                            </div>
            
                            <div>
                                <label for="comentario" class="block text-sm font-medium text-gray-700">Comentario (opcional)</label>
                                <textarea type="text" name="comentario" wire:model="comentario" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-400 rounded-md"></textarea>
                            </div>

                            <button wire:click.prevent="createComment" class="p-3 bg-black rounded-full hover:bg-neutral-950 duration-200 text-white w-full font-semibold">Añadir valoración</button>
                            <button wire:click.prevent="closeaddC" class="p-3 bg-white border border-gray-500 hover:bg-neutral-200 duration-200 rounded-full w-full font-semibold">Cancelar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
            </div>
            
            </div>
        </div>
    </div>
