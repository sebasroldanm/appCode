<?php

function loadViews($view = null)
{
    echo view("includes/header");
    echo view($view);
    echo view("includes/extra");
    echo view("includes/footer");
}
