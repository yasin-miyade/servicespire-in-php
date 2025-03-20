<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions | ServicePire</title>
    <link href="assets/css/style.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Fade-in effect */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Card hover effect */
        .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Button hover effect */
        .btn-home {
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-home:hover {
            transform: scale(1.05);
            background-color: #5a2ea7;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900">
<?php include 'header.php'; ?>


    <!-- Terms Content -->
    <main class="container mx-auto my-10 p-8 bg-white rounded-lg shadow-md max-w-6xl mt-32">
        <h2 class="text-4xl font-bold text-gray-900 mb-8 text-center fade-in">Terms and Conditions</h2>
        
        <!-- Two-Column Grid -->
        <div class="grid md:grid-cols-2 gap-6">
            <!-- 1. User Conduct -->
            <section class="fade-in card p-6 bg-gray-50 rounded-lg shadow-md flex">
                <div class="mr-4 text-purple-700 text-3xl">👥</div>
                <div>
                    <h3 class="text-2xl font-semibold text-purple-700">User Conduct</h3>
                    <ul class="list-disc pl-6 text-gray-700 text-sm">
                        <li>Provide accurate information.</li>
                        <li>Respect and avoid offensive behavior.</li>
                        <li>No fraudulent or illegal activities.</li>
                        <li>No hacking, spamming, or security breaches.</li>
                    </ul>
                </div>
            </section>

            <!-- 2. Privacy and Data Protection -->
            <section class="fade-in card p-6 bg-gray-50 rounded-lg shadow-md flex">
                <div class="mr-4 text-purple-700 text-3xl">🔒</div>
                <div>
                    <h3 class="text-2xl font-semibold text-purple-700">Privacy & Data</h3>
                    <ul class="list-disc pl-6 text-gray-700 text-sm">
                        <li>Your data is securely stored.</li>
                        <li>Cookies improve user experience.</li>
                        <li>Update personal info in settings.</li>
                        <li>Transactions are encrypted.</li>
                    </ul>
                </div>
            </section>

            <!-- 3. Prohibited Activities -->
            <section class="fade-in card p-6 bg-gray-50 rounded-lg shadow-md flex">
                <div class="mr-4 text-purple-700 text-3xl">🚫</div>
                <div>
                    <h3 class="text-2xl font-semibold text-purple-700">Prohibited Activities</h3>
                    <ul class="list-disc pl-6 text-gray-700 text-sm">
                        <li>No harassment or hate speech.</li>
                        <li>No malware, viruses, or hacking.</li>
                        <li>No spamming or phishing.</li>
                        <li>No unauthorized account access.</li>
                    </ul>
                </div>
            </section>

            <!-- 4. Account Security -->
            <section class="fade-in card p-6 bg-gray-50 rounded-lg shadow-md flex">
                <div class="mr-4 text-purple-700 text-3xl">🔑</div>
                <div>
                    <h3 class="text-2xl font-semibold text-purple-700">Account Security</h3>
                    <ul class="list-disc pl-6 text-gray-700 text-sm">
                        <li>Use strong passwords.</li>
                        <li>Enable two-factor authentication.</li>
                        <li>Report suspicious activity.</li>
                        <li>Never share login credentials.</li>
                    </ul>
                </div>
            </section>
        </div>

        <!-- Centered Last Card -->
        <section class="fade-in card p-6 bg-gray-50 rounded-lg shadow-md flex max-w-3xl mx-auto mt-6">
            <div class="mr-4 text-purple-700 text-3xl">⚖</div>
            <div>
                <h3 class="text-2xl font-semibold text-purple-700">Modifications & Termination</h3>
                <ul class="list-disc pl-6 text-gray-700 text-sm">
                    <li>We may update these terms.</li>
                    <li>Feature modifications without notice.</li>
                    <li>Accounts violating rules may be banned.</li>
                    <li>Regional restrictions may apply.</li>
                </ul>
            </div>
        </section>

        <!-- Back to Home Button -->
        <div class="text-center mt-10">
            <a href="index.php" class="btn-home bg-purple-700 text-white px-6 py-3 rounded-lg text-lg font-semibold shadow-md hover:bg-purple-800">
                Back to Home
            </a>
        </div>
    </main>

    <!-- JavaScript for Scroll Animations -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const fadeIns = document.querySelectorAll(".fade-in");
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("visible");
                    }
                });
            }, { threshold: 0.2 });

            fadeIns.forEach(section => {
                observer.observe(section);
            });
        });
    </script>

<?php include 'footer.php'; ?>


</body>
</html>