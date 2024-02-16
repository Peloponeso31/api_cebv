<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Validation\ValidationException;

class PersonaController extends Controller
{
    /**
     * Campos excluidos para la consulta de informacion sobre personas.
     */
    private $camposExcluidos = [
        'paginacion',
        'devolver_con'
    ];

    /**
     * Campos que siempre se validaran.
     */
    private $default = [
        'nombre' => ['alpha:ascii'],
        'apellido_paterno' => ['alpha:ascii'],
        'apellido_materno' => ['alpha:ascii'],
        'fecha_nacimiento' => ['date'],
        'curp' => ['regex:/^([A-ZÑ][AEIOUXÁÉÍÓÚ][A-ZÑ]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/'],
        'ocupacion' => ['alpha'],
        'sexo_al_nacer' => [],
        'genero' => [],
    ];

    /**
     * Campos por los cuales se va a excluir un resultado de busqueda.
     */
    private $excluirPor = [
        'not_nombre' => [],
        'not_apellido_paterno' => [],
        'not_apellido_materno' => [],
        'not_fecha_nacimiento' => [],
        'not_ocupacion' => [],
        'not_genero' => [],
    ];

    private $paginacionRelaciones = [
        'paginacion' => ['numeric', 'min:1'],
        'devolver_con' => ['regex:/^(?:[a-zA-Z\s]+,)*[a-zA-Z\s]+[a-zA-Z\s]$/'],
    ];

    /**
     * Valida si los campos recibidos por la API son los correctos,
     * ignora el resto de campos que no se encuentren listados.
     * 
     * @param Request $request El request que se recibe por HTTP.
     * @param bool $alMenosUnCampo Si se necesita llenar al menos un campo, poner este valor como verdadero. Puede devolver un ValidationException.
     * @param bool $esConsulta Si se hara una consulta especificar este argumento como verdadero, esto influye en que reglas se aplicaran para la validacion.
     * 
     * @return array Campos validados.
     * @throws ValidationException Razon por la cual no se cumplen los criterios.
     */
    private function validarCamposPersona(Request $request, bool $alMenosUnCampo = False, bool $esConsulta = False)
    {
        $reglas = $this->default;
        if ($esConsulta) {
            $reglas = array_merge($this->default, $this->excluirPor, $this->paginacionRelaciones);
        }

        $campos = $request->validate($reglas);

        if ($alMenosUnCampo && count($campos) == 0) {
            throw ValidationException::withMessages(['no_hay_campos' => 'Se tiene que llenar al menos un campo valido.']);
        }

        if (array_key_exists('devolver_con', $campos)) {
            $campos['devolver_con'] = array_map('trim', explode(',', $campos['devolver_con']));
        }

        return $campos;
    }

    public function consultar(Request $request): JsonResponse
    {
        $campos = $this->validarCamposPersona($request, false, true);
        $queryArgs = [];
        $relaciones = $campos['devolver_con'] ?? [];

        foreach (array_keys($campos) as $campo) {
            if (!in_array($campo, $this->camposExcluidos)) {
                if (substr($campo, 0, 4) == "not_") {
                    array_push($queryArgs, [substr($campo, 4), 'NOT LIKE', '%' . $campos[$campo] . '%']);
                } else {
                    array_push($queryArgs, [$campo, 'LIKE', '%' . $campos[$campo] . '%']);
                }
            }
        }

        $query = Persona::where($queryArgs)->with($relaciones);
        if (array_key_exists('paginacion', $campos)) {
            return response()->json($query->paginate($campos['paginacion'], ['*'], 'pagina'));
        }
        return response()->json($query->get());
    }

    public function crearVarios(Request $request): JsonResponse
    {
        $personas = [];
        $response = [];
        $cast = new Request();

        // Toda la lista de personas debe ser valida para poder proceder a la insercion
        foreach ($request->all() as $persona) {
            array_push($personas, $this->validarCamposPersona($cast->replace($persona), true, false));
        }

        foreach ($personas as $persona) {
            array_push($response, Persona::create($persona));
        }

        return response()->json($response);
    }

    public function obtener(Request $request)
    {
        $validado = $request->validate(['id' => 'required|numeric|min:1']);
        return Persona::findOrFail($validado['id']);
    }

    public function crear(Request $request)
    {
        $campos = $this->validarCamposPersona($request, true, false);
        $persona = Persona::create($campos);
        return response()->json($persona);
    }

    public function borrar(Request $request)
    {
        $validado = $request->validate(['id' => 'required|numeric|min:1']);
        if (Persona::find($validado['id'])->delete()) {
            return response()->json(['mensaje' => 'Borrado correcto']);
        }
    }
}
