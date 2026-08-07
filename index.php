<?php
// Configuration & Site Meta Details
$site_title = "Travel Sri Lanka | Premium Island Getaways";
$company_name = "Travel Lanka";
$year = date('Y');

// Contact Information
$contact_info = [
    'address' => 'Galle Road, Colombo 03, Sri Lanka',
    'phone' => '+94 11 234 5678',
    'email' => 'info@travellanka.lk',
    'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15844.116550796335!2d79.842795!3d6.911048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259434e3505c1%3A0xe7da65b89a805f77!2sColombo%2003%2C%20Colombo!5e0!3m2!1sen!2slk!4v1700000000000!5m2!1sen!2slk'
];

// Hero Slides Data
$hero_slides = [
    [
        'image' => 'assets/images/hero1.jpg',
        'badge' => 'Wanderlust Awaits',
        'title' => 'Explore the Pearl of the Indian Ocean',
        'desc' => 'Immerse yourself in vibrant cultures, misty mountains, and endless coastlines tailored just for you.'
    ],
    [
        'image' => 'assets/images/hero2.jpg',
        'badge' => 'Tropical Paradise',
        'title' => 'Discover Golden Sandy Beaches',
        'desc' => 'Unwind on world-renowned sun-drenched shores from coastal Mirissa to pristine Trincomalee.'
    ],
    [
        'image' => 'assets/images/hero3.jpg',
        'badge' => 'Deep Cultural Roots',
        'title' => 'Experience Ancient Heritage',
        'desc' => 'Step back in time among towering fortresses, sacred temples, and centuries of rich island mystery.'
    ]
];

// Tour Packages Data
$packages = [
    [
        'image' => 'assets/images/pkg1.jpg',
        'price' => '$850 / person',
        'duration' => '⏱ 6 Days / 5 Nights',
        'rating' => '⭐ 4.9 (120 reviews)',
        'title' => 'Cultural Triangle Wonders',
        'desc' => 'Explore ancient fortress citadels, sacred shrines, and wild elephant corridors across Sigiriya and Kandy.',
        'tag' => 'All Inclusive Package',
        'link' => '#'
    ],
    [
        'image' => 'assets/images/pkg2.jpg',
        'price' => '$920 / person',
        'duration' => '⏱ 7 Days / 6 Nights',
        'rating' => '⭐ 4.8 (98 reviews)',
        'title' => 'Tropical Southern Coastline',
        'desc' => 'Soak up the sun with professional coastal surfing, luxury boutique beach resorts, and pristine blue whale safaris.',
        'tag' => 'Hotels & Transport Inc.',
        'link' => '#'
    ],
    [
        'image' => 'assets/images/pkg3.jpg',
        'price' => '$780 / person',
        'duration' => '⏱ 5 Days / 4 Nights',
        'rating' => '⭐ 5.0 (143 reviews)',
        'title' => 'Misty Highlands & Tea Trails',
        'desc' => 'Embark on iconic rolling green train journeys, deep alpine valley hiking trails, and cascade waterfall excursions.',
        'tag' => 'Guided Treks Inc.',
        'link' => '#'
    ],
    [
        'image' => 'assets/images/pkg4.jpg',
        'price' => '$1,150 / person',
        'duration' => '⏱ 8 Days / 7 Nights',
        'rating' => '⭐ 4.9 (84 reviews)',
        'title' => 'Ultimate Wildlife Safari',
        'desc' => 'Track elusive leopards in Yala, camp under starlit canopies, and observe giant bird migrations across modern reserves.',
        'tag' => 'Luxury Glamping Inc.',
        'link' => '#'
    ]
];

// Destinations Data
$destinations = [
    ['name' => 'Galle', 'subtitle' => 'Colonial Fort City', 'image' => 'assets/images/galle.jpg'],
    ['name' => 'Matara', 'subtitle' => 'Pristine Southern Beaches', 'image' => 'assets/images/matara.jpg'],
    ['name' => 'Hambanthota', 'subtitle' => 'Wildlife Gateway', 'image' => 'assets/images/hambanthota.jpg'],
    ['name' => 'Kandy', 'subtitle' => 'Sacred Hill Capital', 'image' => 'assets/images/kandy.jpg'],
    ['name' => 'Ella', 'subtitle' => 'Mountain View Paradise', 'image' => 'assets/images/ella.jpg'],
    ['name' => 'Sigiriya', 'subtitle' => 'Ancient Rock Fortress', 'image' => 'assets/images/sigiriya.jpg']
];

