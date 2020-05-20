<?php

namespace App\Rules;

use App\Models\Turno;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class disponible implements Rule
{
    protected $id;

    /**
     * Create a new rule instance.
     *
     * @param int $id
     * @return void
     */
    public function __construct($id)
    {
        $this->id=$id;
    }


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $horas = Turno::select('hora')->where('fecha',request('fecha'))->get();
        $id_usuario_turno = Turno::select('id')->where('fecha',request('fecha'))->where('hora',request('hora'))->get();

        if(!$horas->contains('hora','=',$value)){
            return true ;
        }elseif ($id_usuario_turno[0]->id != $this->id) {
            return false ;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Este horario está tomado.';
    }
}
