// vars
const multipleItemCarousel = document.querySelector("#testimonialCarousel");

if (window.matchMedia("(min-width:576px)").matches) {
  const carousel = new bootstrap.Carousel(multipleItemCarousel, {
    interval: false,
  });

  var carouselWidth = $(".carousel-inner")[0].scrollWidth;
  var cardWidth = $(".carousel-item").width();

  var scrollPosition = 0;

  $(".carousel-control-next").on("click", function () {
    if (scrollPosition < carouselWidth - cardWidth * 3) {
      console.log("next");
      scrollPosition = scrollPosition + cardWidth;
      $(".carousel-inner").animate({ scrollLeft: scrollPosition }, 800);
    }
  });
  $(".carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
      scrollPosition = scrollPosition - cardWidth;
      $(".carousel-inner").animate({ scrollLeft: scrollPosition }, 800);
    }
  });
} else {
  $(multipleItemCarousel).addClass("slide");
}


    // Form Handling
    document.getElementById('cuContactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const btn = document.getElementById('cuSubmitBtn');
        const successAlert = document.getElementById('cuSuccessAlert');
        const errorAlert = document.getElementById('cuErrorAlert');
        
        // Hide previous alerts
        successAlert.classList.remove('show');
        errorAlert.classList.remove('show');
        
        // Add loading state
        btn.classList.add('loading');
        btn.innerHTML = '<span>Sending...</span>';
        
        // Simulate form submission (replace with actual AJAX call)
        setTimeout(() => {
            btn.classList.remove('loading');
            btn.innerHTML = '<span>Send Message</span><i class="bi bi-send-fill"></i>';
            successAlert.classList.add('show');
            this.reset();
            
            // Hide success message after 5 seconds
            setTimeout(() => {
                successAlert.classList.remove('show');
            }, 5000);
        }, 1500);
    });

    // Input focus effects
    document.querySelectorAll('.cu-form-input, .cu-form-textarea').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
    });