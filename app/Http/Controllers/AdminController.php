<?php

namespace App\Http\Controllers;

class AdminController extends Controller {
    public function getHome() {
        return view('admin.home');
    }
}
