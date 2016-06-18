<!-- Todorović Jovana 0014/2013 -->

<?php include 'header.php';
include 'menu.php'; ?>

<br><br><br><br>  <br><br><br>
<center> <h1> Registracija </h1> </center>
<div class="container" style="width: auto">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <center><img class="profile-img" src="<?php echo base_url("images/etf-beograd.jpg");?>"
                                 height="100" alt=""></center>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url("index.php/Student/zahtevZaReg");?>">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="ime" id="ime" class="form-control input-sm floatlabel" placeholder="Ime" required >
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="prezime" id="prezime" class="form-control input-sm" placeholder="Prezime" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="integer" name="broj_indeksa" id="broj indeksa" class="form-control input-sm" placeholder="Broj indeksa (bbbb/gggg)" required>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="pol" id="pol" class="form-control input-sm" placeholder="Pol (m/z)" required>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="smer" id="smer" class="form-control input-sm" placeholder="Smer" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="korisnicko_ime" id="korisnicko_ime" class="form-control input-sm" placeholder="Korisničko ime (nnggbbbb)" required>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="sifra" id="sifra" class="form-control input-sm" placeholder="Šifra" required>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="potvrdi_sifru" id="potvrdi_sifru" class="form-control input-sm" placeholder="Potvrdi šifru" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="br_telefona" id="br_telefona" class="form-control input-sm" placeholder="Broj telefona (+381xxxxxxx)" required>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="godina_studija" id="godina_studija" class="form-control input-sm" placeholder="Godina studija" required>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="prosek" name="prosek" id="prosek" class="form-control input-sm" placeholder="Prosek" required>
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Registruj se" class="btn btn-lg btn-danger btn-block">


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<?php include 'footer.php'; ?>


