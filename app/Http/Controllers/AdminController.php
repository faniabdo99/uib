<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use App\Models\Service;
use App\Models\Project;
class AdminController extends Controller {
    public function getHome() {
        $ContactRequests = ContactRequest::latest()->limit(10)->get();
        $ServicesCount = Service::count();
        $ProjectsCount = Project::count();
        $ContactRequestsCount = ContactRequest::count();
        return view('admin.home', compact('ContactRequests', 'ServicesCount', 'ProjectsCount', 'ContactRequestsCount'));
    }
}
