<!-- Todorović Jovana 0014/2013 -->
<?php include 'headerS.php';
include 'menuS.php'; ?>



    <br><br><br>
    <br><br><br>
    <br>
    <center> <h1> Izmena proseka </h1> </center>
    <div class="container" style="width: auto">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <center><img class="profile-img" src="<?php echo base_url("images/etf-beograd.jpg");?>"
                                     height="100" alt=""></center>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo base_url("index.php/Student/validacijaIzmeneProseka");?>">


                            <div class="form-group">
                                <input type="text" name="prosek" id="email" class="form-control input-sm" placeholder="Unesite novi prosek">
                            </div>

                            <input type="submit" value="Podnesi zahtev" class="btn btn-lg btn-danger btn-block">


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>