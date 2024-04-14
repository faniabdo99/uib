<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceController extends Controller {
    // Admin
    public function getAdminAll(){
        $Services = Service::latest()->get();
        return view('admin.services.all', compact('Services'));
    }
    public function getAdminNew(){
        return view('admin.services.new');
    }
    public function postAdminNew(Request $r){
        $r->validate([
            'title' => 'required',
            'image' => 'required'
        ]);
        
        $ServiceData = $r->except(['_token', 'image', 'is_featured']);
        // Generate the slug
        $ServiceData['user_id'] = auth()->user()->id;
        $ServiceData['slug'] = Str::slug($r->title, '-');
        $ServiceData['is_featured'] = $r->has('is_featured');
        if ($r->hasFile('image')) {
            $file = $r->file('image');
            $filename = $ServiceData['slug'] . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/services', $filename);
            $ServiceData['image'] = $filename;
        }
        Service::create($ServiceData);
        return redirect()->route('admin.services.all');
    }

    public function getAdminEdit(Service $Service){
        return view('admin.services.edit', compact('Service'));
    }

    public function postAdminEdit(Request $r, Service $Service){
        $r->validate([
            'title' => 'required',
        ]);

        $ServiceData = $r->except(['_token', 'image', 'is_featured']);
        // Generate the slug
        $ServiceData['slug'] = Str::slug($r->title, '-');
        $ServiceData['is_featured'] = $r->has('is_featured');
        if ($r->hasFile('image')) {
            $file = $r->file('image');
            $filename = $Service['slug'] . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/services', $filename);
            $ServiceData['image'] = $filename;
        }
        $Service->update($ServiceData);
        return redirect()->route('admin.services.all');
    }

    public function delete(Service $Service){
        $Service->delete();
        return redirect()->route('admin.services.all');
    }
}
