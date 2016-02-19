<div class="input-field col s3">
    <form method="GET" id="stock-form" action="/Stock_History/getSpecificStock">
        <select name="stock_select" onchange="this.form.submit()">
            <option value="" disabled selected>Choose your option</option>
            <option value="BOND">BOND</option>
            <option value="GOLD">GOLD</option>
            <option value="GRAN">GRAN</option>
            <option value="IND">IND</option>
            <option value="OIL">OIL</option>
            <option value="TECH">TECH</option>
        </select>
    </form>
    <label class="active">Stock Options</label>
</div>
{table}