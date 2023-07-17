<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Page;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Category;
use App\Helpers\MainHelper;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use App\Models\ArticleComment;
use App\Models\CareerForm;
use App\Models\CareerPage;
use App\Models\ContactPage;
use App\Models\HomePage;
use App\Models\OurManagementAboutPage;
use App\Models\OurValuesAboutPage;
use App\Models\Portfolio;
use App\Models\Subsidaries;
use App\Models\why_work_at_diamond_groupCareerPage;

class FrontController extends Controller
{

    public function index(Request $request)
    {
        $home_page = HomePage::first();
        $subsidaries = Subsidaries::all();
        $news = Article::take(3)->orderBy('id', 'desc')->get();
        $portfolio = Portfolio::all();
        $contact = ContactPage::select('map_location')->first();
        return view('front.index', compact('home_page', 'subsidaries', 'news', 'portfolio', 'contact'));
    }

    public function comment_post(Request $request)
    {
        if (auth()->check()) {
            $request->validate([
                "content" => "required|min:3|max:10000",
            ]);
            ArticleComment::create([
                'user_id' => auth()->user()->id,
                'article_id' => $request->article_id,
                'content' => $request->content,
            ]);
        } else {
            $request->validate([
                'adder_name' => "nullable|min:3|max:190",
                'adder_email' => "nullable|email",
                "content" => "required|min:3|max:10000",
            ]);
            ArticleComment::create([
                'article_id' => $request->article_id,
                'adder_name' => $request->adder_name,
                'adder_email' => $request->adder_email,
                'content' => $request->content,
            ]);
        }
        toastr()->success("Your comment has been successfully added and will be made public after review ");
        return redirect()->back();
    }

    public function contact_post(Request $request)
    {
        $request->validate([
            'name' => "required|min:3|max:190",
            'email' => "nullable|email",
            "phone" => "required|numeric",
            'country' => "nullable|min:2|max:100",
            "message" => "nullable",
        ]);
        // if (MainHelper::recaptcha($request->recaptcha) < 0.8) abort(401);
        Contact::create([
            'user_id' => auth()->check() ? auth()->id() : NULL,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'message' =>/*"قادم من : ".urldecode(url()->previous())."\n\nالرسالة : ".*/ $request->message
        ]);

        toastr()->success('Your Message Has Been Send Successfully And We Will Contact You Soon !');
        //\Session::flash('message', __("Your Message Has Been Send Successfully And We Will Contact You Soon !"));
        return redirect()->back();
    }
    public function category(Request $request, Category $category)
    {
        $articles = Article::where(function ($q) use ($request, $category) {
            if ($request->user_id != null)
                $q->where('user_id', $request->user_id);

            $q->whereHas('categories', function ($q) use ($request, $category) {
                $q->where('category_id', $category->id);
            });
        })->with(['categories', 'tags'])->withCount(['comments' => function ($q) {
            $q->where('reviewed', 1);
        }])->orderBy('id', 'DESC')->paginate();
        return view('front.pages.blog', compact('articles', 'category'));
    }
    public function tag(Request $request, Tag $tag)
    {

        $articles = Article::where(function ($q) use ($request, $tag) {
            if ($request->user_id != null)
                $q->where('user_id', $request->user_id);

            $q->whereHas('tags', function ($q) use ($request, $tag) {
                $q->where('tag_id', $tag->id);
            });
        })->with(['categories', 'tags'])->withCount(['comments' => function ($q) {
            $q->where('reviewed', 1);
        }])->orderBy('id', 'DESC')->paginate();

        return view('front.pages.blog', compact('articles', 'tag'));
    }
    public function article(Request $request, Article $article)
    {
        $article->load(['categories', 'comments' => function ($q) {
            $q->where('reviewed', 1);
        }, 'tags'])->loadCount(['comments' => function ($q) {
            $q->where('reviewed', 1);
        }]);
        $this->views_increase_article($article);
        return view('front.pages.article.show', compact('article'));
    }
    public function page(Request $request, Page $page)
    {
        return view('front.pages.page', compact('page'));
    }
    public function news(Request $request)
    {
        $articles = Article::where(function ($q) use ($request) {
            if ($request->category_id != null)
                $q->where('category_id', $request->category_id);
            if ($request->user_id != null)
                $q->where('user_id', $request->user_id);
        })->with(['categories', 'tags'])->withCount(['comments' => function ($q) {
            $q->where('reviewed', 1);
        }])->orderBy('id', 'DESC')->paginate();
        return view('front.pages.article.index', compact('articles'));
    }
    public function views_increase_article(Article $article)
    {
        $counter = $article->item_seens()->where('type', "ARTICLE")->where('ip', \UserSystemInfoHelper::get_ip())->whereDate('created_at', \Carbon::today())->count();
        if (!$counter) {
            \App\Models\ItemSeen::create([
                'type_id' => $article->id,
                'type' => "ARTICLE",
                'ip' => \UserSystemInfoHelper::get_ip(),
                'prev_link' => \UserSystemInfoHelper::prev_url(),
                'agent_name' => request()->header('User-Agent'),
                'browser' => \UserSystemInfoHelper::get_browsers(),
                'device' => \UserSystemInfoHelper::get_device(),
                'operating_system' => \UserSystemInfoHelper::get_os()
            ]);
            $article->update(['views' => $article->views + 1]);
        }
    }

    public function sub_subsidaries($id)
    {
        $subsidaries = Subsidaries::find($id);
        return view('front.pages.subsidaries.sub_subsidaries', compact('subsidaries'));
    }
    public function index_subsidaries()
    {
        $subsidaries = Subsidaries::all();
        return view('front.pages.subsidaries.index', compact('subsidaries'));
    }

    public function index_career()
    {
        $career = CareerPage::first();
        $why_work_at_diamond_group = why_work_at_diamond_groupCareerPage::all();
        return view('front.pages.career.index', compact('career', 'why_work_at_diamond_group'));
    }

    public function career_form(Request $request)
    {
        $request->validate([
            'name' => "required|min:3|max:190",
            'email' => "nullable|email",
            "phone" => "required|numeric",
            'country' => "nullable|min:2|max:100",
            "message" => "nullable",
            'cv' => 'required|mimes:pdf'
        ]);
        // if (MainHelper::recaptcha($request->recaptcha) < 0.8) abort(401);
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $filename = $file->store('cvs');
        }

        $result = CareerForm::create([
            'user_id' => auth()->check() ? auth()->id() : NULL,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'message' =>/*"قادم من : ".urldecode(url()->previous())."\n\nالرسالة : ".*/ $request->message,
            'cv' => $filename
        ]);

        if ($result) {
            return response()->json([], 200);
        } else {
            return response()->json([], 500);
        }


        // toastr()->success('Your Message Has Been Send Successfully And We Will Contact You Soon !');
        // //\Session::flash('message', __("Your Message Has Been Send Successfully And We Will Contact You Soon !"));
        // return redirect()->back();
    }

    public function contact()
    {
        $contact = ContactPage::first();
        return view('front.pages.contact', compact('contact'));
    }

    public function about()
    {
        $about = AboutPage::first();
        $our_values = OurValuesAboutPage::all();
        $our_management = OurManagementAboutPage::all();
        return view('front.pages.about', compact('about', 'our_values', 'our_management'));
    }
}
