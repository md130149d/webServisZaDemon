
<?php
// Danko Miladinovic 0149/13
echo "<form name='tabelaID' id='izborD'>";
if(isset($Predmeti)) {
    foreach ($Predmeti as $pre) {
        print "
    <!--<form action='' method='post'> -->
    <div class='container' style='width: auto'>

        <div class='row'>
            <div class='panel panel-primary filterable'>
                <div class='panel-heading'>
                    <h3 class='panel-title'>Demonstratori Predmet: " . $Naziv . " Termin: " . $pre['Datum'] . " Vreme: " . $pre['VremeOd'] . " - " . $pre['VremeDo'] . "</h3>
                </div>
                <table class='table' id='mojaTabela'>
                    <thead>
                    <tr class='filters'>
                        <input type='hidden' name='SifT' value='".$pre['SifT']."' class='form-control'/>
                        <input type='hidden' name='SifP' value='".$predm."' class='form-control'/>
                        <th><input type='text' class='form-control' placeholder='Student' readonly></th>
                        <th><input type='text' class='form-control' placeholder='Index' readonly></th>
                        <th><input type='text' class='form-control' placeholder='Izaberi' readonly></th>
                    </tr>
                    </thead>
                    ";

        foreach ($Studenti as $stu) {
            echo "
                  <tbody>
				<tr>
                    <th>" . $stu['Ime'] . " " . $stu['Prezime'] . "</th>
					<th>" . $stu['SifS'] . "</th>
					<td><input type='checkbox' name='check_list[]' value='" . $stu['SifS'] . "'</td>
				</tr>
                </tbody> ";
        }
        echo " 
                </table>
            </div>
        </div>
        <div class='form-group'>
            <label for='exampleInputName2'>Potreban broj demonstratora</label>
            <input type='text' class='form-control' id='exampleInputName2' placeholder='Broj' name='BrD' value=0>
        </div>
        <button type='button' class='btn btn-danger' name='dugme' onclick='javascript:izaberiPotrebneDemonstratore()'>Izaberi</button>
            <div class='radio'>
                <label>
                    <input type='radio' name='oR' id='' value='Prosek' checked='checked'>
                    Prema proseku
                </label>
            </div>
            <div class='radio'>
                <label>
                    <input type='radio' name='oR' id='' value='Prijava'>
                    Prema prijavi
                </label>
            </div>
    </div>
    ";
    }

}
echo "</form>";
echo "<p>$message</p>";
?>
