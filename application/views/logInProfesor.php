<?php include 'glavnaheader.php'; ?>
<?php include 'glavnaMenu.php'; ?>
<!-- Danko Mialadinovic 149/13-->
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
                <h1 class="text-center login-title">Logovanje za zaposlene</h1>
                <br>
                <form class="form-signin" method="post" action="<?php echo base_url("index.php/Welcome/logInProfesor");?>">
                    <input type="text" name="SifZ" class="form-control" placeholder="Korisnicko ime" required autofocus>
                    <input type="password" name="Sifra" class="form-control" placeholder="Sifra" required>
                    <button type="submit" class="btn btn-lg btn-danger btn-block">
                        Prijavi se</button>
                    <br>
                    <br>
                    <?php if(isset($message)) echo "<p>" . $message . "<p/>";?>
                    <span class="clearfix"></span>
                </form>
            </div>
        </div>
    </div>
</div>





<?php include 'glavnaFooter.php'; ?>
