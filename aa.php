<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Brand - Modern Solutions</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #6366f1;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #6366f1;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="%23ffffff" stop-opacity="0.1"/><stop offset="100%" stop-color="%23ffffff" stop-opacity="0"/></radialGradient></defs><circle cx="200" cy="200" r="100" fill="url(%23a)" opacity="0.5"><animate attributeName="cy" values="200;800;200" dur="20s" repeatCount="indefinite"/></circle><circle cx="800" cy="800" r="150" fill="url(%23a)" opacity="0.3"><animate attributeName="cx" values="800;200;800" dur="25s" repeatCount="indefinite"/></circle><circle cx="500" cy="500" r="80" fill="url(%23a)" opacity="0.4"><animate attributeName="r" values="80;200;80" dur="15s" repeatCount="indefinite"/></circle></svg>');
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .hero-content {
            max-width: 800px;
            z-index: 2;
            position: relative;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            opacity: 0;
            animation: slideUp 1s ease forwards 0.5s;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0;
            animation: slideUp 1s ease forwards 0.7s;
        }

        .cta-button {
            display: inline-block;
            padding: 12px 30px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            opacity: 0;
            animation: slideUp 1s ease forwards 0.9s;
        }

        .cta-button:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Features Section */
        .features {
            padding: 5rem 0;
            background: #f8fafc;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #1e293b;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .feature-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: white;
        }

        /* Contact Section */
        .contact {
            padding: 5rem 0;
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            color: white;
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.5);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
        }

        /* Footer */
        .footer {
            background: #0f172a;
            color: white;
            text-align: center;
            padding: 2rem 0;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Success/Error Messages */
        .message {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .success {
            background: rgba(34, 197, 94, 0.2);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #22c55e;
        }

        .error {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #ef4444;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">YourBrand</div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Welcome to the Future</h1>
            <p>Discover innovative solutions that transform your business and elevate your success to new heights.</p>
            <a href="#contact" class="cta-button">Get Started Today</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <h2 class="section-title">Why Choose Us?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <h3>Lightning Fast</h3>
                    <p>Experience blazing-fast performance with our optimized solutions that deliver results in seconds.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Secure & Reliable</h3>
                    <p>Your data is protected with enterprise-grade security measures and 99.9% uptime guarantee.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💡</div>
                    <h3>Smart Innovation</h3>
                    <p>Leverage cutting-edge technology and AI-powered features to stay ahead of the competition.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2 class="section-title">Get In Touch</h2>
            
            <?php
            $message = '';
            $messageClass = '';
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = trim($_POST['name'] ?? '');
                $email = trim($_POST['email'] ?? '');
                $subject = trim($_POST['subject'] ?? '');
                $messageText = trim($_POST['message'] ?? '');
                
                // Basic validation
                if (empty($name) || empty($email) || empty($messageText)) {
                    $message = 'Please fill in all required fields.';
                    $messageClass = 'error';
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $message = 'Please enter a valid email address.';
                    $messageClass = 'error';
                } else {
                    // Here you would typically send an email or save to database
                    // For this template, we'll just show a success message
                    
                    // Example email sending (uncomment and configure as needed):
                    /*
                    $to = 'your-email@domain.com';
                    $emailSubject = 'Contact Form: ' . $subject;
                    $emailBody = "Name: $name\nEmail: $email\n\nMessage:\n$messageText";
                    $headers = "From: $email\r\nReply-To: $email\r\n";
                    
                    if (mail($to, $emailSubject, $emailBody, $headers)) {
                        $message = 'Thank you! Your message has been sent successfully.';
                        $messageClass = 'success';
                    } else {
                        $message = 'Sorry, there was an error sending your message. Please try again.';
                        $messageClass = 'error';
                    }
                    */
                    
                    $message = 'Thank you! Your message has been received successfully.';
                    $messageClass = 'success';
                    
                    // Clear form data on success
                    $name = $email = $subject = $messageText = '';
                }
            }
            ?>
            
            <form class="contact-form" method="POST" action="">
                <?php if ($message): ?>
                    <div class="message <?php echo $messageClass; ?>">
                        <?php echo htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" required 
                           value="<?php echo htmlspecialchars($name ?? ''); ?>"
                           placeholder="Your full name">
                </div>
                
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required 
                           value="<?php echo htmlspecialchars($email ?? ''); ?>"
                           placeholder="your.email@example.com">
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" 
                           value="<?php echo htmlspecialchars($subject ?? ''); ?>"
                           placeholder="What's this about?">
                </div>
                
                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" rows="5" required 
                              placeholder="Tell us more about your inquiry..."><?php echo htmlspecialchars($messageText ?? ''); ?></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 YourBrand. All rights reserved. Built with passion and innovation.</p>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = 'none';
            }
        });

        // Animate feature cards on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                    }, index * 200);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.feature-card').forEach(card => {
            observer.observe(card);
        });

        // Form validation and enhancement
        const form = document.querySelector('.contact-form');
        const inputs = form.querySelectorAll('input, textarea');

        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Add loading state to submit button
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('.submit-btn');
            const originalText = submitBtn.textContent;
            
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;
            
            // Re-enable button after form submission (for demonstration)
            setTimeout(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });

        // Parallax effect for hero background
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero');
            if (hero) {
                hero.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

        // Add some interactive hover effects
        document.querySelectorAll('.cta-button, .submit-btn').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px) scale(1.05)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>
</html>
