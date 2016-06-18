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
            <td class="inner3">
                <span id="bodyPanel">

                    <?php if($konkurs ==  0) {?>
                    <a href=<?php echo base_url("/index.php/Admin/postaviKonkurs"); ?>>
                    <button type="button" class="btn btn-danger">POSTAVI KONKURS</button>
                    </a>
                    <?php } else { ?>
                        <a href=<?php echo base_url("/index.php/Admin/zatvoriKonkurs"); ?>>
                        <button type="button" class="btn btn-danger">ZATVORI KONKURS</button>
                        </a>
                    <?php
                    
                    }?>

                </span></td>
            <td class="inner4">
                <div class="inner4div"></div>
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
