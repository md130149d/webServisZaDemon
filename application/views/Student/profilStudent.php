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
  <h1>Profil</h1>

                        <?php

                        $slika = $student[0]['Slika'];
                        $p = base_url("images/");
                        $novo = $p . '/' . $slika . '.jpg';

                        $mail = $student[0]['SifS'].'@student.etf.rs';

                        ?>
                        <div class="container" style="width: auto">


<div class="col-md-1 col-lg-2 " align="center"> <img src="<?php echo $novo ?>" class="img-circle" alt="Cinque Terre"
                                                     width="100">  </div>
 <div class="row">


                        <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
				  <tbody>
                      <tr>
                        <td>Godina studija:</td>
                        <td><?php echo $student[0]['GodStudija']; ?></td>
                      </tr>
                      <tr>
                        <td>Smer:</td>
                        <td><?php echo $student[0]['Smer']; ?></td>
                      </tr>
                      <tr>
                        <td>EMail:</td>
                        <td><?php echo $mail ?></td>
                      </tr>

                         <tr>
                             <tr>
                        <td>Prosek:</td>
                        <td><?php echo $student[0]['Prosek']; ?></td>
                      </tr>
                        <tr>
                        <td>Broj indeksa:</td>
                        <td><?php echo $student[0]['Indeks']; ?></td>
                      </tr>

					    <tr>
                        <td>Ukupno sati rada za tekucu skolsku godinu:</td>
                        <td><?php echo $student[0]['UkupanBrSati']; ?></td>
                      </tr>
					   <tr>
                        <td>Ukupno neisplacenog novca (bruto)</td>
                        <td><?php echo $student[0]['UkupnoNeIsplaceno']; ?></td>
                      </tr>

					  					   <tr>
                        <td>Ukupno isplacenog novca(bruto)</td>
                        <td><?php echo $student[0]['UkupnoIsplaceno']; ?></td>
                      </tr>
                      <tr>
                        <td>Broj telefona:</td>
                        <td><?php echo $student[0]['BrTel']; ?><br>
                        </td>

                      </tr>



                    </tbody>

                  </table>
				  </div>
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

<?php include 'footer.php'; ?>