<?php
/**
 * Policy percentage according to day of the week. On fridays from 15 to 20 oclock is 13%, another time 11%
 * Attention ! I could write it in Calculator __construct method. But as it is small piece of code I have written it here
 * to keep Calculator class more simple
 */
$dayOfTheWeek       = date('w');
$hour               = date('H');
$policyPercentage   = ($dayOfTheWeek == 5 && ($hour >= 15 && $hour <= 20)) ? 13 : 11;

return [
    /**
     * Comission in percent
     */
    'comission'      => 17,

    /**
     * Policy percentage
     */
    'policyPercentage' => $policyPercentage
];