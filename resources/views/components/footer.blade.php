<html>
    <head>
        <style>
                 /* Footer */
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 50px 0 20px;
            margin-top: 80px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .footer-section h4 {
            margin-bottom: 20px;
            font-size: 18px;
        }

        .footer-section p, .footer-section li {
            color: #bdc3c7;
            margin-bottom: 10px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #17a2b8;
        }

        .footer-bottom {
            border-top: 1px solid #34495e;
            margin-top: 30px;
            padding-top: 20px;
            text-align: center;
            color: #bdc3c7;
        }

        </style>
    </head>
<body>
<footer class="footer">
    <div class="footer-container">
      
        <div class="footer-section">
            <div style="display: flex; align-items: center; margin-bottom: 20px;">
                <div style="width: 40px; height: 40px; background-color: #17a2b8; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <span style="color: white; font-weight: 700; font-size: 14px;">AB</span>
                </div>
                <span style="font-weight: 600; font-size: 18px;">FACTORY</span>
            </div>
            <p>Leading provider of innovative inventory management solutions for businesses of all sizes.</p>
        </div>

        <div class="footer-section">
            <h4>Export Department</h4>
            <ul>
                <li><a href="#">Director Export</a></li>
                <li><a href="#">+1234567</a></li>
                <li><a href="#">hello@gnail.com</a></li>
                <li><a href="#">+92000000</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Contact Information</h4>
            <p>📧 info@abfactory.com</p>
            <p>📞 +1 (555) 123-4567</p>
            <p>📍 123 Tech Street, Digital City</p>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} AB Factory. All rights reserved.</p>
    </div>

</footer>
</body>
</html>