<!-- Todorović Jovana 0014/2013 -->
<?php include 'headerS.php';
include 'menuS.php'; ?>

<br><br><br>
    <br><br><br>
    <br>
<center> <h1> Izmena lozinke </h1> </center>
<div class="container" style="width: auto">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <center><img class="profile-img" src="<?php echo base_url("images/etf-beograd.jpg");?>"
                                 height="100" alt=""></center>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url("index.php/Student/validacijaIzmeneLozinke");?>">


                        <div class="form-group">
                            <input type="password" name="alozinka" id="email" class="form-control input-sm" placeholder="Aktuelna lozinka">
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="nlozinka" id="broj indeksa" class="form-control input-sm" placeholder="Nova lozinka">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="pnlozinka" id="smer" class="form-control input-sm" placeholder="Potvrdi novu lozinku">
                                </div>
                            </div>
                        </div>





                        <input type="submit" value="Promeni" class="btn btn-lg btn-danger btn-block">


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>