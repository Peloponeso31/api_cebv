namespace App\Http\Controllers;

use App\Models\Reportes\Relaciones\Desaparecido;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentoController extends Controller
{
    public function informeInicio(string $desaparecidoId)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecidoId);
        $reporte = $desaparecido->reporte;
        $reportante = $reporte->reportantes->first;
        $folio = Folio::where('reporte_id', $reporte->id)
            ->where('persona_id', $desaparecido->persona->id)
            ->first();

        $hora = now()->format('H:i');
        $fecha = now()->locale('es')->isoFormat('D [de] MMMM [del] YYYY');
        $nombreUsuario = 'Jonatan Luna Franco'; // TODO: Hacer esto dinámico
        $nombrePuesto = 'Ingeniero'; // TODO: Hacer esto dinámico
        $resultadoRND = 'NEGATIVO';


        return Pdf::loadView("reportes.documentos.informe-inicio", [
            'desaparecido' => $desaparecido,
            'reporte' => $reporte,
            'reportante' => $reportante,
            'folio' => $folio,
            'hora' => $hora,
            'fecha' => $fecha,
            'nombreUsuario' => $nombreUsuario,
            'nombrePuesto' => $nombrePuesto,
            'resultadoRND' => $resultadoRND,
        ])->stream();
    }

    public function fichaBusquedaInmediata(string $desaparecido)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecido);

        // TODO: Nicolas: El que esta bien es el copy, el que generes renombralo de manera que tenga sentido
        return Pdf::loadView('reportes.ficha_bi_copy')->stream();
    }
}
