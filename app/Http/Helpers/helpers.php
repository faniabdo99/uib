<?php

use App\Models\Gallery;
use App\Models\Service;

function getServices() {
    return Service::Language()->latest()->get();
}

function getFeaturedServices($Count) {
    return Service::Language()->featured()->limit($Count)->get();
}

function getGallery(){
    return Gallery::all();
}