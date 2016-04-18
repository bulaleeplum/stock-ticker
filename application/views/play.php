<div class="container white-text">
    <div class="section">
        <div class="container">
            <h4 class="header ">{username}'s Portfolio</h3>
            <h5 class="header  thin">Cash:   {playercash}</h4>
            <h5 class="header  thin">Equity:   {playerequity}</h4>
            <br>
            <h4 class="header  thin">Trading Activity</h4>
            {trading_activity}
<!--             <h4 class="header center thin">Current Holdings</h4>
            {holdings} -->
        </div>
    </div>
    <br><br>
    <div class="section">
        <div class="input-field container">
            <form method="POST" action="Play/makeMove">
                <select required name="stock_select">
                    <option value="">Choose Stock</option>
                    {stocks}
                </select>

                <select name="stock_amount" id="">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                </select>

                <select name="stock_action" id="">
                    <option value="buy">Buy</option>
                    <option value="sell">Sell</option>
                </select>

                <button class="btn waves-effect waves-light center" type="submit" name="action">Submit
                </button>
            </form>
        </div>

    </div>
</div>