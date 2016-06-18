<body>
<!-- Danko Miladinovic 149/13 -->
<div class="container">
    <div id="sidebarL">
        <div class="sidebar_box" id="glavni">
            <div class="top"></div>
            <div class="inside">
                <class="row">
                <form id="menu" name="menu" action="" enctype="application/x-www-form-urlencoded" onsubmit="showLoadingScreen()">
                    <input type="hidden" name="menu" value="menu">

                    <img src="<?php echo 'http://localhost/psipro/images/logo.png'; ?>" alt="Servis za Demonstraturu">
                    <div id="loadingScreen" style="display: none;">
                        <div></div>
                    </div>
                    <ul id="menu:nav1">
                        <li>
                            <a href="<?php echo base_url('index.php'); ?>">Pocetna</a>
                        </li>
                        <li>
                             <a href="<?php echo base_url('index.php/Student/loginStudent');?>">Logovanje za studente</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('index.php/Welcome/logInProfesor')?>">Logovanje za zaposlene</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('index.php/Student/registracijaStudent')?>">Registracija studenta</a>
                        </li>
                    </ul><input type="hidden" name="javax.faces.ViewState" value="j_id2">
                </form>
            </div>
        </div>
    </div>
</div>