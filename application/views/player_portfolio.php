<br><br>

<div class="container white-text">
    <h1 class="header center thin">{pagetitle}'s Portfolio</h1>
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
    <h4 class="header center thin">Trading Activity</h4>
    {trading_activity}
    <h4 class="header center thin">Current Holdings</h4>
    {holdings}
</div>