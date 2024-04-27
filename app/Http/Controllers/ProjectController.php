<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller {
    public function getAll() {
        $Categories = Category::Language()->latest()->get();
        $Projects = Project::Language()->latest()->get();

        return view('projects.all', compact('Categories', 'Projects'));
    }

    public function getSingle(Project $Project) {
        return view('projects.single', compact('Project'));
    }

    // Admin
    public function getAdminAll() {
        $Projects = Project::latest()->get();

        return view('admin.projects.all', compact('Projects'));
    }

    public function getAdminNew() {
        $AllCategories = Category::latest()->get();
        if ('local' === env('APP_ENV')) {
            $nextProjectId = DB::table('sqlite_sequence')->where('name', 'projects')->value('seq') + 1;
        } else {
            $nextProjectId = DB::select("SHOW TABLE STATUS LIKE 'projects'")[0]->Auto_increment;
        }

        return view('admin.projects.new', compact('AllCategories', 'nextProjectId'));
    }

    public function postAdminNew(Request $r) {
        $r->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'lang' => 'required',
        ]);
        $ProjectData = $r->except(['_token', 'image']);
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

    public function getAdminEdit(Project $Project) {
        $AllCategories = Category::latest()->get();

        return view('admin.projects.edit', compact('Project', 'AllCategories'));
    }

    public function postAdminEdit(Request $r, Project $Project) {
        $r->validate([
            'title' => 'required',
            'content' => 'required',
            'lang' => 'required',
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

    public function delete(Project $Project) {
        $Project->delete();

        return redirect()->route('admin.projects.all');
    }

    public function uploadGallery(Request $r, $project_id) {
        $r->validate([
            'file' => 'required|image',
        ]);

        if ($r->hasFile('file')) {
            $file = $r->file('file');
            $filename = $project_id . '_' . time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/projects_gallery', $filename);
            // Create a DB recorod with this information
            ProjectImage::create([
                'project_id' => $project_id,
                'image' => $filename,
            ]);

            return response()->json(['success' => 'File uploaded successfully', 'filename' => $filename]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);

    }
}
