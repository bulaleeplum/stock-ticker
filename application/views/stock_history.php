<div class="input-field col s3">
    <form method="GET" id="stock-form" action="/Stock_History/getSpecificStock">
        <select name="portfolio-select" onchange="this.form.submit()">
            <option value="" disabled selected></option>
            {stocks}
        </select>
    </form>
    <label class="active">Stock Options</label>
</div>
{table}