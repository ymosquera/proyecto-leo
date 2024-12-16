<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Producto;
use Illuminate\Http\Request;


class ProductosController extends Controller
{
    public function create()
    {
        return view('productos.create');
    }

    // Almacenar el producto con imagen
    public function store(Request $request)
    {
        $request->validate([
            'NombreProducto' => 'nullable|string|max:255',
            'Descripcion' => 'nullable|string',
            'Foto' => 'required|image|max:2048',
            'Precio' => 'nullable|string',
            'Estado' => 'nullable|string|max:255',
        ]);

        //Subir la imagen

        $RutaFoto = $request->file('Foto')->store('imagenes', 'public');
        //Crear el producto

        Producto::create([
            'NombreProducto' => $request->NombreProducto,
            'Descripcion' => $request->Descripcion,
            'Foto' => $RutaFoto,
            'Precio' => $request->Precio,
            'Estado' => $request->Estado,
        ]);

        return redirect()->route('Formulario.Producto');
    }

    public function index()
    {
        $productos = Producto::all();
        return view('ver-productos', compact('productos'));
    }

    // Mostrar el formulario de edición
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('actualizar-ver-productos', compact('producto'));
    }

    // Actualizar el producto
    public function update(Request $request, $id)
    {

        $producto = Producto::find($id);

        $producto->NombreProducto = $request->input('NombreProducto');
        $producto->Descripcion = $request->input('Descripcion');
        $producto->Precio = $request->input('Precio');
        $producto->Estado = $request->input('Estado');

        if ($request->hasFile('Foto')) {
            // Eliminar la imagen anterior
            if ($producto->Foto) {

                $filePath = public_path('storage/' . $producto->Foto);

                if (file_exists($filePath)) {
                    unlink($filePath);
                }

                $fotoPath = $request->file('Foto')->store('imagenes', 'public');
                $producto->Foto = $fotoPath;
            }
        }

        // Actualizar el producto
        $producto->save();

        return redirect()->route('Ver.Producto');
    }
    // Eliminar un producto
    public function destroy($id)
    {

        $producto = Producto::findOrFail($id);

        if ($producto->Foto) {
            $filePath = public_path('storage/' . $producto->Foto);

            if (file_exists($filePath)) {
                unlink($filePath);
            } else {

                echo "el archivo ha sido eliminado";
            }
        }

        // Eliminar el registro de la base de datos
        $producto->delete();

        return redirect()->route('Ver.Producto');
    }


    public function view()
    {
        $productos = Producto::all();
        return view('ver-productos-clientes', compact('productos'));
    }
}
