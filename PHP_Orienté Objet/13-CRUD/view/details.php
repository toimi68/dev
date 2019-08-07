<?php

echo '<pre>'; print_r($donnees); echo '</pre>';


 echo '<div class="col-md-4 offset-md-4- mx-auto alert alert-primary text-center">';
            foreach( $donnees as $key => $value) 
            {
                if($key != 'id_employes')
                {
                    echo "$key :$value <hr>";
                }   
            }
            echo '</div>';

/*
?>
 <ul class="col-md-4 offset-md-4 list-group text-center mb-4">
     <?php foreach($donnees as $key => $value): ?>
             <li class="list-group-item"><?= $key ?> : <?=$value ?></li>
     <?php endforeach; ?>
</ul>
*/