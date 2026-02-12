@extends('layouts.app_front')
@section('title', 'Home')

@section('content')
    <style>
        
    </style>
</head>
<body>


<!-- 1. HERO SECTION -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-80">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h1 class="display-4 fw-bold mb-4" style="line-height: 1.2;">
                    Build software that <span class="text-primary">outpaces</span> your competition.
                </h1>
                <p class="lead text-muted mb-4">
                    We engineer high-performance digital solutions that automate complexity, 
                    delight users, and drive measurable business growth. From concept to deployment, 
                    we turn ambitious ideas into market-leading products.
                </p>
                <div class="d-flex gap-3">
                    <a href="#contact" class="btn btn-gradient-primary text-white btn-md btn-50-m">Start Your Project</a>
                    <a href="{{ url('portfolios') }}" class="btn btn-dark btn-md btn-50-m">View Our Work</a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/header-img.png') }}" alt="Software Development" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- 2. SERVICES SECTION -->
<section id="services" class="pt-5">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-lg-8">
                <span class="section-label">Our Services</span>
                <h2 class="display-5 fw-bold">End-to-end product development for the digital age</h2>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Service 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="service-card h-100 p-4">
                    <div class="feature-icon">
                        <img class="img-fluid ser-img" src="{{ asset('images/icon1.png') }}">
                    </div>
                    <h4>Custom Software Development</h4>
                    <p class="">
                        Bespoke applications engineered for your unique workflows. We build scalable, 
                        secure software that eliminates bottlenecks and unlocks operational efficiency.
                    </p>
                </div>
            </div>
            
            <!-- Service 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="service-card h-100 p-4">
                    <div class="feature-icon">
                        <img class="img-fluid ser-img" src="{{ asset('images/icon2.png') }}">
                    </div>
                    <h4>Web Application Development</h4>
                    <p class="">
                        Progressive web apps and responsive platforms that deliver native-like experiences. 
                        Optimized for speed, accessibility, and conversion.
                    </p>
                </div>
            </div>
            
            <!-- Service 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="service-card h-100 p-4">
                    <div class="feature-icon">
                        <img class="img-fluid ser-img" src="{{ asset('images/icon3.png') }}">
                    </div>
                    <h4>SaaS Product Development</h4>
                    <p class="">
                        Cloud-native SaaS solutions with multi-tenant architecture, subscription management, 
                        and seamless third-party integrations.
                    </p>
                </div>
            </div>
            
            <!-- Service 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="service-card h-100 p-4">
                    <div class="feature-icon">
                        <img class="img-fluid ser-img" src="{{ asset('images/icon4.png') }}">
                    </div>
                    <h4>Marketplace Development</h4>
                    <p class="">
                        B2B and B2C marketplace platforms with advanced matching algorithms, 
                        secure payment flows, and vendor management systems.
                    </p>
                </div>
            </div>
            
            <!-- Service 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="service-card h-100 p-4">
                    <div class="feature-icon">
                        <img class="img-fluid ser-img" src="{{ asset('images/icon5.png') }}">
                    </div>
                    <h4>Mobile App Development</h4>
                    <p class="">
                        Cross-platform and native mobile applications that engage users on iOS and Android. 
                        From MVPs to enterprise-grade solutions.
                    </p>
                </div>
            </div>
            
            <!-- Service 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="service-card h-100 p-4">
                    <div class="feature-icon">
                        <img class="img-fluid ser-img" src="{{ asset('images/icon6.png') }}">
                    </div>
                    <h4>Modern Architecture Design</h4>
                    <p class="">
                        Microservices, serverless, and headless architectures that ensure your 
                        infrastructure scales effortlessly with your success.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. PORTFOLIO/FEATURED CASE STUDY SECTION -->


