<?php
//Snezana Tanic 0237/13
//Marijana Prpa 0442/13
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
            <td class="inner3"><span id="bodyPanel">

  <h1>Obaveštenja</h1>
        </span>
            </td>
            <td class="inner4">
                <div class="inner4div">

                </div>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                if($konkurs > 0) {

                ?>
                <h3>U toku je konkurs za prijavu studenata za demonstraturu.

                    <?php }
                if($brReg > 0) {

                ?>
                <h4>Broj zahteva za registraciju:

                    <?php  echo $brReg;}
                    if($brZah > 0) {

                    ?></h4>
                <h4>Broj zahteva za izmenu podatka:
                    <?php  echo $brZah;}
                    ?>
                </h4>
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
