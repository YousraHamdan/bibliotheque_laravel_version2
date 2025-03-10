<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5dc; /* Parchment-like background */
            color: #3e2723; /* Dark brown for text */
            line-height: 1.6;
        }

        /* Header and Navigation */
        header {
            background-color: #6d4c41; /* Deep, rich brown for old money vibe */
            padding: 10rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
        }

        /* Small Floating Papers Logo */
        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .paper {
            width: 20px;
            height: 30px;
            background-color: #fffaf0; /* Light, creamy background */
            position: relative;
            border-radius: 2px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            animation: float 3s infinite ease-in-out;
        }

        .paper:nth-child(1) {
            transform: rotate(-5deg);
            animation-delay: 0s;
        }

        .paper:nth-child(2) {
            transform: rotate(5deg);
            animation-delay: 0.5s;
        }

        .paper:nth-child(3) {
            transform: rotate(-3deg);
            animation-delay: 1s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        nav ul {
            list-style: none;
            margin: 10;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        nav ul li {
            margin: 0 15px;
            position: relative;
        }

        nav ul li a {
            color: #fff8e1; 
            text-decoration: none;
            font-size: 1.1rem;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            position: relative;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

       
        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: #d4af37; /* Gold accent for old money feel */
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        nav ul li a:hover::after {
            width: 100%;
            background-color: #ffecb3; 
        }

        nav ul li a:hover {
            color: #ffecb3; 
        }

        /* Dropdown Effect for Logout and History */
        nav ul li .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #8b7355; /* Warm brown for dropdown */
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 0.5rem;
            z-index: 1000;
            animation: slideDown 0.5s ease-in-out forwards;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateX(-50%) translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
        }

        nav ul li:hover .dropdown-content {
            display: block;
        }

        nav ul li .dropdown-content button,
        nav ul li .dropdown-content a {
            background: none;
            border: none;
            color: #fff8e1;
            cursor: pointer;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
            display: block;
            width: 100%;
            text-align: left;
            text-decoration: none;
        }

        nav ul li .dropdown-content button:hover,
        nav ul li .dropdown-content a:hover {
            color: #ffecb3;
        }

        /* User Welcome Section */
        .user-welcome {
            text-align: center;
            padding: 1.5rem 0;
            background-color: #fffaf0; /* Light, creamy background */
            border-bottom: 1px solid #8b7355; /* Warm, earthy brown border */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .user-welcome::before {
            content: '';
            position: absolute;
            top: 0;
            left: -50%;
            width: 200%;
            height: 100%;
            background: linear-gradient(90deg, rgba(139, 115, 85, 0.1) 25%, transparent 50%, rgba(139, 115, 85, 0.1) 75%);
            animation: shimmer 3s infinite linear;
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-50%);
            }
            100% {
                transform: translateX(50%);
            }
        }

        .user-welcome h2 {
            margin: 0;
            font-size: 1.75rem;
            color: #3e2723; /* Dark brown for text */
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            animation: fadeInDown 1s ease-in-out;
        }

        .user-welcome p {
            margin: 0.5rem 0 0;
            font-size: 1.25rem;
            color: #6d4c41; /* Muted brown */
            font-style: italic;
            animation: fadeInUp 1s ease-in-out;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Content Area */
        .content {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fffaf0; /* Light, creamy background */
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin: 10px 0;
            }

            nav ul li .dropdown-content {
                left: 0;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <header>
        <!-- Small Floating Papers Logo -->
        <div class="logo">
            <div class="paper"></div>
            <div class="paper"></div>
            <div class="paper"></div>
        </div>

        <!-- Navigation -->
        <nav>
            <ul>
                <li><a href="{{ route('emprunts.index') }}">Emprunts</a></li>
                <li><a href="{{ route('livres.index') }}">Livres</a></li>
                <li><a href="{{ route('auteurs.index') }}">Auteurs</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Se connecter</a></li>
                    <li><a href="{{ route('register') }}">S'inscrire</a></li>
                @else
                    <li>
                        <a href="#">Mon Compte</a>
                        <div class="dropdown-content">
                            <a href="{{ route('livre-history.index') }}">Historique</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Se déconnecter</button>
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
    </header>

    @auth
        <div class="user-welcome">
            <h2>Bienvenue, {{ Auth::user()->name }}!</h2>
            <p>Nous sommes ravis de vous revoir.</p>
        </div>
    @endauth

    <div class="content">
        @yield('content')
    </div>
</body>
</html>