<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class timeNotBeforeNow implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $horaSystema = date('H');
        $minutosSystema = date('i');
        $hora = request($attribute);
        $meridiano = substr($hora,6);
        $horaRequest = intval(substr($hora,0,2));
        $minutosRequest = intval(substr($hora,3,2));

        if(request('fecha')> date('Y-m-d')){
            return true;
        }

        if($meridiano=='PM'){
            if($horaRequest != 12){
                $horaRequest += 12;

            if($horaRequest > $horaSystema){
                return true;
            }

            if($horaRequest == $horaSystema && $minutosRequest > $minutosSystema){
                return true;
            }

            return false;
            }else{
                if($horaRequest > $horaSystema){
                    return true;
                }

                if($horaRequest == $horaSystema && $minutosRequest > $minutosSystema){
                    return true;
                }

                return false;
            }

        }else{
            if($horaRequest > $horaSystema){
                return true;
            }

            if($horaRequest == $horaSystema && $minutosRequest > $minutosSystema){
                return true;
            }

            return false;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'No se puede reservar una hora pasada.';
    }
}
