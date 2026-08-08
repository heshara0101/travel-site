<?php
require_once "admin-panel/assets/classes/Database.php";
require_once "admin-panel/assets/classes/booking.php";

// Site Configuration
$site_title   = "Book Your Island Getaway | Travel Lanka";
$company_name = "Travel Lanka";
$year         = date('Y');

// Retrieve package options from functions
$available_packages = [
    'cultural' => 'Cultural Triangle Wonders (6 Days / 5 Nights)',
    'coastal' => 'Tropical Southern Coastline (7 Days / 6 Nights)',
    'highlands' => 'Misty Highlands & Tea Trails (5 Days / 4 Nights)',
    'safari' => 'Ultimate Wildlife Safari (8 Days / 7 Nights)',
    'custom' => 'Custom Tailored Itinerary'
];
$selected_pkg       = filter_input(INPUT_GET, 'pkg', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';

// Handle Form Submission
$response = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (function_exists('booking_create')) {
        $response = booking_create($_POST);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($site_title); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-theme-dark sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <span class="text-accent">Travel</span>Lanka
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#packages">Tour Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#destinations">Destinations</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact Us</a></li>
                </ul>
                <a href="bookAtrip.php" class="btn btn-accent ms-lg-3 d-none d-lg-inline-block active">Book a Trip</a>
            </div>
        </div>
    </nav>

    <header class="bg-theme-dark text-white py-5 position-relative">
        <div class="container text-center py-4">
            <span class="badge bg-accent text-dark mb-2 px-3 py-2 text-uppercase fw-bold tracking-wider">Plan Your Escape</span>
            <h1 class="display-4 fw-bold header-font">Book Your Sri Lankan Adventure</h1>
            <p class="lead text-light-50 max-w-2xl mx-auto">Fill in your travel preferences below, and our experts will organize a seamless, unforgettable journey.</p>
        </div>
    </header>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    
                    <?php if ($response): ?>
                        <div class="alert alert-<?php echo $response['status']; ?> alert-dismissible fade show rounded-4 mb-4 p-4 shadow-sm" role="alert">
                            <h5 class="fw-bold"><?php echo $response['status'] === 'success' ? '🎉 Success!' : '⚠️ Attention'; ?></h5>
                            <p class="mb-0"><?php echo htmlspecialchars($response['message']); ?></p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-md-5 bg-white">
                            <form action="bookAtrip.php" method="POST" id="bookingForm">
                                
                                <h4 class="fw-bold text-theme mb-4 pb-2 border-bottom">1. Primary Traveler Information</h4>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" id="name" name="name" class="form-control form-control-lg fs-6" placeholder="e.g. John Doe" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" id="email" name="email" class="form-control form-control-lg fs-6" placeholder="john@example.com" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">Phone / WhatsApp Number <span class="text-danger">*</span></label>
                                        <input type="tel" id="phone" name="phone" class="form-control form-control-lg fs-6" placeholder="+1 234 567 8900" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">Country of Origin</label>
                                        <input type="text" id="country" name="country" class="form-control form-control-lg fs-6" placeholder="e.g. Australia">
                                    </div>
                                </div>

                                <h4 class="fw-bold text-theme mb-4 pb-2 border-bottom">2. Tour & Schedule Preferences</h4>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-12">
                                        <label class="form-label small fw-bold text-muted">Select Preferred Package <span class="text-danger">*</span></label>
                                        <select id="package_choice" name="package_choice" class="form-select form-select-lg fs-6" required>
                                            <option value="" disabled <?php echo empty($selected_pkg) ? 'selected' : ''; ?>>Choose a package layout...</option>
                                            <?php foreach ($available_packages as $key => $label): ?>
                                                <option value="<?php echo htmlspecialchars($key); ?>" <?php echo $selected_pkg === $key ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($label); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label small fw-bold text-muted">Target Arrival Date <span class="text-danger">*</span></label>
                                        <input type="date" id="date" name="date" class="form-control form-control-lg fs-6" min="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label small fw-bold text-muted">Adults (12+ yrs) <span class="text-danger">*</span></label>
                                        <input type="number" id="adult" name="adult" class="form-control form-control-lg fs-6" min="1" max="50" value="2" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label small fw-bold text-muted">Children (0 - 11 yrs)</label>
                                        <input type="number" id="child" name="child" class="form-control form-control-lg fs-6" min="0" max="20" value="0">
                                    </div>
                                </div>

                                <h4 class="fw-bold text-theme mb-4 pb-2 border-bottom">3. Additional Requests & Preferences</h4>
                                <div class="row g-3 mb-4">
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-muted">Special Requirements / Notes</label>
                                        <textarea id="note" name="note" class="form-control fs-6" rows="4" placeholder="Let us know about hotel preferences, dietary requirements, accessibility needs, or specific sights you don't want to miss..."></textarea>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" id="submit" name="submit" class="btn btn-theme btn-lg px-5 py-3 fw-bold shadow-sm">
                                        Confirm & Submit Inquiry
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <footer id="footer" class="bg-theme-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row g-4 pb-4 border-bottom border-secondary">
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold text-white mb-3"><span class="text-accent">Travel</span>Lanka</h5>
                    <p class="text-white-50 small">Your award-winning destination management companion offering boutique journey coordination and elite tours across stunning island ecosystems since 2012.</p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h6 class="text-uppercase text-accent fw-bold small tracking-wider mb-3">Quick Navigation</h6>
                    <ul class="list-unstyled footer-menu">
                        <li class="mb-2"><a href="index.php" class="text-white-50 text-decoration-none small">Home Base</a></li>
                        <li class="mb-2"><a href="index.php#about" class="text-white-50 text-decoration-none small">Our Core Bio</a></li>
                        <li class="mb-2"><a href="index.php#packages" class="text-white-50 text-decoration-none small">Tour Frameworks</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p class="text-white-50 small mb-0">&copy; <?php echo $year; ?> <?php echo htmlspecialchars($company_name); ?>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script> 
    jQuery(document).ready(function () { 
        $("#bookingForm").submit(function (event) {
            event.preventDefault();

            var name = $.trim($("#name").val());
            var email = $.trim($("#email").val());
            var phone_no = $.trim($("#phone").val());
            var country = $.trim($("#country").val());
            var package = $.trim($("#package_choice").val());
            var date = $.trim($("#date").val());
            var adult = $.trim($("#adult").val());
            var child = $.trim($("#child").val());
            var note = $.trim($("#note").val());
            

            // Check if title is empty
            if (name === "") {
                Swal.fire({
                    icon: "error",
                    title: "Validation Error",
                    text: "Please enter your name!",
                    timer: 2000,
                    showConfirmButton: false
                });
                return false;
            }else if (email === "") {
                Swal.fire({
                    icon: "error",
                    title: "Validation Error",
                    text: "Please enter your email!",
                    timer: 2000,
                    showConfirmButton: false
                });
                return false;
            }else if (phone_no === "") {
                Swal.fire({
                    icon: "error",
                    title: "Validation Error",
                    text: "Please enter your phone number!",
                    timer: 2000,
                    showConfirmButton: false
                });
                return false;
            }else if (country === "") {
                Swal.fire({
                    icon: "error",
                    title: "Validation Error",
                    text: "Please enter your country!",
                    timer: 2000,
                    showConfirmButton: false
                });
                return false;
            }else if (date === "") {
                Swal.fire({
                    icon: "error",
                    title: "Validation Error",
                    text: "Please enter a tour date!",
                    timer: 2000,
                    showConfirmButton: false
                });
                return false;
            }else if (package === "") {
                Swal.fire({
                    icon: "error",
                    title: "Validation Error",
                    text: "Please enter a tour package!",
                    timer: 2000,
                    showConfirmButton: false
                });
                return false;
            }

            // Prepare FormData
            var formData = new window.FormData($("#bookingForm")[0]);
            formData.append("submit", true);

            $.ajax({
                url: "admin-panel/assets/ajax/js/php/booking-data.php",
                type: "POST",
                data: formData,
                dataType: "json", // Automatically parse response as JSON
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {
                    if (result.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: result.message || "Tour booking placed successfully!",
                            timer: 2000,
                            showConfirmButton: false
                        });

                        
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: result.message || "Something went wrong.",
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: "error",
                        title: "Server Error!",
                        text: "Failed to process your request. Please try again.",
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        });
    });
    </script>
</body>
</html>