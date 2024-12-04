
<?php include 'sub-files/header.php';?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['UserName']);
    $email = htmlspecialchars($_POST['UserEmail']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validate inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        http_response_code(400);
        echo json_encode(["error" => "All fields are required."]);
        exit;
    }

    // Send email (example)
    $to = "rolan@landogzwebsolutions.com"; // Replace with your email
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain";
    $body = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(["success" => "Your message has been sent successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Failed to send the message."]);
    }
}
?>


    <!-- Start inner Page hero-->
    <section class="d-flex align-items-center page-hero  inner-page-hero " id="page-hero">
      <div class="overlay-photo-image-bg parallax" data-bg-img="assets/images/hero/inner-page-hero.jpg" data-bg-opacity="1"></div>
      <div class="overlay-color" data-bg-opacity=".75"></div>
      <div class="container">
        <div class="hero-text-area centerd">
          <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">Contact Us</h1>
          <nav aria-label="breadcrumb ">
            <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
              <li class="breadcrumb-item"><a class="breadcrumb-link" href="#0"><i class="bi bi-house icon "></i>home</a></li>
              <li class="breadcrumb-item active">contact us</li>
            </ul>
          </nav>
        </div>
      </div>
    </section>
    <!-- End inner Page hero-->
    <!-- Start contact-us -->
    <section class="contact-us  mega-section  pb-0" id="contact-us">
      <div class="container">
        <section class="locations-section  mega-section ">
          <div class="sec-heading centered  ">
            <div class="content-area">
              <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">our office</h2>
            </div>
          </div>
          <div class=" contact-info-panel ">
            <div class="info-section ">
              <div class="row">
                <div class="col-12 col-lg-6">     
                  <div class="info-panel  wow fadeInUp" data-wow-delay=".4s ">
                    <h4 class="location-title">Botolan</h4>
                    <div class="line-on-side "> </div>
                    <p class="location-address">Purok 1, Kainomayan Village, Botolan, 2202 Zambales</p>
                    <div class="location-card  "><i class="flaticon-email icon"></i>
                      <div class="card-content">
                        <h6 class="content-title">email:</h6><a class="email link" href="mailto:contact@landogzwebsolutions.com">contact@landogzwebsolutions.com</a>
                      </div>
                    </div>
                    <div class="location-card  "><i class="flaticon-phone-call icon"></i>
                      <div class="card-content">
                        <h6 class="content-title">phone:</h6><a class="tel link" href="tel:0123456789">+639387077940</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6">   
                  <div class="map-box  wow fadeInUp" data-wow-delay=".6s">
                    <div class="mapouter">
                      <div class="gmap_canvas">
                        <iframe class="map-iframe" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3848.4355703146684!2d120.04741377605386!3d15.29854625960656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339425e75c3f9fdf%3A0x7d8dae4f87914613!2sLandogz%20Web%20Solutions!5e0!3m2!1sen!2sph!4v1733338327077!5m2!1sen!2sph"></iframe>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="contact-us-form-section  mega-section  ">
          <div class="row">
            <div class="col-12 ">
              <div class="contact-form-panel">
                <div class="sec-heading centered    ">
                  <div class="content-area">
                    <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">Have any questions? Let's answer them</h2>
                  </div>
                </div>
                <div class="contact-form-inputs wow fadeInUp" data-wow-delay=".6s">
                  <div class="custom-form-area input-boxed"> 
                    <!--Form To have user messages-->
                    <form class="main-form" id="contact-us-form" method="post">
                      <span class="done-msg"></span>
                      <div class="row">
                        <div class="col-12 col-lg-6">
                          <div class="input-wrapper">
                            <input class="text-input" id="user-name" name="UserName" type="text" required />
                            <label class="input-label" for="user-name">Name <span class="req">*</span></label>
                            <span class="b-border"></span>
                            <span class="error-msg"></span>
                          </div>
                        </div>
                        <div class="col-12 col-lg-6">
                          <div class="input-wrapper">
                            <input class="text-input" id="user-email" name="UserEmail" type="email" required />
                            <label class="input-label" for="user-email">E-mail <span class="req">*</span></label>
                            <span class="b-border"></span>
                            <span class="error-msg"></span>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="input-wrapper">
                            <input class="text-input" id="msg-subject" name="subject" type="text" required />
                            <label class="input-label" for="msg-subject">Subject <span class="req">*</span></label>
                            <span class="b-border"></span>
                            <span class="error-msg"></span>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="input-wrapper">
                            <textarea class="text-input" id="msg-text" name="message" required></textarea>
                            <label class="input-label" for="msg-text">Your message <span class="req">*</span></label>
                            <span class="b-border"></span>
                            <span class="error-msg"></span>
                          </div>
                        </div>
                        <div class="col-12 submit-wrapper">
                          <button class="btn-solid" id="submit-btn" type="submit">Send your message</button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </section>
    <!-- End contact-us -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
    <script>
 $(document).ready(function () {
  $("#contact-us-form").submit(function (e) {
    e.preventDefault();

    $.ajax({
      url: "contact-us.php", // Update this to match the actual file path
      type: "POST",
      data: $(this).serialize(),
      success: function (response) {
        Swal.fire({
          icon: "success",
          title: "Message Sent",
          text: "Thank you for contacting us. We will get back to you soon!",
        });
        $("#contact-us-form")[0].reset();
      },
      error: function () {
        Swal.fire({
          icon: "error",
          title: "Message Not Sent",
          text: "There was an error sending your message. Please try again later.",
        });
      },
    });
  });
});

</script>
    <?php include 'sub-files/footer.php';?>