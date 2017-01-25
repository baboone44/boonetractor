<?php
/* This page includes the header, footer, and uses $_GET[] to populate the
    specified html page with store information, a map, and contact info */
include "header.html";
include "stores/".$_GET['store'].".html";
include "footer.html";
?>