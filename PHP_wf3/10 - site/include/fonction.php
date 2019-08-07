<?php
//----------FONCTION MEMBRE -------------//
function internauteEstConnecte() // cette fonction indique si le membre est connecté
{
    if(!isset($_SESSION['membre'])) // si l'indice 'membre' n'est pas dféfinit dans la session,celà veut dire que l'internaute n'est pas passé par la page Connexion, donc n'est pas connecté
    {
        return false;
    }
    else // sinon l'indice 'membre' est définie, on retourne true
    {
        return true;
    }
}

//-------FONCTION ADMIN -------------//
function internauteEstConnecteEtEstAdmin()
{
    // si la session du membre est définit et que son statut est à 1,cela veut dire qu'il est bien ADMIN et qu'il est bien connecté
    if(internauteEstConnecte() && $_SESSION["membre"]['statut'] == 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}