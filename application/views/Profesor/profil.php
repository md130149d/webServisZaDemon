<?php
// Danko Miladinovic 0149/13
    include 'header.php';
    include 'menu.php';
?>


<div id="content">
    <div class="top">
        <div class="left"></div>
        <div class="right"></div>
        <div class="middle"></div>
    </div>
    <table width="100%">
        <tbody>
        <tr>
            <td class="inner3"></td><span id="bodyPanel"></span>
    </table>
<div class="container" style="width: auto">
<div class="col-md-1 col-lg-2 " style="align-items: stretch">
    <img src="<?php echo $zaposleni[0]['Slika'] ?>" class="img-circle" alt="Cinque Terre" width="100"/>
    </div>
    <div class="row" style="align-items: flex-start">
        <div class=" col-md-9 col-lg-9 ">
            <table class="table table-user-information" style="width: auto">
                <tbody>
                <tr>
                    <td>Predmeti:</td>
                    <?php
                    $i=0;
                    foreach ($predmeti as $pred) {
                        if($i!=0) echo ", ";
                        else echo "<td>";
                        $i=1;
                        echo $pred['Naziv'];
                    }
					echo "</td>";
                    ?>
                </tr>
                <tr>
                    <td>Stauts:</td>
                    <td><?php echo  $zaposleni[0]['Status']?></td>
                </tr>
                <tr>
                    <td>Pol:</td>
                    <td><?php echo  $zaposleni[0]['Pol']?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
