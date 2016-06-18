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

    <hr>

    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Prijava</h3>

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
<form method="post" action="<?php echo base_url("index.php/Student/prijaviDemonstrature");?>">
<?php foreach($termin as $key){ ?>


                    <tr>
                        <td><?php echo $key['SifP']; ?></td>
                        <td><?php echo $key['Sala']; ?></td>
                        <td> <input type="checkbox" name = "niz_t[]" value='<?php echo $key['SifT']?>'> datum: <?php echo $key['Datum']; ?> vreme: <?php echo $key['VremeOd']; ?></td>

                    </tr>



<?php } ?>

                </tbody>
            </table>
        </div>
    </div>

    <button type="submit" class="btn btn-danger">Posalji prijavu</button>
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
