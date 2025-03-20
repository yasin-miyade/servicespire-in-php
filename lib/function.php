<?php
if (session_status() === PHP_SESSION_NONE) {
    // session_start();
}

date_default_timezone_set('Asia/Kolkata');

class db_functions 
{
    private $con;

    function __construct()
    {
        $this->con = new mysqli("localhost", "root", "", "servicespire");
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }


    public function connect() {
        return $this->con;
    }

            //contact data function
    public function save_contact_data($username, $email, $phone, $message) {
        $date = date("Y-m-d");
        $time = date("H:i:s");

        $stmt = $this->con->prepare("INSERT INTO contact_data (username, email, phone, message, date, time) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Error preparing statement: " . $this->con->error);
        }

        $stmt->bind_param("ssssss", $username, $email, $phone, $message, $date, $time);
        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

                    // user sign up function
    public function save_sign_up_data($first_name, $last_name, $dob, $gender, $mobile, $address, $email, $password, $id_proof_path) {
        // Store password as plain text (not recommended for production)
        $query = "INSERT INTO sign_up (first_name, last_name, dob, gender, mobile, address, email, password, id_proof) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->con->prepare($query);
        
        if (!$stmt) {
            error_log("Prepare failed: " . $this->con->error);
            return false;
        }
        
        $stmt->bind_param("sssssssss", $first_name, $last_name, $dob, $gender, $mobile, $address, $email, $password, $id_proof_path);
        
        if ($stmt->execute()) {
            return true; // Data saved successfully
        } else {
            error_log("Execute failed: " . $stmt->error);
            return false;
        }
    }

                    //user login function
    public function get_user_by_email($email) {
        $query = "SELECT * FROM sign_up WHERE email = ?";
        $stmt = $this->con->prepare($query);
    
        if (!$stmt) {
            error_log("Error preparing statement: " . $this->con->error);
            return null; // Return null to indicate failure
        }
    
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc(); // Return user data
        } else {
            return null; // No user found
        }
    }

    //user post form data storing
    public function insertWorkPost($name, $email, $mobile, $city, $work, $deadline, $reward, $message, $from_location, $to_location) {
        $stmt = $this->con->prepare("INSERT INTO work_posts (name, email, mobile, city, work, deadline, reward, message, from_location, to_location) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
        if (!$stmt) {
            die("Prepare failed: " . $this->con->error); // Show error if prepare fails
        }
    
        $stmt->bind_param("ssssssssss", $name, $email, $mobile, $city, $work, $deadline, $reward, $message, $from_location, $to_location);
    
        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error); // Show error if execution fails
        }
    
        return true;
    }
    
	
