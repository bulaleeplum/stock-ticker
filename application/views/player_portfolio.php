<br><br>

<div class="container white-text">
    <div class="input-field col s12">
        <form method="GET" id="portfolio-form" action="/Player_Portfolio/getSpecificPortfolio">
            <select name="portfolio-select" onchange="this.form.submit()">
                <option value="" disabled selected></option>
                {options}
            </select>
        </form>
        <label class="active">View portfolio</label>
    </div>
    {message}
    {trading_activity}
    {holdings}
</div>