<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectController extends Controller {
    public function getAll(){
        $Categories = Category::latest()->get();
        $Projects = Project::latest()->get();
        return view('projects.all', compact('Categories', 'Projects'));
    }

    public function getSingle(Project $Project){
        return view('projects.single', compact('Project'));
    }

    // Admin
    public function getAdminAll(){
        $Projects = Project::latest()->get();
        return view('admin.projects.all', compact('Projects'));
    }
    public function getAdminNew(){
        $AllCategories = Category::latest()->get();
        return view('admin.projects.new', compact('AllCategories'));
    }
    public function postAdminNew(Request $r){
        $r->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);
        $ProjectData = $r->except(['_token','image']);
        // Generate the slug
        $ProjectData['user_id'] = auth()->user()->id;
        $ProjectData['slug'] = Str::slug($r->title, '-');
        if ($r->hasFile('image')) {
            $file = $r->file('image');
            $filename = $ProjectData['slug'] . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/projects', $filename);
            $ProjectData['image'] = $filename;
        }
        Project::create($ProjectData);
        return redirect()->route('admin.projects.all');
    }

    public function getAdminEdit(Project $Project){
        $AllCategories = Category::latest()->get();
        return view('admin.projects.edit', compact('Project', 'AllCategories'));
    }

    public function postAdminEdit(Request $r, Project $Project){
        $r->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $ProjectData = $r->except(['_token']);
        if ($r->hasFile('image')) {
            $file = $r->file('image');
            $filename = $Project['slug'] . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/projects', $filename);
            $ProjectData['image'] = $filename;
        }
        $Project->update($ProjectData);
        return redirect()->route('admin.projects.all');
    }

    public function delete(Project $Project){
        $Project->delete();
        return redirect()->route('admin.projects.all');
    }
}
