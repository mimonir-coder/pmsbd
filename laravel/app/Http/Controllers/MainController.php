<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Testimonial;
use App\Models\ValuedClient;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.others.about');
    }

    public function contact()
    {
        return view('pages.others.contact');
    }

    public function pmpCourse()
    {
        return view('pages.others.pmpCourse');
    }

    public function pmiAtp()
    {
        return view('pages.others.pmiAtp');
    }

    public function blog()
    {
        return view('pages.others.blog');
    }

    public function courses()
    {
        $courses = Course::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('updated_at')
            ->paginate(12);

        return view('pages.course', compact('courses'));
    }

    public function courseDetail(Course $course)
    {
        abort_unless($course->is_active, 404);

        $course->load('instructors');

        $testimonials = Testimonial::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->limit(36)
            ->get();

        $clients = ValuedClient::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->limit(60)
            ->get();

        return view('pages.course_detail', compact('course', 'testimonials', 'clients'));
    }

   
    public function login()
    {
        return view('pages.login');
    }

    public function registration()
    {
        return view('pages.registration');
    }


}
