<?php

function loadViews($view = null, $data = null)
{
    echo view("includes/header");
    echo view($view, $data);
    echo view("includes/extra");
    echo view("includes/footer");
}
