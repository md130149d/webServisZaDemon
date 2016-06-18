<?php
// Danko Miladinovic 0149/13
if(isset($Naziv)){
    echo "
<form id='formaZakTer' method='post'>
<div class='container' style = 'width: auto' >

    <div class='row' style = 'width: auto' >
        <div class='panel panel-primary filterable' style = 'width: auto' >
            <div class='panel-heading' style = 'width: auto' >
                <h3 class='panel-title' style = 'width: auto' > Demonstratori Predmet: ".$Naziv." Termin: ".$vreme." Sala: ".$Sala." Vreme: ".$sati."</h3 >

            </div >
            <table class='table' id = 'mojaTabela' >
                <thead >
                    <tr class='filters' >
                    <input type = 'hidden' name='SifP' value='".$predm."' class='form-control'/>
                    <input type='hidden' name='SifT' value='".$sifT."' class='form-control'/>
                    <input type = 'hidden' name='DatumOd' value='".$datumOd."' class='form-control'/>
                    <input type = 'hidden' name='DatumDo' value='".$datumDo."' class='form-control'/>
                        <th ><input type = 'text' class='form-control' placeholder = 'Student' readonly ></th>
                        <th ><input type = 'text' class='form-control' placeholder = 'Sifra' readonly ></th>
                    </tr >
                </thead >
                ";
    foreach ($Studenti as $stu) {
        echo "
                   <tbody >
				    <tr>
                        <td ><input type = 'text' class='form-control' value='".$stu['Ime']." ".$stu['Prezime']."'readonly></td >
					    <td ><input type = 'text' class='form-control' placeholder = 'bbbb/gg' value = '".$stu['SifS']."' name='indeks[]'></td >
				    </tr>
				   </tbody>
				";
    }
    echo "
            </table >
        </div >
    </div >

	<button type = 'button' class='btn btn-danger' name='dugme' onclick='javascript:potvrdjivanjeDemonstratora()'> Potvrdi</button >
    <div class='form-group' >
        <label >     </label >
        <input type = 'text' class='form-control' readonly >
    </div >
    </form >
";
    if(isset($message)) echo "<p>$message</p>";
}
?>