<?php
//Snezana Tanic 0237/13
//Marijana Prpa 0442/13
?>

<html xmlns="http://www.w3.org/1999/html">
<body>


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
    

    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Brisanje</h3>

            </div>
            <?php echo validation_errors(); ?>
            <?php $attributes = array ( 'method' => 'post' , 'enctype'=>'multipart/form-data');
            echo form_open('Admin/obrisi',$attributes);
            ?>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Šifra predmeta" readonly></th>
                        <th><input type="text" class="form-control" placeholder="Naziv predmeta" readonly></th>
						<th><input type="text" class="form-control" placeholder="Godina" readonly></th>
                        <th><input type="text" class="form-control" placeholder="Izaberi" readonly></th>

                    </tr>
                </thead>
                <tbody>
                     <?php foreach($predmeti as $predmet) { ?>
                         <tr>
                    <td> <?php echo $predmet['SifP']?> </td>
                    <td> <?php echo $predmet['Naziv']?> </td>
                    <td> <?php echo $predmet['Godina']?> </td>
                    <td> <input type="checkbox" name = "predmeti[]" value = '<?php echo $predmet['SifP']?>' ></td>
                </tr>
                     <?php  }?>
                </tbody>
            </table>
        </div>
    </div>
	<button type="submit" class="btn btn-danger">Izbrisi predmet</button>
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

</html>
