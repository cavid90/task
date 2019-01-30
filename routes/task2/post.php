<?php
$value       = array_key_exists('value',$_POST) ? intval($_POST['value']) : 0;
$tax         = array_key_exists('tax', $_POST) ? intval($_POST['tax']) : 0;
$instalments = (array_key_exists('instalments',$_POST) && intval($_POST['instalments']) > 0 && intval($_POST['instalments']) < 13) ? intval($_POST['instalments']) : 1;

$calculator = new \Classes\Insurance\Calculator($value, $tax, $instalments);
$calculator->setComission(config('comission')); // setting comission to 17%
$data = [
    'basePrice'             => $calculator->basePrice,
    'calculatedComission'   => $calculator->calculateComission(),
    'calculatedTax'         => $calculator->calculateTax(),
    'total'                 => $calculator->total(),
    'calculatedInstalments' => $calculator->calculateInstalment(),
    'policyPercentage'      => $calculator->policyPercentage,
    'comission'             => $calculator->comission
];

http_response_code(200);
echo json_encode($data);