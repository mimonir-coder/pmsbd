<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\Testimonial;
use App\Models\ValuedClient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class DemoContentSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Course::query()->delete();
        Instructor::query()->delete();
        Testimonial::query()->delete();
        ValuedClient::query()->delete();

        Schema::enableForeignKeyConstraints();

        $logoSrc = collect([
            public_path('front/dist/images/Pms.png'),
            public_path('front/dist/images/pms_dark_logo.png'),
        ])->first(fn ($p) => is_readable($p));

        $copyToStorage = function (string $relativePath) use ($logoSrc): ?string {
            if (! $logoSrc) {
                return null;
            }
            Storage::disk('public')->makeDirectory(dirname($relativePath));
            Storage::disk('public')->put($relativePath, File::get($logoSrc));

            return $relativePath;
        };

        $i1 = Instructor::query()->create([
            'name' => 'Khalid Hossain',
            'designation' => 'Lead Trainer, PMP',
            'image' => $copyToStorage('demo/instructors/khalid.png'),
            'qualifications' => 'PMP, PMI-ACP, 15+ years in development sector PM.',
            'bio' => '<p>Specialises in practical project management for NGOs and multilateral programmes.</p><ul><li>PMI Authorized Training Partner facilitator</li><li>Former PMO lead for large national portfolios</li></ul>',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $i2 = Instructor::query()->create([
            'name' => 'Farhana Rahman',
            'designation' => 'Agile Coach',
            'image' => $copyToStorage('demo/instructors/farhana.png'),
            'qualifications' => 'PMI-ACP, Certified ScrumMaster (CSM).',
            'bio' => '<p>Helps teams adopt iterative delivery with realistic governance for donor-funded projects.</p>',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        $i3 = Instructor::query()->create([
            'name' => 'Tanvir Ahmed',
            'designation' => 'Risk & Scheduling SME',
            'image' => $copyToStorage('demo/instructors/tanvir.png'),
            'qualifications' => 'PMP, MSc (Engineering).',
            'bio' => '<p>Focus on schedule quality, risk registers, and earned value basics for field teams.</p>',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        $c1 = Course::query()->create([
            'title' => 'PMP Exam Preparation (Demo)',
            'slug' => 'pmp-exam-preparation-demo',
            'sub_title' => 'Global-standard PM skills aligned with the PMBOK Guide',
            'fee' => 28500.00,
            'featured_image' => $copyToStorage('demo/courses/pmp-banner.png'),
            'promo_video_url' => 'https://www.youtube.com/watch?v=u6z5YtLHteo',
            'overview' => '<h4>Why this programme</h4><p>Build practical skills to initiate, plan, execute, monitor, control, and close projects in line with PMI expectations.</p><p><strong>Outcomes:</strong> clearer scope, better schedules, and confident exam readiness.</p>',
            'content' => '<h4>Modules (sample)</h4><ol><li>Environment &amp; people</li><li>Process groups deep dive</li><li>Agile/hybrid highlights</li><li>Exam strategy &amp; drills</li></ol>',
            'schedule' => '<p><strong>Weekend batch (demo dates)</strong></p><ul><li>Session 1–2: Fri 6:00 PM – 9:00 PM</li><li>Session 3–4: Sat 10:00 AM – 1:00 PM</li><li>Mock exam: Sun 10:00 AM – 1:00 PM</li></ul>',
            'registration_url' => 'https://docs.google.com/forms/d/e/demo/viewform',
            'brochure_path' => null,
            'is_active' => true,
            'sort_order' => 1,
        ]);
        $c1->instructors()->sync([$i1->id, $i2->id]);

        $c2 = Course::query()->create([
            'title' => 'Agile for Development Teams (Demo)',
            'slug' => 'agile-for-development-teams-demo',
            'sub_title' => 'Scrum fundamentals with donor-reporting realities',
            'fee' => 12500.00,
            'featured_image' => $copyToStorage('demo/courses/agile-banner.png'),
            'promo_video_url' => 'https://youtu.be/u6z5YtLHteo',
            'overview' => '<p>Short, hands-on introduction to iterative delivery, backlog hygiene, and stakeholder demos suitable for NGO project teams.</p>',
            'content' => '<ul><li>Roles &amp; events</li><li>Definition of Done</li><li>Backlog refinement workshop</li><li>Retro patterns</li></ul>',
            'schedule' => '<p>Two-day intensive (demo): Day 1 concepts, Day 2 simulations.</p>',
            'registration_url' => 'https://docs.google.com/forms/d/e/demo/viewform',
            'brochure_path' => null,
            'is_active' => true,
            'sort_order' => 2,
        ]);
        $c2->instructors()->sync([$i2->id]);

        $c3 = Course::query()->create([
            'title' => 'Project Scheduling with MS Project (Demo)',
            'slug' => 'scheduling-ms-project-demo',
            'sub_title' => 'Baseline, critical path, and progress tracking',
            'fee' => 9500.00,
            'featured_image' => $copyToStorage('demo/courses/schedule-banner.png'),
            'promo_video_url' => null,
            'overview' => '<p>Learn to build a credible schedule, resource-load key tasks, and report variance simply for management reviews.</p>',
            'content' => '<ol><li>WBS to activities</li><li>Dependencies &amp; constraints</li><li>Baseline &amp; tracking Gantt</li><li>Simple EV metrics</li></ol>',
            'schedule' => '<p>Evening batch (demo): 4 sessions × 2.5 hours.</p>',
            'registration_url' => 'https://docs.google.com/forms/d/e/demo/viewform',
            'brochure_path' => null,
            'is_active' => true,
            'sort_order' => 3,
        ]);
        $c3->instructors()->sync([$i3->id, $i1->id]);

        Testimonial::query()->insert([
            [
                'name' => 'Ayesha Khan',
                'designation' => 'Programme Manager, INGO',
                'image' => $copyToStorage('demo/testimonials/t1.png'),
                'comments' => '<p>“Clear materials and patient facilitation. Our team finally aligned on a single scheduling approach.”</p>',
                'social_link' => 'https://www.linkedin.com/',
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rafiqul Islam',
                'designation' => 'Deputy Director, Government project',
                'image' => $copyToStorage('demo/testimonials/t2.png'),
                'comments' => '<p>“The PMP track was intense but practical—examples matched our procurement and reporting cycles.”</p>',
                'social_link' => null,
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nusrat Jahan',
                'designation' => 'MEL Lead',
                'image' => $copyToStorage('demo/testimonials/t3.png'),
                'comments' => '<p>“Loved the agile session for field teams—simple language, useful templates.”</p>',
                'social_link' => 'https://twitter.com/',
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        ValuedClient::query()->insert([
            ['name' => 'Demo Client Alpha', 'logo' => $copyToStorage('demo/clients/c1.png'), 'sort_order' => 1, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Demo Client Beta', 'logo' => $copyToStorage('demo/clients/c2.png'), 'sort_order' => 2, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Demo Client Gamma', 'logo' => $copyToStorage('demo/clients/c3.png'), 'sort_order' => 3, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Demo Client Delta', 'logo' => $copyToStorage('demo/clients/c4.png'), 'sort_order' => 4, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Demo Client Epsilon', 'logo' => $copyToStorage('demo/clients/c5.png'), 'sort_order' => 5, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Demo Client Zeta', 'logo' => $copyToStorage('demo/clients/c6.png'), 'sort_order' => 6, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
