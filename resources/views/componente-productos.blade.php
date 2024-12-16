<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
<p>INSCRIPCION DE PRODUCTOS</p>
     <form action="{{ route('Crear.Producto')}}" method="POST" enctype="multipart/form-data" >
          @csrf
      <label for="NombreProducto">Nombre del producto</label>
      <input type="text" name="NombreProducto" name="NombreProducto">
      <br>
      <label for="Descripcion">Descripcion del producto</label>
      <input type="text" name="Descripcion" name="Descripcion">
      <br>
      <label for="Foto">Foto del producto</label>
      <input type="file" name="Foto" name="Foto" accept=".jpg, .jpeg, .png, .gif" >
      <br>
      <label for="Estado">Estado del producto al publicar en la Web</label>
      <input type="text" name="Estado" name="Estado">
      <br>
      <label for="Precio">Precio del producto</label>
      <input type="number" name="Precio" name="Precio">
      <br>
     <br>
      <button type="submit">Enviar formulario</button>
     <br>
     <br>
     </form>
</body>
</html>
