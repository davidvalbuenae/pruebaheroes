<?php
function viewHero($heroe)
{
    ob_start();
    $accesstoken = esc_attr( get_option('sh_id_json') );
    $idshero = shortcode_atts( array ('ids' => '644'), $heroe );
    $ids = $idshero["ids"];
    $idheroarray = explode(",", $ids);
    // Div parent
    echo '<div class="div-cards-sh">';
    foreach ($idheroarray as $id => $value) {
        $request = wp_remote_get("https://superheroapi.com/api/".$accesstoken."/".$value);
        $response = wp_remote_retrieve_body($request);
        $data = json_decode( $response );
        // View card
            echo '<div class="card-sh" id="'.$data->id.'">';
                echo '<img class="img" src='.$data->image->url.'>';
                echo '<div class="info-card-sh">';
                    echo '<h3 class="name">'.$data->name.'</h3>';
                        echo '<h4 class="title"> Skills </h4>';
                        echo '<ul class="statistics">';
                            if ($data->powerstats->intelligence != "null") : echo '<li> Intelligence: '.$data->powerstats->intelligence.'</li>'; endif;
                            if ($data->powerstats->strength != "null") : echo '<li> Strength: '.$data->powerstats->strength.'</li>'; endif;
                            if ($data->powerstats->speed != "null") : echo '<li> Speed: '.$data->powerstats->speed.'</li>'; endif;
                            if ($data->powerstats->durability != "null") : echo '<li> Durability: '.$data->powerstats->durability.'</li>'; endif;
                            if ($data->powerstats->power != "null") : echo '<li> Power: '.$data->powerstats->power.'</li>'; endif;  
                            if ($data->powerstats->combat != "null") : echo '<li> Combat: '.$data->powerstats->combat.'</li>'; endif;  
                        echo '</ul>';
                    echo '<h4 class="title"> Biography </h4>';
                    echo '<div class="biography"> 
                        <p><strong>Full name:</strong> '.$data->biography->{'full-name'}.'.</p>
                        <p><strong>Alter-egos:</strong> '.$data->biography->{'alter-egos'}.'</p>
                        <p><strong>Aliases:</strong> ';
                        $aliases = $data->biography->aliases;
                        foreach ($aliases as $aliase) {
                            echo $aliase . ', ';
                        }
                    echo '<p><strong>Place of birth:</strong> '.$data->biography->{'place-of-birth'}.'.</p>
                        <p><strong>First appearance:</strong> '.$data->biography->{'first-appearance'}.'</p>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
    }
    echo '</div>';
    $output= ob_get_clean();
    return $output;
}

add_shortcode('heroe', 'viewHero');