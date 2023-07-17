<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use App\Models\HomePage;
use App\Models\AboutPage;
use App\Models\Portfolio;
use App\Models\ContactPage;
use App\Models\Subsidaries;
use Illuminate\Http\Request;
use App\Models\OurValuesAboutPage;
use App\Models\HomesubsidariesPage;
use App\Http\Controllers\Controller;
use App\Models\OurManagementAboutPage;

class ContactPageController extends Controller
{



    // Start (Details)
    public function edit_details(Page $page)
    {
        $contact = ContactPage::first();
        return view('admin.pages.static_pages.contact.index', compact('page', 'contact'));
    }
    public function update_details(Request $request, Page $page)
    {
        $contact = ContactPage::first();
        $contact->update([
            'phone' => $request->phone,
            'address' => $request->address,
            'address_ar' => $request->address_ar,
            'map_location' => $request->map_location,
        ]);

        toastr()->success('Process has been Successfully', 'Process Successfully');
        return redirect()->back();
    }
    // End (details)


}
