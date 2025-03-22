<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token }}">
    <title>Profile Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.min.css">
</head>
<body class="bg-gray-50 font-inter">
    <div class="min-h-screen flex flex-col">        
        <!-- Main Content -->
        <div class="container mx-auto px-4 py-8 flex-grow">
            <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
                <!-- Page Header -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-4">
                    <h1 class="text-2xl font-bold text-white">Account Settings</h1>
                </div>

                <div class="flex flex-col md:flex-row">
                    <!-- Mini Sidebar -->
                    <div class="w-full md:w-1/4 bg-gray-50 md:border-r">
                        <nav class="p-4">
                            <ul class="space-y-1">
                                <li>
                                    <button class="tab-link w-full text-left px-4 py-2 rounded-lg bg-blue-100 text-blue-700 font-medium flex items-center" data-tab="profile">
                                        <i class="fas fa-user-circle mr-2"></i> Profile
                                    </button>
                                </li>
                                <li>
                                    <button class="tab-link w-full text-left px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 flex items-center" data-tab="delete-account">
                                        <i class="fas fa-trash-alt mr-2 text-red-500"></i> Delete Account
                                    </button>
                                </li>
                                <li class="mt-8">
                                    <a href="index.php" class="w-full text-left px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 flex items-center">
                                        <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!-- Content Area -->
                    <div class="w-full md:w-3/4 p-6">
                        <div id="success-message" class="hidden bg-green-50 text-green-700 border-green-200 px-4 py-3 mb-4 border rounded-md flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Profile updated successfully!
                        </div>
                        
                        <!-- Profile Section -->
                        <div id="profile" class="tab-content">
                            <div class="flex flex-col md:flex-row items-center mb-6">
                                <div class="relative mb-4 md:mb-0">
                                    <div class="w-24 h-24 rounded-full border-4 border-white shadow-lg overflow-hidden bg-gray-100">
                                        <img id="profilePhoto" src="https://via.placeholder.com/150" class="w-full h-full object-cover" alt="Profile Photo">
                                    </div>
                                    <div id="photoEditOverlay" class="absolute inset-0 bg-black bg-opacity-50 rounded-full flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity hidden cursor-pointer">
                                        <i class="fas fa-camera text-white text-xl"></i>
                                    </div>
                                    <input type="file" id="photoInput" name="profile_photo" class="hidden" accept="image/*">
                                </div>
                                <div class="md:ml-6 text-center md:text-left">
                                    <h3 class="text-2xl font-bold text-gray-800">John Doe</h3>
                                    <p class="text-gray-500">john.doe@example.com</p>
                                </div>
                                <div class="ml-auto mt-4 md:mt-0">
                                    <button id="editButton" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow-sm transition-colors flex items-center">
                                        <i class="fas fa-edit mr-2"></i> Edit Profile
                                    </button>
                                </div>
                            </div>

                            <form method="POST" action="" enctype="multipart/form-data" id="profileForm">
                                <div class="bg-gray-50 p-4 rounded-lg border mb-6">
                                    <h3 class="font-medium text-gray-700 mb-3">Personal Information</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                            <input type="text" name="first_name" value="John" class="border border-gray-300 rounded-md p-2 w-full focus:ring-2 focus:ring-blue-200 focus:border-blue-400 focus:outline-none transition-colors bg-gray-50" readonly>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                            <input type="text" name="last_name" value="Doe" class="border border-gray-300 rounded-md p-2 w-full focus:ring-2 focus:ring-blue-200 focus:border-blue-400 focus:outline-none transition-colors bg-gray-50" readonly>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                            <input type="email" value="john.doe@example.com" class="border border-gray-300 rounded-md p-2 w-full bg-gray-100" readonly disabled>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                            <input type="text" name="mobile" value="+1 (555) 123-4567" class="border border-gray-300 rounded-md p-2 w-full focus:ring-2 focus:ring-blue-200 focus:border-blue-400 focus:outline-none transition-colors bg-gray-50" readonly>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                                            <select name="gender" class="border border-gray-300 rounded-md p-2 w-full focus:ring-2 focus:ring-blue-200 focus:border-blue-400 focus:outline-none transition-colors bg-gray-50" disabled>
                                                <option value="male" selected>Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                                            <input type="date" name="dob" value="1990-01-01" class="border border-gray-300 rounded-md p-2 w-full focus:ring-2 focus:ring-blue-200 focus:border-blue-400 focus:outline-none transition-colors bg-gray-50" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gray-50 p-4 rounded-lg border mb-6">
                                    <h3 class="font-medium text-gray-700 mb-3">Additional Information</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                            <input type="text" name="address" value="123 Main St, Anytown, USA" class="border border-gray-300 rounded-md p-2 w-full focus:ring-2 focus:ring-blue-200 focus:border-blue-400 focus:outline-none transition-colors bg-gray-50" readonly>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                                            <textarea name="bio" rows="3" class="border border-gray-300 rounded-md p-2 w-full focus:ring-2 focus:ring-blue-200 focus:border-blue-400 focus:outline-none transition-colors bg-gray-50" readonly>Web developer with 5+ years of experience in front-end and back-end technologies.</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="hidden" id="updateButtonContainer">
                                    <div class="flex space-x-4">
                                        <button type="submit" name="update_profile" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md shadow-sm transition-colors flex items-center">
                                            <i class="fas fa-save mr-2"></i> Save Changes
                                        </button>
                                        <button type="button" id="cancelButton" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md shadow-sm transition-colors flex items-center">
                                            <i class="fas fa-times mr-2"></i> Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Delete Account Section -->
                        <div id="delete-account" class="tab-content hidden">
                            <h2 class="text-xl font-bold text-red-600 mb-6 flex items-center">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Delete Account
                            </h2>
                            
                            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-exclamation-circle text-red-500"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-red-700">
                                            Warning: This action cannot be undone. All your data will be permanently deleted.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="text-gray-700 mb-6">Please confirm that you want to delete your account. You will lose all your data and won't be able to recover it.</p>
                            
                            <div class="bg-gray-50 p-4 rounded-lg border mb-6">
                                <h3 class="font-medium text-gray-700 mb-3">What happens when you delete your account:</h3>
                                <ul class="space-y-2 ml-6 list-disc text-gray-600">
                                    <li>Your profile information will be permanently deleted</li>
                                    <li>You will lose access to all your services and data</li>
                                    <li>Any active subscriptions will be canceled</li>
                                    <li>You will need to create a new account to use our services again</li>
                                </ul>
                            </div>
                            
                            <button type="button" id="deleteAccountBtn" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-md shadow-sm transition-colors flex items-center">
                                <i class="fas fa-trash-alt mr-2"></i> Delete My Account
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Global variable to track editing mode
    let isEditing = false;
    
    // DOM References
    const editButton = document.getElementById('editButton');
    const cancelButton = document.getElementById('cancelButton');
    const updateButtonContainer = document.getElementById('updateButtonContainer');
    const successMessage = document.getElementById('success-message');
    const photoEditOverlay = document.getElementById('photoEditOverlay');
    const photoInput = document.getElementById('photoInput');
    const profilePhoto = document.getElementById('profilePhoto');
    const profileForm = document.getElementById('profileForm');
    const deleteAccountBtn = document.getElementById('deleteAccountBtn');
    
    // Tab functionality
    document.querySelectorAll('.tab-link').forEach(tab => {
        tab.addEventListener('click', () => {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Remove active class from all tabs
            document.querySelectorAll('.tab-link').forEach(t => {
                t.classList.remove('bg-blue-100', 'text-blue-700');
                t.classList.add('text-gray-700', 'hover:bg-gray-100');
            });
            
            // Show selected tab content
            const tabId = tab.getAttribute('data-tab');
            document.getElementById(tabId).classList.remove('hidden');
            
            // Add active class to selected tab
            tab.classList.add('bg-blue-100', 'text-blue-700');
            tab.classList.remove('text-gray-700', 'hover:bg-gray-100');
        });
    });
    
    // Toggle edit mode
    function toggleEditMode() {
        const inputs = document.querySelectorAll('#profileForm input:not([disabled]), #profileForm select, #profileForm textarea');
        inputs.forEach(input => {
            input.readOnly = !isEditing;
            input.disabled = !isEditing;
            
            if (isEditing) {
                input.classList.remove('bg-gray-50');
                input.classList.add('bg-white');
            } else {
                input.classList.add('bg-gray-50');
                input.classList.remove('bg-white');
            }
        });
        
        // Toggle photo edit overlay
        photoEditOverlay.classList.toggle('hidden', !isEditing);
        
        // Toggle update button container
        updateButtonContainer.classList.toggle('hidden', !isEditing);
        
        // Toggle edit button text
        if (isEditing) {
            editButton.classList.add('hidden');
        } else {
            editButton.classList.remove('hidden');
        }
    }
    
    // Edit button click handler
    editButton.addEventListener('click', () => {
        isEditing = true;
        toggleEditMode();
    });
    
    // Cancel button click handler
    cancelButton.addEventListener('click', () => {
        isEditing = false;
        toggleEditMode();
        
        // Reset form to original values
        loadUserData(mockUserData);
    });
    
    // Photo edit overlay click handler
    photoEditOverlay.addEventListener('click', () => {
        photoInput.click();
    });
    
    // Photo input change handler
    photoInput.addEventListener('change', (e) => {
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();
            reader.onload = (e) => {
                profilePhoto.src = e.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    // Mock user data for testing
    const mockUserData = {
        first_name: "John",
        last_name: "Doe",
        email: "john.doe@example.com",
        mobile: "+1 (555) 123-4567",
        gender: "male",
        dob: "1990-01-01",
        address: "123 Main St, Anytown, USA",
        bio: "Web developer with 5+ years of experience in front-end and back-end technologies.",
        profile_photo: "https://via.placeholder.com/150"
    };

    // Function to load user data into the form
    function loadUserData(userData) {
        document.querySelector('input[name="first_name"]').value = userData.first_name || '';
        document.querySelector('input[name="last_name"]').value = userData.last_name || '';
        document.querySelector('input[name="mobile"]').value = userData.mobile || '';
        document.querySelector('select[name="gender"]').value = userData.gender || 'male';
        document.querySelector('input[name="dob"]').value = userData.dob || '';
        document.querySelector('input[name="address"]').value = userData.address || '';
        document.querySelector('textarea[name="bio"]').value = userData.bio || '';
        
        // Update profile display
        document.querySelector('h3.text-2xl').textContent = 
            `${userData.first_name} ${userData.last_name}`;
        document.querySelector('p.text-gray-500').textContent = userData.email;
        
        // Update profile photo if available
        if (userData.profile_photo) {
            document.getElementById('profilePhoto').src = userData.profile_photo;
        }
    }

    // Fetch user profile data when page loads
    document.addEventListener('DOMContentLoaded', fetchUserProfile);

    function fetchUserProfile() {
        // Show loading indicator
        const loadingIndicator = document.createElement('div');
        loadingIndicator.id = 'profile-loading';
        loadingIndicator.className = 'flex justify-center items-center py-4';
        loadingIndicator.innerHTML = '<i class="fas fa-spinner fa-spin text-blue-600 text-xl"></i>';
        document.getElementById('profile').prepend(loadingIndicator);
        
        // Try to fetch data from API first
        fetch('/api/user/profile')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch profile data');
                }
                return response.json();
            })
            .then(userData => {
                // Remove loading indicator
                document.getElementById('profile-loading')?.remove();
                
                // Load the user data
                loadUserData(userData);
            })
            .catch(error => {
                console.error('Error fetching profile:', error);
                // Remove loading indicator
                document.getElementById('profile-loading')?.remove();
                
                // Since API failed, use mock data instead
                console.log("Using mock data instead");
                loadUserData(mockUserData);
            });
    }

    // Profile form submission handler
    profileForm.addEventListener("submit", (e) => {
        e.preventDefault();
        
        // Show loading state
        const submitBtn = e.target.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Saving...';
        submitBtn.disabled = true;
        
        // Create FormData object from the form
        const formData = new FormData(e.target);
        
        // Add photo if it was changed
        if (photoInput.files.length > 0) {
            formData.append('profile_photo', photoInput.files[0]);
        }
        
        // Try to send form data to server
        fetch('/api/user/profile/update', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to update profile');
            }
            return response.json();
        })
        .then(data => {
            handleSuccessfulUpdate(submitBtn, originalBtnText);
        })
        .catch(error => {
            console.error('Error updating profile:', error);
            
            // For demo purposes, simulate a successful update after a short delay
            setTimeout(() => {
                // Update mock data with form values
                mockUserData.first_name = formData.get('first_name');
                mockUserData.last_name = formData.get('last_name');
                mockUserData.mobile = formData.get('mobile');
                mockUserData.gender = formData.get('gender');
                mockUserData.dob = formData.get('dob');
                mockUserData.address = formData.get('address');
                mockUserData.bio = formData.get('bio');
                
                handleSuccessfulUpdate(submitBtn, originalBtnText);
            }, 1000);
        });
    });

    function handleSuccessfulUpdate(submitBtn, originalBtnText) {
        // Reset button state
        submitBtn.innerHTML = originalBtnText;
        submitBtn.disabled = false;
        
        // Show success message
        successMessage.classList.remove("hidden");
        isEditing = false;
        toggleEditMode();
        
        // Hide success message after 3 seconds
        setTimeout(() => {
            successMessage.classList.add("hidden");
        }, 3000);
        
        // Refresh profile data display
        loadUserData(mockUserData);
    }

    // Delete account functionality
    deleteAccountBtn.addEventListener("click", () => {
        if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
            // Show loading state
            const originalBtnText = deleteAccountBtn.innerHTML;
            deleteAccountBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Processing...';
            deleteAccountBtn.disabled = true;
            
            // Try to send delete request to server
            fetch('/api/user/delete-account', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify({
                    confirm_delete: true
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to delete account');
                }
                return response.json();
            })
            .then(data => {
                // Account successfully deleted, redirect to logout or homepage
                window.location.href = "/logout?account_deleted=true";
            })
            .catch(error => {
                console.error('Error deleting account:', error);
                
                // For demo purposes, simulate successful deletion after a short delay
                setTimeout(() => {
                    alert("Account successfully deleted! This is a demo, so no actual account was deleted.");
                    // In a real application, you would redirect to a logout or homepage
                    // window.location.href = "/logout?account_deleted=true";
                    
                    // Reset button state for demo
                    deleteAccountBtn.innerHTML = originalBtnText;
                    deleteAccountBtn.disabled = false;
                }, 1500);
            });
        }
    });
    </script>
</body>
</html>