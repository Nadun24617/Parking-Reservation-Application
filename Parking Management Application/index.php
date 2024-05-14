<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Konkhmer+Sleokchher&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sora:wght@100..800&family=Squada+One&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        html {
            font-size: 18px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: rgb(60, 58, 71);
            background-color: #f9f9f9; 
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
            height: 105vh;
            text-align: center; 
        }

        #home p.heading {
            font-size: 5rem;
            margin-top: 0px;
            color: #FCC419;
        }

        h1.sub {
            margin-top: 20px;
            color: white;
        }

        #btn-reserve {
            margin-top: 30px;
            padding: 12px 24px; 
            background-color: #FCC419; 
            color: #fff; 
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #btn-reserve:hover {
            background-color: #e0ac22; 
        }

        p.section-intro {
            font-weight: 600; 
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #333; 
            margin-bottom: 20px;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; 
            border-radius: 8px; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
            transition: transform 0.3s ease;
        }

        .gallery div:hover {
            transform: translateY(-5px); 
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
            background-color: #FCC419; 
            transition: transform 0.3s ease; 
        }

        .social-icons img:hover {
            transform: scale(1.2);
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

        
        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-50px); 
            }
        }

        
        section {
            opacity: 0;
            animation-fill-mode: both; 
        }

       
        section {
            transition: opacity 0.5s ease-in-out;
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
        <button id="btn-reserve" onclick="window.location.href='reserve.php';">Reserve Your Parking</button>
    </section>

    <section id="services">
        <div class="container">
            <header class="sub">
                <h3>Our Services</h3>
                <div class="gallery">
                    <div>
                      <h4>Security</h4>
                        <img src="images/security.png" alt="Service 1">
                        <p>The Kandy Municipal Council ensures public car park security through CCTV surveillance, adequate lighting, and presence of security personnel. Entry controls and regular maintenance further enhance safety. These measures create a secure environment, instilling confidence in users and encouraging the utilization of the public parking facilities.</p>
                    </div>
                    <div>
                      <h4>Time Saving</h4>
                        <img src="images/time.png" alt="Service 2">
                        <p>The Kandy Municipal Council employs an online reservation system for its public car parks, revolutionizing the parking experience. Motorists can now effortlessly book parking spaces in advance, eliminating the hassle of searching upon arrival. This technological advancement not only streamlines parking but also optimizes space usage, reducing congestion and saving valuable time for both drivers and attendants.</p>
                    </div>
                    <div>
                      <h4>Easy to Use</h4>
                        <img src="images/easy.png" alt="Service 3">
                        <p>The Kandy Municipal Council's public car park introduces an easy-to-use feature, allowing motorists to navigate effortlessly. With clear signage, intuitive layout, and user-friendly payment options, the system ensures a seamless parking experience. This simplicity enhances convenience for visitors, promoting efficient use of the facilities while saving time and effort.</p>
                    </div>
                </div>
            </header>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <header class="sub">
                <h3>About Us</h3>
                <p class="para">Welcome to Kandy Municipal Council Public Car Parks, where convenience meets security in the heart of Kandy. Our mission is to offer safe, affordable, and well-maintained parking solutions for residents, visitors, and businesses alike. With strategically located facilities, competitive rates, and a commitment to cleanliness and accessibility, we strive to enhance your experience of exploring our historic city. Choose us for reliable parking, leaving you free to enjoy all that Kandy has to offer with peace of mind.</p>
            </header>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <header class="sub">
                <p class="section-intro">Contact Us</p>
                <p class="large">example1</p>
            </header>
            <ul class="social-icons">
                <li><a href="#"><img src="path/to/image1.jpg" alt="icon1"></a>example2</li>
                <li><a href="#"><img src="path/to/image2.jpg" alt="icon2"></a>example3</li>
                <li><a href="#"><img src="path/to/image3.jpg" alt="icon3"></a>example4</li>
            </ul>
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
                        section.style.animation = "fadeIn 0.5s forwards";
                    }
                });
            }

            function fadeOutElements() {
                sections.forEach(function(section) {
                    var position = section.getBoundingClientRect();
                    if (position.bottom < 0 || position.top > window.innerHeight) {
                        section.style.animation = "fadeOut 0.5s forwards";
                    }
                });
            }

            
            fadeInElements();

            
            document.addEventListener("scroll", function() {
                fadeInElements();
                fadeOutElements();
            });
        });


    </script>
</body>
</html>