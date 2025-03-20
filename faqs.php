<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - ServiceSpire</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

<?php include 'header.php'; ?>

    <div class="min-h-screen flex justify-center items-center p-6 mt-32">
        <div class="w-full max-w-4xl bg-white shadow-xl rounded-xl p-8 border border-gray-300">
            <h2 class="text-4xl font-bold text-center text-purple-700 mb-6">Frequently Asked Questions</h2>
            <p class="text-center text-gray-600 mb-6">Find answers to common questions about ServiceSpire and how we help users connect with skilled professionals.</p>
            
            <div class="space-y-4">
                <div class="border rounded-lg overflow-hidden shadow">
                    <button class="w-full flex justify-between items-center p-5 bg-purple-700 text-white font-semibold text-lg transition-all duration-300" onclick="toggleFAQ(this)">
                        <span>What is ServiceSpire?</span>
                        <span class="text-2xl">+</span>
                    </button>
                    <div class="hidden p-5 bg-gray-50 text-gray-700">ServiceSpire is a trusted platform that connects users with verified professionals for online and offline services across various domains.</div>
                </div>
                
                <div class="border rounded-lg overflow-hidden shadow">
                    <button class="w-full flex justify-between items-center p-5 bg-purple-700 text-white font-semibold text-lg transition-all duration-300" onclick="toggleFAQ(this)">
                        <span>How does ServiceSpire work?</span>
                        <span class="text-2xl">+</span>
                    </button>
                    <div class="hidden p-5 bg-gray-50 text-gray-700">Users can browse through a range of services, select their preferred helper, schedule appointments, and receive assistance either online or in-person.</div>
                </div>
                
                <div class="border rounded-lg overflow-hidden shadow">
                    <button class="w-full flex justify-between items-center p-5 bg-purple-700 text-white font-semibold text-lg transition-all duration-300" onclick="toggleFAQ(this)">
                        <span>Can I schedule an offline visit?</span>
                        <span class="text-2xl">+</span>
                    </button>
                    <div class="hidden p-5 bg-gray-50 text-gray-700">Yes! ServiceSpire allows scheduling in-person visits with professionals to ensure personalized assistance.</div>
                </div>
                
                <div class="border rounded-lg overflow-hidden shadow">
                    <button class="w-full flex justify-between items-center p-5 bg-purple-700 text-white font-semibold text-lg transition-all duration-300" onclick="toggleFAQ(this)">
                        <span>What payment methods are accepted?</span>
                        <span class="text-2xl">+</span>
                    </button>
                    <div class="hidden p-5 bg-gray-50 text-gray-700">We accept multiple payment methods, including credit/debit cards, UPI, PayPal, and cash payments for offline services.</div>
                </div>
                
                <div class="border rounded-lg overflow-hidden shadow">
                    <button class="w-full flex justify-between items-center p-5 bg-purple-700 text-white font-semibold text-lg transition-all duration-300" onclick="toggleFAQ(this)">
                        <span>Is there customer support available?</span>
                        <span class="text-2xl">+</span>
                    </button>
                    <div class="hidden p-5 bg-gray-50 text-gray-700">Yes! Our dedicated customer support team is available 24/7 via chat, email, and phone to assist you with any queries or concerns.</div>
                </div>
                
                <div class="border rounded-lg overflow-hidden shadow">
                    <button class="w-full flex justify-between items-center p-5 bg-purple-700 text-white font-semibold text-lg transition-all duration-300" onclick="toggleFAQ(this)">
                        <span>Are the service providers verified?</span>
                        <span class="text-2xl">+</span>
                    </button>
                    <div class="hidden p-5 bg-gray-50 text-gray-700">Yes, all professionals on ServiceSpire undergo a strict verification process, including background checks, to ensure quality and trustworthiness.</div>
                </div>
                
                <div class="border rounded-lg overflow-hidden shadow">
                    <button class="w-full flex justify-between items-center p-5 bg-purple-700 text-white font-semibold text-lg transition-all duration-300" onclick="toggleFAQ(this)">
                        <span>What if I am not satisfied with a service?</span>
                        <span class="text-2xl">+</span>
                    </button>
                    <div class="hidden p-5 bg-gray-50 text-gray-700">We offer a satisfaction guarantee. If you are not satisfied with a service, you can contact our support team for assistance or request a potential refund.</div>
                </div>
                
                <div class="border rounded-lg overflow-hidden shadow">
                    <button class="w-full flex justify-between items-center p-5 bg-purple-700 text-white font-semibold text-lg transition-all duration-300" onclick="toggleFAQ(this)">
                        <span>How do I become a helper on ServiceSpire?</span>
                        <span class="text-2xl">+</span>
                    </button>
                    <div class="hidden p-5 bg-gray-50 text-gray-700">To become a helper, sign up on our platform, complete your profile, submit verification documents, and once approved, you can start offering services.</div>
                </div>
                
                <div class="border rounded-lg overflow-hidden shadow">
                    <button class="w-full flex justify-between items-center p-5 bg-purple-700 text-white font-semibold text-lg transition-all duration-300" onclick="toggleFAQ(this)">
                        <span>Is there a mobile app for ServiceSpire?</span>
                        <span class="text-2xl">+</span>
                    </button>
                    <div class="hidden p-5 bg-gray-50 text-gray-700">No! We are developing the application in future</div>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        function toggleFAQ(element) {
            const content = element.nextElementSibling;
            const isHidden = content.classList.contains("hidden");
            document.querySelectorAll(".hidden").forEach(el => el.classList.add("hidden"));
            document.querySelectorAll("button span:last-child").forEach(icon => icon.textContent = "+");
            
            if (isHidden) {
                content.classList.remove("hidden");
                element.querySelector("span:last-child").textContent = "−";
            } else {
                content.classList.add("hidden");
                element.querySelector("span:last-child").textContent = "+";
            }
        }
    </script>

<?php include 'footer.php'; ?>

</body>
</html>