// Services Data (Matches create-service.php fields)
$services = [
    [
        'image' => 'assets/images/service1.png', // path to image
        'title' => 'Custom Tour Itineraries',
        'short_desc' => 'Bespoke holiday plans designed specifically around your interests, timeline, and travel budget.'
    ],
    [
        'image' => 'assets/images/service2.png',
        'title' => 'Private Transport & Drivers',
        'short_desc' => 'Air-conditioned luxury vehicles equipped with licensed, English-speaking chauffeur guides.'
    ],
    [
        'image' => 'assets/images/service3.png',
        'title' => 'Boutique Hotel Reservations',
        'short_desc' => 'Exclusive rates and handpicked luxury resorts, eco-lodges, and heritage villas across the island.'
    ],
    [
        'image' => 'assets/images/service4.png',
        'title' => '24/7 Airport Transfers',
        'short_desc' => 'Punctual, stress-free pick-up and drop-off services from Colombo Bandaranaike International Airport.'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_title; ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Owl Carousel 2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- 1. Navigation Section -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-theme-dark sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <span class="text-accent">Travel</span>Lanka
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#packages">Tour Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="#destinations">Destinations</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
                </ul>
                <a href="bookAtrip.php" class="btn btn-accent ms-lg-3 d-none d-lg-inline-block">Book a Trip</a>
            </div>
        </div>
    </nav>

    <!-- 2. Hero Slider Section -->
    <header class="hero-slider-section">
        <div id="hero-carousel" class="owl-carousel owl-theme">
            <?php foreach ($hero_slides as $slide): ?>
                <div class="item">
                    <img src="<?php echo $slide['image']; ?>" alt="<?php echo htmlspecialchars($slide['title']); ?>" class="hero-img">
                    <div class="hero-overlay-text">
                        <div class="container">
                            <span class="badge bg-accent text-dark mb-3 px-3 py-2 text-uppercase fw-bold tracking-wider"><?php echo htmlspecialchars($slide['badge']); ?></span>
                            <h1 class="display-3"><?php echo htmlspecialchars($slide['title']); ?></h1>
                            <p class="lead max-w-xl mx-auto text-light-50"><?php echo htmlspecialchars($slide['desc']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </header>

    <!-- 3. About Us Section -->
    <section id="about" class="py-6 section-padding">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 position-relative">
                    <div class="image-accent-frame">
                        <img src="assets/images/about.jpg" alt="About Us Experience" class="img-fluid rounded-4 shadow-lg main-about-img">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ps-lg-4">
                        <span class="text-accent text-uppercase fw-bold tracking-wider d-block mb-2">Who We Are</span>
                        <h2 class="display-5 fw-bold mb-4 header-font text-theme">Crafting Unforgettable Elite Journeys Since 2012</h2>
                        <p class="text-muted mb-4 lead">At <?php echo $company_name; ?>, we believe that travel shouldn't just take you places—it should move you. We curate experiential custom escapes that showcase the authentic soul of our paradise island.</p>
                        
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-start">
                                    <span class="text-accent fs-3 me-3">✓</span>
                                    <div>
                                        <h6 class="fw-bold text-theme">Expert Local Guides</h6>
                                        <p class="small text-muted mb-0">Certified insights into hidden gems and local lore.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-start">
                                    <span class="text-accent fs-3 me-3">✓</span>
                                    <div>
                                        <h6 class="fw-bold text-theme">100% Tailored Layouts</h6>
                                        <p class="small text-muted mb-0">Custom paced milestones built around your schedule.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-start border-4 border-accent ps-3 my-4 bg-light py-2 rounded-end">
                            <p class="fst-italic text-muted mb-0">"Our mission is simple: to share the raw beauty, deep history, and unparalleled hospitality of Sri Lanka safely, sustainably, and luxuriously."</p>
                        </div>

                        <button class="btn btn-theme py-2 px-4 mt-2">Discover Our Story</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Tour Packages Section -->
    <section id="packages" class="py-6 bg-light section-padding">
        <div class="container">
            <div class="text-center max-w-2xl mx-auto mb-5">
                <span class="text-accent text-uppercase fw-bold tracking-wider d-block mb-2">Curated Excursions</span>
                <h2 class="display-5 fw-bold text-theme header-font">Popular Tour Packages</h2>
                <p class="text-muted">Handcrafted escape packages designed to balance exploration, luxury stay configurations, and leisure.</p>
            </div>
            
            <div id="packages-carousel" class="owl-carousel owl-theme p-2">
                <?php foreach ($packages as $pkg): ?>
                    <div class="card pkg-card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        <div class="position-relative">
                            <img src="<?php echo $pkg['image']; ?>" class="card-img-top pkg-img" alt="<?php echo htmlspecialchars($pkg['title']); ?>">
                            <span class="badge bg-theme text-white position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill fw-semibold"><?php echo htmlspecialchars($pkg['price']); ?></span>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between text-muted small mb-2">
                                <span><?php echo htmlspecialchars($pkg['duration']); ?></span>
                                <span><?php echo htmlspecialchars($pkg['rating']); ?></span>
                            </div>
                            <h4 class="card-title fw-bold text-theme mb-3"><?php echo htmlspecialchars($pkg['title']); ?></h4>
                            <p class="card-text text-muted mb-4"><?php echo htmlspecialchars($pkg['desc']); ?></p>
                            <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                                <span class="text-muted small"><?php echo htmlspecialchars($pkg['tag']); ?></span>
                                <a href="<?php echo $pkg['link']; ?>" class="btn btn-outline-theme btn-sm px-3 rounded-pill">View Tour</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 5. Destination Section -->
    <section id="destinations" class="py-6 section-padding">
        <div class="container">
            <div class="text-center max-w-2xl mx-auto mb-5">
                <span class="text-accent text-uppercase fw-bold tracking-wider d-block mb-2">Regional Wonders</span>
                <h2 class="display-5 fw-bold text-theme header-font">Destination In Sri Lanka</h2>
                <p class="text-muted">Unearth regional highlights across distinct, visually spectacular sectors of the island country.</p>
            </div>
            
            <div class="row g-4">
                <?php foreach ($destinations as $dest): ?>
                    <div class="col-md-4">
                        <div class="destination-card position-relative overflow-hidden rounded-4 shadow-sm">
                            <img src="<?php echo $dest['image']; ?>" alt="<?php echo htmlspecialchars($dest['name']); ?>" class="w-100 h-100 object-fit-cover">
                            <div class="destination-overlay d-flex flex-column align-items-center justify-content-center">
                                <h3 class="text-white fw-bold mb-1"><?php echo htmlspecialchars($dest['name']); ?></h3>
                                <span class="text-accent text-uppercase small tracking-wider"><?php echo htmlspecialchars($dest['subtitle']); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="services" class="py-6 bg-light section-padding">
        <div class="container">
            <div class="text-center max-w-2xl mx-auto mb-5">
                <span class="text-accent text-uppercase fw-bold tracking-wider d-block mb-2">What We Offer</span>
                <h2 class="display-5 fw-bold text-theme header-font">Our Travel Services</h2>
                <p class="text-muted">Comprehensive destination management solutions to ensure your Sri Lankan journey is seamless and memorable.</p>
            </div>
            
            <div class="row g-4">
                <?php foreach ($services as $service): ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="card service-card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="position-relative overflow-hidden" style="height: 190px;">
                                <img src="<?php echo htmlspecialchars($service['image']); ?>" 
                                     alt="<?php echo htmlspecialchars($service['title']); ?>" 
                                     class="w-100 h-100 object-fit-cover"
                                     onerror="this.src='https://placehold.co/400x250?text=Service+Image'">
                            </div>
                            <div class="card-body p-4 text-center">
                                <h5 class="fw-bold text-theme mb-2"><?php echo htmlspecialchars($service['title']); ?></h5>
                                <p class="card-text text-muted small mb-0"><?php echo htmlspecialchars($service['short_desc']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 5.5 Contact Us Section -->
    <section id="contact" class="py-6 bg-light section-padding">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-5">
                    <div class="contact-info mb-4">
                        <span class="text-accent text-uppercase fw-bold tracking-wider d-block mb-2">Connect Now</span>
                        <h2 class="fw-bold mb-3 text-theme header-font">Get In Touch</h2>
                        <p class="text-muted">Have questions about planning your itinerary? Reach out to our local travel experts today.</p>
                        
                        <!-- Details -->
                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="bg-theme text-white rounded-3 p-2 me-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">📍</div>
                            <div>
                                <h6 class="mb-0 fw-bold text-theme">Our Office</h6>
                                <p class="text-muted mb-0 small"><?php echo htmlspecialchars($contact_info['address']); ?></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-theme text-white rounded-3 p-2 me-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">📞</div>
                            <div>
                                <h6 class="mb-0 fw-bold text-theme">Phone Number</h6>
                                <p class="text-muted mb-0 small"><?php echo htmlspecialchars($contact_info['phone']); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="map-container rounded-4 overflow-hidden shadow-sm" style="height: 220px;">
                        <iframe src="<?php echo $contact_info['map_embed']; ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="bg-white p-4 p-lg-5 rounded-4 shadow-sm border">
                        <h4 class="fw-bold mb-4 text-theme">Send Us A Message</h4>
                        <form id="contactForm" action="send_message.php" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-muted">Your Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-muted">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-muted">Subject</label>
                                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Inquiry about Package" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-muted">Your Message</label>
                                    <textarea id="message" name="message" class="form-control" rows="4" placeholder="Tell us about your holiday plans..." required></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" id="submit" class="btn btn-theme w-100 py-3 fw-bold">Submit Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Advanced Expanded Footer Section -->
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function () {
        $('#contactForm').on('submit', function (e) {
            e.preventDefault();

        var name = $.trim($("#name").val());
        var email = $.trim($("#email").val());
        var message = $("#message").val();
            
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
        } else if (message === "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "Please enter a message!",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }

            var formData = new FormData(this);

            $.ajax({
                url: "admin-panel/assets/ajax/js/php/message-data.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Message Sent!",
                            text: response.message,
                            timer: 2500,
                            showConfirmButton: false
                        });
                        $('#contactForm')[0].reset();
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: response.message
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: "error",
                        title: "Server Error",
                        text: "Something went wrong while processing your request."
                    });
                }
            });
        });
    });
    </script>
</body>
</html>