
<?php
//Snezana Tanic 0237/13
//Marijana Prpa 0442/13
echo "<form name='tabelaID' id='izborD'>";
        print "
   <br> 
   <br>
   <br>
    <!--<form action='' method='post'> -->
    <div class='container' style='width: auto'>

        <div class='row'>
            <div class='panel panel-primary filterable'>
                <div class='panel-heading'>
                </div>
                <table class='table' id='mojaTabela'>
                   <thead>
                    <tr class='filters'>
                        <th><input type='text' class='form-control' placeholder='Ime' readonly></th>
                        <th><input type='text' class='form-control' placeholder='Prezime' readonly></th>
						<th><input type='text' class='form-control' placeholder='Profesor' readonly></th>
                        <th><input type='text' class='form-control' placeholder='Asistent' readonly></th>
                        <th><input type='text' class='form-control' placeholder='Pol - muški' readonly></th>
                        <th><input type='text' class='form-control' placeholder='Pol - ženski' readonly></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <input type = 'input' name =  'ime' class='form-control' required/></td>
                        <td> <input type = 'input' name =  'prezime' class='form-control' required/></td>
						<td> <input type='radio'  name='tip' value='prof' checked ></td>
						<td> <input type='radio' name = 'tip' value='asis' ></td>
                        <td> <input type='radio' name = 'pol' value='muski' checked></td>
                        <td> <input type='radio' name = 'pol' value='zenski'></td>
                        <input type='hidden' name='naziv' value =  '".$naziv."'>
                        <input type='hidden' name='sifraP' value = '".$sifraP."'>
                        <input type='hidden' name='godina' value = '".$godina."'>
                        <input type='hidden' name='cenaposatu' value = '".$cenaposatu."'>
                        <input type='hidden' name='sifra' value = '".$sifra."'>
						</tr>
                </tbody>
                </table>
            </div>
        </div>
        <input type='button' class='btn btn-danger' value ='Dodaj profesora' onclick = 'javascript:ucitaj()'/>
 </form>
    

      </form>
        </span>
            </td>
            <td class='inner4'>
                <div class='inner4div'>
                </div>
            </td>
        </tr>
 

    <div class='bottom'>
        <div class='left'></div>
        <div class='right'></div>
        <div class='middle'></div>
    </div>
</div>
"?>
