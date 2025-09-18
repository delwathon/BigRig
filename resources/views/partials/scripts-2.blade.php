<!--Scroll to top-->
<div class="scroll-to-top home-3">
  <div>
      <div class="scroll-top-inner">
          <div class="scroll-bar">
              <div class="bar-inner"></div>
          </div>
          <div class="scroll-bar-text">Go To Top</div>
      </div>
  </div>
</div>
<!-- Scroll to top end -->

<!--Whatsapp Support-->
<div class="chatbox d-flex justify-content-center p-4">
  <div class="w-100 chatbox-wrapper">
    <div class="border rounded bg-white shadow d-none" id="chatbox">
      <div class="d-flex justify-content-between align-items-center p-3 chatbox-header">
        <h5 class="mb-0 text-white">Let's chat? - Online</h5>
        <button class="btn btn-sm text-white" onclick="chatboxToggle()">
          <svg width="17" height="17" viewBox="0 0 17 17" class="fill-current">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.47 0.47C1.11 -0.16 2.13 -0.16 2.77 0.47L16.52 14.23C17.15 14.87 17.15 15.89 16.52 16.52C15.89 17.16 14.86 17.16 14.23 16.52L0.47 2.77C-0.16 2.13 -0.16 1.11 0.47 0.47Z"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.47 16.52C-0.16 15.89 -0.16 14.86 0.47 14.23L14.23 0.47C14.86 -0.16 15.89 -0.16 16.52 0.47C17.15 1.11 17.15 2.13 16.52 2.77L2.77 16.52C2.13 17.16 1.11 17.16 0.47 16.52Z"/>
          </svg>
        </button>
      </div>

      <form onsubmit="sendToWhatsApp(event)" class="p-4">
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn w-100 text-white" style="background-color: #25D366;">Start Chat</button>
      </form>
    </div>
    
    @if ($settings->show_whatsapp_support)
    <div class="d-flex justify-content-end">
      <button class="chatbox-toggle" onclick="chatboxToggle()">
        <span id="chat-icon">
          <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" 
                  d="M17.472 14.271c-.291-.146-1.733-.855-2.005-.951-.27-.098-.466-.146-.662.147s-.759.951-.93 1.148c-.171.196-.342.22-.633.073-.291-.146-1.228-.451-2.34-1.439-.865-.769-1.449-1.719-1.62-2.011-.171-.293-.018-.451.129-.595.133-.132.291-.342.438-.513.146-.171.195-.293.291-.488.097-.195.048-.366-.024-.513-.073-.147-.662-1.595-.906-2.18-.24-.578-.486-.5-.662-.513h-.567c-.195 0-.514.073-.785.366s-1.03 1.006-1.03 2.451 1.055 2.844 1.203 3.039c.146.195 2.045 3.122 4.962 4.38.692.298 1.233.476 1.654.61.695.221 1.327.19 1.827.115.557-.083 1.733-.707 1.978-1.392.244-.684.244-1.27.171-1.392-.073-.122-.267-.195-.557-.342zM12.002 2c-5.524 0-10 4.477-10 10 0 1.766.462 3.435 1.336 4.92L2 22l5.18-1.314C8.65 21.548 10.292 22 12.002 22c5.524 0 10-4.477 10-10s-4.476-10-10-10zm0 18c-1.524 0-3.012-.409-4.313-1.176l-.31-.184-3.071.779.82-2.986-.203-.317C4.303 14.475 4 13.263 4 12c0-4.418 3.582-8 8-8s8 3.582 8 8-3.582 8-8 8z" 
                  fill="#25D366"/>
          </svg>
        </span>
      </button>
    </div>
    @endif
    
  </div>
</div>
<!-- Whatsapp Support -->

</div>

<!-- jequery plugins -->
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.js')}}"></script>
<script src="{{asset('assets/js/wow.js')}}"></script>
<script src="{{asset('assets/js/validation.js')}}"></script>
<script src="{{asset('assets/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('assets/js/appear.js')}}"></script>
<script src="{{asset('assets/js/scrollbar.js')}}"></script>
<script src="{{asset('assets/js/isotope.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>    
<script src="{{asset('assets/js/nav-tool.js')}}"></script>
<script src="{{asset('assets/js/jquery.lettering.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.circleType.js')}}"></script>
<script src="{{asset('assets/js/bxslider.js')}}"></script>

<!-- map script -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
<script src="{{ asset('assets/js/gmaps.js') }}"></script>
<script src="{{ asset('assets/js/map-helper.js') }}"></script>

<!-- main-js -->
<script src="{{asset('assets/js/script.js')}}"></script>

<script>
  function chatboxToggle() {
    const chatbox = document.getElementById("chatbox");
    chatbox.classList.toggle("d-none");
  }
</script>

<script>
  function sendToWhatsApp(event) {
      event.preventDefault(); // Prevent form submission

      // Get user input
      let name = document.getElementById("name").value;
      let message = document.getElementById("message").value;

      // Format message
      let whatsappMessage = `Name: *${name}*\n\n${message}`;

      // Encode URL
      let encodedMessage = encodeURIComponent(whatsappMessage);
      
      // Clean phone number - remove ALL non-digit characters
      let phoneNumber = "{{ $settings->whatsapp_support }}";
      phoneNumber = phoneNumber.replace(/[^0-9]/g, ''); // Remove everything except numbers
      
      let whatsappURL = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
      
      console.log("Final URL:", whatsappURL); // Debug: check the final URL

      // Open WhatsApp chat
      window.open(whatsappURL, "_blank");
  }
</script>
