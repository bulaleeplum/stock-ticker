<div class="row">
    <h2 class="left thin">STOCKS</h2>
</div>

<div class="row">
{stockList}
<div class="col s12 m6 l4 left">
    <div class="card blue lighten-2">
        <div class="card-content white-text">
            <span class="card-title">
                <a class="yellow-text" href="/stock-history/{code}">{name}</a>
            </span>
            <span class="card-title right">{value}</span>
        </div>
    </div>
</div>
{/stockList}
</div>

<div class="row">
    <h2 class="left thin">PLAYERS</h2>
</div>

<div class="row">
{playerList}
    <div class="col s12 m6 l4 left">
        <div class="card green lighten-2">
            <div class="card-content white-text">
                <span class="card-title">
                    <a href="/player-portfolio/{Player}">{Player}</a>
                </span>
                <span class="card-title right">{equity}</span>
                <span class="card-title right">{Cash}</span>
            </div>
        </div>
    </div>
{/playerList}
</div>
