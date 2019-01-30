<?php

/**
 * Created by PhpStorm.
 * User: kcavi
 * Date: 28.01.2019
 * Time: 22:32
 */
namespace Classes\Insurance;
class Calculator
{
    public $value;
    public $tax_percentage;
    public $comission;
    public $instalments;
    public $policyPercentage;
    public $basePrice;

    /**
     * Calculator constructor.
     * @param $value
     * @param $tax_percentage
     * @param $instalments
     * @param string $comission
     */
    public function __construct($value,$tax_percentage,$instalments)
    {
        $this->value =          $value;
        $this->tax_percentage = $tax_percentage;
        $this->instalments =    $instalments;
        $this->policyPercentage = config('policyPercentage');

        return $this->basePrice = floatval(($this->value*$this->policyPercentage)/100);
    }

    public function setComission($comission)
    {
        $this->comission = $comission;
    }
    /**
     * @return float|int
     * Calculate comission
     */
    public function calculateComission()
    {
        return ($this->basePrice*$this->comission)/100;
    }

    /**
     * @return float|int
     * Calculate tax
     */
    public function calculateTax()
    {
        return ($this->basePrice*$this->tax_percentage)/100;
    }

    /**
     * @return float|int
     * Calculate total
     */
    public function total()
    {
        $total = ($this->calculateTax() + $this->calculateComission() + $this->basePrice);
        return $total;
    }

    /**
     * @return array
     * Calculate instalments
     */
    public function calculateInstalment()
    {
        $instalments_array =    [];
        $basePrice =            $this->basePrice/$this->instalments;
        $count_decimals =       strlen(substr(strrchr($basePrice, "."), 1));
        $instalments =          $this->instalments;

        #if number of decimals is more than 2 then will calculate base price, tax, comission and total per instalment.
        #But the numbers will be more or less than total sum
        #That is why will find difference between instalments*sum and grand policy total
        #And substract that amount from last instalment
        if($count_decimals > 2) {
            $basePrice =            number_format($this->basePrice/$instalments,2);
            $calculatedTax =        number_format($this->calculateTax()/$instalments,2);
            $calculatedComission =  number_format($this->calculateComission()/$instalments,2);
            $total =                $basePrice+$calculatedTax+$calculatedComission;

            for($i=1; $i<=$instalments;$i++) {
                $instalments_array[$i] = [
                    'basePrice' =>           $basePrice,
                    'calculatedTax' =>       $calculatedTax,
                    'calculatedComission' => $calculatedComission,
                    'total' =>               $total
                ];
            }

            #Calculate sum and find difference between grand policy total and sum
            $instalmentsTillLast =  $instalments-1; // for sum (multiply) amount of tax, comission, base price till last instalment
            $sum =                  $total*$instalments;

            if($sum > $this->total() || $sum < $this->total()) {
                $amount = number_format(($sum-$this->total()),2);
            } else {
              $amount = 0;
            }

            $lastTotal =        number_format(($total-$amount),2);
            $lastBasePrice =    number_format(($this->basePrice-($basePrice*$instalmentsTillLast)),2);
            $lastTax =          number_format(($this->calculateTax()-$calculatedTax*$instalmentsTillLast),2);
            $lastComission =    number_format(($this->calculateComission()-$calculatedComission*$instalmentsTillLast),2);

            # Setting last instalment values
            $instalments_array [$instalments] = [
                'basePrice' =>           $lastBasePrice,
                'calculatedTax' =>       $lastTax,
                'calculatedComission' => $lastComission,
                'total' =>               $lastTotal
            ];
        }
        # if number of decimals is less than 2
        else {
            $basePrice =            $this->basePrice/$instalments;
            $calculatedTax =        $this->calculateTax()/$instalments;
            $calculatedComission =  $this->calculateComission()/$instalments;
            $total =                $basePrice+$calculatedTax+$calculatedComission;

            for($i=1; $i<=$instalments;$i++) {
                $instalments_array [$i] = [
                    'basePrice' =>           $basePrice,
                    'calculatedTax' =>       $calculatedTax,
                    'calculatedComission' => $calculatedComission,
                    'total' =>               $total
                ];
            }
        }

        return $instalments_array;
    }

}