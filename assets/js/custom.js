/**
 * Created by kcavi on 28.01.2019.
 */
$(document).ready(function () {
    var $comission_amount = $('.comission_amount');
    var $comission = $('.comission');
    var $base_premium_amount = $('.base_premium_amount');
    var $base_premium = $('.base_premium');
    var $total_cost = $('.total_cost');
    var $car_value = $('.car_value');
    var $tax_value = $('.tax_value');
    var $tax_amount = $('.tax_amount');
    var $tax = $('.tax');
    var $policy_amount = $('.policy_amount');

    var $calculator = $('#calculator');
    $calculator.on('submit', function () {
        var $this = $(this);
        $.ajax({
            url: $this.attr('action'),
            method: $this.attr('method'),
            data: $this.serializeArray(),
            dataType: 'json',
            error: function (data) {
                alert('Problem, error');
            },
            success: function (data) {
                // Set text of related elements with data which we get from backend
                $base_premium.text(data.policyPercentage+'%');
                $comission.text(data.comission+'%')
                $policy_amount.text($car_value.val());
                $base_premium_amount.text(data.basePrice.toFixed(2));
                $comission_amount.text(data.calculatedComission.toFixed(2));
                $tax.text($tax_value.val()+'%');
                $tax_amount.text(data.calculatedTax.toFixed(2));
                $total_cost.text(data.total.toFixed(2));
                var $instalmentsJson = data.calculatedInstalments;
                //convert json object to array
                var $instalments = Object.keys($instalmentsJson).map((key) => $instalmentsJson[key]);
                //count array
                var $instalmentsCount = $instalments.length;
                // remove hidden class form instalment elements
                $('.instalment').removeClass('hidden');

                //loop and set text to related instalment elements
                for(i=0;i<12;i++) {
                    u = Number(i)+1;
                    if(i<$instalmentsCount) {
                        $('.tr_base').find('.instalment_'+u).text(parseFloat($instalments[i].basePrice).toFixed(2));
                        $('.tr_comission').find('.instalment_'+u).text(parseFloat($instalments[i].calculatedComission).toFixed(2));
                        $('.tr_tax').find('.instalment_'+u).text(parseFloat($instalments[i].calculatedTax).toFixed(2));
                        $('.tr_total').find('.instalment_'+u).text(parseFloat($instalments[i].total).toFixed(2));
                    } else {
                        $('.instalment_'+u).addClass('hidden');
                    }

                }

            },
            fail: function (data) {
                alert('Problem, fail');
            }
        });

        return false;
    });

});