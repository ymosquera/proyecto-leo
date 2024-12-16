<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1 class="titulo">Hornos leo echeverri salazar</h1>

    <p class="parrafo">Descubre la magia de los hornos artesanales
Transforma tu cocina y eleva tus habilidades culinarias con nuestros hornos artesanales, diseñados para
ofrecer un rendimiento excepcional y un estilo inigualable. Hechos a mano con materiales de alta calidad, estos hornos no
solo destacan por su durabilidad, sino también por su capacidad para mantener y distribuir el calor de manera uniforme.
Ideales para preparar desde panes crujientes hasta pizzas perfectas, nuestros hornos combinan tradición y tecnología para que cada plato sea una experiencia única. Lleva a casa el sabor auténtico y el arte de cocinar como nunca antes.</p>
 @if ($productos->isEmpty())
        <p>No hay productos registrados.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->NombreProducto }}</td>
                        <td>{{ $producto->Descripcion }}</td>
                        <td>{{ $producto->Precio }}</td>
                        <td>
                          @if ($producto->Foto)
                                <img src="{{ asset('storage/' . $producto->Foto) }}" width="100">
                            @else
                                <p>Sin foto</p>
                            @endif
                        </td>
                        <td>

                        <a href="https://wa.me/573243007626">hablar con el vendedor</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
       </table>
    @endif
</body>
</html>



