<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helper Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-6 w-1/2 text-center ml-60">
        <h2 class="text-2xl font-bold mb-4">Helper Profile</h2>

        <!-- Profile Picture Section -->
        <div class="relative w-24 h-24 mx-auto group">
            <img id="profile-pic" class="w-full h-full rounded-full border-4 border-gray-300 object-cover" 
                 src="https://via.placeholder.com/100" 
                 alt="Profile Picture">
            
            <!-- Hover Options (Edit & Delete) -->
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                <label for="file-upload" class="text-white text-sm cursor-pointer bg-blue-600 px-2 py-1 rounded-md">Edit</label>
                <input id="file-upload" type="file" class="hidden" accept="image/*" onchange="updateProfilePic(event)">
                <button id="remove-pic" class="text-white text-sm bg-red-600 px-2 py-1 rounded-md mt-1">Delete</button>
            </div>
        </div>

        <!-- Profile Details -->
        <div class="mt-4 text-left space-y-3">
            <label class="text-gray-700 block">👤 Name:</label>
            <input id="helper-name" type="text" value="Helper Name" class="w-full p-2 border rounded-md bg-gray-100" disabled>

            <label class="text-gray-700 block">✉️ Email:</label>
            <input id="helper-email" type="email" value="helper@example.com" class="w-full p-2 border rounded-md bg-gray-200 cursor-not-allowed" disabled>

            <label class="text-gray-700 block">📞 Phone:</label>
            <input id="helper-phone" type="text" value="+9876543210" class="w-full p-2 border rounded-md bg-gray-200 cursor-not-allowed" disabled>

            <label class="text-gray-700 block">🏡 Address:</label>
            <input id="helper-address" type="text" value="456 Helper Street, City" class="w-full p-2 border rounded-md bg-gray-100" disabled>

            <label class="text-gray-700 block">📝 Bio:</label>
            <textarea id="helper-bio" class="w-full p-2 border rounded-md bg-gray-100" disabled>Experienced in Home Services | Reliable & Professional</textarea>

            <label class="text-gray-700 block">🔧 Skills:</label>
            <input id="helper-skills" type="text" value="Plumbing, Electrical, Cleaning" class="w-full p-2 border rounded-md bg-gray-100" disabled>

            <label class="text-gray-700 block">📅 Availability:</label>
            <input id="helper-availability" type="text" value="Monday - Friday, 9AM - 6PM" class="w-full p-2 border rounded-md bg-gray-100" disabled>
        </div>

        <!-- Action Buttons -->
        <div class="mt-6 space-y-2">
            <button id="edit-btn" class="bg-blue-600 text-white px-4 py-2 rounded-md w-full hover:bg-blue-700" onclick="toggleEdit()">Edit Profile</button>
            <button id="save-btn" class="bg-green-600 text-white px-4 py-2 rounded-md w-full hover:bg-green-700 hidden" onclick="saveChanges()">Save Changes</button>
            <button class="bg-red-600 text-white px-4 py-2 rounded-md w-full hover:bg-red-700">Delete Account</button>
        </div>
    </div>

    <script>
        function toggleEdit() {
            let inputs = document.querySelectorAll("#helper-name, #helper-address, #helper-bio, #helper-skills, #helper-availability");
            inputs.forEach(input => input.disabled = false);
            document.getElementById("edit-btn").classList.add("hidden");
            document.getElementById("save-btn").classList.remove("hidden");
        }

        function saveChanges() {
            let inputs = document.querySelectorAll("#helper-name, #helper-address, #helper-bio, #helper-skills, #helper-availability");
            inputs.forEach(input => input.disabled = true);
            document.getElementById("edit-btn").classList.remove("hidden");
            document.getElementById("save-btn").classList.add("hidden");
            alert("Profile updated successfully!");
        }

        function updateProfilePic(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-pic').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        document.getElementById('remove-pic').addEventListener('click', function() {
            document.getElementById('profile-pic').src = "https://via.placeholder.com/100";
        });
    </script>

</body>
</html>
