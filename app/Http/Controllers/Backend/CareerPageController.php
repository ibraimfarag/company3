<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use App\Models\HomePage;
use App\Models\AboutPage;
use App\Models\Portfolio;
use App\Models\CareerPage;
use App\Models\Subsidaries;
use Illuminate\Http\Request;
use App\Models\OurValuesAboutPage;
use App\Models\HomesubsidariesPage;
use App\Http\Controllers\Controller;
use App\Models\OurManagementAboutPage;
use App\Models\why_work_at_diamond_groupCareerPage;

class CareerPageController extends Controller
{

    // Start Section One (Intro)
    public function edit_intro(Page $page)
    {
        $intro_career_page = CareerPage::first();
        return view('admin.pages.static_pages.career.intro', compact('page', 'intro_career_page'));
    }
    public function update_intro(Request $request, Page $page)
    {
        $IntroCareerPage = CareerPage::first();
        $IntroCareerPage->update([
            'intro' => $request->intro,
            'intro_ar' => $request->intro_ar,
        ]);

        toastr()->success('Process has been Successfully', 'Process Successfully');
        return redirect()->back();
    }
    // End Section One (Intro)



    // Start Section Two (why work at diamond group?)

    public function show_why_work_at_diamond_group(Page $page)
    {
        $why_work_at_diamond_group = why_work_at_diamond_groupCareerPage::all();
        return view('admin.pages.static_pages.career.why_work_at_diamond_group', compact('page', 'why_work_at_diamond_group'));
    }

    public function add_why_work_at_diamond_group(Request $request, Page $page)
    {
        $request->validate([
            'title' => "required|max:100",
            'title_ar' => "required|max:100",
            'description' => "required|max:100000",
            'description_ar' => "required|max:100000",
        ]);
        $why_work_at_diamond_group = why_work_at_diamond_groupCareerPage::create([
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
                    $why_work_at_diamond_group->update([$key => $image->id . '/' . $image->file_name]);
                }
            }
            exec('chmod -R 775 public/storage');
        }
        toastr()->success('Added Successfully', 'Process Successfully');
        return redirect()->back();
    }

    public function update_why_work_at_diamond_group(Request $request, Page $page, $id)
    {
        $page = $page->where('slug', 'home')->first();
        $request->validate([
            'title' => "required|max:100",
            'title_ar' => "required|max:100",
            'description' => "required|max:100000",
            'description_ar' => "required|max:100000",
        ]);
        $why_work_at_diamond_group = why_work_at_diamond_groupCareerPage::find($id);
        $why_work_at_diamond_group->update([
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
                    $why_work_at_diamond_group->update([$key => $image->id . '/' . $image->file_name]);
                }
            }
            exec('chmod -R 775 public/storage');
        }
        toastr()->success('Updated Successfully', 'Process Successfully');
        return redirect()->back();
    }

    public function delete_our_values($id)
    {
        $why_work_at_diamond_group = why_work_at_diamond_groupCareerPage::find($id);
        $why_work_at_diamond_group->delete();
        toastr()->success('Deleted Successfully', 'Process Successfully');
        return redirect()->back();
    }

    // End Section Two (why work at diamond group?)


}