<!-- 4. ABOUT/TEAM SECTION -->
<section id="about" class=" py-lg-5 py-sm-0">
    <div class="container  py-lg-5 py-sm-0">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <span class="section-label">Why Partner With Us</span>
                <h2 class="display-5 fw-bold mb-4">Your dedicated technology partner for ambitious growth</h2>
                <p class="lead text-muted mb-4">
                    We're a collective of 15+ engineers, designers, and product strategists who believe 
                    great software is born from deep collaboration. Since 2022, we've helped 40+ companies 
                    launch products that matter.
                </p>
                
                <div class="row g-4 mt-2">
                    <div class="col-6">
                        <h3 class="fw-bold text-primary">40+</h3>
                        <p class="mb-0">Products Launched</p>
                    </div>
                    <div class="col-6">
                        <h3 class="fw-bold text-primary">15+</h3>
                        <p class="mb-0">Expert Engineers</p>
                    </div>
                    <div class="col-6">
                        <h3 class="fw-bold text-primary">3+</h3>
                        <p class="mb-0">Years of Excellence</p>
                    </div>
                    <div class="col-6">
                        <h3 class="fw-bold text-primary">98%</h3>
                        <p class="mb-0">Client Retention</p>
                    </div>
                </div>
                
                <a href="#team" class="btn btn-dark mt-4">Meet Our Team</a>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 mt-5">
                        <img src="{{ asset('images/789.png') }}" class="img-fluid rounded-4 shadow" alt="Team">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('images/456.png') }}" class="img-fluid rounded-4 shadow mb-3" alt="Office">
                        <img src="{{ asset('images/123.png') }}" class="img-fluid rounded-4 shadow" alt="Collaboration">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. TESTIMONIALS SECTION -->
<section id="testim" class="testim mt-5">
    <div class="testim-cover">
        <div class="wrap">
            <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
            <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
            <ul id="testim-dots" class="dots">
                <li class="dot active"></li>
                <li class="dot"></li>
                <li class="dot"></li>
                <li class="dot"></li>
                <li class="dot"></li>
            </ul>
            <div id="testim-content" class="cont">
                <div class="active">
                    <div class="img">
                        <img src="{{ asset('images/test-icon.png') }}" alt="">
                    </div>
                    <h2>Lorem P. Ipsum</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
                <div>
                    <div class="img">
                        <img src="{{ asset('images/test-icon.png') }}" alt="">
                    </div>
                    <h2>Mr. Lorem Ipsum</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
                <div>
                    <div class="img">
                        <img src="{{ asset('images/test-icon.png') }}" alt="">
                    </div>
                    <h2>Lorem Ipsum</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
                <div>
                    <div class="img">
                        <img src="{{ asset('images/test-icon.png') }}" alt="">
                    </div>
                    <h2>Lorem De Ipsum</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
                <div>
                    <div class="img">
                        <img src="{{ asset('images/test-icon.png') }}" alt="">
                    </div>
                    <h2>Ms. Lorem R. Ipsum</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. EXPERTISE/TECH STACK SECTION -->
