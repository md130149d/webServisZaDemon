<!-- Todorović Jovana 0014/2013 -->
<?php include 'header.php';
include 'menu.php'; ?>

    <form name = "login"  method="post" action = "<?php echo base_url("index.php/Student/slanjeMejla");?>" >
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">

                    <div class="account-wall">
                        <br><br><br><br>  <br><br><br><br>
                        <br>
                        <center><img class="profile-img" src="<?php echo base_url("images/etf-beograd.jpg");?>"
                                     height="100" alt=""></center>
                        <br>
                        <h1 class="text-center login-title">Promena šifre</h1>
                        <br>
                        <form class="form-signin" method="post" action = "<?php echo base_url("index.php/Student/slanjeMejla");?>">
                            <input type="text" class="form-control" placeholder="Korisnicko ime" name = "Kime" required autofocus>
                            <br>
                            <input type="submit" class="btn btn-lg btn-danger btn-block"  value="Potvrdi">


                            <span class="clearfix"></span>
                        </form>
                    </div>


                </div>
            </div>
        </div>

    </form>

<?php include 'footer.php'; ?>