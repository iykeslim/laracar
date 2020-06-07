<?php

namespace App\Http\Controllers;

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
             <div onclick="getElementById(\'vehicle_types_id\').value = \'' . $row->tipo_veiculo . '\'; $(\'#cpuList\').fadeOut();">' . $row->tipo_veiculo . '</div>
             ';
            }

            $html .= '</div>';
            echo $html;
        }
    }
}