<section id="expertise" class="py-5">
    <div class="container  py-lg-5 py-sm-0">
        <div class="row mb-5">
            <div class="col-lg-8">
                <span class="section-label">Our Expertise</span>
                <h2 class="display-5 fw-bold">Deep technical capabilities across the modern stack</h2>
            </div>
        </div>
        
        <div class="row g-5">
            <!-- Domains -->
            <div class="col-lg-6">
                <h4 class="fw-bold mb-4">Industries We Serve</h4>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check2 text-primary me-2 fs-5"></i>
                            <span>E-Commerce</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check2 text-primary me-2 fs-5"></i>
                            <span>Travel & Hospitality</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check2 text-primary me-2 fs-5"></i>
                            <span>Real Estate</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check2 text-primary me-2 fs-5"></i>
                            <span>Property Management</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check2 text-primary me-2 fs-5"></i>
                            <span>Insurance Tech</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check2 text-primary me-2 fs-5"></i>
                            <span>Accounting & Finance</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check2 text-primary me-2 fs-5"></i>
                            <span>HR & Recruiting</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check2 text-primary me-2 fs-5"></i>
                            <span>Healthcare</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tech Stack -->
            <div class="col-lg-6">
                <h4 class="fw-bold mb-4">Technologies We Master</h4>
                <div class="row g-3">
                    <div class="col-4 col-md-3 text-center">
                        <div class="tech-stack-icon bg-gradient-primary mx-auto">
                            <i class="fa-brands fa-js"></i>
                        </div>
                        <small class="d-block">JavaScript</small>
                    </div>
                    <div class="col-4 col-md-3 text-center">
                        <div class="tech-stack-icon bg-gradient-primary mx-auto">
                            <i class="fa-brands fa-react"></i>
                        </div>
                        <small class="d-block">React</small>
                    </div>
                    <div class="col-4 col-md-3 text-center">
                        <div class="tech-stack-icon bg-gradient-primary mx-auto">
                            <i class="fa-brands fa-angular"></i>
                        </div>
                        <small class="d-block">Angular</small>
                    </div>
                    <div class="col-4 col-md-3 text-center">
                        <div class="tech-stack-icon bg-gradient-primary mx-auto">
                            <i class="fa-brands fa-python"></i>
                        </div>
                        <small class="d-block">Python</small>
                    </div>
                    <div class="col-4 col-md-3 text-center">
                        <div class="tech-stack-icon bg-gradient-primary mx-auto">
                            <i class="fa-brands fa-php"></i>
                        </div>
                        <small class="d-block">PHP</small>
                    </div>
                    <div class="col-4 col-md-3 text-center">
                        <div class="tech-stack-icon bg-gradient-primary mx-auto">
                            <i class="fa-brands fa-laravel"></i>
                        </div>
                        <small class="d-block">Laravel</small>
                    </div>
                    <div class="col-4 col-md-3 text-center">
                        <div class="tech-stack-icon bg-gradient-primary mx-auto">
                            <i class="fa-brands fa-node-js"></i>
                        </div>
                        <small class="d-block">Node.js</small>
                    </div>
                    <div class="col-4 col-md-3 text-center">
                        <div class="tech-stack-icon bg-gradient-primary mx-auto">
                            <i class="fa-brands fa-aws"></i>
                        </div>
                        <small class="d-block">AWS</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. WHY CHOOSE US / VALUE PROPOSITION SECTION -->
<section class="py-5 bg-light">
    <div class="container  py-lg-5 py-sm-0">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <span class="section-label">The ARU WebTech Difference</span>
                <h2 class="display-5 fw-bold">Engineering excellence meets business acumen</h2>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="bg-white p-4 rounded-4 h-100 shadow-sm">
                    <h5>Rapid Time-to-Market</h5>
                    <p class="mb-0">
                        Agile methodologies and lean development practices that get your MVP live in weeks, 
                        not months—without compromising quality.
                    </p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="bg-white p-4 rounded-4 h-100 shadow-sm">
                    <h5>Enterprise-Grade Security</h5>
                    <p class="mb-0">
                        Security-first architecture with SOC 2 compliance, encryption at rest and in transit, 
                        and regular penetration testing.
                    </p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="bg-white p-4 rounded-4 h-100 shadow-sm">
                    <h5>Scalable Architecture</h5>
                    <p class="mb-0">
                        Cloud-native solutions designed to handle 10x growth. Microservices, serverless, 
                        and auto-scaling infrastructure.
                    </p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="bg-white p-4 rounded-4 h-100 shadow-sm">
                    <h5>Dedicated Teams</h5>
                    <p class="mb-0">
                        Your own cross-functional squad—product manager, developers, QA, and DevOps—embedded 
                        in your vision and committed to your success.
                    </p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="bg-white p-4 rounded-4 h-100 shadow-sm">
                    <h5>Strategic Consulting</h5>
                    <p class="mb-0">
                        Beyond coding—we help validate ideas, define MVPs, and create technical roadmaps 
                        that align with your business objectives.
                    </p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="bg-white p-4 rounded-4 h-100 shadow-sm">
                    <h5>Lifetime Support</h5>
                    <p class="mb-0">
                        24/7 monitoring, maintenance, and continuous improvement. We're with you from launch 
                        through every growth phase.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
