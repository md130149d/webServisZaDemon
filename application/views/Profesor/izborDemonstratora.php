<?php
// Danko Miladinovic 0149/13
include 'header.php';
include 'menu.php';
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
    function prikaziTabelu() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url()."index.php/Profesor/tabelaID"?>",
            cache: false,
            dataType: 'html',
            data: $('#lista').serialize(),
            success: function (data) {
                $("#tabelaDemonstratora").html(data);
            }
        });
    }
    function izaberiPotrebneDemonstratore() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url()."index.php/Profesor/odaberiStudente"?>",
            cache: false,
            dataType: 'html',
            data: $('#izborD').serialize(),
            success: function (data) {
                $("#tabelaDemonstratora").html(data);
            }
        });
    }
</script>

<div id="content">
    <div class="top">
        <div class="left"></div>
        <div class="right"></div>
        <div class="middle"></div>
    </div>

    <p>Odaberite termin iz liste: </p>
    <form method='POST' action="" id="lista">
        <select name='pred' style='width: 50%' class="form-control">
            <?php
            if(isset($Predm))
            foreach ($Predm as $p) {
                $dt = new DateTime($p['Datum']);
                echo "<option value=" . $p['SifT'] . ">" . ($dt->format('m/d/Y')) . " Sala: " . $p['Sala'] . " " . $p['Naziv'] . "</option>";
            }
            ?>
        </select>
        <br/><br/>
        <p><input type="button" class='btn btn-danger' onclick="javascript:prikaziTabelu()" value='Prikaži'/></p>
    </form>
        <br/>
        <br/>
        <div id="tabelaDemonstratora"></div>
</div>
<?php include 'footer.php'; ?>
