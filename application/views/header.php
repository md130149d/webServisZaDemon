<!DOCTYPE html>
<!-- Marijana Prpa 0442/13, Snezana Tanic 0237/13-->
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>By Okovani pakat</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("css/bootstrap.css"); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url("css/full-slider.css");?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<div id="header">
    <div id="logged_in">
        <form id="j_id13" name="j_id13" method="post" action="<?php echo base_url('index.php/Admin/index')?>" enctype="application/x-www-form-urlencoded">
            <input type="hidden" name="j_id13" value="j_id13">

            <strong class="m">
                <script type="text/javascript" language="Javascript">function dpf(f) {
                        var adp = f.adp;
                        if (adp != null) {
                            for (var i = 0; i < adp.length; i++) {
                                f.removeChild(adp[i]);
                            }
                        }
                    }
                    ;
                    function apf(f, pvp) {
                        var adp = new Array();
                        f.adp = adp;
                        var i = 0;
                        for (k in pvp) {
                            var p = document.createElement("input");
                            p.type = "hidden";
                            p.name = k;
                            p.value = pvp[k];
                            f.appendChild(p);
                            adp[i++] = p;
                        }
                    }
                    ;
                    function jsfcljs(f, pvp, t) {
                        apf(f, pvp);
                        var ft = f.target;
                        if (t) {
                            f.target = t;
                        }
                        f.submit();
                        f.target = ft;
                        dpf(f);
                    }
                    ;</script>
                <a href="#"
                   onclick="if(typeof jsfcljs == 'function'){jsfcljs(document.getElementById('j_id13'),{'j_id13:j_id15':'j_id13:j_id15'},'');}return false">
                    <?php echo "Administrator";?>
                </a></strong>

            <a href="<?php echo base_url('index.php/Admin/logout');?>" id="logout">kraj rada</a><input type="hidden" name="javax.faces.ViewState"
                                                                 value="j_id6">
        </form>
    </div>

</div>