//show the users post at helper dashboard
public function getWorkPosts() {
    $query = "SELECT * FROM work_posts ORDER BY id DESC";
    $result = $this->con->query($query);

    if (!$result) {
        die("Query Failed: " . $this->con->error);
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}

//users own posts 
public function getUserWorkPosts($email) {
    $stmt = $this->con->prepare("SELECT * FROM work_posts WHERE email = ? ORDER BY created_at DESC");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    return $stmt->get_result();
}


// Fetch a single post by ID
function getUserWorkPostById($post_id, $email) {
    $stmt = $this->con->prepare("SELECT * FROM work_posts WHERE id = ? AND email = ?");
    $stmt->bind_param("is", $post_id, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}


// Update a user's post
function updateUserWorkPost($post_id, $email, $work, $city, $deadline, $reward, $message) {
    $stmt = $this->con->prepare("UPDATE work_posts SET work = ?, city = ?, deadline = ?, reward = ?, message = ? WHERE id = ? AND email = ?");
    $stmt->bind_param("sssssis", $work, $city, $deadline, $reward, $message, $post_id, $email);
    return $stmt->execute();
}

// Delete a user's post
public function deleteWorkPost($post_id) {
    $conn = $this->connect();
    $stmt = $conn->prepare("DELETE FROM work_posts WHERE id = ?");
    $stmt->bind_param("i", $post_id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}




///// helper dashboard working
public function getTotalRequests() {
    $query = "SELECT COUNT(*) AS total FROM work_posts"; // Adjust table name if needed
    $result = $this->con->query($query);
    $row = $result->fetch_assoc();
    return $row['total'];
}

public function register_user($first_name, $last_name, $email, $mobile, $gender, $dob, $address, $password, $id_proof, $id_proof_file)
{
    $stmt = $this->con->prepare("INSERT INTO helper_sign_up (first_name, last_name, email, mobile, gender, dob, address, password, id_proof, id_proof_file) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $first_name, $last_name, $email, $mobile, $gender, $dob, $address, $password, $id_proof, $id_proof_file);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

public function login_user($email, $password)
{
    $stmt = $this->con->prepare("SELECT id, first_name, last_name, email, password FROM helper_sign_up WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    // Check if user exists
    if (!$result) {
        error_log("No user found with email: $email");
        return false;
    }

    // Debugging logs (Remove in production)
    error_log("Stored Password: " . $result['password']);
    error_log("Entered Password: " . $password);

    // Direct string comparison
    if ($password === $result['password']) {
        return $result;
    } else {
        error_log("Password mismatch for email: $email");
        return false;
    }
}



public function is_email_exists($email) {
    $query = "SELECT id FROM helper_sign_up WHERE email = ?";
    $stmt = $this->con->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    return $stmt->num_rows > 0;
}


//new 

public function assignHelper($post_id, $helper_email) {
    $query = "UPDATE work_posts SET assigned_helper_email = ? WHERE id = ? AND assigned_helper_email IS NULL";
    $stmt = $this->con->prepare($query);
    $stmt->bind_param("si", $helper_email, $post_id);
    return $stmt->execute();
}

public function isHelperAssigned($post_id, $helper_email) {
    $query = "SELECT assigned_helper_email FROM work_posts WHERE id = ?";
    $stmt = $this->con->prepare($query);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    
    return ($result['assigned_helper_email'] === $helper_email);
}

public function getUserByPostId($post_id) {
    $query = "SELECT email FROM work_posts WHERE id = ?";
    $stmt = $this->con->prepare($query);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

public function sendNotification($post_id, $message) {
    $query = "UPDATE work_posts SET notification = ? WHERE id = ?";
    $stmt = $this->con->prepare($query);
    $stmt->bind_param("si", $message, $post_id);
    return $stmt->execute();
}


public function getUserNotifications($user_email) {
    $query = "SELECT notification FROM work_posts WHERE email = ? AND notification IS NOT NULL";
    $stmt = $this->con->prepare($query);
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}


//admin dashboard working
public function getHelpers() {
    $query = "SELECT * FROM helper_sign_up"; // Use the correct table name
    $result = $this->con->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}


public function getUsers() {
    if (!$this->con) {
        return []; // Return an empty array if DB connection fails
    }

    $query = "SELECT * FROM sign_up"; // Ensure table name is correct
    $stmt = $this->con->prepare($query);
    
    if (!$stmt) {
        error_log("DB Error: " . $this->con->error); // Log error for debugging
        return [];
    }
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $users = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $users;
    } else {
        error_log("Query Execution Error: " . $stmt->error);
        return [];
    }
}

public function getUserById($id) {
    if (!$this->con) {
        return null; // Return null if DB connection fails
    }

    $stmt = $this->con->prepare("SELECT * FROM sign_up WHERE id = ?");
    
    if (!$stmt) {
        error_log("DB Error: " . $this->con->error);
        return null;
    }
    
    $stmt->bind_param("i", $id);
    if (!$stmt->execute()) {
        error_log("Query Execution Error: " . $stmt->error);
        return null;
    }
    
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    
    return $user ?: null; // Return null if no user is found
}




///profile autofill 

// Add these functions to your db_functions class in function.php

public function get_user_by_id($user_id) {
    $query = "SELECT * FROM sign_up WHERE id = ?";
    $stmt = $this->con->prepare($query);
    
    if (!$stmt) {
        error_log("Error preparing statement: " . $this->con->error);
        return null;
    }
    
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

public function update_user_profile($user_id, $first_name, $last_name, $dob, $gender, $mobile, $address, $bio, $profile_photo = null) {
    // If bio column doesn't exist, you may need to alter the table first
    // ALTER TABLE sign_up ADD COLUMN bio TEXT;
    // ALTER TABLE sign_up ADD COLUMN profile_photo VARCHAR(255);
    
    $query = "UPDATE sign_up SET 
              first_name = ?, 
              last_name = ?, 
              dob = ?, 
              gender = ?, 
              mobile = ?, 
              address = ?, 
              bio = ?";
              
    $params = [$first_name, $last_name, $dob, $gender, $mobile, $address, $bio];
    $types = "sssssss";
    
    // Add profile photo to update if provided
    if ($profile_photo !== null) {
        $query .= ", profile_photo = ?";
        $params[] = $profile_photo;
        $types .= "s";
    }
    
    $query .= " WHERE id = ?";
    $params[] = $user_id;
    $types .= "i";
    
    $stmt = $this->con->prepare($query);
    
    if (!$stmt) {
        error_log("Error preparing statement: " . $this->con->error);
        return false;
    }
    
    $stmt->bind_param($types, ...$params);
    
    if ($stmt->execute()) {
        return true;
    } else {
        error_log("Execute failed: " . $stmt->error);
        return false;
    }
}

public function delete_user_account($user_id) {
    $query = "DELETE FROM sign_up WHERE id = ?";
    $stmt = $this->con->prepare($query);
    
    if (!$stmt) {
        error_log("Error preparing statement: " . $this->con->error);
        return false;
    }
    
    $stmt->bind_param("i", $user_id);
    
    if ($stmt->execute()) {
        return true;
    } else {
        error_log("Execute failed: " . $stmt->error);
        return false;
    }
}


}
?>
