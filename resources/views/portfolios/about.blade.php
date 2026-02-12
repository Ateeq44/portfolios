@extends('layouts.app_front')
@section('title','Portfolios')
<style>
    main{
        margin-top: 130px !important;
    }
</style>
@section('content')
<section class="hero-section header-section ">
    <div class="header-bottom">
        <div class="row align-items-center min-vh-80">
            <div class="col-lg-12 fgdfds">
                <h1 class="display-4 fw-bold mb-4 text-center" style="line-height: 1.2;">
                    Who We Are
                </h1>
                <p class="lead text-muted text-center">
                    Engineering Digital Excellence Since 2018
                </p>
                <p class="lead text-muted mb-0 text-center">
                    We're more than a software development company—we're architects of digital transformation. 
                    Our team of passionate engineers and designers partners with ambitious businesses to build 
                    technology that creates lasting impact.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <span class="section-label">Our Mission</span>
                <h2 class="display-6 fw-bold mb-4">Democratizing Technology for Ambitious Businesses</h2>
                <p class="lead text-muted mb-4">
                    We believe world-class software shouldn't be exclusive to tech giants. Every business deserves 
                    access to cutting-edge technology that drives growth, efficiency, and competitive advantage.
                </p>
                <p class="text-muted mb-4">
                    Our mission is to bridge the gap between complex technical challenges and business success. 
                    We don't just write code—we translate your vision into scalable digital solutions that evolve 
                    with your ambitions.
                </p>
                <div class="d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center text-muted">
                        <i class="fa-solid fa-circle-check me-2"></i>
                        <span>Client-First Approach</span>
                    </div>
                    <div class="d-flex align-items-center text-muted">
                        <i class="fa-solid fa-circle-check me-2"></i>
                        <span>Transparent Communication</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&h=600&fit=crop" 
                    alt="Our Team" class="img-fluid rounded-4 shadow-lg">
                    <div class="position-absolute bottom-0 start-0 m-4 bg-white p-4 rounded-4 shadow-lg d-none d-md-block">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary bg-opacity-10 p-2 rounded-3">
                                <i class="fa-solid fa-award" style="font-size: 28px;"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">Top 100</h6>
                                <small class="text-muted">Fastest Growing Agencies</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. Core Values -->
<section class="py-5">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-lg-6">
                <span class="section-label">What Drives Us</span>
                <h2 class="display-5 fw-bold">Our Core Values</h2>
                <p class="lead text-muted">The principles that guide every decision we make and every line of code we write.</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Partnership First</h4>
                    <p class="text-muted mb-0">
                        We don't have clients; we have partners. Your success is our success. We embed ourselves 
                        in your team, understand your culture, and align our goals with your business objectives.
                    </p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fa-solid fa-arrow-right-arrow-left"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Relentless Excellence</h4>
                    <p class="text-muted mb-0">
                        Good enough isn't in our vocabulary. We obsess over code quality, user experience, and 
                        performance optimization. Every product we ship represents our commitment to craftsmanship.
                    </p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Radical Transparency</h4>
                    <p class="text-muted mb-0">
                        No hidden costs, no technical jargon masking issues, no surprises. We believe honest 
                        communication builds trust, and trust builds lasting relationships.
                    </p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Continuous Innovation</h4>
                    <p class="text-muted mb-0">
                        Technology evolves rapidly, and so do we. We invest 20% of our time in R&D, exploring 
                        emerging technologies so our partners always stay ahead of the curve.
                    </p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <h4 class="fw-bold mb-3">People-Centric</h4>
                    <p class="text-muted mb-0">
                        Technology serves people, not the other way around. We design for the end-user, prioritize 
                        team wellbeing, and contribute to tech education in underserved communities.
                    </p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fa-solid fa-earth-americas"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Sustainable Impact</h4>
                    <p class="text-muted mb-0">
                        We build for longevity, not just launch. Our solutions are designed to scale sustainably, 
                        minimize environmental impact, and create positive change in the world.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Stats Section -->
<section class="stats-section">
    <div class="container position-relative">
        <div class="row g-5 text-center">
            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <h3>40+</h3>
                    <p class="mb-0 opacity-75">Projects Delivered</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <h3>15+</h3>
                    <p class="mb-0 opacity-75">Expert Team Members</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <h3>98%</h3>
                    <p class="mb-0 opacity-75">Client Retention</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <h3>3+</h3>
                    <p class="mb-0 opacity-75">Years of Excellence</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. Leadership Team -->
