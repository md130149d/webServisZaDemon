<!-- Todorović Jovana 0014/2013 -->
<?php include 'headerS.php';
include 'menuS.php'; ?>


<div id="content">
    <div class="top">
        <div class="left"></div>
        <div class="right"></div>
        <div class="middle"></div>
    </div>
    <table width="100%">
        <tbody>
        <tr>
            <td class="inner3"><span id="bodyPanel">
<form method="post" action="registracijaPrijave">
    <div class="container" style="width: auto">
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Prijava</h3>

                </div>


                        <table class="table">
                            <thead>
                            <tr class="filters">
                                <th><input type="text" class="form-control" placeholder="Sifra predmeta" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Naziv redmeta" disabled></th>
                                <th><input type="text" class="form-control" placeholder="da/ne" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Ocena" disabled></th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php foreach($predmeti as $key){ ?>


                            <tr>
                                <td><?php echo $key['SifP']; ?></td>
                                <td><?php echo $key['Naziv']; ?></td>
                                <td> <input type="checkbox" name = "niz_t[]" value='<?php echo $key['SifP']?>' onchange="document.getElementById('<?php echo $key['SifP']?>').disabled = !this.checked;"> DA </td>

                                <td>
                                    <select class="form-control" name='ocene[]' id='<?php echo $key['SifP']?>' disabled required>
                                        <option ></option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        </table>


            </div>
        </div>
    </div>
<input type="submit" class="btn btn-danger" value="Posalji prijavu"/>
</form>



<?php include 'footer.php'; ?>