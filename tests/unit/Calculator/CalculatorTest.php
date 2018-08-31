<?php

use PHPUnit\Framework\TestCase;
use App\Calculator\Addition;
use App\Calculator\Division;
use App\Calculator\Calculator;

class CalculatorTest extends TestCase
{
   public function test_can_set_single_operation()
   {
        $addition = new Addition;
        $addition->setOperands([5, 10]);

        $calculator = new Calculator;
        $calculator->setOperation($addition);

        $this->assertCount(1, $calculator->getOperations());
   }

   
   public function test_can_set_multiple_operations()
   {
        $addition1 = new Addition;
        $addition1->setOperands([5, 10]);
        
        $addition2 = new Addition;
        $addition2->setOperands([2, 2]);

        $calculator = new Calculator;
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
   }


   public function test_operations_are_ignored_if_not_instance_of_operation_interface()
   {
        $addition = new Addition;
        $addition->setOperands([5, 10]);

        $calculator = new Calculator;
        $calculator->setOperations([$addition, 'cats', 'dogs']);

        $this->assertCount(1, $calculator->getOperations());
   }


    public function test_can_calculate_result()
    {
        $addition = new Addition;
        $addition->setOperands([5, 10]);

        $calculator = new Calculator;
        $calculator->setOperation($addition);

        $this->assertEquals(15, $calculator->calculate());
    }


    public function test_calculate_method_returns_multiple_results()
    {
        $addition = new Addition;
        $addition->setOperands([5, 10]); //15

        $division = new Division;
        $division->setOperands([50, 2]); //25

        $calculator = new Calculator;
        $calculator->setOperations([$addition, $division]);

        $this->assertInternalType('array', $calculator->calculate());
        $this->assertEquals(15, $calculator->calculate()[0]);
        $this->assertEquals(25, $calculator->calculate()[1]);
    }

}
?>
