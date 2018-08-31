<?php

namespace App\Calculator;
use App\Calculator\Exceptions\NoOperandsException;

//refatored to add 'implements OperationInterface' after creating that interface
class Addition implements OperationInterface
{
    protected $operands;

    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }

    
    public function calculate()
    {

        if(count($this->operands) === 0){
            throw new NoOperandsException;
        }


        /*
        $result = 0;

        foreach ($this->operands as $operand) {
            $result += $operand;
        }

        return $result;
        */
        //refactor to

        return array_sum($this->operands);
    }
}




?>