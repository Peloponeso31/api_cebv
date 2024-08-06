<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (QueryException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => 'Error interno SQL.',
                    'causa' => get_class($e),
                    'archivo' => $e->getFile(),
                    'linea' => $e->getLine(),
                    'sentencia' => $e->getSql(),
                    'info_exepcion_interno' => $e,
                    'mensaje_excepcion_interno' => $e->getMessage(),
                    'error_detectado_en' => $e->getBindings(),
                    //'request' => $request->all()
                ], 500);
            }
        });

        $this->renderable(function(ValidationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => 'Error de validación.',
                    'causa' => get_class($e),
                    'info_excepcion_interno' => $e->getMessage(),
                    'mensaje_excepcion_interno' => $e->getMessage(),
                    'campos_faltantes' => $e->validator->errors(),
                    //'request' => $request->all()
                ], 422);
            }
        });

        $this->renderable(function(NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => 'No se ha encontrado el recurso solicitado.',
                    'causa' => get_class($e),
                    'info_excepcion_interno' => $e->getMessage(),
                    'mensaje_excepcion_interno' => $e->getMessage(),
                    //'request' => $request->all()
                ], 404);
            }
        });

        $this->renderable(function(RelationNotFoundException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => 'La entidad consultada: "'.$e->model.'" no tiene relación con: "'.$e->relation.'"',
                    'causa' => get_class($e),
                    'info_excepcion_interno' => $e->getMessage(),
                    'mensaje_excepcion_interno' => $e->getMessage(),
                    //'request' => $request->all()
                ], 404);
            }
        });

        $this->renderable(function(AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => 'Error de autenticación.',
                    'causa' => get_class($e),
                    'info_excepcion_interno' => $e->getMessage(),
                    'mensaje_excepcion_interno' => $e->getMessage(),
                    'ir_a' => $e->redirectTo(),
                    //'request' => $request->all()
                ], 401);
            }
        });

        $this->renderable(function(Throwable $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => 'Error general.',
                    'causa' => get_class($e),
                    'archivo' => $e->getFile(),
                    "linea" => $e->getLine(),
                    'info_excepcion_interno' => $e->getMessage(),
                    'mensaje_excepcion_interno' => $e->getMessage(),
                    //'request' => $request->all()
                ], 400);
            }
        });
    }
}
