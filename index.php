<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRL Interactive Events</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #00bcd4 0%, #3f51b5 50%, #9c27b0 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Brick wall background effect */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(90deg, rgba(0,0,0,0.1) 1px, transparent 1px),
                linear-gradient(rgba(0,0,0,0.1) 1px, transparent 1px);
            background-size: 40px 20px;
            background-position: 0 0, 20px 10px;
            z-index: 1;
            opacity: 0.3;
        }

        .container {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .social-icons {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            gap: 10px;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            background: rgba(0, 188, 212, 0.8);
            border: 2px solid #00bcd4;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: #00bcd4;
            transform: scale(1.1);
        }

        .logo {
            display: inline-block;
            background: linear-gradient(45deg, #00bcd4, #9c27b0);
            padding: 20px 40px;
            border-radius: 15px;
            border: 3px solid #00bcd4;
            position: relative;
            margin-bottom: 10px;
        }

        .logo h1 {
            color: white;
            font-size: 3em;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin: 0;
        }

        .logo-subtitle {
            color: #00bcd4;
            font-size: 1.2em;
            margin-top: 5px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .vip-section {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            text-align: right;
        }

        .vip-text {
            color: white;
            font-size: 1.2em;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .join-btn {
            background: linear-gradient(45deg, #00bcd4, #4caf50);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .join-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,188,212,0.4);
        }

        .main-title {
            color: white;
            font-size: 2.5em;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Event Grid */
        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .event-card {
            background: linear-gradient(135deg, rgba(0,188,212,0.1), rgba(156,39,176,0.1));
            border: 3px solid;
            border-image: linear-gradient(45deg, #00bcd4, #9c27b0) 1;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
            backdrop-filter: blur(10px);
        }

        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,188,212,0.3);
        }

        .event-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s ease;
        }

        .event-card:hover::before {
            left: 100%;
        }

        .event-title {
            color: white;
            font-size: 2.5em;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .event-subtitle {
            color: #00bcd4;
            font-size: 1.3em;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .event-description {
            color: white;
            font-size: 1em;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.9;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                position: relative;
                text-align: center;
            }

            .social-icons {
                position: relative;
                left: auto;
                top: auto;
                transform: none;
                justify-content: center;
                margin-bottom: 20px;
            }

            .vip-section {
                position: relative;
                right: auto;
                top: auto;
                transform: none;
                text-align: center;
                margin-top: 20px;
            }

            .logo h1 {
                font-size: 2em;
            }

            .main-title {
                font-size: 1.8em;
            }

            .events-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .event-card {
                padding: 20px;
            }

            .event-title {
                font-size: 1.8em;
            }

            .event-subtitle {
                font-size: 1.1em;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }

            .logo {
                padding: 15px 25px;
            }

            .logo h1 {
                font-size: 1.5em;
            }

            .main-title {
                font-size: 1.4em;
            }

            .event-title {
                font-size: 1.5em;
            }

            .social-icon {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>
<body>
    <?php
    // Event data array
    $events = [
        [
            'title' => 'GSNL',
            'subtitle' => 'GAME SHOW<br>NIGHT LIVE',
            'description' => 'FREE | FUN | FANTASTIC PRIZES',
            'page' => 'gsnl.php'
        ],
        [
            'title' => 'HYBRID',
            'subtitle' => 'EVENTS',
            'description' => 'NOT JUST A SHOW. AN EXPERIENCE.',
            'page' => 'hybrid.php'
        ],
        [
            'title' => 'BADA',
            'subtitle' => 'BRUNCH<br>IN-A-BOX',
            'description' => '',
            'page' => 'brunch.php'
        ],
        [
            'title' => 'WEDDING',
            'subtitle' => 'OUTSIDE<br>THE BOX',
            'description' => 'ALL-IN-ONE WEDDING PRODUCTION',
            'page' => 'wedding.php'
        ],
        [
            'title' => 'WATER',
            'subtitle' => 'COOLER<br>SPORTS',
            'description' => 'CORPORATE GAME SHOWS<br>& INTERACTIVE TEAM BUILDING EVENTS',
            'page' => 'sports.php'
        ],
        [
            'title' => 'IRL',
            'subtitle' => 'DIRECT<br>MARKETING',
            'description' => '',
            'page' => 'marketing.php'
        ]
    ];
    ?>

    <div class="container">
        <div class="header">
            <div class="social-icons">
                <a href="https://instagram.com" class="social-icon" target="_blank">📷</a>
                <a href="https://tiktok.com" class="social-icon" target="_blank">🎵</a>
                <a href="https://facebook.com" class="social-icon" target="_blank">f</a>
                <a href="https://twitter.com" class="social-icon" target="_blank">💬</a>
            </div>

            <div class="logo">
                <h1>IRL</h1>
                <div class="logo-subtitle">INTERACTIVE EVENTS</div>
                <div class="logo-subtitle">BRING PEOPLE BACK TO REALITY</div>
            </div>

            <div class="vip-section">
                <div class="vip-text">JOIN OUR WINNERS' CIRCLE<br>VIP PLAYER PROGRAM</div>
                <a href="vip.php" class="join-btn">JOIN NOW</a>
            </div>
        </div>

        <h2 class="main-title">OUTSIDE-THE-BOX EVENTS - IN A BOX!</h2>

        <div class="events-grid">
            <?php foreach ($events as $event): ?>
                <div class="event-card" data-page="<?php echo $event['page']; ?>">
                    <div class="event-title"><?php echo $event['title']; ?></div>
                    <div class="event-subtitle"><?php echo $event['subtitle']; ?></div>
                    <?php if (!empty($event['description'])): ?>
                        <div class="event-description"><?php echo $event['description']; ?></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        document.querySelectorAll('.event-card').forEach(card => {
            // Add click animation and redirection
            card.addEventListener('click', function() {
                // Apply the click animation
                this.style.transform = 'scale(0.95)';
                
                // Get the page URL from the data-page attribute
                const pageUrl = this.getAttribute('data-page');

                // Redirect after a short delay to allow the animation to be seen
                setTimeout(() => {
                    window.location.href = pageUrl;
                }, 100); // Redirect after 100ms
            });

            // Add hover sound effect (optional)
            card.addEventListener('mouseenter', function() {
                // You can add sound effects here if needed
                console.log('Hovering over:', this.querySelector('.event-title').textContent);
            });

            // Reset transform on mouse leave to prepare for next hover/click
            card.addEventListener('mouseleave', function() {
                // Ensure the card snaps back to its original position after hover
                // if it wasn't clicked, or if the user hovers back after a click
                // and before redirection. This is mostly for visual consistency.
                this.style.transform = 'translateY(0)'; 
            });
        });
    </script>
</body>
</html>

