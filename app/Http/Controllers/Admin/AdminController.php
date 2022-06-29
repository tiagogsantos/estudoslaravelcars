<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiCar\ApiCarController;
use App\Http\Controllers\Controller;
use App\Models\Marcas;
use GuzzleHttp\Client;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Retorna a página index
    public function index()
    {
        return view('admin.index');
    }

    // Criação de marcas
    public function create()
    {
        return view('admin.carmanufacturers');
    }

    // Metodo para a criação de marcas
    public function store(Request $request)
    {
        $retorno = ['error' => ''];

        $atencaoResult = ['atencao' => ''];

        $dadosname = $request->input('name');

        $comparaName = DB::table('marcas')->where('name', $dadosname)->count();

        if ($comparaName > 0) {
            $atencaoResult['mensagem'] = 'Já existe um cadastro com esse nome em nossa base de dados!';
            return response()->json($atencaoResult);
        } else {
            $marca = Marcas::insert([
                'name' => $request->input('name')
            ]);

            if (!$marca) {
                $retorno['mensagem'] = 'Ops, não foi possível cadastrar a marca!';
                return response()->json($retorno);
            }

            return response()->json(['sucesso' => 'Marca foi cadastrada com sucesso!']);
        }
    }

    // Página para a publicação de veiculos
    public function createCarModelos(Request $request)
    {
        $brands = ApiCarController::getApiCarManufacturers();

        return view('admin.carmodels', [
            'brands' => $brands
        ]);
    }

    public function storeModelos(Request $request)
    {
        dd($request->all());
    }

}
