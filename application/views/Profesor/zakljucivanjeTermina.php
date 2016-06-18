<?php include "header.php";
include "menu.php";
// Danko Miladinovic 0149/13
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
<script>
    function zakljucivanjeTab() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url()."index.php/Profesor/zakljTabela"?>",
            cache: false,
            dataType: 'html',
            data: $('#listaTer').serialize(),
            success: function (data) {
                $("#zTabela").html(data);
            }
        });
    }

    function potvrdjivanjeDemonstratora() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url()."index.php/Profesor/potvrdjivanjePrisutnosti"?>",
            cache: false,
            dataType: 'html',
            data: $('#formaZakTer').serialize(),
            success: function (data) {
                $("#zTabela").html(data);
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
    <table width="100%">
        <tbody>
        <tr>
            <td class="inner3"><span id="bodyPanel">

    <form method='POST' id='listaTer'>
    Odaberite termin iz liste: <br/>
    <select name='ter' style='width: 50%' class="form-control">
    <?php
    foreach ($Ter as $p) {
        $dt=new DateTime($p['Datum']);
        echo "<option value=".$p['SifT'].">" . ($dt->format('m/d/Y'))." ".$p['Naziv'] ."</option>";
    }
    ?>
    </select>
    <br/><br/><p><input type='button' class='btn btn-danger' name='Submit' value='Prikaži' onclick='javascript:zakljucivanjeTab()'/></p>
    </form>
    <br/>
    <br/>
<div id="zTabela"></div>
</div>
<?php include "footer.php"; ?>
