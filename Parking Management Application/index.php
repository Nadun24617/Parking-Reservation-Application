<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kandy Municipal Car Park</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        html {
            font-size: 16px;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Nunito', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }

        header {
            background: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        #home {
            background-image: url('images/background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            padding: 20px;
            color: #fff;
        }

        #home p.heading {
            font-size: 4rem;
            margin-top: 0;
            color: #FFD700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            animation: slideIn 2s ease-out;
        }

        h1.sub {
            margin-top: 20px;
            color: #fff;
            animation: slideIn 2s ease-out;
        }

        .btn {
            margin-top: 20px;
            padding: 15px 30px;
            background: linear-gradient(145deg, #FFD700, #FFA500);
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.15);
            transition: all 0.5s ease;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
        }

        .btn:hover::before {
            transform: translate(-50%, -50%) scale(1);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            background: linear-gradient(145deg, #ff7043, #ff5722);
        }

        .btn-secondary:hover {
            background: linear-gradient(145deg, #ff5722, #ff7043);
        }

        section {
            padding: 80px 20px;
            text-align: center;
            transition: padding 0.3s ease-in-out;
        }

        section:nth-of-type(odd) {
            background: #fff;
        }

        section:nth-of-type(even) {
            background: #f9f9f9;
        }

        .section-heading {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .container:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 20px;
        }

        .gallery div {
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #fafafa;
        }

        .gallery div:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .gallery img {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 20px;
        }

        .social-icons {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .social-icons img {
            padding: 10px;
            border-radius: 50%;
            background-color: #FFD700;
            transition: transform 0.3s ease;
        }

        .social-icons img:hover {
            transform: scale(1.2);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 1s forwards;
        }

        .section-content {
            max-width: 800px;
            margin: 0 auto;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .service-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .service-item img {
            max-width: 150px;
            margin-bottom: 20px;
        }

        .service-item h4 {
            margin-bottom: 15px;
            font-size: 1.5rem;
            color: #333;
        }

        .service-item p {
            font-size: 1rem;
            color: #555;
            max-width: 700px;
            margin: 0 auto;
        }

        .contact-details {
            font-size: 1.1rem;
            color: #555;
        }

        .in-view .section-heading, .in-view .section-content {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <header>
        <?php include("components/header.php")?>
    </header>

    <section id="home">
        <p class="heading">No More Waiting</p>
        <h1 class="sub">Parking Slot is in Your Fingers</h1>
        <button class="btn" onclick="window.location.href='login_register.php?redirect=reserve';">Reserve Your Parking</button>
        <button class="btn btn-secondary" onclick="window.location.href='login_register.php?redirect=view';">Already Reserved Parking</button>
    </section>

    <section id="services">
        <h2 class="section-heading">Our Services</h2>
        <div class="container section-content">
            <div class="gallery">
                <div class="service-item">
                    <img src="images/security.png" alt="Security Service">
                    <h4>Security</h4>
                    <p>The Kandy Municipal Council ensures public car park security through CCTV surveillance, adequate lighting, and presence of security personnel. Entry controls and regular maintenance further enhance safety. These measures create a secure environment, instilling confidence in users and encouraging the utilization of the public parking facilities.</p>
                </div>
                <div class="service-item">
                    <img src="images/time.png" alt="Time Saving Service">
                    <h4>Time Saving</h4>
                    <p>The Kandy Municipal Council employs an online reservation system for its public car parks, revolutionizing the parking experience. Motorists can now effortlessly book parking spaces in advance, eliminating the hassle of searching upon arrival. This technological advancement not only streamlines parking but also optimizes space usage, reducing congestion and saving valuable time for both drivers and attendants.</p>
                </div>
                <div class="service-item">
                    <img src="images/easy.png" alt="Easy to Use Service">
                    <h4>Easy to Use</h4>
                    <p>The Kandy Municipal Council's public car park introduces an easy-to-use feature, allowing motorists to navigate effortlessly. With clear signage, intuitive layout, and user-friendly payment options, the system ensures a seamless parking experience. This simplicity enhances convenience for visitors, promoting efficient use of the facilities while saving time and effort.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <h2 class="section-heading">About Us</h2>
        <div class="container section-content">
            <p>Welcome to Kandy Municipal Council Public Car Parks, where convenience meets security in the heart of Kandy. Our mission is to offer safe, affordable, and well-maintained parking solutions for residents, visitors, and businesses alike. With strategically located facilities, competitive rates, and a commitment to cleanliness and accessibility, we strive to enhance your experience of exploring our historic city. Choose us for reliable parking, leaving you free to enjoy all that Kandy has to offer with peace of mind.</p>
        </div>
    </section>

    <section id="contact">
        <h2 class="section-heading">Contact Us</h2>
        <div class="container section-content contact-details">
            <p><b>Address:</b> Kandy city car park, Kandy</p>
            <p><b>Phone:</b> 0812 922 321</p>
        </div>
    </section>

    <footer>
        <?php include("components/footer.php")?>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var sections = document.querySelectorAll("section");

            function fadeInElements() {
                sections.forEach(function(section) {
                    var position = section.getBoundingClientRect();
                    if (position.top < window.innerHeight && position.bottom >= 0) {
                        section.classList.add("in-view");
                    }
                });
            }

            fadeInElements();

            document.addEventListener("scroll", function() {
                fadeInElements();
            });
        });
    </script>
</body>
</html>
