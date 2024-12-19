<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
    <h1>Ver todos los productos</h1>

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
                    <th>Eliminar</th>
                    <th>Actualizar</th>
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
                <form action="{{ route('Eliminar.Producto', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                    @csrf
                   <button type="submit" style="color: red;">Eliminar</button>

              </form>
                   </td>
              <td>
                  <form action="{{route('Ver.Actualizar.Producto', $producto->id) }}" method="GET">
                      <button type="submit" style="color: blue;">Actualizar</button>
                </form>
            </td>
                    </tr>
                @endforeach
            </tbody>
       </table>
    @endif
</body>
</html>




