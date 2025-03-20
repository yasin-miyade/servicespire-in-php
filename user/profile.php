<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceSpire Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gradient-to-r from-blue-500 to-purple-600 p-10">
    <div class="w-full max-w-4xl bg-white shadow-2xl rounded-3xl p-10">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">ServiceSpire Profile</h2>

        <!-- Navigation Tabs -->
        <div class="flex justify-between border-b-2 border-gray-300 mb-6">
            <button class="tab-link px-6 py-3 font-semibold focus:outline-none" data-tab="profile">Profile</button>
            <button class="tab-link px-6 py-3 font-semibold focus:outline-none" data-tab="password">Change Password</button>
            <button class="tab-link px-6 py-3 font-semibold focus:outline-none" data-tab="delete">Delete Account</button>
        </div>

        <!-- Profile Section -->
        <div id="profile" class="tab-content">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Profile Information</h3>
            <div class="flex justify-center mb-4">
                <div class="relative cursor-pointer" id="profilePhotoContainer">
                    <img id="profilePhoto" src="https://via.placeholder.com/150" class="w-36 h-36 border-4 border-gray-300 rounded-full shadow-lg" />
                    <input type="file" id="photoInput" class="hidden" accept="image/*">
                    <div id="uploadOption" class="hidden absolute top-full mt-2 bg-white shadow-lg rounded-lg p-3 text-center">
                        <label for="photoInput" class="block cursor-pointer text-blue-600 hover:underline">Upload Profile Photo</label>
                    </div>
                </div>
            </div>
            <form method="POST" action="update_profile.php" class="grid grid-cols-2 gap-6">
                <div>
                    <label class="font-semibold text-gray-700">Name</label>
                    <input type="text" name="name" value="John Doe" class="border rounded-lg p-2 w-full" readonly>
                </div>
                <div>
                    <label class="font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" value="johndoe@example.com" class="border rounded-lg p-2 w-full" readonly>
                </div>
                <div>
                    <label class="font-semibold text-gray-700">Phone</label>
                    <input type="text" name="phone" value="+1 234 567 890" class="border rounded-lg p-2 w-full" readonly>
                </div>
                <div>
                    <label class="font-semibold text-gray-700">Gender</label>
                    <select name="gender" class="border rounded-lg p-2 w-full bg-white" disabled>
                        <option value="Male" selected>Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div>
                    <label class="font-semibold text-gray-700">Date of Birth</label>
                    <input type="date" name="dob" value="2000-01-01" class="border rounded-lg p-2 w-full bg-white" readonly>
                </div>
            </form>
            <button id="editButton" class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow-md">Edit</button>
        </div>

        <!-- Change Password Section -->
        <div id="password" class="tab-content hidden">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Change Password</h3>
            <form method="POST" action="change_password.php">
                <div class="mb-4">
                    <label class="font-semibold text-gray-700">Current Password</label>
                    <input type="password" name="current_password" class="border rounded-lg p-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label class="font-semibold text-gray-700">New Password</label>
                    <input type="password" name="new_password" class="border rounded-lg p-2 w-full" required>
                </div>
                <div>
                    <label class="font-semibold text-gray-700">Confirm New Password</label>
                    <input type="password" name="confirm_password" class="border rounded-lg p-2 w-full" required>
                </div>
                <button type="submit" class="mt-4 bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow-md">Update Password</button>
            </form>
        </div>

        <!-- Delete Account Section -->
        <div id="delete" class="tab-content hidden">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Delete Account</h3>
            <p class="text-gray-600 mb-4">Once you delete your account, there is no going back. Please be certain.</p>
            <button id="deleteAccountButton" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg shadow-md">Delete Account</button>
        </div>
    </div>

    <script>
        const tabs = document.querySelectorAll(".tab-link");
        const contents = document.querySelectorAll(".tab-content");

        tabs.forEach(tab => {
            tab.addEventListener("click", () => {
                const target = tab.getAttribute("data-tab");

                contents.forEach(content => {
                    content.classList.add("hidden");
                });

                document.getElementById(target).classList.remove("hidden");

                tabs.forEach(t => t.classList.remove("border-b-4", "border-blue-600", "text-blue-600"));
                tab.classList.add("border-b-4", "border-blue-600", "text-blue-600");
            });
        });

        // Handle profile picture upload
        const profilePhotoContainer = document.getElementById("profilePhotoContainer");
        const uploadOption = document.getElementById("uploadOption");
        const photoInput = document.getElementById("photoInput");
        const profilePhoto = document.getElementById("profilePhoto");

        profilePhotoContainer.addEventListener("click", () => {
            uploadOption.classList.toggle("hidden");
        });

        photoInput.addEventListener("change", (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    profilePhoto.src = e.target.result;
                    uploadOption.classList.add("hidden");
                };
                reader.readAsDataURL(file);
            }
        });

        // Confirm account deletion
        document.getElementById("deleteAccountButton").addEventListener("click", () => {
            if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
                window.location.href = "delete_account.php";
            }
        });

        // Default Active Tab
        document.querySelector(".tab-link").click();
    </script>
</body>
</html>
