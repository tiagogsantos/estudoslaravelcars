<?php

namespace App\Http\Controllers\ApiCar;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiCarController extends Controller
{
    // Traz a listagem de marcas de carros via api
    public function getApiCarManufacturers()
    {
        $client = new Client();

        $method = 'GET';

        $url = 'https://parallelum.com.br/fipe/api/v1/carros/marcas';

        $headers = [
            'Accept' => 'application/json'
        ];

        $responseRetorno = $client->request($method, $url, [
            'headers' => $headers
        ]);

        return json_decode($responseRetorno->getBody(), true);
    }

    // Traz a listagem de veiculos atrelado a marca
    public function getApiModels(Request $request)
    {
        $id = $request->input('idMarca');

        $client = new Client();

        $url = 'https://parallelum.com.br/fipe/api/v1/carros/marcas/' . $id . '/modelos';

        $method = 'GET';

        $headers = [
            'Accept' => 'application/json'
        ];

        $responseModels = $client->request($method, $url, [
            'headers' => $headers
        ]);

        return json_decode($responseModels->getBody(), true)['modelos'];
    }

    // Traz a listagem dos anos do veiculo
    public function getApiAno(Request $request)
    {
        $id = $request->input('idMarca');

        $idModelo = $request->input('idModelo');

        $cliente = new Client();

        $url = 'https://parallelum.com.br/fipe/api/v1/carros/marcas/' . $id . '/modelos/' . $idModelo . '/anos';

        $method = 'GET';

        $headers = [
            'Accept' => 'application/json'
        ];

        $responseApiAno = $cliente->request($method, $url, [
            'headers' => $headers
        ]);

        return json_decode($responseApiAno->getBody(), true);
    }

    // Traz a listagem dos detalhes do veiculo
    public function getDetailsCar(Request $request)
    {
        $id = $request->input('idMarca');

        $idModelo = $request->input('idModelo');

        $idAno = $request->input('idAno');

        $cliente = new Client();

        $url = 'https://parallelum.com.br/fipe/api/v1/carros/marcas/' . $id . '/modelos/' . $idModelo . '/anos/' . $idAno . '';

        $method = 'GET';

        $headers = [
            'Accept' => 'application/json'
        ];

        $responseApiDetails = $cliente->request($method, $url, [
            'headers' => $headers
        ]);

        return json_decode($responseApiDetails->getBody(), true);
    }
}
