<!-- Todorović Jovana 0014/2013 -->
<?php include 'headerS.php';
include 'menuS.php'; ?>



    <form name = "login">
        <div class="container" style="width: auto">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">

                    <div class="account-wall">
                        <br><br><br><br>  <br><br><br><br>
                        <br>
                        <center><img class="profile-img" src="<?php echo base_url("images/etf-beograd.jpg");?>"
                                     height="100" alt=""></center>
                        <br>
                        <h1 class="text-center login-title">Izmena podataka</h1>
                        <br>




                        <form method="get" action="<?php echo base_url("/index.php/Student/izmenaSlike"); ?>">
                           
                        </form>

                        <form method="get" action="<?php echo base_url("/index.php/Student/izmenaSlike"); ?>">
                            <button type="submit" class="btn btn-lg btn-danger btn-block">Izmena slike</button>
                        </form>
<br><br><br>
                                <form method="get" action="<?php echo base_url("/index.php/Student/izmenaProseka"); ?>">
                                    <button type="submit" class="btn btn-lg btn-danger btn-block">Izmena Proseka</button>
                                    </form>

                        <br><br><br>
                        <form method="get" action="<?php echo base_url("/index.php/Student/izmenaLozinke"); ?>">
                            <button type="submit" class="btn btn-lg btn-danger btn-block">Izmena Lozinke</button>
                        </form>
                        <br><br><br>
                        <form method="get" action="<?php echo base_url("/index.php/Student/izmenaGodine"); ?>">
                            <button type="submit" class="btn btn-lg btn-danger btn-block">Izmena Godine Studija</button>
                        </form>



                            <span class="clearfix"></span>

                    </div>

                </div>
            </div>
        </div>


<?php include 'footer.php'; ?>