<?php
// Site Configuration
$site_title = "Book Your Island Getaway | Travel Lanka";
$company_name = "Travel Lanka";
$year = date('Y');

// Available Tour Packages (Can be dynamically pulled from a database later)
$available_packages = [
    'cultural' => 'Cultural Triangle Wonders (6 Days / 5 Nights)',
    'coastal' => 'Tropical Southern Coastline (7 Days / 6 Nights)',
    'highlands' => 'Misty Highlands & Tea Trails (5 Days / 4 Nights)',
    'safari' => 'Ultimate Wildlife Safari (8 Days / 7 Nights)',
    'custom' => 'Custom Tailored Itinerary'
];

// Pre-select package if passed via URL (e.g., book-a-trip.php?pkg=coastal)
$selected_pkg = isset($_GET['pkg']) ? $_GET['pkg'] : '';

// Form Processing
$form_message = '';
$form_status = ''; // 'success' or 'error'

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and collect input fields
    $full_name      = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email          = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone          = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $country        = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS);
    $package_choice = filter_input(INPUT_POST, 'package_choice', FILTER_SANITIZE_SPECIAL_CHARS);
    $travel_date    = filter_input(INPUT_POST, 'travel_date', FILTER_SANITIZE_SPECIAL_CHARS);
    $adults         = filter_input(INPUT_POST, 'adults', FILTER_VALIDATE_INT);
    $children       = filter_input(INPUT_POST, 'children', FILTER_VALIDATE_INT);
    $notes          = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_SPECIAL_CHARS);

    // Basic Backend Validation
    if (!$full_name || !$email || !$phone || !$travel_date || !$adults) {
        $form_status = 'danger';
        $form_message = 'Please fill out all required fields correctly.';
    } else {
        // --- YOUR PROCESSING LOGIC HERE ---
        // E.g., Save details to MySQL database or send an email to support staff:
        /*
        $to = "bookings@travellanka.lk";
        $subject = "New Trip Booking Request from " . $full_name;
        $body = "Name: $full_name\nEmail: $email\nPhone: $phone\nPackage: $package_choice\nDate: $travel_date\nTravelers: $adults Adults, $children Children\nNotes: $notes";
        mail($to, $subject, $body);
        */

        $form_status = 'success';
        $form_message = 'Thank you! Your trip booking inquiry has been received. Our travel representative will contact you within 24 hours.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_title; ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Navigation -->
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

    <!-- Header Banner -->
    <header class="bg-theme-dark text-white py-5 position-relative">
        <div class="container text-center py-4">
            <span class="badge bg-accent text-dark mb-2 px-3 py-2 text-uppercase fw-bold tracking-wider">Plan Your Escape</span>
            <h1 class="display-4 fw-bold header-font">Book Your Sri Lankan Adventure</h1>
            <p class="lead text-light-50 max-w-2xl mx-auto">Fill in your travel preferences below, and our experts will organize a seamless, unforgettable journey.</p>
        </div>
    </header>

    <!-- Booking Form Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    
                    <?php if (!empty($form_message)): ?>
                        <div class="alert alert-<?php echo $form_status; ?> alert-dismissible fade show rounded-4 mb-4 p-4 shadow-sm" role="alert">
                            <h5 class="fw-bold"><?php echo $form_status === 'success' ? '🎉 Success!' : '⚠️ Attention'; ?></h5>
                            <p class="mb-0"><?php echo $form_message; ?></p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-md-5 bg-white">
                            <form action="book-a-trip.php" method="POST" id="bookingForm">
                                
                                <!-- Step 1: Personal Details -->
                                <h4 class="fw-bold text-theme mb-4 pb-2 border-bottom">1. Primary Traveler Information</h4>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" name="full_name" class="form-control form-control-lg fs-6" placeholder="e.g. John Doe" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control form-control-lg fs-6" placeholder="john@example.com" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">Phone / WhatsApp Number <span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" class="form-control form-control-lg fs-6" placeholder="+1 234 567 8900" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">Country of Origin</label>
                                        <input type="text" name="country" class="form-control form-control-lg fs-6" placeholder="e.g. Australia">
                                    </div>
                                </div>

                                <!-- Step 2: Trip Configuration -->
                                <h4 class="fw-bold text-theme mb-4 pb-2 border-bottom">2. Tour & Schedule Preferences</h4>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-12">
                                        <label class="form-label small fw-bold text-muted">Select Preferred Package <span class="text-danger">*</span></label>
                                        <select name="package_choice" class="form-select form-select-lg fs-6" required>
                                            <option value="" disabled <?php echo empty($selected_pkg) ? 'selected' : ''; ?>>Choose a package layout...</option>
                                            <?php foreach ($available_packages as $key => $label): ?>
                                                <option value="<?php echo $key; ?>" <?php echo $selected_pkg === $key ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($label); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label small fw-bold text-muted">Target Arrival Date <span class="text-danger">*</span></label>
                                        <input type="date" name="travel_date" class="form-control form-control-lg fs-6" min="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label small fw-bold text-muted">Adults (12+ yrs) <span class="text-danger">*</span></label>
                                        <input type="number" name="adults" class="form-control form-control-lg fs-6" min="1" max="50" value="2" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label small fw-bold text-muted">Children (0 - 11 yrs)</label>
                                        <input type="number" name="children" class="form-control form-control-lg fs-6" min="0" max="20" value="0">
                                    </div>
                                </div>

                                <!-- Step 3: Customization Notes -->
                                <h4 class="fw-bold text-theme mb-4 pb-2 border-bottom">3. Additional Requests & Preferences</h4>
                                <div class="row g-3 mb-4">
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-muted">Special Requirements / Notes</label>
                                        <textarea name="notes" class="form-control fs-6" rows="4" placeholder="Let us know about hotel preferences (3-star, 5-star, boutique), dietary requirements, accessibility needs, or specific sights you don't want to miss..."></textarea>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-theme btn-lg px-5 py-3 fw-bold shadow-sm">
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

    <!-- Footer -->
     <footer id="footer" class="bg-theme-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row g-4 pb-4 border-bottom border-secondary">
                
                <!-- Col 1: Brand & Bio -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold text-white mb-3"><span class="text-accent">Travel</span>Lanka</h5>
                    <p class="text-white-50 small">Your award-winning destination management companion offering boutique journey coordination and elite tours across stunning island ecosystems since 2012.</p>
                    <p class="small text-white-50 mb-0">✨ Fully Bonded & Registered Local Operator</p>
                </div>

                <!-- Col 2: Quick Links -->
                <div class="col-lg-2 col-md-6">
                    <h6 class="text-uppercase text-accent fw-bold small tracking-wider mb-3">Quick Navigation</h6>
                    <ul class="list-unstyled footer-menu">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Home Base</a></li>
                        <li class="mb-2"><a href="#about" class="text-white-50 text-decoration-none small">Our Core Bio</a></li>
                        <li class="mb-2"><a href="#packages" class="text-white-50 text-decoration-none small">Tour Frameworks</a></li>
                        <li class="mb-2"><a href="#destinations" class="text-white-50 text-decoration-none small">Region Nodes</a></li>
                    </ul>
                </div>

                <!-- Col 3: Popular Highlights -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="text-uppercase text-accent fw-bold small tracking-wider mb-3">Featured Sites</h6>
                    <ul class="list-unstyled footer-menu">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Galle Historic Bastions</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Sigiriya Rock Fortress</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Ella Ridge Hiking Paths</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Yala Eco Wildlife Safaris</a></li>
                    </ul>
                </div>

                <!-- Col 4: Newsletter -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="text-uppercase text-accent fw-bold small tracking-wider mb-3">Stay Inspired</h6>
                    <p class="text-white-50 small mb-3">Subscribe to unlock tailored travel checklists, regional offers, and pristine secret hideouts.</p>
                    <form action="subscribe.php" method="POST">
                        <div class="input-group input-group-sm">
                            <input type="email" name="email" class="form-control border-0" placeholder="Your Email" required>
                            <button class="btn btn-accent text-dark fw-bold" type="submit">Join</button>
                        </div>
                    </form>
                </div>

            </div>

            <!-- Bottom Copyright bar -->
            <div class="pt-3 d-flex flex-column flex-sm-row justify-content-between align-items-center text-center text-sm-start">
                <p class="mb-2 mb-sm-0 text-white-50 small">&copy; <?php echo $year; ?> <?php echo $company_name; ?>. Proudly Curated in Sri Lanka.</p>
                <div class="small">
                    <a href="#" class="text-white-50 me-3 text-decoration-none">Privacy System</a>
                    <a href="#" class="text-white-50 text-decoration-none">Operational Terms</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>