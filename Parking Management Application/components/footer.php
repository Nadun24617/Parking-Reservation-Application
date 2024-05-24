<style>
    footer {
        width: 100%;
        display: flex;
        justify-content: center;
        background: #222;
        padding: 20px 0;
        box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.1);
    }

    footer div {
        padding: 0 10px;
        max-width: 1200px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    footer span {
        color: #fff;
        font-size: 0.9rem;
    }

    footer a {
        margin-left: 20px;
        text-decoration: none;
        color: #fff;
        padding: 8px 12px;
        transition: color 0.3s ease, background-color 0.3s ease, transform 0.3s ease;
        border-radius: 4px;
    }

    footer a:hover {
        color: #fff;
        background-color: #FCC419;
        transform: translateY(-2px);
    }

    .footer-links {
        display: flex;
        align-items: center;
    }
    
    @media (max-width: 768px) {
        footer div {
            flex-direction: column;
            align-items: center;
        }

        .footer-links {
            margin-top: 10px;
        }

        footer a {
            margin-left: 10px;
            margin-right: 10px;
        }
    }
</style>

<footer>
    <div>
        <span>&copy; 2024 Kandy Municipal Car Park. All Rights Reserved.</span>
        <span class="footer-links">
            <a href="#">Home</a>
            <a href="#contact">Contact</a>
            <a href="admin-login.php">Admin</a>
        </span>
    </div>
</footer>
