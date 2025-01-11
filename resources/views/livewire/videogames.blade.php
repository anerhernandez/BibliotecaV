<div>
    <br>
    <div class="text-center py-4">
      <button wire:click="openaddV" class="bg-sky-700 p-3 border border-sky-700 rounded">Añadir Videojuego</button>
    </div>
    <table class="min-w-full bg-white">
        <thead class="bg-gray-700 text-white border border-gray-700">
            <th class="py-4">Título</th>
            <th>Descripción</th>
            <th>Carátula</th>
            <th 
            @role('Admin')
            colspan="2"
            @endrole>Detalles</th>
        </thead>
        <tbody>
            @foreach ($videogames as $videogame)
                <tr class="border border-gray-700 text-gray-700 bg-white">
                    <td class="w-1/3 text-left py-3 px-4">{{$videogame->titulo}}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{$videogame->descripcion}}</td>
                    <td>{{$videogame->caratula}}</td>
                    <td class="text-center"><button  class="bg-slate-400 rounded text-slate-100 p-2 hover:bg-slate-500 duration-200">Detalles {{$addv}}</button></td>
                    @role('Admin')
                    <td><button  class="bg-red-600 rounded text-white p-2 hover:bg-red-700 duration-200">Eliminar</button></td>
                    @endrole
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Modal para añadir videojuego --}}
    @if ($addv)
    <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10 text-black">
        <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
          <div class="w-full">
            <div class="m-8 my-20 max-w-[400px] mx-auto">
              <div class="mb-8">
                <h1 class="mb-4 text-3xl font-extrabold ">Añadir Videojuego</h1>
              </div>
              <div class="space-y-4">
                <div>
                    <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" name="titulo" wire:model="titulo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-4000 rounded-md">
                </div>

                <div>

                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <input type="text" name="descripcion" wire:model="descripcion" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-4000 rounded-md">
                </div>

                <div>
                    
                    <label for="caratula" class="block text-sm font-medium text-gray-700">Carátula</label>
                    <input type="text" name="caratula" wire:model="caratula" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-4000 rounded-md">
                </div>


                <button wire:click="createVideogame" class="p-3 bg-black rounded-full hover:bg-neutral-950 duration-200 text-white w-full font-semibold">Añadir Videojuego</button>
                <button wire:click="closeaddV" class="p-3 bg-white border border-gray-500 hover:bg-neutral-200 duration-200 rounded-full w-full font-semibold">Cancelar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
</div>