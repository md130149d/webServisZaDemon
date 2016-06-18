<div class="container">
    <!-- Danko Miladinovic 0149/13-->
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
                            <a href=<?php echo base_url("/index.php/Profesor/pocetna"); ?>>Pocetna</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url("/index.php/Profesor/profil"); ?>>Profil</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url("/index.php/Profesor/zakazivanjeTermina"); ?>>Zakazivanje termina</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url("/index.php/Profesor/izborDemonstratora"); ?>>Izbor demonstratora</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url("/index.php/Profesor/zakljucivanjeTermina"); ?>>Zaključivanje termina</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url("/index.php/Profesor/izmenaSlike"); ?>>Izmena slike</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url("/index.php/Profesor/krajRada"); ?>>Kraj rada</a>
                        </li>
                    </ul>
                    <input type='hidden' name='javax.faces.ViewState' value="j_id2">
                </form>
            </div>
        </div>
    </div>
</div>