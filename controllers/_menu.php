<?php

 function listaMenu($aMenu, $urlC) {
   $iTotal = count($aMenu);
   $sClassToggle = "";
   for ($i = 0; $i < $iTotal; $i++) {
     $aMenu[$i]['title'];
     
     if(!empty($aMenu[$i]['child'])) {
       $sMenu = "<li class='dropdown'> ".
                  "<a class='dropdown-toggle' data-toggle='dropdown' href='' role='button' aria-haspopup='true' aria-expanded='false'>" .
                    "<span class='menu-text'>".$aMenu[$i]['title']." </span> ".
                  "</a>";
     } else {
         $sMenu = "<li> ".
                    "<a href='".$urlC.$aMenu[$i]['href']."' role='button' aria-haspopup='true' aria-expanded='false'>" .
                      "<span class='menu-text'>".$aMenu[$i]['title']." </span> ".
                    "</a>";
     }
     
     echo $sMenu;
     if(array_key_exists('child', $aMenu[$i])) {
       echo "<ul class='dropdown-menu'>";
         listaMenu($aMenu[$i]['child'], $urlC);
       echo "</ul>";
     }
     echo "</li>";
   }
 }
?>