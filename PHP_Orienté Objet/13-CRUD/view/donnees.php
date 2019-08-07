<?php
//  echo '<pre>'; print_r($fields); echo'</pre>'
// echo '<pre>'; var_dump($donnees); echo'</pre>';
// $donnees correspond à l'indice 'donnees' declaré dans la méthode render() du controller
// $fields correspond à l'indice 'fields' déclaré dans la méthode render() du controller
?>

<div><a href="?op=add" class="btn btn-large btn-info mb-2"><i class="fas fa-plus"></i> Ajouter une nouvelle donnée</a></div>

<table class="table table-bordered text-center">
<thead><tr>
    <th>ID</th> <!-- on créer manuellement un champs, nous l'avons supprimer au moment de la requete SQL dans EntityRepository -->
<?php foreach($fields as $value): ?>
    <th><?= $value['Field'] ?></th>
<?php endforeach; ?>
    <th>Détail</th>
    <th>Modifier</th>
    <th>Supprimer</th>
</tr></thead>
<tbody>

<?php foreach($donnees as $value): ?>
    <tr>
        <td><?= implode('</td><td>', $value) ?></td>
        <td><a href="?op=select&id=<?=$value[$id] ?>" class="text-dark" ><i class="fas fa-eye"></i></a></td>
        <td><a href="?op=update&id=<?=$value[$id]?>" class="text-primary" onclick="return(confirm('En êtes vous certain?'))"><i class="fas fa-wrench"></i></a></td>
        <td><a href="?op=delete&id=<?=$value[$id]?>" class="text-danger" ><i class="fas fa-trash-alt"></i></a></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>