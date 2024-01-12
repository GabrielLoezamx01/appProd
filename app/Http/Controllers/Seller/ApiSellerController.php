<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sucursal;
use Illuminate\Support\Facades\Auth;

class ApiSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seller = Sucursal::where('usuario_id', Auth::id())->get();
        if (count($seller)) {
            return $seller;
        } else {
            return response()->json(['message' => 'Sin Sucursales Registradas'], 201);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'info' => 'required|string',
            'postal' => 'required|numeric',
            'Dirrecion' => 'required|string',
            'estado' => 'required|string',
            'ciudad' => 'required|string',
            'Correo' => 'required|email',
        ]);
        $sucursal = new Sucursal([
            'nombre' => strtoupper($request->input('name')),
            'acerca_de_nosotros' => $request->input('info'),
            'codigo_postal' => $request->input('postal'),
            'direccion' => $request->input('Dirrecion'),
            'estado' => $request->input('estado'),
            'ciudad' => $request->input('ciudad'),
            'facebook' => $request->input('Facebook'),
            'tiktok' => $request->input('Tiktok'),
            'instagram' => $request->input('Instagram'),
            'twitter' => $request->input('X'),
            'whatsapp' => $request->input('Whatsapp'),
            'correo' => $request->input('Correo'),
            'rango_estrellas' => 0,
            'usuario_id' => Auth::id()
        ]);
        $sucursal->save();
        return response()->json(['message' => '¡Validación exitosa y almacenamiento realizado con éxito!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Sucursal::where('usuario_id', Auth::id())
            ->where('id', $id)
            ->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return match ($request['section']) {
            1 => $this->updateRedes($request->all(), $id),
            2 => $this->ClockSellerGateway($request->all(), $id),
            3 => $this->DataSeller($request->all(), $id),
            default => ['error' => 'Ocurrio un error en la section']
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    private function updateRedes(array $request, string  $id)
    {
        $seller  = Sucursal::where('usuario_id', Auth::id())->where('id', $id)->first();
        if ($seller) {
            $req  = $this->requestUpdateRedes($request);
            $seller->update($req);
            return response()->json(['message' => 'La sucursal se actualizó correctamente']);
        }
        return response()->json(['message' => 'La sucursal no se encontró o no tienes permiso para actualizarla'], 404);
    }
    private function DataSeller(array $request, string  $id)
    {
    }


    private function ClockSellerGateway(array $request, string $id)
    {
        $seller  = Sucursal::where('usuario_id', Auth::id())->where('id', $id)->first();
        if ($seller) {
            $req = match ($request['type']) {
                'on' =>  $this->requestClockOn($request['id'], $request['value']),
                'off' => $this->requestClockOff($request['id'], $request['value']),
                default => ['error' => 'Ocurrio un error en la section']
            };
            $seller->update($req);
            return response()->json(['message' => 'La sucursal se actualizó correctamente']);
        }
        return response()->json(['message' => 'La sucursal no se encontró o no tienes permiso para actualizarla'], 404);
    }

    private function requestUpdateRedes(array $request)
    {
        return [
            'facebook'  => $request['Facebook'],
            'tiktok'    => $request['Tiktok'],
            'instagram' => $request['Instagram'],
            'twitter'   => $request['X'],
            'whatsapp'  => $request['Whatsapp'],
            'correo'    => $request['Correo'],
        ];
    }
    private function requestClockOn($day, $time)
    {
        $formatOnDays =  [
            '1' => 'lunes_inicio',
            '2' => 'martes_inicio',
            '3' => 'miercoles_inicio',
            '4' => 'jueves_inicio',
            '5' => 'viernes_inicio',
            '6' => 'sabado_inicio',
            '7' => 'domingo_inicio',
        ];
        $requestDays = $formatOnDays[$day];
        return [
            $requestDays => $time
        ];
    }

    private function requestClockOff($day, $time)
    {
        $formatOnDays =  [
            '1' => 'lunes_fin',
            '2' => 'martes_fin',
            '3' => 'miercoles_fin',
            '4' => 'jueves_fin',
            '5' => 'viernes_fin',
            '6' => 'sabado_fin',
            '7' => 'domingo_fin',
        ];
        $requestDays = $formatOnDays[$day];
        return [
            $requestDays => $time
        ];
    }

    private function requestDataSeller(array $request)
    {
        return  [
            'nombre'            => $request['nombre'],
            'direccion'         => $request['direccion'],
            'codigo_postal'     => $request['codigo_postal'],
            'imagen_url'        => $request['imagen_url'],
            'img_portada'       => $request['img_portada'],
            'estado'            => $request['estado'],
            'acerca_de_nosotros' => $request['acerca_de_nosotros'],
            'ciudad'            => $request['ciudad'],
        ];
    }
}
