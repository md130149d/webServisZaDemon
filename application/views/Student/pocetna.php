<!-- Todorović Jovana 0014/2013 -->
<?php include 'headerS.php';
include 'menuS.php'; ?>




<br><br><br><br>
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

<div class="container" style="width: auto">


    <h1>OBAVEŠTENJA</h1>
    <hr>

    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Izabrani ste za termine: </h3>

            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Sifra predmeta" readonly></th>
                        <th><input type="text" class="form-control" placeholder="Naziv redmeta" readonly></th>
                        <th><input type="text" class="form-control" placeholder="Termin" readonly></th>

                    </tr>
                </thead>
                <tbody>
<form ">
<?php foreach($termin as $key){ ?>


 <tr>
                        <td><?php echo $key['SifP']; ?></td>
                        <td><?php echo $key['Sala']; ?></td>
                        <td>  datum: <?php
                            $datum=new DateTime($key['Datum']);
                            $vremeOd=new DateTime($key['VremeOd']);
                            echo $datum->format("Y-m-d"); ?> vreme: <?php echo $vremeOd->format("H:i:s");
                            ?>
                        </td>

                    </tr>



<?php } ?>

                </tbody>
            </table>
        </div>
    </div>


 </form>
</div>
        </span>
   </td>
   <td class="inner4">
    <div class="inner4div">
    </div>
   </td>
  </tr>
  </tbody>
 </table>

 <div class="bottom">
  <div class="left"></div>
  <div class="right"></div>
  <div class="middle"></div>
 </div>
</div>


</body>








<?php include 'footer.php'; ?>
