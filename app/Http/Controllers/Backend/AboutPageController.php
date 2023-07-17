<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use App\Models\HomePage;
use App\Models\AboutPage;
use App\Models\Portfolio;
use App\Models\Subsidaries;
use Illuminate\Http\Request;
use App\Models\OurValuesAboutPage;
use App\Models\HomesubsidariesPage;
use App\Http\Controllers\Controller;
use App\Models\OurManagementAboutPage;

class AboutPageController extends Controller
{



    // Start Section One (Intro)
    public function edit_intro(Page $page)
    {
        $about = AboutPage::first();
        return view('admin.pages.static_pages.about.intro', compact('page', 'about'));
    }
    public function update_intro(Request $request, Page $page)
    {
        $about = AboutPage::first();
        $about->update([
            'intro' => $request->intro,
            'intro_ar' => $request->intro_ar,
            'description' => $request->description,
            'description_ar' => $request->description_ar,
        ]);

        toastr()->success('Process has been Successfully', 'Process Successfully');
        return redirect()->back();
    }
    // End Section One (Intro)



    // Start Section Two (Our Values)

    public function show_our_values(Page $page)
    {
        $our_values = OurValuesAboutPage::all();
        return view('admin.pages.static_pages.about.our_values', compact('page', 'our_values'));
    }

    public function add_our_values(Request $request, Page $page)
    {
        $request->validate([
            'title' => "required|max:100",
            'title_ar' => "required|max:100",
            'description' => "required|max:100000",
            'description_ar' => "required|max:100000",
        ]);
        $our_values = OurValuesAboutPage::create([
            'title' => $request->title,
            'title_ar' => $request->title_ar,
            'description' => $request->description,
            'description_ar' => $request->description_ar,
        ]);

        if ($request->files) {
            foreach ($request->files as $key => $value) {
                \MainHelper::move_media_to_model_by_id($request->temp_file_selector, $page, "description");
                if ($request->hasFile($key)) {
                    $image = $page->addMedia($value)->toMediaCollection('image');
                    $our_values->update([$key => $image->id . '/' . $image->file_name]);
                }
            }
            exec('chmod -R 775 public/storage');
        }
        toastr()->success('Added Successfully', 'Process Successfully');
        return redirect()->back();
    }

    public function update_our_values(Request $request, Page $page, $id)
    {
        $page = $page->where('slug', 'home')->first();
        $request->validate([
            'title' => "required|max:100",
            'title_ar' => "required|max:100",
            'description' => "required|max:100000",
            'description_ar' => "required|max:100000",
        ]);
        $our_values = OurValuesAboutPage::find($id);
        $our_values->update([
            'title' => $request->title,
            'title_ar' => $request->title_ar,
            'description' => $request->description,
            'description_ar' => $request->description_ar,
        ]);

        if ($request->files) {
            foreach ($request->files as $key => $value) {
                \MainHelper::move_media_to_model_by_id($request->temp_file_selector, $page, "description");
                if ($request->hasFile($key)) {
                    $image = $page->addMedia($value)->toMediaCollection('image');
                    $our_values->update([$key => $image->id . '/' . $image->file_name]);
                }
            }
            exec('chmod -R 775 public/storage');
        }
        toastr()->success('Updated Successfully', 'Process Successfully');
        return redirect()->back();
    }

    public function delete_our_values($id)
    {
        $our_values = OurValuesAboutPage::find($id);
        $our_values->delete();
        toastr()->success('Deleted Successfully', 'Process Successfully');
        return redirect()->back();
    }

    // End Section Two (Our Values)


    // Start Section Three (Our Management)

    public function show_our_management(Page $page)
    {
        $our_management = OurManagementAboutPage::all();
        return view('admin.pages.static_pages.about.our_management', compact('page', 'our_management'));
    }

    public function add_our_management(Request $request, Page $page)
    {
        $request->validate([
            'name' => "required|max:100",
            'name_ar' => "required|max:100",
            'description' => "required|max:100000",
            'description_ar' => "required|max:100000",
        ]);
        $our_management = OurManagementAboutPage::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'description' => $request->description,
            'description_ar' => $request->description_ar,
        ]);

        if ($request->files) {
            foreach ($request->files as $key => $value) {
                \MainHelper::move_media_to_model_by_id($request->temp_file_selector, $page, "description");
                if ($request->hasFile($key)) {
                    $image = $page->addMedia($value)->toMediaCollection('image');
                    $our_management->update([$key => $image->id . '/' . $image->file_name]);
                }
            }
            exec('chmod -R 775 public/storage');
        }
        toastr()->success('Added Successfully', 'Process Successfully');
        return redirect()->back();
    }

    public function update_our_management(Request $request, Page $page, $id)
    {
        $page = $page->where('slug', 'home')->first();
        $request->validate([
            'name' => "required|max:100",
            'name_ar' => "required|max:100",
            'description' => "required|max:100000",
            'description_ar' => "required|max:100000",
        ]);
        $our_management = OurManagementAboutPage::find($id);
        $our_management->update([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'description' => $request->description,
            'description_ar' => $request->description_ar,
        ]);

        if ($request->files) {
            foreach ($request->files as $key => $value) {
                \MainHelper::move_media_to_model_by_id($request->temp_file_selector, $page, "description");
                if ($request->hasFile($key)) {
                    $image = $page->addMedia($value)->toMediaCollection('image');
                    $our_management->update([$key => $image->id . '/' . $image->file_name]);
                }
            }
            exec('chmod -R 775 public/storage');
        }
        toastr()->success('Updated Successfully', 'Process Successfully');
        return redirect()->back();
    }

    public function delete_our_management($id)
    {
        $our_management = OurManagementAboutPage::find($id);
        $our_management->delete();
        toastr()->success('Deleted Successfully', 'Process Successfully');
        return redirect()->back();
    }

    // End Section Three (Our Management)


}
