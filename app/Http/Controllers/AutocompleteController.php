<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\ModelType;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    public function vehicles(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = VehicleType::where('tipo_veiculo', 'LIKE', "%${query}%")->get('tipo_veiculo');

            $html = '<div id="autocomplete-vehicle-list" class="autocomplete-items">';
            foreach ($data as $row) {
                $html .= '
             <div onclick="getElementById(\'vehicle_types_id\').value = \'' . $row->tipo_veiculo . '\'; $(\'#vehicleList\').fadeOut();">' . $row->tipo_veiculo . '</div>
             ';
            }

            $html .= '</div>';
            echo $html;
        }
    }

    public function marks(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = Marca::where('tipo_marca', 'LIKE', "%${query}%")->get('tipo_marca');

            $html = '<div id="autocomplete-marca-list" class="autocomplete-items">';
            foreach ($data as $row) {
                $html .= '
             <div onclick="getElementById(\'marcas_id\').value = \'' . $row->tipo_marca . '\'; $(\'#markList\').fadeOut();">' . $row->tipo_marca . '</div>
             ';
            }

            $html .= '</div>';
            echo $html;
        }
    }

    public function models(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = ModelType::where('tipo_modelo', 'LIKE', "%${query}%")->get('tipo_modelo');

            $html = '<div id="autocomplete-modelo-list" class="autocomplete-items">';
            foreach ($data as $row) {
                $html .= '
             <div onclick="getElementById(\'model_types_id\').value = \'' . $row->tipo_modelo . '\'; $(\'#modelList\').fadeOut();">' . $row->tipo_modelo . '</div>
             ';
            }

            $html .= '</div>';
            echo $html;
        }
    }
}
