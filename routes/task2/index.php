<div class="container">
    <div class="starter-template">
        <h1>Task 2 - Calculator</h1>
        <form method="post" action="/?route=task2/post" id="calculator">
            <div class="form-group col-lg-4 col-md-4">
                <label for="value">Estimated value of car (100 - 100000 EUR)</label>
                <input type="number" class="form-control car_value" name="value" value="" min="100" max="100000">
            </div>
            <div class="form-group col-lg-4 col-md-4">
                <label for="tax">Tax percentage (0 - 100%)</label>
                <input type="number" class="form-control tax_value" name="tax" value="" min="0" max="100">
            </div>
            <div class="form-group col-lg-4 col-md-4">
                <label for="instalments">Number of instalments</label>
                <input type="number" class="form-control" name="instalments" value="" min="1" max="12">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Calculate</button>
            </div>
        </form>

        <hr>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead">
                    <th></th>
                    <th>Policy</th>
                    <?php for($i=1;$i<=12;$i++): ?>
                    <th class="instalment instalment_<?=$i?> hidden">Instalment <?=$i?></th>
                    <?php endfor; ?>
                </thead>
                <tbody>
                    <tr class="value">
                        <td>Value</td>
                        <td class="tr_policy"><span class="policy_amount">0</span></td>
                        <?php for($i=1;$i<=12;$i++): ?>
                            <td class="instalment instalment_<?=$i?> hidden"></td>
                        <?php endfor; ?>
                    </tr>
                    <tr class="tr_base">
                        <td>Base premium(<span class="base_premium">0%</span>)</td>
                        <td><span class="base_premium_amount">0</span></td>
                        <?php for($i=1;$i<=12;$i++): ?>
                            <td class="instalment instalment_<?=$i?> hidden">Instalment <?=$i?></td>
                        <?php endfor; ?>
                    </tr>
                    <tr class="tr_comission">
                        <td>Comission(<span class="comission">0%</span>)</td>
                        <td><span class="comission_amount">0</span></td>
                        <?php for($i=1;$i<=12;$i++): ?>
                            <td class="instalment instalment_<?=$i?> hidden">Instalment <?=$i?></td>
                        <?php endfor; ?>
                    </tr>
                    <tr class="tr_tax">
                        <td>Tax(<span class="tax">0%</span>)</td>
                        <td><span class="tax_amount">0</span></td>
                        <?php for($i=1;$i<=12;$i++): ?>
                            <td class="instalment instalment_<?=$i?> hidden">Instalment <?=$i?></td>
                        <?php endfor; ?>
                    </tr>
                    <tr class="tr_total">
                        <td>Total cost</td>
                        <td><span class="total_cost">0</span></td>
                        <?php for($i=1;$i<=12;$i++): ?>
                            <td class="instalment instalment_<?=$i?> hidden">Instalment 1</td>
                        <?php endfor; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div><!-- /.container -->