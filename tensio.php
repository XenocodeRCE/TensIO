<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TensIO - Analyseur de Tension Philosophique</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --noir: #0a0a0a;
            --blanc: #fafafa;
            --gris-clair: #e8e6e3;
            --gris-moyen: #a8a5a0;
            --gris-fonce: #6b6965;
            --or: #d4a574;
            --or-hover: #c49464;
            --or-pale: rgba(212, 165, 116, 0.15);
            --papier: #f8f6f3;
            --rouge: #c45c5c;
            --vert: #5c9a6b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--papier);
            color: var(--noir);
            min-height: 100vh;
            line-height: 1.6;
        }

        /* Header */
        header {
            border-bottom: 1px solid var(--noir);
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--blanc);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .logo span {
            color: var(--or);
        }

        nav {
            display: flex;
            gap: 2rem;
        }

        nav a {
            text-decoration: none;
            color: var(--noir);
            font-size: 0.9rem;
            font-weight: 500;
            position: relative;
            padding-bottom: 2px;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--or);
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 5rem 2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 400;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero h1 em {
            font-style: italic;
            color: var(--or);
        }

        .hero p {
            font-size: 1.1rem;
            color: var(--gris-moyen);
            max-width: 500px;
            margin: 0 auto 3rem;
        }

        /* Main Container */
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 2rem 4rem;
        }

        /* Section Titles */
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            text-align: center;
            margin: 4rem 0 2rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 2px;
            background: var(--or);
            margin: 1rem auto 0;
        }

        /* Input Section */
        .input-section {
            background: var(--blanc);
            border: 1px solid var(--noir);
            padding: 2.5rem;
            margin-bottom: 2rem;
        }

        .input-section label {
            display: block;
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .input-section textarea {
            width: 100%;
            min-height: 120px;
            padding: 1.2rem;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            border: 1px solid var(--gris-clair);
            background: var(--papier);
            resize: vertical;
            transition: border-color 0.3s ease;
        }

        .input-section textarea:focus {
            outline: none;
            border-color: var(--or);
        }

        .input-section textarea::placeholder {
            color: var(--gris-moyen);
            font-style: italic;
        }

        /* Button */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--noir);
            color: var(--blanc);
            border: none;
            padding: 1rem 2rem;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1.5rem;
        }

        .btn-primary:hover {
            background: var(--or);
            color: var(--noir);
        }

        .btn-primary svg {
            width: 18px;
            height: 18px;
        }

        .btn-primary.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        /* Progress Steps */
        .progress-container {
            display: none;
            margin: 2rem 0;
            padding: 1.5rem;
            background: var(--blanc);
            border: 1px solid var(--gris-clair);
        }

        .progress-container.visible {
            display: block;
        }

        .progress-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .progress-steps {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .progress-step {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: var(--gris-clair);
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .progress-step.active {
            background: var(--or-pale);
            border-left: 3px solid var(--or);
        }

        .progress-step.done {
            background: rgba(92, 154, 107, 0.15);
            border-left: 3px solid var(--vert);
        }

        .progress-step .step-icon {
            width: 18px;
            height: 18px;
        }

        /* Results Section */
        .results-section {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .results-section.visible {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .result-card {
            background: var(--blanc);
            border: 1px solid var(--noir);
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .result-card-header {
            background: var(--noir);
            color: var(--blanc);
            padding: 1rem 1.5rem;
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .result-card-header.these-x {
            background: linear-gradient(135deg, var(--noir) 0%, #2a2a2a 100%);
        }

        .result-card-header.these-y {
            background: linear-gradient(135deg, #2a2a2a 0%, var(--noir) 100%);
        }

        .result-card-header .number {
            background: var(--or);
            color: var(--noir);
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .result-card-content {
            padding: 1.5rem;
        }

        .result-card-content p {
            color: var(--noir);
            line-height: 1.8;
        }

        .result-card-content .highlight {
            background: linear-gradient(180deg, transparent 60%, rgba(212, 165, 116, 0.3) 60%);
            padding: 0 2px;
        }

        /* These/Antithese Cards */
        .these-card {
            background: var(--blanc);
            border: 1px solid var(--noir);
            margin-bottom: 1.5rem;
        }

        .these-card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--gris-clair);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .these-card-header .badge {
            font-family: 'Fira Code', monospace;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            background: var(--noir);
            color: var(--blanc);
        }

        .these-card-header .badge.y {
            background: var(--gris-fonce);
        }

        .these-card-header h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 400;
        }

        .these-card-body {
            padding: 1.5rem;
        }

        .these-enonce {
            font-size: 1.1rem;
            font-style: italic;
            color: var(--noir);
            padding: 1rem;
            background: var(--or-pale);
            border-left: 3px solid var(--or);
            margin-bottom: 1.5rem;
        }

        .these-section {
            margin-bottom: 1.5rem;
        }

        .these-section-title {
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--gris-fonce);
            margin-bottom: 0.75rem;
        }

        .these-section ul {
            list-style: none;
            padding: 0;
        }

        .these-section li {
            padding: 0.5rem 0;
            padding-left: 1.5rem;
            position: relative;
        }

        .these-section li::before {
            content: '→';
            position: absolute;
            left: 0;
            color: var(--or);
        }

        .philosophe-card {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            background: var(--papier);
            border: 1px solid var(--gris-clair);
        }

        .philosophe-avatar {
            width: 50px;
            height: 50px;
            background: var(--noir);
            color: var(--or);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .philosophe-info h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }

        .philosophe-info p {
            font-size: 0.9rem;
            color: var(--gris-fonce);
            font-style: italic;
        }

        /* Tension Meter */
        .tension-meter {
            display: flex;
            align-items: center;
            gap: 2rem;
            padding: 2rem;
            background: var(--blanc);
            border: 1px solid var(--noir);
            margin-bottom: 1.5rem;
        }

        .meter-visual {
            flex-shrink: 0;
        }

        .meter-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid var(--gris-clair);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            background: var(--blanc);
        }

        .meter-circle::before {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            border: 4px solid transparent;
            border-top-color: var(--or);
            border-right-color: var(--or);
            transform: rotate(var(--rotation, 45deg));
            transition: transform 0.5s ease;
        }

        .meter-value {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 600;
            line-height: 1;
        }

        .meter-label {
            font-size: 0.75rem;
            color: var(--gris-moyen);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .meter-info {
            flex: 1;
        }

        .meter-info h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        .meter-info p {
            color: var(--gris-fonce);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Costs Comparison */
        .costs-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .cost-card {
            background: var(--blanc);
            border: 1px solid var(--noir);
            padding: 1.5rem;
        }

        .cost-card h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--gris-clair);
        }

        .cost-list {
            list-style: none;
            padding: 0;
        }

        .cost-list li {
            padding: 0.5rem 0;
            padding-left: 1.5rem;
            position: relative;
            font-size: 0.95rem;
        }

        .cost-list.gains li::before {
            content: '+';
            position: absolute;
            left: 0;
            color: var(--vert);
            font-weight: 600;
        }

        .cost-list.pertes li::before {
            content: '−';
            position: absolute;
            left: 0;
            color: var(--rouge);
            font-weight: 600;
        }

        /* Problem & Question */
        .problem-box {
            background: var(--noir);
            color: var(--blanc);
            padding: 2rem;
            margin-bottom: 1.5rem;
        }

        .problem-box h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            margin-bottom: 1rem;
            color: var(--or);
        }

        .problem-box p {
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .question-box {
            background: var(--or-pale);
            border: 2px solid var(--or);
            padding: 2rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .question-box h3 {
            font-family: 'Playfair Display', serif;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--gris-fonce);
            margin-bottom: 1rem;
        }

        .question-box p {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-style: italic;
            color: var(--noir);
        }

        /* Validation */
        .validation-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .validation-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem;
            background: var(--blanc);
            border: 1px solid var(--gris-clair);
            font-size: 0.85rem;
        }

        .validation-item.valid {
            border-color: var(--vert);
            background: rgba(92, 154, 107, 0.1);
        }

        .validation-item.invalid {
            border-color: var(--rouge);
            background: rgba(196, 92, 92, 0.1);
        }

        .validation-icon {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        /* Keywords */
        .keywords {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .keyword {
            padding: 0.5rem 1rem;
            border: 1px solid var(--noir);
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.2s ease;
            cursor: default;
        }

        .keyword:hover {
            background: var(--noir);
            color: var(--blanc);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 3rem 0;
            color: var(--gris-moyen);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--gris-clair);
        }

        /* ========== MÉTHODE SECTION ========== */
        .methode-section {
            padding: 4rem 0;
        }

        .methode-intro {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 3rem;
        }

        .methode-intro p {
            font-size: 1.1rem;
            color: var(--gris-fonce);
            line-height: 1.8;
        }

        .methode-phases {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .phase-card {
            background: var(--blanc);
            border: 1px solid var(--noir);
            display: grid;
            grid-template-columns: 80px 1fr;
            overflow: hidden;
        }

        .phase-number {
            background: var(--noir);
            color: var(--blanc);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .phase-number span {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 600;
            color: var(--or);
        }

        .phase-number small {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 0.25rem;
        }

        .phase-content {
            padding: 1.5rem 2rem;
        }

        .phase-content h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            margin-bottom: 0.75rem;
        }

        .phase-content p {
            color: var(--gris-fonce);
            margin-bottom: 1rem;
        }

        .phase-formula {
            background: var(--papier);
            border: 1px solid var(--gris-clair);
            padding: 1rem 1.25rem;
            font-family: 'Fira Code', monospace;
            font-size: 0.85rem;
            overflow-x: auto;
            white-space: pre-wrap;
            color: var(--noir);
        }

        .phase-formula .keyword {
            color: var(--or);
            background: none;
            border: none;
            padding: 0;
            font-weight: 600;
        }

        .phase-formula .symbol {
            color: var(--gris-fonce);
        }

        /* Notation Compacte */
        .notation-compacte {
            background: var(--noir);
            color: var(--blanc);
            padding: 2.5rem;
            margin-top: 3rem;
        }

        .notation-compacte h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: var(--or);
        }

        .notation-compacte .subtitle {
            font-size: 0.9rem;
            color: var(--gris-moyen);
            margin-bottom: 1.5rem;
        }

        .notation-compacte pre {
            background: rgba(255, 255, 255, 0.05);
            padding: 1.5rem;
            font-family: 'Fira Code', monospace;
            font-size: 0.9rem;
            overflow-x: auto;
            line-height: 1.8;
            border-left: 3px solid var(--or);
        }

        /* Footer */
        footer {
            border-top: 1px solid var(--noir);
            padding: 2rem;
            text-align: center;
            background: var(--blanc);
            margin-top: 4rem;
        }

        footer p {
            font-size: 0.85rem;
            color: var(--gris-moyen);
        }

        footer a {
            color: var(--or);
            text-decoration: none;
        }

        /* Loading Animation */
        .spinner {
            width: 18px;
            height: 18px;
            border: 2px solid transparent;
            border-top-color: currentColor;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Error Message */
        .error-message {
            background: rgba(196, 92, 92, 0.1);
            border: 1px solid var(--rouge);
            color: var(--rouge);
            padding: 1rem 1.5rem;
            margin: 1rem 0;
            display: none;
        }

        .error-message.visible {
            display: block;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            header {
                flex-direction: column;
                gap: 1rem;
            }

            nav {
                gap: 1.5rem;
                flex-wrap: wrap;
                justify-content: center;
            }

            .tension-meter {
                flex-direction: column;
                text-align: center;
            }

            .input-section {
                padding: 1.5rem;
            }

            .costs-grid {
                grid-template-columns: 1fr;
            }

            .validation-grid {
                grid-template-columns: 1fr;
            }

            .phase-card {
                grid-template-columns: 1fr;
            }

            .phase-number {
                flex-direction: row;
                gap: 0.5rem;
                padding: 1rem 1.5rem;
            }

            .phase-number span {
                font-size: 1.5rem;
            }
        }

        /* Scroll animations */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Tens<span>IO</span></div>
        <nav>
            <a href="#analyser">Analyser</a>
            <a href="#methode">Méthode</a>
            <a href="#exemples">Exemples</a>
        </nav>
    </header>

    <section class="hero">
        <h1>Révélez la <em>tension</em> de vos dissertations</h1>
        <p>L'intelligence artificielle au service de l'analyse philosophique.</p>
    </section>

    <main class="container">
        <!-- ========== SECTION ANALYSER ========== -->
        <div class="input-section" id="analyser">
            <label for="sujet">Entrez votre sujet de dissertation</label>
            <textarea id="sujet" placeholder="Ex: La liberté est-elle une illusion ?"></textarea>
            <button class="btn-primary" id="analyzeBtn" onclick="lancerAnalyse()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                Analyser la tension
            </button>
            <div class="error-message" id="errorMessage"></div>
        </div>

        <!-- Progress Indicator -->
        <div class="progress-container" id="progressContainer">
            <div class="progress-title">Analyse en cours...</div>
            <div class="progress-steps">
                <div class="progress-step" id="step1">
                    <svg class="step-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Phase 1 : Analyse conceptuelle
                </div>
                <div class="progress-step" id="step2">
                    <svg class="step-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Phase 2 : Thèse X
                </div>
                <div class="progress-step" id="step3">
                    <svg class="step-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                    Phase 3 : Antithèse Y
                </div>
                <div class="progress-step" id="step4">
                    <svg class="step-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Phase 4 : Tension
                </div>
                <div class="progress-step" id="step5">
                    <svg class="step-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Phase 5 : Validation
                </div>
            </div>
        </div>

        <!-- ========== SECTION RÉSULTATS ========== -->
        <div class="results-section" id="results">
            <div class="divider">Résultats de l'analyse</div>

            <!-- Reformulation -->
            <div class="result-card" id="reformulationCard">
                <div class="result-card-header">
                    <span class="number">0</span>
                    Reformulation du sujet
                </div>
                <div class="result-card-content">
                    <p id="reformulationText"></p>
                    <div class="keywords" id="notionsKeywords"></div>
                </div>
            </div>

            <!-- Tension Meter -->
            <div class="tension-meter" id="tensionMeter">
                <div class="meter-visual">
                    <div class="meter-circle" id="meterCircle">
                        <span class="meter-value" id="tensionScore">-</span>
                        <span class="meter-label">/ 6</span>
                    </div>
                </div>
                <div class="meter-info">
                    <h3>Validité de la tension : <span id="tensionLevel">-</span></h3>
                    <p id="tensionDesc">L'analyse évalue la qualité dialectique du problème identifié.</p>
                </div>
            </div>

            <!-- Thèse X -->
            <div class="these-card" id="theseXCard">
                <div class="these-card-header">
                    <span class="badge">X</span>
                    <h3>Thèse initiale</h3>
                </div>
                <div class="these-card-body">
                    <div class="these-enonce" id="theseXEnonce"></div>
                    
                    <div class="these-section">
                        <div class="these-section-title">Raisons</div>
                        <ul id="theseXRaisons"></ul>
                    </div>

                    <div class="these-section" id="theseXExempleSection">
                        <div class="these-section-title">Exemple</div>
                        <p id="theseXExemple"></p>
                    </div>

                    <div class="these-section" id="theseXValeursSection">
                        <div class="these-section-title">Valeurs en jeu</div>
                        <p><strong>Défendues :</strong> <span id="theseXValeursDefendues"></span></p>
                        <p><strong>Craintes :</strong> <span id="theseXValeursCraintes"></span></p>
                    </div>

                    <div class="these-section" id="theseXPhiloSection">
                        <div class="these-section-title">Référence philosophique</div>
                        <div class="philosophe-card">
                            <div class="philosophe-avatar" id="theseXPhiloAvatar">?</div>
                            <div class="philosophe-info">
                                <h4 id="theseXPhiloNom"></h4>
                                <p id="theseXPhiloArg"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thèse Y -->
            <div class="these-card" id="theseYCard">
                <div class="these-card-header">
                    <span class="badge y">Y</span>
                    <h3>Antithèse</h3>
                </div>
                <div class="these-card-body">
                    <div class="these-enonce" id="theseYEnonce"></div>
                    
                    <div class="these-section">
                        <div class="these-section-title">Raisons</div>
                        <ul id="theseYRaisons"></ul>
                    </div>

                    <div class="these-section" id="theseYExempleSection">
                        <div class="these-section-title">Contre-exemple</div>
                        <p id="theseYExemple"></p>
                    </div>

                    <div class="these-section" id="theseYValeursSection">
                        <div class="these-section-title">Valeurs en jeu</div>
                        <p><strong>Défendues :</strong> <span id="theseYValeursDefendues"></span></p>
                        <p><strong>Craintes :</strong> <span id="theseYValeursCraintes"></span></p>
                    </div>

                    <div class="these-section" id="theseYPhiloSection">
                        <div class="these-section-title">Référence philosophique</div>
                        <div class="philosophe-card">
                            <div class="philosophe-avatar" id="theseYPhiloAvatar">?</div>
                            <div class="philosophe-info">
                                <h4 id="theseYPhiloNom"></h4>
                                <p id="theseYPhiloArg"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Coûts / Gains -->
            <div class="divider">Analyse des coûts</div>

            <div class="costs-grid">
                <div class="cost-card">
                    <h4>Si je choisis X...</h4>
                    <p><strong>Je gagne :</strong></p>
                    <ul class="cost-list gains" id="gainsX"></ul>
                    <p style="margin-top: 1rem;"><strong>Mais je perds :</strong></p>
                    <ul class="cost-list pertes" id="pertesX"></ul>
                </div>
                <div class="cost-card">
                    <h4>Si je choisis Y...</h4>
                    <p><strong>Je gagne :</strong></p>
                    <ul class="cost-list gains" id="gainsY"></ul>
                    <p style="margin-top: 1rem;"><strong>Mais je perds :</strong></p>
                    <ul class="cost-list pertes" id="pertesY"></ul>
                </div>
            </div>

            <!-- Problème et Question -->
            <div class="problem-box">
                <h3>Le problème</h3>
                <p id="problemeFormule"></p>
            </div>

            <div class="question-box">
                <h3>Question finale</h3>
                <p id="questionFinale"></p>
            </div>

            <!-- Validation -->
            <div class="result-card">
                <div class="result-card-header">
                    <span class="number">✓</span>
                    Validation de la tension
                </div>
                <div class="result-card-content">
                    <div class="validation-grid" id="validationGrid"></div>
                    <p id="validationCommentaire" style="margin-top: 1rem; font-style: italic; color: var(--gris-fonce);"></p>
                </div>
            </div>
        </div>

        <!-- ========== SECTION MÉTHODE ========== -->
        <section class="methode-section" id="methode">
            <h2 class="section-title">La Méthode</h2>
            
            <div class="methode-intro">
                <p>
                    TensIO utilise une formalisation rigoureuse de la construction dialectique. 
                    Chaque sujet est analysé en 5 phases pour révéler la <em>tension authentique</em> 
                    qui constitue le cœur du problème philosophique.
                </p>
            </div>

            <div class="methode-phases">
                <!-- Phase 1 -->
                <div class="phase-card fade-in-up">
                    <div class="phase-number">
                        <span>1</span>
                        <small>Phase</small>
                    </div>
                    <div class="phase-content">
                        <h3>Analyse conceptuelle</h3>
                        <p>Décomposition du sujet en notions fondamentales et reformulation claire.</p>
                        <div class="phase-formula">
<span class="keyword">S</span> = (n₁, n₂, ..., nₖ) <span class="symbol">où</span> nᵢ <span class="symbol">sont les</span> notions clés
<span class="symbol">∀</span>nᵢ <span class="symbol">∈</span> S, <span class="symbol">∃</span>dᵢ : nᵢ <span class="symbol">→</span> langage_simple
<span class="symbol">∃</span><span class="keyword">N</span> : N <span class="symbol">∈</span> Programme <span class="symbol">∧</span> relevant(N, S)
<span class="keyword">S'</span> = reformulation(S) <span class="symbol">en</span> langage naturel</div>
                    </div>
                </div>

                <!-- Phase 2 -->
                <div class="phase-card fade-in-up">
                    <div class="phase-number">
                        <span>2</span>
                        <small>Phase</small>
                    </div>
                    <div class="phase-content">
                        <h3>Thèse X — Première position</h3>
                        <p>Construction d'une première réponse argumentée avec exemples, valeurs et références.</p>
                        <div class="phase-formula">
<span class="keyword">X</span> = thèse_initiale(S)
<span class="symbol">∃</span>{r₁, r₂, r₃} : raisons(X) = {r₁, r₂, r₃}
<span class="symbol">∃</span>e : exemple(e) <span class="symbol">∧</span> illustre(e, X)
<span class="symbol">∃</span><span class="keyword">V⁺</span> : valeurs_défendues(X) = V⁺
<span class="symbol">∃</span><span class="keyword">V⁻</span> : valeurs_craintes(X) = V⁻
<span class="symbol">∃</span>φ : philosophe(φ) <span class="symbol">∧</span> soutient(φ, X)</div>
                    </div>
                </div>

                <!-- Phase 3 -->
                <div class="phase-card fade-in-up">
                    <div class="phase-number">
                        <span>3</span>
                        <small>Phase</small>
                    </div>
                    <div class="phase-content">
                        <h3>Antithèse Y — Position opposée</h3>
                        <p>Construction d'une position contradictoire avec ses propres raisons et contre-exemples.</p>
                        <div class="phase-formula">
<span class="keyword">Y</span> = <span class="symbol">¬</span>X <span class="symbol">∨</span> contraire(X)
<span class="symbol">∃</span>{c₁, c₂} : contre_exemples(X) = {c₁, c₂}
<span class="symbol">∃</span>ψ : philosophe(ψ) <span class="symbol">∧</span> soutient(ψ, Y) <span class="symbol">∧ ¬</span>soutient(ψ, X)</div>
                    </div>
                </div>

                <!-- Phase 4 -->
                <div class="phase-card fade-in-up">
                    <div class="phase-number">
                        <span>4</span>
                        <small>Phase</small>
                    </div>
                    <div class="phase-content">
                        <h3>Structure de la tension</h3>
                        <p>Identification du dilemme : ce qu'on gagne et perd avec chaque position.</p>
                        <div class="phase-formula">
Coût(X) = {gains(X), pertes(X)}
Coût(Y) = {gains(Y), pertes(Y)}

<span class="keyword">Tension</span>(S) <span class="symbol">≡</span> (X <span class="symbol">∧ ¬</span>Y) <span class="symbol">∨</span> (Y <span class="symbol">∧ ¬</span>X)
              <span class="symbol">∧</span> nécessaire(X, N) 
              <span class="symbol">∧</span> nécessaire(Y, N)
              <span class="symbol">∧</span> incompatible(X, Y)</div>
                    </div>
                </div>

                <!-- Phase 5 -->
                <div class="phase-card fade-in-up">
                    <div class="phase-number">
                        <span>5</span>
                        <small>Phase</small>
                    </div>
                    <div class="phase-content">
                        <h3>Condition de validité</h3>
                        <p>Vérification que la tension est authentique : pas de solution évidente, vrai dilemme.</p>
                        <div class="phase-formula">
<span class="keyword">Tension_valide</span>(S) <span class="symbol">≡</span> 
    <span class="symbol">∃</span>e₁ : exemple(e₁, X) 
    <span class="symbol">∧ ∃</span>c₁ : contre_exemple(c₁, X)
    <span class="symbol">∧</span> opposition_claire(X, Y)
    <span class="symbol">∧</span> identifiées(V⁺(X), V⁺(Y))
    <span class="symbol">∧ ¬∃</span>z : résolution_évidente(z, Tension(S))
    <span class="symbol">∧</span> dilemme_authentique(Coût(X), Coût(Y))</div>
                    </div>
                </div>
            </div>

            <!-- Notation Compacte -->
            <div class="notation-compacte fade-in-up">
                <h3>Le cœur logique de la tension</h3>
                <p class="subtitle">En notation compacte</p>
                <pre>
∀S : Problème_philosophique(S) →
     ∃X, Y, V₁, V₂ : 
       [apparemment_nécessaire(S, X) ∧ 
        apparemment_nécessaire(S, Y) ∧
        (X → ¬accepter(V₂)) ∧ 
        (Y → ¬accepter(V₁)) ∧
        inacceptable(¬V₁) ∧ 
        inacceptable(¬V₂)]</pre>
            </div>
        </section>

        <!-- ========== SECTION EXEMPLES ========== -->
        <section id="exemples">
            <h2 class="section-title">Exemples de sujets</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem; margin-top: 2rem;">
                <button class="exemple-btn" onclick="chargerExemple('Peut-on tout dire ?')">
                    Peut-on tout dire ?
                </button>
                <button class="exemple-btn" onclick="chargerExemple('La liberté est-elle une illusion ?')">
                    La liberté est-elle une illusion ?
                </button>
                <button class="exemple-btn" onclick="chargerExemple('L\\'art nous permet-il d\\'accéder à la vérité ?')">
                    L'art nous permet-il d'accéder à la vérité ?
                </button>
                <button class="exemple-btn" onclick="chargerExemple('Faut-il préférer le bonheur à la vérité ?')">
                    Faut-il préférer le bonheur à la vérité ?
                </button>
            </div>
            <style>
                .exemple-btn {
                    background: var(--blanc);
                    border: 1px solid var(--noir);
                    padding: 1.25rem;
                    font-family: 'Playfair Display', serif;
                    font-size: 1rem;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    text-align: left;
                }
                .exemple-btn:hover {
                    background: var(--noir);
                    color: var(--blanc);
                }
            </style>
        </section>

    </main>

    <footer id="aide">
        <p>TensIO — <a href="#methode">Découvrir la méthode</a></p>
    </footer>

    <script>
        // ============================================================================
        // CONFIGURATION API : un endpoint vers votre api LLM
        // ============================================================================
        const API_URL = "";
        const MODEL = "";

        // ============================================================================
        // FONCTIONS UTILITAIRES
        // ============================================================================

        async function callAPI(prompt, system = "", temperature = 0.7) {
            const formData = new FormData();
            formData.append('system', system);
            formData.append('prompt', prompt);
            formData.append('model', MODEL);

            try {
                const response = await fetch(API_URL, {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`Erreur HTTP ${response.status}`);
                }

                const result = await response.json();
                
                // Extraction du texte selon différents formats de réponse
                let text = null;
                const responseData = result.response || result;

                if (responseData.choices && responseData.choices[0]) {
                    const first = responseData.choices[0];
                    if (first.message && first.message.content) {
                        text = typeof first.message.content === 'string' 
                            ? first.message.content 
                            : JSON.stringify(first.message.content);
                    } else {
                        text = first.text || first.content || '';
                    }
                } else if (responseData.output) {
                    const pieces = [];
                    for (const item of responseData.output) {
                        if (item.content) {
                            for (const c of item.content) {
                                if (c.text) pieces.push(c.text);
                            }
                        }
                    }
                    text = pieces.join('\n\n');
                } else {
                    text = responseData.text || responseData.content || '';
                }

                return text.trim();
            } catch (error) {
                console.error('Erreur API:', error);
                throw error;
            }
        }

        async function callAPIJSON(prompt, system = "", temperature = 0.7) {
            const fullPrompt = `${prompt}\n\nRéponds UNIQUEMENT avec un JSON valide, sans texte avant ou après.`;
            let response = await callAPI(fullPrompt, system, temperature);
            
            // Nettoyage
            response = response.trim();
            if (response.startsWith("```json")) response = response.slice(7);
            if (response.startsWith("```")) response = response.slice(3);
            if (response.endsWith("```")) response = response.slice(0, -3);
            response = response.trim();

            try {
                return JSON.parse(response);
            } catch (e) {
                console.error('Erreur parsing JSON:', e, response);
                return null;
            }
        }

        // ============================================================================
        // PHASES D'ANALYSE
        // ============================================================================

        async function phase1_AnalyseConceptuelle(sujet) {
            updateProgress(1);
            
            const system = `Tu es un expert en analyse philosophique.
Ta tâche : décomposer un sujet en notions fondamentales.

NOTIONS DU PROGRAMME (liste exhaustive) :
"L'art / Le bonheur / La conscience / Le devoir / L'État / L'inconscient / La justice / Le langage / La liberté / La nature / La raison / La religion / La science / La technique / Le temps / Le travail / La vérité".

Réponds UNIQUEMENT en JSON.`;

            const prompt = `Analyse ce sujet de dissertation : "${sujet}"

Identifie :
1. Les 2-4 notions clés du sujet (mots importants)
2. Pour chaque notion : une définition en langage simple (max 20 mots)
3. La notion principale du programme (parmi la liste)
4. Une reformulation claire du sujet

Format JSON attendu :
{
  "notions": [
    {
      "terme": "liberté",
      "definition_simple": "capacité d'agir selon sa volonté sans contrainte extérieure",
      "notion_programme": "La liberté"
    }
  ],
  "reformulation": "Question reformulée en termes simples"
}`;

            return await callAPIJSON(prompt, system, 0.5);
        }

        async function phase2_TheseX(sujet, notions) {
            updateProgress(2);
            
            const system = `Tu es un professeur de philosophie qui guide un élève.
Ton rôle : l'aider à formuler sa première position (thèse X) de manière structurée.

Principes :
- Une thèse = une position claire (OUI/NON/ÇA DÉPEND)
- 3 raisons maximum (concises)
- 1 exemple concret et visualisable
- Identifier les valeurs en jeu (ce qu'on défend, ce qu'on craint)
- Proposer UN philosophe pertinent (si possible)

Réponds en JSON.`;

            const notionsStr = notions.map(n => n.terme).join(', ');
            
            const prompt = `Sujet : "${sujet}"
Notions identifiées : ${notionsStr}

Construis la THÈSE X (première réponse intuitive) :

1. Formule une position claire en une phrase
2. Donne 3 raisons qui la soutiennent
3. Propose UN exemple concret de la vie réelle
4. Identifie les valeurs défendues (ex: liberté, vérité, bonheur...)
5. Identifie les valeurs craintes (ex: censure, chaos, mensonge...)
6. Propose UN philosophe qui défend cette position

Format JSON :
{
  "enonce": "Position claire en une phrase",
  "raisons": ["raison 1", "raison 2", "raison 3"],
  "exemple": {
    "description": "Description de l'exemple",
    "type": "vie_quotidienne"
  },
  "valeurs": {
    "defendues": ["valeur1", "valeur2"],
    "craintes": ["peur1", "peur2"]
  },
  "philosophe": {
    "nom": "Nom du philosophe",
    "argument_principal": "Son argument en une phrase"
  }
}`;

            return await callAPIJSON(prompt, system, 0.6);
        }

        async function phase3_AntitheseY(sujet, theseX) {
            updateProgress(3);
            
            const system = `Tu es un professeur de philosophie expert en dialectique.
Ton rôle : construire une ANTITHÈSE solide qui s'oppose réellement à la thèse X.

Principes :
- L'antithèse n'est PAS juste "le contraire" simpliste
- Elle défend des VALEURS différentes (et légitimes)
- Elle doit avoir ses propres raisons positives
- Elle pointe les LIMITES et DANGERS de X

Réponds en JSON.`;

            const prompt = `Sujet : "${sujet}"

THÈSE X (à contredire) :
${JSON.stringify(theseX, null, 2)}

Construis l'ANTITHÈSE Y :

1. Formule une position OPPOSÉE à X
2. Donne 3 raisons positives (pas juste "X est faux")
3. Propose des CONTRE-EXEMPLES qui montrent les limites de X
4. Identifie les valeurs défendues par Y (différentes de X)
5. Identifie ce que Y craint dans X
6. Propose UN philosophe qui s'oppose à la position de X

Format JSON :
{
  "enonce": "Position opposée à X",
  "raisons": ["raison 1", "raison 2", "raison 3"],
  "exemple": {
    "description": "Contre-exemple qui montre les limites de X",
    "type": "contre_exemple"
  },
  "valeurs": {
    "defendues": ["valeur1", "valeur2"],
    "craintes": ["danger1", "danger2"]
  },
  "philosophe": {
    "nom": "Nom du philosophe",
    "argument_principal": "Son argument contre X"
  }
}`;

            return await callAPIJSON(prompt, system, 0.6);
        }

        async function phase4_Tension(sujet, theseX, theseY) {
            updateProgress(4);
            
            const system = `Tu es un expert en dialectique philosophique.
Ton rôle : identifier la TENSION authentique entre deux positions.

Une vraie tension philosophique :
- Les deux positions défendent des valeurs légitimes
- Choisir l'une implique un PRIX (perdre l'autre)
- Il n'y a PAS de solution évidente
- C'est un vrai DILEMME

Réponds en JSON.`;

            const prompt = `Sujet : "${sujet}"

THÈSE X :
${JSON.stringify(theseX, null, 2)}

THÈSE Y :
${JSON.stringify(theseY, null, 2)}

Analyse la TENSION entre X et Y :

1. Si je choisis X : qu'est-ce que je GAGNE ? (2-3 points)
2. Si je choisis X : qu'est-ce que je PERDS ? (2-3 points)
3. Si je choisis Y : qu'est-ce que je GAGNE ? (2-3 points)
4. Si je choisis Y : qu'est-ce que je PERDS ? (2-3 points)
5. Formule LE PROBLÈME en une phrase (pourquoi c'est un dilemme)
6. Formule la QUESTION FINALE qui exprime cette tension

Format JSON :
{
  "gains_x": ["gain 1", "gain 2"],
  "pertes_x": ["perte 1", "perte 2"],
  "gains_y": ["gain 1", "gain 2"],
  "pertes_y": ["perte 1", "perte 2"],
  "probleme_formule": "La [notion] semble exiger à la fois X et Y, ce qui est contradictoire car...",
  "question_finale": "Peut-on [X] sans [Y], ou faut-il..."
}`;

            return await callAPIJSON(prompt, system, 0.6);
        }

        async function phase5_Validation(tension) {
            updateProgress(5);
            
            const system = `Tu es un évaluateur strict de qualité philosophique.
Ton rôle : vérifier si une tension dialectique est VALIDE.

Critères de validité :
1. Exemple concret pour X existe
2. Contre-exemple réel pour X existe
3. Opposition X/Y est claire et non triviale
4. Les valeurs en jeu sont identifiées
5. Pas de résolution évidente
6. Vrai dilemme (chaque choix a un prix réel)

Réponds en JSON avec des booléens.`;

            const prompt = `Évalue cette tension dialectique :

${JSON.stringify(tension, null, 2)}

Pour chaque critère, réponds true/false :

Format JSON :
{
  "a_exemple_pour_x": true,
  "a_contre_exemple": true,
  "opposition_claire": true,
  "valeurs_identifiees": true,
  "pas_de_resolution_evidente": true,
  "vrai_dilemme": true,
  "score_global": 6,
  "commentaire": "Bref commentaire sur la qualité"
}`;

            return await callAPIJSON(prompt, system, 0.3);
        }

        // ============================================================================
        // INTERFACE UTILISATEUR
        // ============================================================================

        function updateProgress(step) {
            for (let i = 1; i <= 5; i++) {
                const el = document.getElementById(`step${i}`);
                el.classList.remove('active', 'done');
                if (i < step) {
                    el.classList.add('done');
                } else if (i === step) {
                    el.classList.add('active');
                }
            }
        }

        function showError(message) {
            const errorEl = document.getElementById('errorMessage');
            errorEl.textContent = message;
            errorEl.classList.add('visible');
        }

        function hideError() {
            document.getElementById('errorMessage').classList.remove('visible');
        }

        function afficherResultats(analyse) {
            const results = document.getElementById('results');
            
            // Reformulation et notions
            document.getElementById('reformulationText').textContent = analyse.reformulation;
            const notionsContainer = document.getElementById('notionsKeywords');
            notionsContainer.innerHTML = analyse.notions.map(n => 
                `<span class="keyword" title="${n.definition_simple}">${n.terme}</span>`
            ).join('');

            // Score de validation
            const score = analyse.validite?.score_global || 0;
            document.getElementById('tensionScore').textContent = score;
            
            const levels = {
                6: 'Excellente',
                5: 'Très bonne',
                4: 'Bonne',
                3: 'Acceptable',
                2: 'Faible',
                1: 'Insuffisante',
                0: 'Non valide'
            };
            document.getElementById('tensionLevel').textContent = levels[score] || 'Non évalué';
            
            // Rotation du cercle selon le score
            const rotation = 45 + (score / 6) * 270;
            document.getElementById('meterCircle').style.setProperty('--rotation', `${rotation}deg`);

            // Thèse X
            const theseX = analyse.tension.these_x;
            document.getElementById('theseXEnonce').textContent = theseX.enonce;
            document.getElementById('theseXRaisons').innerHTML = theseX.raisons.map(r => `<li>${r}</li>`).join('');
            
            if (theseX.exemple) {
                document.getElementById('theseXExemple').textContent = theseX.exemple.description;
                document.getElementById('theseXExempleSection').style.display = 'block';
            } else {
                document.getElementById('theseXExempleSection').style.display = 'none';
            }
            
            if (theseX.valeurs) {
                document.getElementById('theseXValeursDefendues').textContent = theseX.valeurs.defendues.join(', ');
                document.getElementById('theseXValeursCraintes').textContent = theseX.valeurs.craintes.join(', ');
                document.getElementById('theseXValeursSection').style.display = 'block';
            } else {
                document.getElementById('theseXValeursSection').style.display = 'none';
            }
            
            if (theseX.philosophe) {
                document.getElementById('theseXPhiloAvatar').textContent = theseX.philosophe.nom.charAt(0);
                document.getElementById('theseXPhiloNom').textContent = theseX.philosophe.nom;
                document.getElementById('theseXPhiloArg').textContent = theseX.philosophe.argument_principal;
                document.getElementById('theseXPhiloSection').style.display = 'block';
            } else {
                document.getElementById('theseXPhiloSection').style.display = 'none';
            }

            // Thèse Y
            const theseY = analyse.tension.these_y;
            document.getElementById('theseYEnonce').textContent = theseY.enonce;
            document.getElementById('theseYRaisons').innerHTML = theseY.raisons.map(r => `<li>${r}</li>`).join('');
            
            if (theseY.exemple) {
                document.getElementById('theseYExemple').textContent = theseY.exemple.description;
                document.getElementById('theseYExempleSection').style.display = 'block';
            } else {
                document.getElementById('theseYExempleSection').style.display = 'none';
            }
            
            if (theseY.valeurs) {
                document.getElementById('theseYValeursDefendues').textContent = theseY.valeurs.defendues.join(', ');
                document.getElementById('theseYValeursCraintes').textContent = theseY.valeurs.craintes.join(', ');
                document.getElementById('theseYValeursSection').style.display = 'block';
            } else {
                document.getElementById('theseYValeursSection').style.display = 'none';
            }
            
            if (theseY.philosophe) {
                document.getElementById('theseYPhiloAvatar').textContent = theseY.philosophe.nom.charAt(0);
                document.getElementById('theseYPhiloNom').textContent = theseY.philosophe.nom;
                document.getElementById('theseYPhiloArg').textContent = theseY.philosophe.argument_principal;
                document.getElementById('theseYPhiloSection').style.display = 'block';
            } else {
                document.getElementById('theseYPhiloSection').style.display = 'none';
            }

            // Coûts
            document.getElementById('gainsX').innerHTML = analyse.tension.gains_x.map(g => `<li>${g}</li>`).join('');
            document.getElementById('pertesX').innerHTML = analyse.tension.pertes_x.map(p => `<li>${p}</li>`).join('');
            document.getElementById('gainsY').innerHTML = analyse.tension.gains_y.map(g => `<li>${g}</li>`).join('');
            document.getElementById('pertesY').innerHTML = analyse.tension.pertes_y.map(p => `<li>${p}</li>`).join('');

            // Problème et question
            document.getElementById('problemeFormule').textContent = analyse.tension.probleme_formule;
            document.getElementById('questionFinale').textContent = analyse.tension.question_finale;

            // Validation
            const validationGrid = document.getElementById('validationGrid');
            const criteres = [
                { label: 'Exemple pour X', key: 'a_exemple_pour_x' },
                { label: 'Contre-exemple', key: 'a_contre_exemple' },
                { label: 'Opposition claire', key: 'opposition_claire' },
                { label: 'Valeurs identifiées', key: 'valeurs_identifiees' },
                { label: 'Pas de solution évidente', key: 'pas_de_resolution_evidente' },
                { label: 'Vrai dilemme', key: 'vrai_dilemme' }
            ];

            validationGrid.innerHTML = criteres.map(c => {
                const valid = analyse.validite?.[c.key];
                const icon = valid 
                    ? '<svg class="validation-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#5c9a6b" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>'
                    : '<svg class="validation-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#c45c5c" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>';
                return `<div class="validation-item ${valid ? 'valid' : 'invalid'}">${icon} ${c.label}</div>`;
            }).join('');

            if (analyse.validite?.commentaire) {
                document.getElementById('validationCommentaire').textContent = analyse.validite.commentaire;
            }

            // Afficher les résultats
            results.classList.add('visible');
            results.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        // ============================================================================
        // FONCTION PRINCIPALE
        // ============================================================================

        async function lancerAnalyse() {
            const btn = document.getElementById('analyzeBtn');
            const sujet = document.getElementById('sujet').value.trim();
            const progressContainer = document.getElementById('progressContainer');
            const results = document.getElementById('results');

            hideError();

            if (!sujet) {
                showError('Veuillez entrer un sujet de dissertation.');
                return;
            }

            // État de chargement
            btn.classList.add('loading');
            btn.innerHTML = '<div class="spinner"></div> Analyse en cours...';
            progressContainer.classList.add('visible');
            results.classList.remove('visible');

            try {
                // Phase 1
                const phase1 = await phase1_AnalyseConceptuelle(sujet);
                if (!phase1) throw new Error("Échec de l'analyse conceptuelle");

                // Phase 2
                const theseX = await phase2_TheseX(sujet, phase1.notions || []);
                if (!theseX) throw new Error("Échec de la construction de la thèse X");

                // Phase 3
                const theseY = await phase3_AntitheseY(sujet, theseX);
                if (!theseY) throw new Error("Échec de la construction de l'antithèse Y");

                // Phase 4
                const tensionData = await phase4_Tension(sujet, theseX, theseY);
                if (!tensionData) throw new Error("Échec de l'analyse de la tension");

                // Phase 5
                const validation = await phase5_Validation({
                    these_x: theseX,
                    these_y: theseY,
                    ...tensionData
                });

                // Construire l'objet d'analyse complet
                const analyse = {
                    sujet_original: sujet,
                    notions: phase1.notions || [],
                    reformulation: phase1.reformulation || sujet,
                    tension: {
                        these_x: theseX,
                        these_y: theseY,
                        gains_x: tensionData.gains_x || [],
                        pertes_x: tensionData.pertes_x || [],
                        gains_y: tensionData.gains_y || [],
                        pertes_y: tensionData.pertes_y || [],
                        probleme_formule: tensionData.probleme_formule || '',
                        question_finale: tensionData.question_finale || ''
                    },
                    validite: validation || {}
                };

                // Afficher les résultats
                afficherResultats(analyse);

            } catch (error) {
                console.error('Erreur:', error);
                showError(`Erreur lors de l'analyse : ${error.message}`);
            } finally {
                // Réinitialiser le bouton
                btn.classList.remove('loading');
                btn.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Analyser la tension
                `;
                progressContainer.classList.remove('visible');
            }
        }

        function chargerExemple(sujet) {
            document.getElementById('sujet').value = sujet;
            document.getElementById('analyser').scrollIntoView({ behavior: 'smooth' });
        }

        // Raccourci clavier Ctrl+Enter
        document.getElementById('sujet').addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.ctrlKey) {
                lancerAnalyse();
            }
        });

        // Animation au scroll pour la section méthode
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-in-up').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>
