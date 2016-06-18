<?php
// Danko Miladinovic 0149/13
    include "header.php";
    include "menu.php";
?>

<!--
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
    function promeniSliku() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url()."index.php/Profesor/izmenaPodataka"?>",
            cache: false,
            dataType: 'html',
            data: $('#fImage').serialize(),
            success: function (data) {
                $("#messageI").html(data);
            }
        });
    }

</script>
-->
<div class="container" style="width: auto">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">

            <div class="account-wall">
                <br><br><br><br>
                <br>
                <center><img class="profile-img" src="<?php echo base_url("images/etf-beograd.jpg");?>"
                             height="100" alt=""></center>
                <br>
                <h1 class="text-center login-title">Izmena slike</h1>
                <br>
                <form class="form-signin" method="post"  action = "<?php echo base_url('index.php/Profesor/izmenaPodataka');?>" id="fImage" enctype = "multipart/form-data">
                    <input type="file" name="slika" class="btn ">
                    <br>
                    <br>

                    <input type="submit" class="btn btn-lg btn-danger btn-block"  value="Potvrdi"/>
                    <!-- <input type="button" class="btn btn-lg btn-danger btn-block" onclick="javascript:promeniSliku()"   value="Potvrdi"/> -->
                    <span class="clearfix"></span>
                </form>
                <?php if(isset($message)) echo "<p>$message</p>";?>
                <div id="messageI"></div>
            </div>

        </div>
    </div>
</div>

<?php
    include "footer.php";
?>
