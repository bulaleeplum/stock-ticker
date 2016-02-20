<div class="input-field col s12">
    <form method="GET" id="portfolio-form" action="/Player_Portfolio/getSpecificPortfolio">
        <select name="portfolio-select" onchange="this.form.submit()">
            <option value="" disabled selected></option>
            {options}
        </select>
    </form>
    <label class="active">View portfolio</label>
</div>
<!--
<section id="section-trading-activity">
    <h4>Trading Activity</h4>
</section>
<section id="section-current-holdings">
    <h4>Current Holdings</h4>
</section>
-->
{trading_activity}
{holdings}
</body>
</html>
