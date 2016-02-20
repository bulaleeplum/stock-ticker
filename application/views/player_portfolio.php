<div class="input-field col s12">
    <form method="GET" id="portfolio-form" action="/Player_Portfolio/getSpecificPortfolio">
        <select name="portfolio-select" onchange="this.form.submit()">
            <option value="" disabled selected></option>
            {options}
        </select>
    </form>
    <label class="active">View portfolio</label>
</div>
<div class='div-portfolio'>
<h3>Trading Activity</h3>
{trading_activity}
</div>
<div class='div-portfolio'>
<h3>Current Holdings</h3>
{holdings}
</div>
