@extends('layouts.app_front')
@section('title','Contact')
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
                    Let's Start a Conversation
                </h1>
                <p class="lead text-muted mb-0 text-center">
                    Have a project in mind or need assistance with our services? Our team is ready to help you achieve your goals. Reach out and we'll respond within 24 hours.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="cu-section">
    <div class="container">

        <!-- Main Content Grid -->
        <div class="cu-grid">

            <!-- Contact Information -->
            <div class="cu-info-wrapper">

                <!-- Email Card -->
                <div class="cu-info-card">
                    <div class="cu-info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="cu-info-title">Email Us</h3>
                    <p class="cu-info-text">
                        For general inquiries and project discussions. We typically respond within 2-4 hours during business days.
                    </p>
                    <a href="mailto:hello@company.com" class="cu-info-link">
                        hello@company.com
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <br>
                    <a href="mailto:support@company.com" class="cu-info-link cu-mt-4">
                        support@company.com
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <!-- Phone Card -->
                <div class="cu-info-card">
                    <div class="cu-info-icon">
                        <i class="fas fa-phone-square"></i>
                    </div>
                    <h3 class="cu-info-title">Call Us</h3>
                    <p class="cu-info-text">
                        Mon-Fri from 8am to 6pm EST. Our support team is standing by to assist you with urgent matters.
                    </p>
                    <a href="tel:+1234567890" class="cu-info-link">
                        +1 (234) 567-890
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

            </div>

            <!-- Contact Form -->
            <div class="cu-form-wrapper">
                <div class="cu-form-header">
                    <h2 class="cu-form-title">Send us a Message</h2>
                    <p class="cu-form-subtitle">Fill out the form below and we'll get back to you as soon as possible.</p>
                </div>

                <!-- Alert Messages -->
                <div class="cu-alert cu-alert-success" id="cuSuccessAlert">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Thank you! Your message has been sent successfully.</span>
                </div>
                <div class="cu-alert cu-alert-error" id="cuErrorAlert">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span>Oops! Something went wrong. Please try again.</span>
                </div>

                <form id="cuContactForm" action="#" method="POST">
                    @csrf
                    
                    <div class="cu-form-row">
                        <div class="cu-form-group cu-form-floating">
                            <input type="text" class="cu-form-input" id="cuFirstName" name="first_name" placeholder=" " required>
                            <label for="cuFirstName" class="cu-form-label">First Name</label>
                        </div>
                        
                        <div class="cu-form-group cu-form-floating">
                            <input type="text" class="cu-form-input" id="cuLastName" name="last_name" placeholder=" " required>
                            <label for="cuLastName" class="cu-form-label">Last Name</label>
                        </div>
                    </div>

                    <div class="cu-form-row">
                        <div class="cu-form-group cu-form-floating">
                            <input type="email" class="cu-form-input" id="cuEmail" name="email" placeholder=" " required>
                            <label for="cuEmail" class="cu-form-label">Email Address</label>
                        </div>
                        
                        <div class="cu-form-group cu-form-floating">
                            <input type="tel" class="cu-form-input" id="cuPhone" name="phone" placeholder=" ">
                            <label for="cuPhone" class="cu-form-label">Phone Number (Optional)</label>
                        </div>
                    </div>

                    <div class="cu-form-group cu-form-floating">
                        <input type="text" class="cu-form-input" id="cuSubject" name="subject" placeholder=" " required>
                        <label for="cuSubject" class="cu-form-label">Subject</label>
                    </div>

                    <div class="cu-form-group cu-form-floating">
                        <textarea class="cu-form-textarea" id="cuMessage" name="message" placeholder=" " required></textarea>
                        <label for="cuMessage" class="cu-form-label">Your Message</label>
                    </div>

                    <div class="cu-checkbox-wrapper">
                        <input type="checkbox" class="cu-checkbox" id="cuPrivacy" name="privacy" required>
                        <label for="cuPrivacy" class="cu-checkbox-label">
                            I agree to the <a href="#">Privacy Policy</a> and processing of my personal data for communication purposes.
                        </label>
                    </div>

                    <button type="submit" class="cu-btn" id="cuSubmitBtn">
                        <span>Send Message</span>
                        <i class="bi bi-send-fill"></i>
                    </button>
                </form>
            </div>

        </div>
    <!-- FAQ Section -->
    <div class="cu-faq">
        <h2 class="cu-faq-title">Frequently Asked Questions</h2>
        <div class="cu-accordion">

            <div class="cu-accordion-item">
                <button class="cu-accordion-header" onclick="this.parentElement.classList.toggle('active')">
                    <span>What is the typical response time for inquiries?</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="cu-accordion-body">
                    <div class="cu-accordion-content">
                        We aim to respond to all inquiries within 24 hours during business days. For urgent matters, please call our support line directly for immediate assistance.
                    </div>
                </div>
            </div>

            <div class="cu-accordion-item">
                <button class="cu-accordion-header" onclick="this.parentElement.classList.toggle('active')">
                    <span>Do you offer custom enterprise solutions?</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="cu-accordion-body">
                    <div class="cu-accordion-content">
                        Yes, we specialize in custom enterprise solutions tailored to your specific business needs. Contact our sales team to schedule a consultation.
                    </div>
                </div>
            </div>

            <div class="cu-accordion-item">
                <button class="cu-accordion-header" onclick="this.parentElement.classList.toggle('active')">
                    <span>How can I schedule a demo or meeting?</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="cu-accordion-body">
                    <div class="cu-accordion-content">
                        You can schedule a demo by filling out the contact form above and selecting "Demo Request" as the subject, or by emailing us directly at demo@company.com.
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</section>

@endsection
