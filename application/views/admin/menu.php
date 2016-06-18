<?php
//Snezana Tanic 0237/13
//Marijana Prpa 0442/13
?>

<div class="container">
    <div id="sidebarL">
        <div class="sidebar_box" id="glavni">
            <div class="top"></div>
            <div class="inside">
                <form id="menu" name="menu" method="post" action="" enctype="application/x-www-form-urlencoded"
                      onsubmit="showLoadingScreen()">
                    <input type="hidden" name="menu" value="menu">

                    <img src="<?php echo base_url("images/logo.png");?>" alt="Servis za Demonstraturu">
                    <div id="loadingScreen" style="display: none;">
                        <div></div>
                    </div>
                    <ul id="menu:nav1">
                        <?php


                        ?>
                        <li>
                            <a href=<?php echo base_url("/index.php/Admin/index"); ?>>Početna</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url("/index.php/Admin/zahtevi"); ?>>Pristigli zahtevi</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url("/index.php/Admin/dodavanje"); ?>>Dodaj predmet</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url("/index.php/Admin/ukloni"); ?>>Ukloni predmet</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url("/index.php/Admin/konkurs"); ?>>Postavi konkurs</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url("/index.php/Admin/isplata"); ?>>Isplati studente</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url("/index.php/Admin/logout"); ?>>Kraj rada</a>
                        </li>
                    </ul>
                    <input type="hidden" name="javax.faces.ViewState" value="j_id2">
                </form>
            </div>
        </div>
    </div>
</div>