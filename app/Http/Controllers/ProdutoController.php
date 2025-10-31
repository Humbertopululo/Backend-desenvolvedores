<?php



namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
          // Se não houver produtos, cria alguns automaticamente
    if (\App\Models\Produto::count() === 0) {
        \App\Models\Produto::insert([
            [
                'nome' => 'Cadeira Gamer',
                'preco' => 150000,
                'descricao' => 'Cadeira ergonômica com apoio de braço e couro sintético.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Headset Bluetooth',
                'preco' => 55000,
                'descricao' => 'Headset sem fio com microfone e som 3D.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Teclado USB',
                'preco' => 20000,
                'descricao' => 'Teclado simples e silencioso.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    // Retorna todos os produtos
    return response()->json(\App\Models\Produto::all());
    }

    public function store(Request $request)
    {
        $produto = Produto::create($request->all());
        return response()->json($produto, 201);
    }

    public function show($id)
    {
        return response()->json(Produto::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return response()->json($produto);
    }

    public function destroy($id)
    {
        Produto::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
