<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller {
    public function getAdminAll(){
        $Gallery = Gallery::all();
        return view('admin.gallery.all', compact('Gallery'));
    }

    public function getAdminNew(){
        $Gallery = Gallery::all();
        return view('admin.gallery.new', compact('Gallery'));
    }

    public function postAdminNew(Request $r){
        $r->validate([
            'image' => 'required|image|max:5000'
        ]);
        if ($r->hasFile('image')) {
            $file = $r->file('image');
            $filename = rand(1,9999) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/gallery', $filename);
            Gallery::create([
                'image' => $filename,
                'url' => $r->url ?? '#'
            ]);
            return redirect()->route('admin.gallery.all');
        }
    }

    public function getAdminEdit(Gallery $Gallery){
        return view('admin.gallery.edit', compact('Gallery'));
    }

    public function postAdminEdit(Request $r, Gallery $Gallery){
        $r->validate([
            'image' => 'required|image|max:5000'
        ]);
        if ($r->hasFile('image')) {
            $file = $r->file('image');
            $filename = rand(1,9999) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/gallery', $filename);
            $Gallery->update([
                'image' => $filename,
                'url' => $r->url ?? '#'
            ]);
            return redirect()->route('admin.gallery.all')->withSuccess('Gallery Updated');
        }
    }

    public function delete(Gallery $Gallery){
        $Gallery->delete();
        return redirect()->route('admin.gallery.all');
    }
}
