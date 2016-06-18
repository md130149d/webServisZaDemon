<!-- Todorović Jovana 0014/2013 -->
<?php include 'headerS.php';
include 'menuS.php'; ?>






        <div class="container" style="width: auto">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">

                    <div class="account-wall">
                        <br><br><br><br>  <br><br><br><br>
                        <br>
                        <center><img class="profile-img" src="<?php echo base_url("images/etf-beograd.jpg");?>"
                                     height="100" alt=""></center>
                        <br>
                        <h1 class="text-center login-title">Izmena slike</h1>
                        <br>
                        <form class="form-signin" method="post"  action = "<?php echo base_url("index.php/Student/validacijaIzmeneSlike");?>" enctype = "multipart/form-data">
                            <input type="file" name="image" class="btn btn-lg btn-danger btn-block">
                            <br>
                            <br>
                            <input type="submit" class="btn btn-lg btn-danger btn-block"  value="Potvrdi">

                            <span class="clearfix"></span>
                        </form>
                    </div>


                </div>
            </div>
        </div>






<?php include 'footer.php'; ?>