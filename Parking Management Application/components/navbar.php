<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sticky Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

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
    }

    .navbar {
      background-color: #333;
      transition: background-color 0.3s ease;
      padding: 10px 20px;
    }

    .navbar-brand {
      font-size: 1.5rem;
      font-weight: bold;
      color: #FCC419;
      display: flex;
      align-items: center;
    }

    .navbar-brand img {
      margin-right: 10px;
    }

    .nav-link {
      color: #fff !important;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .nav-link:hover, .nav-link.active {
      color: #FCC419 !important;
    }

    .navbar-toggler {
      border-color: rgba(255, 255, 255, 0.1);
    }

    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28%255, 255, 255, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

    .nav-item {
      margin: 0 10px;
    }

    @media (max-width: 992px) {
      .navbar-nav {
        text-align: center;
      }

      .nav-item {
        margin: 5px 0;
      }
    }

    @media (max-width: 768px) {
      .navbar {
        padding: 10px;
      }

      .navbar-brand {
        font-size: 1.2rem;
      }

      .nav-link {
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="images/carpark.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        Kandy Municipal Car Park
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>