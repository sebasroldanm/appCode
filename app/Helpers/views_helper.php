<?php

function loadViews($view = null, $data = null)
{
    if ($data) {
        echo view("includes/header", $data);
        echo view($view, $data);
        echo view("includes/extra");
        echo view("includes/footer");
    } else {
        echo view("includes/header");
        echo view($view);
        echo view("includes/extra");
        echo view("includes/footer");
    }
}
