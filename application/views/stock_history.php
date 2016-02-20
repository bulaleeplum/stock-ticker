<br><br>

<div class="container white-text">
    <div class="input-field col s12 m4 l4">
        <form method="GET" action="/Stock_History/getSpecificStock">
            <select name="stock_select" onchange="this.form.submit()">
                <option value="" disabled selected>Choose your option</option>
                {stocks}
            </select>
        </form>
        <label class="active">Stock Options</label>
    </div>
    <br><br>
    {table}
</div>