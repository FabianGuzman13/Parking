<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReporteController extends Controller
{
    public function descargarReporte()
    {
        $filename = 'reporte_ingresos_' . now()->format('Ymd_His') . '.csv';

        $response = new StreamedResponse(function () {
            $handle = fopen('php://output', 'w');
            // Encabezados del CSV
            fputcsv($handle, ['ID', 'Ticket', 'Fecha y Hora']);

            // Obtén los datos (ajusta el nombre de la tabla y columnas)
            $ingresos = DB::table('ingresos')->get();

            foreach ($ingresos as $ingreso) {
                fputcsv($handle, [
                    $ingreso->id,
                    $ingreso->ticket,
                    $ingreso->created_at,
                ]);
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="'.$filename.'"');

        return $response;
    }
}