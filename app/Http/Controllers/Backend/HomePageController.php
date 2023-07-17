<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use App\Models\HomePage;
use App\Models\Portfolio;
use App\Helpers\MainHelper;
use App\Models\Subsidaries;
use Illuminate\Http\Request;
use App\Models\HomesubsidariesPage;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public static function update(Request $request, $page)
    {
        $home = HomePage::first();
        if ($request->files) {
            foreach ($request->files as $key => $value) {
                \MainHelper::move_media_to_model_by_id($request->temp_file_selector, $page, "description");
                if ($request->hasFile($key)) {
                    $image = $page->addMedia($value)->toMediaCollection('image');
                    $home->update([$key => $image->id . '/' . $image->file_name]);
                }
            }
            exec('chmod -R 775 public/storage');
        }

        $home->update([
            'industries_text' => $request->industries_text,
            'industries_text2' => $request->industries_text2,
            'industries_text3' => $request->industries_text3,
        ]);
    }


    // Start Section One (Header)
    public function edit_section_one(Page $page)
    {
        return view('admin.pages.static_pages.home.section_one', compact('page'));
    }
    public function update_section_one(Request $request, Page $page)
    {
        $home = HomePage::first();
        if ($request->files) {
            foreach ($request->files as $key => $value) {
                MainHelper::move_media_to_model_by_id($request->temp_file_selector, $page, "description");
                if ($request->hasFile($key)) {
                    $image = $page->addMedia($value)->toMediaCollection('image');
                    $home->update([$key => $image->id . '/' . $image->file_name]);
                }
            }
            exec('chmod -R 775 public/storage');
        }
        toastr()->success('Process has been Successfully', 'Process Successfully');
        return redirect()->back();
    }
    // End Section One (Header)

    // Start Section Two (INDUSTRIES)
    public function edit_section_two(Page $page)
    {
        $home = HomePage::first();
        $page['industries_text'] = $home->industries_text;
        $page['industries_text_ar'] = $home->industries_text_ar;
        $page['industries_text2'] = $home->industries_text2;
        $page['industries_text2_ar'] = $home->industries_text2_ar;
        $page['industries_text3'] = $home->industries_text3;
        $page['industries_text3_ar'] = $home->industries_text3_ar;
        return view('admin.pages.static_pages.home.section_two', compact('page'));
    }

    public function update_section_two(Request $request, Page $page)
    {

        $home = HomePage::first();
        if ($request->files) {
            foreach ($request->files as $key => $value) {
                \MainHelper::move_media_to_model_by_id($request->temp_file_selector, $page, "description");
                if ($request->hasFile($key)) {
                    $image = $page->addMedia($value)->toMediaCollection('image');
                    $home->update([$key => $image->id . '/' . $image->file_name]);
                }
            }
            exec('chmod -R 775 public/storage');
        }



        $home->update([
            'industries_text' => $request->industries_text,
            'industries_text_ar' => $request->industries_text_ar,
            'industries_text2' => $request->industries_text2,
            'industries_text2_ar' => $request->industries_text2_ar,
            'industries_text3' => $request->industries_text3,
            'industries_text3_ar' => $request->industries_text3_ar,
        ]);

        toastr()->success('Process has been Successfully', 'Process Successfully');
        return redirect()->back();
    }
    // End Section Two (INDUSTRIES)

    // Start Section Three (subsidaries)

    public function show_section_three(Page $page)
    {
        $subsidaries = Subsidaries::all();
        return view('admin.pages.static_pages.home.section_three', compact('page', 'subsidaries'));
    }

    public function add_subsidaries(Request $request, Page $page)
    {
        $request->validate([
            'subsidaries_title' => "required|max:100",
            'subsidaries_title_ar' => "required|max:100",
            'subsidaries_description' => "required|max:100000",
            'subsidaries_description_ar' => "required|max:100000",
            'click_here_to_visit' => "nullable|max:150",
            'click_here_to_visit_ar' => "nullable|max:150",
            'link' => "nullable|max:300",
        ]);
        $subsidaries = Subsidaries::create([
            'subsidaries_title' => $request->subsidaries_title,
            'subsidaries_title_ar' => $request->subsidaries_title_ar,
            'subsidaries_description' => $request->subsidaries_description,
            'subsidaries_description_ar' => $request->subsidaries_description_ar,
            'click_here_to_visit' => $request->click_here_to_visit,
            'click_here_to_visit_ar' => $request->click_here_to_visit_ar,
            'link' => $request->link,
        ]);

        if ($request->files) {
            foreach ($request->files as $key => $value) {
                \MainHelper::move_media_to_model_by_id($request->temp_file_selector, $page, "description");
                if ($request->hasFile($key)) {
                    $image = $page->addMedia($value)->toMediaCollection('image');
                    $subsidaries->update([$key => $image->id . '/' . $image->file_name]);
                }
            }
            exec('chmod -R 775 public/storage');
        }
        toastr()->success('Added Successfully', 'Process Successfully');
        return redirect()->back();
    }

    public function update_subsidaries(Request $request, Page $page, $id)
    {
        $page = $page->where('slug', 'home')->first();
        $request->validate([
            'subsidaries_title' => "max:200",
            'subsidaries_title_ar' => "max:200",
            'subsidaries_description' => "max:100000",
            'subsidaries_description_ar' => "max:100000",
            'click_here_to_visit' => "nullable|max:300",
            'click_here_to_visit_ar' => "nullable|max:300",
            'link' => "nullable|max:300",
        ]);
        $subsidaries = Subsidaries::find($id);
        $subsidaries->update([
            'subsidaries_title' => $request->subsidaries_title,
            'subsidaries_title_ar' => $request->subsidaries_title_ar,
            'subsidaries_description' => $request->subsidaries_description,
            'subsidaries_description_ar' => $request->subsidaries_description_ar,
            'click_here_to_visit' => $request->click_here_to_visit,
            'click_here_to_visit_ar' => $request->click_here_to_visit_ar,
            'link' => $request->link,
        ]);

        if ($request->files) {
            foreach ($request->files as $key => $value) {
                \MainHelper::move_media_to_model_by_id($request->temp_file_selector, $page, "description");
                if ($request->hasFile($key)) {
                    $image = $page->addMedia($value)->toMediaCollection('image');
                    $subsidaries->update([$key => $image->id . '/' . $image->file_name]);
                }
            }
            exec('chmod -R 775 public/storage');
        }
        toastr()->success('Updated Successfully', 'Process Successfully');
        return redirect()->back();
    }

    public function delete_subsidaries($id)
    {
        $Subsidaries = Subsidaries::find($id);
        $Subsidaries->delete();
        toastr()->success('Deleted Successfully', 'Process Successfully');
        return redirect()->back();
    }

    // End Section Three (subsidaries)


    // Start Section Five (Portfolio)

    public function show_section_five(Page $page)
    {
        $portfolio = Portfolio::all();
        return view('admin.pages.static_pages.home.section_five', compact('page', 'portfolio'));
    }

    public function add_portfolio(Request $request, Page $page)
    {
        $request->validate([
            'title' => "required|max:100",
            'title_ar' => "required|max:100",
            'sub_title' => "required|max:100",
            'sub_title_ar' => "required|max:100",

        ]);
        $portfolio = Portfolio::create([
            'title' => $request->title,
            'title_ar' => $request->title_ar,
            'sub_title' => $request->sub_title,
            'sub_title_ar' => $request->sub_title_ar
        ]);

        if ($request->files) {
            foreach ($request->files as $key => $value) {
                \MainHelper::move_media_to_model_by_id($request->temp_file_selector, $page, "description");
                if ($request->hasFile($key)) {
                    $image = $page->addMedia($value)->toMediaCollection('image');
                    $portfolio->update([$key => $image->id . '/' . $image->file_name]);
                }
            }
            exec('chmod -R 775 public/storage');
        }
        toastr()->success('Added Successfully', 'Process Successfully');
        return redirect()->back();
    }

    public function update_portfolio(Request $request, Page $page, $id)
    {
        $page = $page->where('slug', 'home')->first();
        $request->validate([
            'title' => "max:200",
            'title_ar' => "max:200",
            'sub_title' => "max:200",
            'sub_title_ar' => "max:200",
        ]);
        $portfolio = Portfolio::find($id);
        $portfolio->update([
            'title' => $request->title,
            'title_ar' => $request->title_ar,
            'sub_title' => $request->sub_title,
            'sub_title_ar' => $request->sub_title_ar
        ]);

        if ($request->files) {
            foreach ($request->files as $key => $value) {
                \MainHelper::move_media_to_model_by_id($request->temp_file_selector, $page, "description");
                if ($request->hasFile($key)) {
                    $image = $page->addMedia($value)->toMediaCollection('image');
                    $portfolio->update([$key => $image->id . '/' . $image->file_name]);
                }
            }
            exec('chmod -R 775 public/storage');
        }
        toastr()->success('Updated Successfully', 'Process Successfully');
        return redirect()->back();
    }

    public function delete_portfolio($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->delete();
        toastr()->success('Deleted Successfully', 'Process Successfully');
        return redirect()->back();
    }

    // End Section Five (portfolio)
}
