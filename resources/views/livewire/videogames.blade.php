<div>
    <br>
    @foreach ($videogames as $videogame)
        <p>Título: {{$videogame->titulo}}</p>
        <p>Descripción: {{$videogame->descripcion}}</p>
        <br>
    @endforeach
</div>