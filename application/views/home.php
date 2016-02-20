<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h1 class="header center condensed teal-text text-lighten-2">STOCK TICKER</h1>
            <div class="row center">
                <h5 class="header col s12 light white-text">The out of print board game that was popular upon its release is now available online.</h5>
            </div>
            <br><br>
        </div>
    </div>
    <div class="parallax"><img src="../../assets/images/material_bg_1.png" alt="material_bg_1.png"></div>
</div>

<div class="container">
    <div class="section">
        <div class="row">
            <h4 class="left thin white-text">CURRENT STOCKS</h4>
        </div>
        <div class="row">
            {stockList}
            <div class="col s12 m6 l4 left">
                <div class="card cyan lighten-1">
                    <div class="card-content white-text">
                        <span class="card-title">
                            <a class="blue-text text-darken-4" href="/stock-history/{code}">{name}</a>
                        </span>
                        <span class="card-title right">${value}</span>
                    </div>
                </div>
            </div>
            {/stockList}
        </div>
    </div>
</div>

<div class="parallax-container valign-wrapper">
    <div class="valign center-block">
        <div class="section no-pad-bot">
        <div class="container">
            <div class="row center">
                <h5 class="header col s12 light white-text">Experience the game for yourself now!</h5>
            </div>
        </div>
    </div>
    </div>
    <div class="parallax"><img src="../../assets/images/material_bg_3.jpg" alt="material_bg_3.jpg"></div>
</div>

<div class="container">
    <div class="section">
        <div class="row">
            <h4 class="left thin white-text">CURRENT PLAYERS</h4>
        </div>
        <div class="row">
            {playerList}
            <div class="col s12 m6 l4 left">
                <div class="card teal lighten-1">
                    <div class="card-content white-text">
                        <span class="card-title">
                            <a class="light-blue-text text-darken-4" href="/player-portfolio/{Player}">{Player}</a>
                        </span>
                        <div class="row">
                            <div class="col s6"><p>${equity} equity</p></div>
                            <div class="col s6"><p>${Cash} cash</p></div>
                        </div>
                    </div>
                </div>
            </div>
            {/playerList}
        </div>
    </div>
</div>

<div class="parallax-container valign-wrapper">
    <div class="valign center-block">
        <div class="section no-pad-bot">
        <div class="container">
            <div class="row center">
                <h5 class="header col s12 light white-text">Website created by:</h5>
                <h6 class="header col s12 light white-text">Krystle Bulalakaw</h6>
                <h6 class="header col s12 light white-text">Spenser Lee</h6>
                <h6 class="header col s12 light white-text">Scott Plummer</h6>
            </div>
        </div>
    </div>
    </div>
    <div class="parallax"><img src="../../assets/images/material_bg_2.png" alt="material_bg_2.png"></div>
</div>