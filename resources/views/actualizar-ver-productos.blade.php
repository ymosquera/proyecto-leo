<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
<p>ACTUALIZACIóN DE PRODUCTOS</p>
     <form action="{{ route('Actualizar.Producto', $producto->id)}}" method="POST" enctype="multipart/form-data" >
          @csrf
      <label for="NombreProducto">Nombre del producto</label>
      <input type="text" name="NombreProducto" name="NombreProducto" value="{{ old('nombre', $producto->NombreProducto) }}">
      <br>
      <label for="Descripcion">Descripcion del producto</label>
      <input type="text" name="Descripcion" name="Descripcion" value="{{ old('nombre', $producto->Descripcion) }}">
      <br>
      <label for="Foto">Foto del producto</label>
      <input type="file" name="Foto" name="Foto" accept=".jpg, .jpeg, .png, .gif" >
      <img src="{{ asset('storage/' . $producto->Foto) }}" width="100">
      <br>
      <label for="Estado">Estado del producto al publicar en la Web</label>
      <input type="text" name="Estado" name="Estado" value="{{ old('nombre', $producto->Estado) }}">
      <br>
      <label for="Precio">Precio del producto</label>
      <input type="number" name="Precio" name="Precio" value="{{ old('nombre', $producto->Precio) }}">
      <br>
     <br>
      <button type="submit">Enviar formulario</button>
     <br>
     <br>
     </form>
</body>
</html>


