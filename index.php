<?php include('connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel X | Premium Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .product-card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 12px;
    }

    .product-card a {
        text-decoration: none;
    }
</style>

<body>

    <?php include('navbar.php') ?>


    <?php $db_products = $conn->query("SELECT * FROM products") ?>


    <section class="hero-section">
        <div class="swiper mainSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url('images/slider1.jpg')">
                    <div class="hero-overlay">
                        <div class="container text-white" data-aos="fade-up">
                            <h1 class="display-3 fw-bold">Next-Gen Computing</h1>
                            <p class="lead">Powerful laptops designed for creators and professionals.</p>
                            <a href="shop.php" class="btn btn-primary-custom btn-lg">Explore Laptops</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide" style="background-image: url('images/slider2.jpg')">
                    <div class="hero-overlay">
                        <div class="container text-white" data-aos="fade-up">
                            <h1 class="display-3 fw-bold">Immersive Sound</h1>
                            <p class="lead">Premium noise-canceling headphones for pure audio bliss.</p>
                            <a href="shop.php" class="btn btn-primary-custom btn-lg">Shop Audio</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="py-5" id="about">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="images/about_us.jpg" class="img-fluid rounded-4 shadow-sm" alt="Our Technology">
                </div>
                <div class="col-lg-6 ps-lg-5" data-aos="fade-left">
                    <h6 class="text-primary fw-bold text-uppercase">Our Story</h6>
                    <h2 class="display-5 fw-bold mb-4">Quality & Trust Since 2024</h2>
                    <p class="text-secondary">We provide high-quality items designed to make your life easier and more stylish. Our focus is on sustainability and customer satisfaction.</p>
                    <button class="btn btn-outline-primary rounded-pill px-4 py-2 mt-3">Read More</button>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" id="services">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Why Shop With Us?</h2>
                <p class="text-secondary">We ensure the best shopping experience for our customers.</p>
            </div>
            <div class="row g-4 text-center" role="button">
                <div class="col-md-4 pointer" data-aos="zoom-in" data-aos-delay="100">
                    <div class="service-card p-4 bg-white rounded-4 shadow-sm h-100">
                        <i class="bi bi-truck text-primary display-4 mb-3"></i>
                        <h4>Fast Delivery</h4>
                        <p class="text-secondary">Free shipping on all orders over $100 worldwide.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-card p-4 bg-white rounded-4 shadow-sm h-100">
                        <i class="bi bi-shield-check text-primary display-4 mb-3"></i>
                        <h4>Secure Payment</h4>
                        <p class="text-secondary">Your transactions are safe with our encrypted system.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="service-card p-4 bg-white rounded-4 shadow-sm h-100">
                        <i class="bi bi-headset text-primary display-4 mb-3"></i>
                        <h4>24/7 Support</h4>
                        <p class="text-secondary">Our dedicated team is here to help you anytime.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5" id="gallery">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold text-black">Featured Products</h2>
            </div>
            <div class="row g-3">
                <?php while ($show_items = $db_products->fetch_assoc()): ?>
                    <div class="col-md-6 col-xl-4">
                        <div class="card h-100 border-0 shadow-sm product-card">
                            <div class="position-relative overflow-hidden">
                                <span class="badge bg-primary position-absolute m-3 top-0 start-0 z-1">New</span>
                                <a href="shop.php">
                                    <img src="uploads/<?php echo $show_items['image'] ?>" class="card-img-top p-2 rounded-4" alt="Product">
                                </a>
                                <div class="product-actions d-flex flex-column gap-2">
                                    <button class="btn btn-white shadow-sm"><i class="bi bi-heart"></i></button>
                                    <button class="btn btn-white shadow-sm"><i class="bi bi-eye"></i></button>
                                </div>
                            </div>

                            <div class="card-body">
                                <p class="text-muted small mb-1">
                                    <?php echo $show_items['type'] ?>
                                </p>
                                <h6 class="card-title fw-bold"><?php echo $show_items['title'] ?></h6>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="h5 mb-0 text-primary"><?php echo $show_items['price'] ?>$</span>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>
            </div>


    </section>


    <section class="py-5 bg-dark text-white" id="contact">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <h2 class="fw-bold mb-4">Get In Touch</h2>
                    <p class="text-secondary">Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                    <div class="mt-4">
                        <p><i class="bi bi-geo-alt me-2 text-primary"></i> 123 Street, Yangon, Myanmar</p>
                        <p><i class="bi bi-envelope me-2 text-primary"></i> info@shop.com</p>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Your Name</label>
                            <input type="text" class="form-control bg-transparent text-white" placeholder="Your Name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Your Email</label>
                            <input type="email" class="form-control bg-transparent text-white" placeholder="Your Email">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Message</label>
                            <textarea class="form-control bg-transparent text-white" rows="4" placeholder="Message"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary-custom w-100 py-3">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Initialize Swiper
        const swiper = new Swiper('.mainSwiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            autoplay: {
                delay: 5000
            },
        });
    </script>
</body>

</html>