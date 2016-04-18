<div class="row">
     <div class="col-md-12">
         <table class="table bordered">
            <thead>
            <td>Player Name</td>
            <td></td>
            <td></td>
            </thead>
            {listPlayer}
            <tr>
                <td>{playername}</td>
                <td><a href="/Administration/editPlayer/{playername}">Edit</a></td>
                <td><a href="/Administration/deletePlayer/{playername}">Delete</a></td>
            </tr>
            {/listPlayer}
        </table>
    </div>
</div>