<section id="team" class="team-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <span class="section-label">Meet The Leaders</span>
                <h2 class="display-5 fw-bold">The Visionaries Behind ARU WebTech</h2>
                <p class="lead text-muted">Passionate experts dedicated to your success</p>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- CEO -->
            <div class="col-md-6 col-lg-3">
                <div class="team-card">
                    <div class="team-img-wrapper">
                        <img src="{{ asset('images/1.png') }}" alt="CEO" class="team-img">
                    </div>
                    <div class="team-info">
                        <h4 class="fw-bold mb-1">Ateeq Ur Rehman</h4>
                        <p class="text-primary fw-semibold mb-0">Full Stack Developer</p>
                    </div>
                </div>
            </div>
            
            <!-- CTO -->
            <div class="col-md-6 col-lg-3">
                <div class="team-card">
                    <div class="team-img-wrapper">
                        <img src="{{ asset('images/2.png') }}" alt="CTO" class="team-img">
                    </div>
                    <div class="team-info">
                        <h4 class="fw-bold mb-1">Moeez Ahmad</h4>
                        <p class="text-primary fw-semibold mb-0">Full Stack Developer</p>
                    </div>
                </div>
            </div>
            
            <!-- Design Lead -->
            <div class="col-md-6 col-lg-3">
                <div class="team-card">
                    <div class="team-img-wrapper">
                        <img src="{{ asset('images/3.png') }}" alt="Design Lead" class="team-img">
                    </div>
                    <div class="team-info">
                        <h4 class="fw-bold mb-1">Jahanzaib Razzaq</h4>
                        <p class="text-primary fw-semibold mb-0">SEO Expert</p>
                    </div>
                </div>
            </div>
            <!-- Design Lead -->
            <div class="col-md-6 col-lg-3">
                <div class="team-card">
                    <div class="team-img-wrapper">
                        <img src="{{ asset('images/4.png') }}" alt="Design Lead" class="team-img">
                    </div>
                    <div class="team-info">
                        <h4 class="fw-bold mb-1">Junaid Ahmad</h4>
                        <p class="text-primary fw-semibold mb-0">Frontend Developer | WordPress Expert</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. Why Choose Us -->
<section class="py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <span class="section-label">The ARU WebTech Difference</span>
                <h2 class="display-5 fw-bold mb-4">Why Forward-Thinking Companies Choose Us</h2>
                
                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                            <div class="circlde">
                                <i class="fa-solid fa-1"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h5 class="fw-bold">Strategic Technical Partners</h5>
                        <p class="text-muted mb-0">
                            We don't just take orders—we challenge assumptions, suggest improvements, and 
                            act as your CTO's extended team.
                        </p>
                    </div>
                </div>
                
                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                            <div class="circlde">
                                <i class="fa-solid fa-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h5 class="fw-bold">Battle-Tested Processes</h5>
                        <p class="text-muted mb-0">
                            Our proprietary agile framework has been refined over 150+ projects, ensuring 
                            consistent quality and on-time delivery.
                        </p>
                    </div>
                </div>
                
                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                            <div class="circlde">
                                <i class="fa-solid fa-3"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h5 class="fw-bold">Future-Proof Architecture</h5>
                        <p class="text-muted mb-0">
                            We build for scale from day one. Our solutions grow with you, handling 10x traffic 
                            spikes without breaking a sweat.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-light p-5 rounded-4">
                    <h4 class="fw-bold mb-4">Trusted By Industry Leaders</h4>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="bg-white p-3 rounded-3 text-center shadow-sm">
                                <i class="fa-solid fa-building-circle-check fs-2 text-muted"></i>
                                <p class="small text-muted mb-0 mt-2">Fortune 500</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-white p-3 rounded-3 text-center shadow-sm">
                                <i class="fa-solid fa-rocket fs-2 text-muted"></i>
                                <p class="small text-muted mb-0 mt-2">Startups</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-white p-3 rounded-3 text-center shadow-sm">
                                <i class="fa-solid fa-hospital fs-2 text-muted"></i>
                                <p class="small text-muted mb-0 mt-2">Healthcare</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-white p-3 rounded-3 text-center shadow-sm">
                                <i class="fa-solid fa-building-columns  fs-2 text-muted"></i>
                                <p class="small text-muted mb-0 mt-2">Finance</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-4 border-top">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <span class="fw-bold">4.9/5</span>
                            <span class="text-muted">Clutch Rating</span>
                        </div>
                        <p class="small text-muted mb-0">
                            "ARU WebTech transformed our digital infrastructure. Their technical expertise 
                            and business acumen are unmatched." — CTO, FinTech Startup
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
