<?php

namespace App\Http\Controllers; // Gamitin ang namespace para sa controllers

use Illuminate\Http\Request; // Gamitin ang Request class para sa HTTP requests

class CalculationController extends Controller // Magdefine ng CalculationController na nag-extend ng base Controller
{
    public function compute($operation1, $val1, $val2, $operation2, $val3, $val4) // Magdefine ng compute method na tumatanggap ng anim na parameter
    {
        // I-convert ang mga value sa integer
        $val1 = (int)$val1;
        $val2 = (int)$val2;
        $val3 = (int)$val3;
        $val4 = (int)$val4;

        $error1 = null; // Maginitialize ng error1 bilang null
        $error2 = null; // Maginitialize ng error2 bilang null
        $result1 = null; // Maginitialize ng result1 bilang null
        $result2 = null; // Maginitialize ng result2 bilang null

        // Magdefine ng function para kalkulahin ang resulta base sa operation
        function calculateResult($operation, $num1, $num2, &$error)
        {
            if ($operation === 'add') { // Kung ang operation ay 'add', mag-add ng dalawang numero
                return $num1 + $num2;
            } elseif ($operation === 'subtract') { // Kung ang operation ay 'subtract', mag-subtract ng dalawang numero
                return $num1 - $num2;
            } elseif ($operation === 'multiply') { // Kung ang operation ay 'multiply', mag-multiply ng dalawang numero
                return $num1 * $num2;
            } elseif ($operation === 'divide') { // Kung ang operation ay 'divide', mag-divide ng dalawang numero
                if ($num2 == 0) { // Kung ang divisor ay zero, mag-set ng error
                    $error = "Error: Division by zero is not allowed!";
                    return null;
                }
                return $num1 / $num2;
            } else { // Kung hindi valid ang operation, mag-set ng error
                $error = "Error: Invalid operation!";
                return null;
            }
        }

        // Kalkulahin ang resulta para sa unang set ng operation at values
        $result1 = calculateResult($operation1, $val1, $val2, $error1);
        // Kalkulahin ang resulta para sa pangalawang set ng operation at values
        $result2 = calculateResult($operation2, $val3, $val4, $error2);

        // I-return ang view na 'compute' kasama ang mga kalkuladong value, resulta, at error
        return view('compute', compact('val1', 'val2', 'operation1', 'result1', 'error1', 'val3', 'val4', 'operation2', 'result2', 'error2'));
    }
}
