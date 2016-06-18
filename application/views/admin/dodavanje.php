<?php
//Snezana Tanic 0237/13
//Marijana Prpa 0442/13
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
    function prikaziTabelu() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url()."index.php/Admin/dodajpredmet"?>",
            cache: false, // da li se kesira ili ne
            dataType: 'html', //povratni podaci
            data: $('#lista').serialize(), //odakle ce fja da pokupi podatke, list- id forme odakle se uzImaju podaci
            success: function (data) { //poziva se ako je sve uspesno odradjeno, data - tabelaID.php
                $("#tabelaP").html(data);
            }
        });
    }
    function ucitaj() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url()."index.php/Admin/dodajprofesora"?>",
            cache: false, // da li se kesira ili ne
            dataType: 'html', //povratni podaci
            data: $('#izborD').serialize(), //odakle ce fja da pokupi podatke, list- id forme odakle se uzImaju podaci
            success: function (data) { //poziva se ako je sve uspesno odradjeno, data - tabelaID.php
                $("#tabelaP").html(data);
            }
        });
    }
</script>

<div id="content">
    <div class="top">
        <div class="left"></div>
        <div class="right"></div>
        <div class="middle"></div>
    </div>
    <table width="100%">
        <tbody>
        <tr>
            <td class="inner3">
		<span id="bodyPanel">
  <div class="container">

    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Predmeti</h3>

            </div>
            <?php echo validation_errors(); ?>
            <?php $attributes = array ( 'method' => 'post' , 'id' => 'lista', 'enctype'=>'multipart/form-data');
            echo form_open('Admin/dodavanje',$attributes);
            ?>
            <table class="table" name = "tabela" >
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Šifra predmeta" readonly></th>
                        <th><input type="text" class="form-control" placeholder="Naziv predmeta" readonly></th>
						<th><input type="text" class="form-control" placeholder="Godina" readonly></th>
                        <th><input type="text" class="form-control" placeholder="Cena po satu" readonly></th>
                        <th><input type="text" class="form-control" placeholder="Šifra zaposlenog" readonly></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <input type = "text" name =  "sifraP" class="form-control" required /></td>
                        <td> <input type = "text" name =  "naziv" class="form-control" required /></td>
						<td>  <input type = "text" name =  "godina" class="form-control" required /></td>
                        <td>  <input type = "text" name =  "cenaposatu" class="form-control" required /></td>
						<td> <input type = "text" name =  "sifra" class="form-control" required /></td>
						</tr>
                </tbody>
            </table>
        </div>
    </div>
  </div>
	<input type="button" value = "Dodaj predmet" class="btn btn-danger" onclick="javascript:prikaziTabelu()"/>
            </form>
            <div id =  "tabelaP"> </div>

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


</body>

</html>