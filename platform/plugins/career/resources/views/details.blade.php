<!-- breadcrumb area start -->
<section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
    <div class="rs-breadcrumb-bg" style="background: #424242;"></div>
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 col-xl-8 col-lg-8">
                <div class="rs-breadcrumb-content-wrapper">
                    <div class="rs-breadcrumb-title-wrapper">
                        <h1 class="rs-breadcrumb-title">{{ $job->name }}</h1>
                    </div>
                    <div class="rs-breadcrumb-menu">
                        <nav>
                            <ul>
                                <li><span><a href="{{ BaseHelper::getHomepageUrl() }}">Home</a></span></li>
                                {{-- <li><span>{{ $job->name }}</span></li> --}}
                                <li><span>{{ $job->name }}</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

{{-- <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
    <div class="rs-breadcrumb-bg" style="background: #0b2d5b;"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="rs-breadcrumb-content-wrapper" style="padding: 50px 0;">
                    <div class="rs-breadcrumb-title-wrapper">
                        <h1 class="rs-breadcrumb-title" style="color: #fff; margin-bottom: 10px;">
                            {{ $job->name }}
                        </h1>
                    </div>
                    <div class="rs-breadcrumb-menu">
                        <nav>
                            <ul style="display:flex; gap:10px; list-style:none; padding:0; margin:0; flex-wrap:wrap;">
                                <li><a href="{{ BaseHelper::getHomepageUrl() }}" style="color:#fff;">Home</a></li>
                                <li style="color:#fff;">/</li>
                                <li><a href="{{ url('/careers') }}" style="color:#fff;">Careers</a></li>
                                <li style="color:#fff;">/</li>
                                <li style="color:#fff;">{{ $job->name }}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<style>
    .career-details-section {
        background: #f5f7fb;
        padding: 60px 0;
    }

    .career-top-card,
    .career-main-card,
    .career-side-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
    }

    .career-top-card {
        padding: 30px;
        margin-bottom: 30px;
    }

    .career-top-wrap {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .career-brand-wrap {
        display: flex;
        align-items: center;
        gap: 20px;
        flex: 1;
        min-width: 280px;
    }

    .career-logo-box {
        width: 120px;
        height: 120px;
        min-width: 120px;
        border-radius: 14px;
        background: #eef4ff;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .career-logo-box img {
        max-width: 80%;
        max-height: 80%;
        object-fit: contain;
    }

    .career-job-title {
        font-size: 34px;
        line-height: 1.2;
        font-weight: 700;
        color: #0b2d5b;
        margin-bottom: 10px;
    }

    .career-company {
        font-size: 18px;
        color: #555;
        margin-bottom: 12px;
    }

    .career-vacancy {
        font-size: 18px;
        font-weight: 600;
        color: #111;
    }

    .career-apply-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #0b2d5b;
        color: #fff !important;
        padding: 14px 32px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        min-width: 160px;
        transition: 0.3s;
    }

    .career-apply-btn:hover {
        background: #123f7d;
        color: #fff !important;
    }

    .career-content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
    }

    .career-main-card {
        padding: 35px;
    }

    .career-side-card {
        overflow: hidden;
    }

    .career-side-head {
        background: #eef1fb;
        padding: 18px 22px;
        font-size: 28px;
        font-weight: 700;
        color: #0b2d5b;
    }

    .career-side-body {
        padding: 24px 22px;
    }

    .career-section-title {
        font-size: 42px;
        font-weight: 700;
        color: #0b2d5b;
        margin-bottom: 25px;
    }

    .career-small-title {
        font-size: 24px;
        font-weight: 700;
        color: #222;
        margin-bottom: 18px;
    }

    .career-desc-text,
    .career-main-card p,
    .career-main-card li {
        font-size: 24px;
        line-height: 1.8;
        color: #444;
    }

    .career-main-card ul {
        padding-left: 22px;
        margin-bottom: 0;
    }

    .career-overview-list {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .career-overview-list li {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        font-size: 20px;
    }

    .career-overview-list li:last-child {
        border-bottom: none;
    }

    .career-overview-list strong {
        color: #111;
        min-width: 130px;
    }

    .career-overview-list span {
        color: #444;
        text-align: right;
        flex: 1;
    }

    .career-share-icons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .career-share-icons a {
        width: 48px;
        height: 48px;
        border: 1px solid #d9d9d9;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #0b2d5b;
        font-size: 20px;
        text-decoration: none;
        transition: 0.3s;
    }

    .career-share-icons a:hover {
        background: #0b2d5b;
        color: #fff;
        border-color: #0b2d5b;
    }

    .career-back-btn {
        display: inline-block;
        margin-top: 30px;
        background: #0b2d5b;
        color: #fff !important;
        padding: 12px 24px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
    }

    @media (max-width: 991px) {
        .career-content-grid {
            grid-template-columns: 1fr;
        }

        .career-job-title {
            font-size: 28px;
        }

        .career-section-title {
            font-size: 32px;
        }
    }

    @media (max-width: 767px) {
        .career-details-section {
            padding: 40px 0;
        }

        .career-top-card,
        .career-main-card {
            padding: 22px;
        }

        .career-top-wrap {
            align-items: flex-start;
        }

        .career-brand-wrap {
            flex-direction: column;
            align-items: flex-start;
        }

        .career-logo-box {
            width: 90px;
            height: 90px;
            min-width: 90px;
        }

        .career-job-title {
            font-size: 24px;
        }

        .career-company,
        .career-vacancy {
            font-size: 16px;
        }

        .career-section-title {
            font-size: 28px;
        }

        .career-small-title {
            font-size: 20px;
        }

        .career-desc-text,
        .career-main-card p,
        .career-main-card li {
            font-size: 16px;
        }

        .career-overview-list li {
            flex-direction: column;
            align-items: flex-start;
            font-size: 16px;
        }

        .career-overview-list span {
            text-align: left;
        }

        .career-side-head {
            font-size: 22px;
        }

        .career-apply-btn {
            width: 100%;
        }
    }
</style>

<section class="career-details-section">
    <div class="container">

        <!-- Top card -->
        <div class="career-top-card">
            <div class="career-top-wrap">
                <div class="career-brand-wrap">
                    <div class="career-logo-box">
                        {{-- Logo hoy to aa use karo --}}
                        {{-- <img src="{{ asset('path-to-logo.png') }}" alt="{{ $job->company }}"> --}}

                        {{-- Logo na hoy to company first letter --}}
                        <span style="font-size:48px; font-weight:700; color:#0b2d5b;">
                            {{ strtoupper(substr($job->company ?? 'C', 0, 1)) }}
                        </span>
                    </div>

                    <div class="career-brand-content">
                        <h2 class="career-job-title">{{ $job->name }}</h2>
                        <div class="career-company">{{ $job->company }}</div>

                        @if(!empty($job->vacancy))
                            <div class="career-vacancy">Vacancy: {{ $job->vacancy }}</div>
                        @endif
                    </div>
                </div>

                <div>
                    <a href="#apply-now" class="career-apply-btn">Apply Now</a>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="career-content-grid">

            <!-- Left -->
            <div class="career-main-card">
                <h3 class="career-section-title">Job Description</h3>

                @if(!empty($job->question))
                    <h4 class="career-small-title">{{ $job->question }}</h4>
                @endif

                @if(!empty($job->answer))
                    <div class="career-desc-text">
                        {!! nl2br(e($job->answer)) !!}
                    </div>
                @else
                    <p>No description available.</p>
                @endif

                <a href="{{ url()->previous() }}" class="career-back-btn">Back</a>
            </div>

            <!-- Right -->
            <div>
                <div class="career-side-card" style="margin-bottom: 30px;">
                    <div class="career-side-head">Share This Job</div>
                    <div class="career-side-body">
                        <div class="career-share-icons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="career-side-card">
                    <div class="career-side-head">Job Overview</div>
                    <div class="career-side-body">
                        <ul class="career-overview-list">
                            @if(!empty($job->vacancy))
                                <li>
                                    <strong>Vacancy</strong>
                                    <span>{{ $job->vacancy }}</span>
                                </li>
                            @endif

                            @if(!empty($job->job_type))
                                <li>
                                    <strong>Job Type</strong>
                                    <span>{{ $job->job_type }}</span>
                                </li>
                            @endif

                            @if(!empty($job->experience))
                                <li>
                                    <strong>Experience</strong>
                                    <span>{{ $job->experience }}</span>
                                </li>
                            @endif

                            @if(!empty($job->location))
                                <li>
                                    <strong>Job Location</strong>
                                    <span>{{ $job->location }}</span>
                                </li>
                            @endif

                            @if(!empty($job->category))
                                <li>
                                    <strong>Category</strong>
                                    <span>{{ $job->category }}</span>
                                </li>
                            @endif

                            @if(!empty($job->gender))
                                <li>
                                    <strong>Gender</strong>
                                    <span>{{ $job->gender }}</span>
                                </li>
                            @endif

                            @if(!empty($job->salary))
                                <li>
                                    <strong>Salary</strong>
                                    <span>{{ $job->salary }}</span>
                                </li>
                            @endif

                            @if(empty($job->vacancy) && empty($job->job_type) && empty($job->experience) && empty($job->location) && empty($job->category) && empty($job->gender) && empty($job->salary))
                                <li>
                                    <strong>Company</strong>
                                    <span>{{ $job->company }}</span>
                                </li>
                                <li>
                                    <strong>Qualification</strong>
                                    <span>{{ $job->qualification }}</span>
                                </li>
                                <li>
                                    <strong>Experience</strong>
                                    <span>{{ $job->experience }}</span>
                                </li>
                                <li>
                                    <strong>Location</strong>
                                    <span>{{ $job->location }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Apply section -->
        <div id="apply-now" class="career-main-card" style="margin-top: 30px;">
            <h3 class="career-section-title" style="margin-bottom:20px;">Apply for this Job</h3>

            <form action="#" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6" style="margin-bottom:20px;">
                        <input type="text" name="name" placeholder="Your Name" class="form-control" style="height:52px;">
                    </div>

                    <div class="col-md-6" style="margin-bottom:20px;">
                        <input type="email" name="email" placeholder="Your Email" class="form-control" style="height:52px;">
                    </div>

                    <div class="col-md-6" style="margin-bottom:20px;">
                        <input type="text" name="phone" placeholder="Phone Number" class="form-control" style="height:52px;">
                    </div>

                    <div class="col-md-6" style="margin-bottom:20px;">
                        <input type="text" name="location" placeholder="Location" class="form-control" style="height:52px;">
                    </div>

                    <div class="col-12" style="margin-bottom:20px;">
                        <textarea name="message" rows="5" placeholder="Write your message" class="form-control"></textarea>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="career-apply-btn" style="border:none;">Submit Application</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>
