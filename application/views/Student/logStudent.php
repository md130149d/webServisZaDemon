<!-- Todorović Jovana 0014/2013 -->
<?php include 'header.php';
include 'menu.php'; ?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">

            <div class="account-wall">
                <center><img class="profile-img" src="<?php echo base_url("images/etf-beograd.jpg");?>"
                             height="100" alt=""></center>
                <br>
                <h1 class="text-center login-title">Logovanje za studenta</h1>
                <br>
                <form class="form-signin" method="post" action="<?php echo base_url("index.php/Student/validacijaLogovanja");?>">
                    <input type="text" class="form-control" placeholder="Korisnicko ime" name = "Kime" required autofocus>
                    <input type="password" class="form-control" placeholder="Sifra" name = "sifra" required> <br>
                    <input type="submit" class="btn btn-lg btn-danger btn-block"  value="Potvrdi">
                    <br>
                    <br>
                    <span class="clearfix"></span>
                </form>
				  <a href="<?php echo base_url("index.php/Student/zabSifra");?>" class="text-center new-account">Zaboravili ste šifru? </a>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
