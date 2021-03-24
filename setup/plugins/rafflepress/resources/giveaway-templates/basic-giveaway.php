<?php
$rafflepress_placeholder_image = '';
if (RAFFLEPRESS_BUILD == 'pro') {
    $rafflepress_placeholder_image = RAFFLEPRESS_PLUGIN_URL . "public/img/prize-placeholder.png";
}

$rafflepress_basic_giveaway = '
{  
    "starts":"",
    "starts_time":"",
    "prizes":[  
       {  
          "name":"My Awesome Prize",
          "description":"Let\'s go ahead and add a short prize description here, so the user knows exactly what they\'re about to win.",
          "image":"'.$rafflepress_placeholder_image.'",
          "video":""
       }
    ],
    "layout":"1",
    "entry_options":[],
    "rules":"",
    "ends":"",
    "ends_time":"",
    "timezone":"UTC",
    "font":"0"
 }
 ';