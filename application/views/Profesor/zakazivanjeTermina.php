<?php
// Danko Miladinovic 0149/13
include "header.php";
include "menu.php";
?>

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
<form method="post">
<div class="container" style="width: auto">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Termin</h3>

            </div>
            <table class="table" id="mojaTabela">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Sifra predmeta" readonly></th>
                        <th><input type="text" class="form-control" placeholder="Datum" readonly></th>
						<th><input type="text" class="form-control" placeholder="Sala" readonly></th>
                        <th><input type="text" class="form-control" placeholder="Vreme od" readonly></th>
						<th><input type="text" class="form-control" placeholder="Vreme do" readonly></th>
                    </tr>
                </thead>
                <tbody>
				<tr>
                   <!-- <td><input type="text" class="form-control" placeholder="Sifra predmeta" name="SifP"></td> -->
                    <td>
                        <select name="SifP" class="form-control">
                            <?php
                            foreach ($Predmet as $pr){
                                echo "<option value=".$pr['SifP'].">" .$pr['Naziv'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
				    <td><input type="text" class="form-control" placeholder="YYYY-MM-DD" name="Datum">
                    </th>
                    <td><input type="text" class="form-control" placeholder="Sala" name="Sala"></td>
                    <td><input type="text" class="form-control" placeholder="HH:MM" name="VremeOd">
                    </th>
                    <td><input type="text" class="form-control" placeholder="HH:MM" name="VremeDo">
                    </th>
				</tr>
                </tbody>
            </table>
        </div>
    </div>

	<input type="submit" class="btn btn-danger" value="Potvrdi"/>
</div>
</form>
<?php if(isset($message)) echo "$message" ;?>
        </span>
            </td>
            <td class="inner4">
                <div class="inner4div">
                </div>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="bottom">
        <div class="left"></div>
        <div class="right"></div>
        <div class="middle"></div>
    </div>
</div>


<?php
include "footer.php";
?>
