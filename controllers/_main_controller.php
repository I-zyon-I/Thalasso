<?php

function addJour($strDate, $nbJour): string {
    return timeToDb(strtotime($strDate . "+$nbJour day"));
}

function addMois($strDate, $nbMois): string {
    return timeToDb(strtotime($strDate . "+$nbMois months"));
}

function addAnnee($strDate, $nbAnnee): string {
    return timeToDb(strtotime($strDate . "+$nbAnnee years"));
}

function timeToDisp($strDate):string {
    return date("d/m/Y", strtotime($strDate));
}

function timeToDb($strDate): string {
    return date("Y-m-d", strtotime($strDate));
}