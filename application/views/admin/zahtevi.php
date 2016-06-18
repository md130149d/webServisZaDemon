<?php
//Snezana Tanic 0237/13
//Marijana Prpa 0442/13
?>


<div class="row">
    <div class="col-lg-2">
    </div>

    <!-- Zahtevi za registraciju  -->
    <?php echo validation_errors(); ?>
    <?php
    $attributes = array ( 'method' => 'post' , 'enctype'=>'multipart/form-data');
    echo form_open('Admin/obradaZahteva', $attributes);
    ?>
    <div class="col-lg-4">
    <?php if(is_array($registracije)) { foreach ($registracije as $zahtev): ?>

        
            <div class="panel panel-default">
                <div class="panel-heading">
                    Zahtev za registraciju
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td> Korisnicko ime: </td> <td> <?php echo $zahtev['SifS']; ?> </td>
                            </tr>
                            <tr>
                                <td> Ime: </td> <td> <?php echo $zahtev['Ime']; ?> </td>
                            </tr>
                            <tr>
                                <td> Prezime: </td> <td> <?php echo $zahtev['Prezime']; ?> </td>
                            </tr>
                            <tr>
                                <td> Pol: </td> <td> <?php echo $zahtev['Pol']; ?> </td>
                            </tr>
                            <tr>
                                <td> Godina studija: </td> <td> <?php echo $zahtev['GodStudija']; ?> </td>
                            </tr>
                            <tr>
                                <td> Broj indeksa: </td> <td> <?php echo $zahtev['Indeks']; ?> </td>
                            </tr>
                            <tr>
                                <td> Prosek: </td> <td> <?php echo $zahtev['Prosek']; ?> </td>
                            </tr>
                            <tr>
                                <td> Smer: </td> <td> <?php echo $zahtev['Smer']; ?> </td>
                            </tr>
                            <tr>
                                <td> Br. telefona: </td> <td> <?php echo $zahtev['BrTel']; ?> </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#buttonedModal" type="submit" name="odobriReg[]" value="<?php echo $zahtev['SifZR']?>">
                        Odobri
                    </button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#buttonedModal" type="submit" name="ponistiReg[]" value="<?php echo $zahtev['SifZR']?>">
                        Poništi
                    </button>
                </div>
            </div>
        

    <?php  endforeach; } ?>
    </div>


    <!-- Izmena proseka  -->
    <div class="col-lg-4">
    <?php if(is_array($zahtevi)) { foreach ($zahtevi as $zahtev): ?>

        
            <div class="panel panel-default">
                <div class="panel-heading">
                    Zahtev za promenu podatka
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Student</th>
                                <th>Podatak</th>
                                <th>Stara vrednost</th>
                                <th>Nova vrednost</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td> <?php echo $zahtev['SifS']; ?>  </td>
                                <td> <?php
                                    if($zahtev['Prosek'] == 1) echo 'Prosek';
                                    else
                                        if($zahtev['Godina'] == 1) echo 'Godina';
                                    ?> </td>
                                <td> <?php echo $zahtev['StaraVred']; ?> </td>
                                <td> <?php echo $zahtev['NovaVred']; ?>  </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#buttonedModal" type="submit" name="odobriZah[]" value="<?php echo $zahtev['SifZI']?>">
                        Odobri
                    </button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#buttonedModal" type="submit" name="ponistiZah[]" value="<?php echo $zahtev['SifZI']?>">
                        Poništi
                    </button>
                </div>
            </div>
        

    <?php  endforeach; } ?>

    </div>
</div>

