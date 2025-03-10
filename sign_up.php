<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventXpert - Advanced Campus Event Management</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #8a6bc1;
            --primary-dark: #6a4fa0;
            --primary-light: #b39ddb;
            --primary-transparent: rgba(138, 107, 193, 0.1);
            --secondary: #ff7043;
            --text-dark: #333;
            --text-light: #f5f5f5;
            --background-light: #f9f9f9;
            --background-dark: #121212;
            --success: #4caf50;
            --error: #f44336;
            --border-radius: 12px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: var(--background-light);
            overflow-x: hidden;
            transition: var(--transition);
        }

        body.dark-mode {
            --background-light: #121212;
            --text-dark: #f5f5f5;
            --primary-transparent: rgba(138, 107, 193, 0.2);
            background-color: var(--background-dark);
            color: var(--text-light);
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
            position: relative;
        }

        /* Left side with background and formulas */
        .left-side {
            position: relative;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            overflow: hidden;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .formula-container {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 100%;
        }

        .formula {
            position: absolute;
            font-weight: bold;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s forwards;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            font-size: 1.2rem;
        }

        .formula:nth-child(1) { top: 10%; left: 20%; animation-delay: 0.1s; }
        .formula:nth-child(2) { top: 20%; left: 60%; animation-delay: 0.2s; }
        .formula:nth-child(3) { top: 35%; left: 15%; animation-delay: 0.3s; }
        .formula:nth-child(4) { top: 45%; left: 70%; animation-delay: 0.4s; }
        .formula:nth-child(5) { top: 60%; left: 25%; animation-delay: 0.5s; }
        .formula:nth-child(6) { top: 70%; left: 65%; animation-delay: 0.6s; }
        .formula:nth-child(7) { top: 80%; left: 35%; animation-delay: 0.7s; }
        .formula:nth-child(8) { top: 90%; left: 75%; animation-delay: 0.8s; }

        .elephant-svg {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 1;
            opacity: 0.15;
        }

        .left-content {
            position: relative;
            z-index: 3;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            max-width: 80%;
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.8s forwards 0.5s;
        }

        .left-content h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .left-content p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .constant-display {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(5px);
            padding: 15px;
            border-radius: var(--border-radius);
            font-size: 1rem;
            z-index: 3;
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.5s forwards 1s;
        }

        /* Right side with form */
        .right-side {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            position: relative;
            overflow-y: auto;
            background-color: var(--background-light);
            transition: var(--transition);
        }

        .theme-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--primary-transparent);
            border: none;
            color: var(--primary);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: var(--transition);
        }

        .theme-toggle:hover {
            background: var(--primary);
            color: white;
        }

        .form-container {
            width: 100%;
            max-width: 550px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 2.5rem;
            transition: var(--transition);
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.8s forwards;
        }

        body.dark-mode .form-container {
            background: #1e1e1e;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-title {
            color: var(--primary);
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .form-subtitle {
            color: var(--text-dark);
            font-size: 1rem;
            opacity: 0.8;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
            font-weight: 500;
            transition: var(--transition);
        }

        .input-container {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            transition: var(--transition);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 0.75rem 0.75rem 2.5rem;
            border: 2px solid #e0e0e0;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
            background-color: transparent;
            color: var(--text-dark);
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px var(--primary-transparent);
        }

        .form-control::placeholder {
            color: #aaa;
            opacity: 0.7;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
            padding-left: 0.75rem;
        }

        .textarea-icon {
            top: 15px;
            transform: none;
        }

        .validation-message {
            font-size: 0.8rem;
            margin-top: 0.25rem;
            display: none;
            color: var(--error);
        }

        .form-control.error {
            border-color: var(--error);
        }

        .form-control.error + .validation-message {
            display: block;
        }

        .form-control.success {
            border-color: var(--success);
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s linear infinite;
            margin-right: 10px;
        }

        .submit-btn.loading .spinner {
            display: inline-block;
        }

        .submit-btn.loading .btn-text {
            opacity: 0.7;
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: var(--border-radius);
            color: white;
            font-weight: 500;
            transform: translateX(150%);
            transition: transform 0.5s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .notification.success {
            background-color: var(--success);
        }

        .notification.error {
            background-color: var(--error);
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification-icon {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Responsive design */
        @media (max-width: 992px) {
            .container {
                grid-template-columns: 1fr;
            }
            
            .left-side {
                display: none;
            }
            
            .right-side {
                padding: 1.5rem;
            }
            
            .form-container {
                padding: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .form-container {
                padding: 1.2rem;
            }
            
            .form-title {
                font-size: 1.5rem;
            }
            
            .form-control {
                padding: 0.6rem 0.6rem 0.6rem 2.2rem;
            }
        }

        /* Progress bar */
        .progress-container {
            width: 100%;
            height: 5px;
            background: #e0e0e0;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .progress-bar {
            height: 100%;
            background: var(--primary);
            width: 0%;
            transition: width 0.3s ease;
        }

        /* Floating labels effect */
        .floating-label {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .floating-label input,
        .floating-label textarea {
            width: 100%;
            padding: 0.75rem 0.75rem 0.75rem 2.5rem;
            border: 2px solid #e0e0e0;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
            background-color: transparent;
            color: var(--text-dark);
        }

        .floating-label textarea {
            padding-left: 0.75rem;
            min-height: 120px;
        }

        .floating-label label {
            position: absolute;
            left: 2.5rem;
            top: 0.75rem;
            color: #aaa;
            pointer-events: none;
            transition: 0.2s ease all;
        }

        .floating-label textarea + label {
            left: 0.75rem;
        }

        .floating-label input:focus,
        .floating-label textarea:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px var(--primary-transparent);
        }

        .floating-label input:focus ~ label,
        .floating-label textarea:focus ~ label,
        .floating-label input:not(:placeholder-shown) ~ label,
        .floating-label textarea:not(:placeholder-shown) ~ label {
            top: -0.5rem;
            left: 0.75rem;
            font-size: 0.75rem;
            padding: 0 0.25rem;
            background-color: white;
            color: var(--primary);
        }

        body.dark-mode .floating-label input:focus ~ label,
        body.dark-mode .floating-label textarea:focus ~ label,
        body.dark-mode .floating-label input:not(:placeholder-shown) ~ label,
        body.dark-mode .floating-label textarea:not(:placeholder-shown) ~ label {
            background-color: #1e1e1e;
        }
    </style>
</head>
<body>
    <!-- Progress bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <!-- Notification container -->
    <div class="notification" id="notification">
        <i class="notification-icon fas"></i>
        <span class="notification-message"></span>
    </div>

    <div class="container">
        <!-- Left side with background and formulas -->
        <div class="left-side">
            <div id="particles-js"></div>
            
            <div class="formula-container">
                <div class="formula">QoXm</div>
                <div class="formula">E=hl NP</div>
                <div class="formula">M=m+5-5lg D</div>
                <div class="formula">F=ma</div>
                <div class="formula">A=mgh</div>
                <div class="formula">Σ</div>
                <div class="formula">P=pgh</div>
                <div class="formula">F=-kx</div>
            </div>
            
            <svg class="elephant-svg" viewBox="0 0 800 800" xmlns="http://www.w3.org/2000/svg">
                <path d="M400,150 C250,150 150,300 150,450 C150,600 275,700 400,700 C525,700 650,600 650,450 C650,300 550,150 400,150 Z" fill="white" opacity="0.2"/>
                <circle cx="320" cy="400" r="40" fill="white" opacity="0.5"/>
                <path d="M250,300 C300,250 350,200 400,200 C450,200 500,250 550,300" stroke="white" stroke-width="10" fill="none" opacity="0.3"/>
            </svg>
            
            <div class="left-content">
                <h1>Empower Your Campus Events</h1>
                <p>Streamline event management for colleges and universities with our cutting-edge platform</p>
            </div>
            
            <div class="constant-display">
                <div>const</div>
                <div>-8</div>
                <div>E</div>
                <div>2</div>
                <div>AVA</div>
            </div>
        </div>

        <!-- Right side with form -->
        <div class="right-side">
            <button class="theme-toggle" id="themeToggle">
                <i class="fas fa-moon"></i>
            </button>
            
            <div class="form-container">
                <div class="form-header">
                    <h2 class="form-title">Empower Your Campus Events with EventXpert</h2>
                    <p class="form-subtitle">Fill in the details to register your event</p>
                </div>
                
                <form id="event-form">
                    <div class="floating-label">
                        <div class="input-container">
                            <i class="fas fa-university input-icon"></i>
                            <input type="text" id="college-name" class="form-control" placeholder=" " required>
                            <label for="college-name">College Name</label>
                        </div>
                        <div class="validation-message">Please enter your college name</div>
                    </div>
                    
                    <div class="floating-label">
                        <div class="input-container">
                            <i class="fas fa-phone input-icon"></i>
                            <input type="text" id="contact" class="form-control" placeholder=" " required>
                            <label for="contact">Contact</label>
                        </div>
                        <div class="validation-message">Please enter a valid contact number</div>
                    </div>
                    
                    <div class="floating-label">
                        <div class="input-container">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" id="email" class="form-control" placeholder=" " required>
                            <label for="email">Email</label>
                        </div>
                        <div class="validation-message">Please enter a valid email address</div>
                    </div>
                    
                    <div class="floating-label">
                        <div class="input-container">
                            <i class="fas fa-map-marker-alt input-icon"></i>
                            <input type="text" id="address" class="form-control" placeholder=" " required>
                            <label for="address">Address</label>
                        </div>
                        <div class="validation-message">Please enter your address</div>
                    </div>
                    
                    <div class="floating-label">
                        <div class="input-container">
                            <i class="fas fa-calendar-alt input-icon"></i>
                            <input type="text" id="event-name" class="form-control" placeholder=" " required>
                            <label for="event-name">Event Name</label>
                        </div>
                        <div class="validation-message">Please enter the event name</div>
                    </div>
                    
                    <div class="floating-label">
                        <div class="input-container">
                            <i class="fas fa-id-card input-icon"></i>
                            <input type="text" id="event-id" class="form-control" placeholder=" " required>
                            <label for="event-id">Event ID</label>
                        </div>
                        <div class="validation-message">Please enter the event ID</div>
                    </div>
                    
                    <div class="floating-label">
                        <div class="input-container">
                            <i class="fas fa-map-pin input-icon"></i>
                            <input type="text" id="venue" class="form-control" placeholder=" " required>
                            <label for="venue">Venue</label>
                        </div>
                        <div class="validation-message">Please enter the venue</div>
                    </div>
                    
                    <div class="floating-label">
                        <textarea id="event-description" class="form-control" placeholder=" " required></textarea>
                        <label for="event-description">Event Description</label>
                        <div class="validation-message">Please enter a description of the event</div>
                    </div>
                    
                    <div class="floating-label">
                        <div class="input-container">
                            <i class="fas fa-clock input-icon"></i>
                            <input type="datetime-local" id="date-time" class="form-control" required>
                            <label for="date-time" style="display: none;">Date and Time</label>
                        </div>
                        <div class="validation-message">Please select a date and time</div>
                    </div>
                    
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <div class="spinner"></div>
                        <span class="btn-text">Submit</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Particles.js for background animation -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize particles.js
            if (typeof particlesJS !== 'undefined') {
                particlesJS('particles-js', {
                    particles: {
                        number: { value: 80, density: { enable: true, value_area: 800 } },
                        color: { value: "#ffffff" },
                        shape: { type: "circle" },
                        opacity: { value: 0.5, random: true },
                        size: { value: 3, random: true },
                        line_linked: {
                            enable: true,
                            distance: 150,
                            color: "#ffffff",
                            opacity: 0.4,
                            width: 1
                        },
                        move: {
                            enable: true,
                            speed: 2,
                            direction: "none",
                            random: true,
                            straight: false,
                            out_mode: "out",
                            bounce: false
                        }
                    },
                    interactivity: {
                        detect_on: "canvas",
                        events: {
                            onhover: { enable: true, mode: "grab" },
                            onclick: { enable: true, mode: "push" },
                            resize: true
                        },
                        modes: {
                            grab: { distance: 140, line_linked: { opacity: 1 } },
                            push: { particles_nb: 4 }
                        }
                    },
                    retina_detect: true
                });
            }

            // Set default date and time (current date/time + 1 day)
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            tomorrow.setHours(9, 0, 0, 0); // Set to 9:00 AM
            
            // Format date for datetime-local input
            const dateTimeInput = document.getElementById('date-time');
            const formattedDate = tomorrow.toISOString().slice(0, 16);
            dateTimeInput.value = formattedDate;
            
            // Theme toggle
            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = themeToggle.querySelector('i');
            
            // Check for saved theme preference or respect OS preference
            const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
            const savedTheme = localStorage.getItem('theme');
            
            if (savedTheme === 'dark' || (!savedTheme && prefersDarkScheme.matches)) {
                document.body.classList.add('dark-mode');
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            }
            
            themeToggle.addEventListener('click', function() {
                document.body.classList.toggle('dark-mode');
                
                if (document.body.classList.contains('dark-mode')) {
                    themeIcon.classList.remove('fa-moon');
                    themeIcon.classList.add('fa-sun');
                    localStorage.setItem('theme', 'dark');
                } else {
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.add('fa-moon');
                    localStorage.setItem('theme', 'light');
                }
            });
            
            // Form validation
            const eventForm = document.getElementById('event-form');
            const submitBtn = document.getElementById('submitBtn');
            const notification = document.getElementById('notification');
            const notificationIcon = notification.querySelector('.notification-icon');
            const notificationMessage = notification.querySelector('.notification-message');
            
            // Progress bar
            const progressBar = document.getElementById('progressBar');
            window.addEventListener('scroll', function() {
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (winScroll / height) * 100;
                progressBar.style.width = scrolled + '%';
            });
            
            // Real-time validation
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateInput(this);
                });
                
                input.addEventListener('input', function() {
                    if (this.classList.contains('error')) {
                        validateInput(this);
                    }
                });
            });
            
            function validateInput(input) {
                const id = input.id;
                let isValid = true;
                
                // Clear previous validation
                input.classList.remove('error', 'success');
                
                // Check if empty
                if (!input.value.trim()) {
                    showError(input, 'This field is required');
                    return false;
                }
                
                // Specific validations
                switch(id) {
                    case 'email':
                        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailPattern.test(input.value)) {
                            showError(input, 'Please enter a valid email address');
                            isValid = false;
                        }
                        break;
                    case 'contact':
                        const phonePattern = /^\d{10,15}$/;
                        if (!phonePattern.test(input.value.replace(/\D/g, ''))) {
                            showError(input, 'Please enter a valid phone number');
                            isValid = false;
                        }
                        break;
                }
                
                if (isValid) {
                    input.classList.add('success');
                }
                
                return isValid;
            }
            
            function showError(input, message) {
                input.classList.add('error');
                const validationMessage = input.parentElement.parentElement.querySelector('.validation-message');
                if (validationMessage) {
                    validationMessage.textContent = message;
                }
            }
            // Replace the existing form submission handler with:
eventForm.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    // ... existing validation code ...

    try {
        const response = await fetch('submit.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData)
        });

        const result = await response.json();
        
        if (result.success) {
            showNotification('success', result.message);
            eventForm.reset();
            localStorage.removeItem('eventXpertFormData');
        } else {
            showNotification('error', result.message);
        }
    } catch (error) {
        // ... error handling ...
    }

       
                // Show loading state
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
                
                // Collect form data
                const formData = {
                    collegeName: document.getElementById('college-name').value,
                    contact: document.getElementById('contact').value,
                    email: document.getElementById('email').value,
                    address: document.getElementById('address').value,
                    eventName: document.getElementById('event-name').value,
                    eventId: document.getElementById('event-id').value,
                    venue: document.getElementById('venue').value,
                    eventDescription: document.getElementById('event-description').value,
                    dateTime: document.getElementById('date-time').value
                };
                
                // Simulate API call with fetch
                try {
                    // Simulate network delay
                    await new Promise(resolve => setTimeout(resolve, 1500));
                    
                    // Simulate successful API response
                    const response = {
                        success: true,
                        message: 'Event registered successfully!'
                    };
                    
                    // Save to localStorage for persistence
                    const savedEvents = JSON.parse(localStorage.getItem('eventXpertEvents') || '[]');
                    savedEvents.push({
                        ...formData,
                        id: Date.now(),
                        createdAt: new Date().toISOString()
                    });
                    localStorage.setItem('eventXpertEvents', JSON.stringify(savedEvents));
                    
                    // Show success notification
                    showNotification('success', response.message);
                    
                    // Reset form
                    eventForm.reset();
                    
                    // Reset the date time to default
                    dateTimeInput.value = formattedDate;
                    
                    // Remove success classes
                    inputs.forEach(input => {
                        input.classList.remove('success');
                    });
                    
                } catch (error) {
                    // Show error notification
                    showNotification('error', 'An error occurred. Please try again.');
                    console.error('Error:', error);
                } finally {
                    // Hide loading state
                    submitBtn.classList.remove('loading');
                    submitBtn.disabled = false;
                }
            });
            
            // Notification function
            function showNotification(type, message) {
                notification.className = 'notification';
                notification.classList.add(type);
                
                if (type === 'success') {
                    notificationIcon.className = 'notification-icon fas fa-check-circle';
                } else {
                    notificationIcon.className = 'notification-icon fas fa-exclamation-circle';
                }
                
                notificationMessage.textContent = message;
                
                // Show notification
                setTimeout(() => {
                    notification.classList.add('show');
                }, 100);
                
                // Hide notification after 5 seconds
                setTimeout(() => {
                    notification.classList.remove('show');
                }, 5000);
            }
            
            // Form data persistence
            // Check if there's saved form data in localStorage
            const savedFormData = localStorage.getItem('eventXpertFormData');
            if (savedFormData) {
                const formData = JSON.parse(savedFormData);
                
                // Fill form with saved data
                for (const key in formData) {
                    const input = document.getElementById(key);
                    if (input) {
                        input.value = formData[key];
                    }
                }
            }
            
            // Save form data as user types
            inputs.forEach(input => {
                input.addEventListener('input', debounce(function() {
                    const formData = {};
                    inputs.forEach(input => {
                        formData[input.id] = input.value;
                    });
                    localStorage.setItem('eventXpertFormData', JSON.stringify(formData));
                }, 500));
            });
            
            // Debounce function to limit how often a function is called
            function debounce(func, wait) {
                let timeout;
                return function() {
                    const context = this;
                    const args = arguments;
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        func.apply(context, args);
                    }, wait);
                };
            }
            
            // Add smooth scrolling to all links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    
        
    </script>
        <?php
        // Database configuration
        include 'signup.php';
        if(isset($_POST['submit'])){
            $college_name = $_POST['college_name'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $event_name = $_POST['event_name'];
            $eventid = $_POST['eventid'];
            $venue = $_POST['venue'];
            $description = $_POST['description'];
            $datetime = $_POST['date-time'];
            $sql = "INSERT INTO events (college_name, contact, email, address, event_name, eventid, venue, description, date-time) VALUES ('$college_name', '$contact', '$email', '$address', '$event_name', '$eventid', '$venue', '$description', ' $datetime')";
            if ($conn->query($sql) === TRUE) {
                echo '<script>console.log("New record created successfully")</script>';
            } else {
                echo '<script>console.log("Error: ' . $sql . '<br>' . $conn->error . '")</script>';
            }
        }
        ?>
</body>
</html>