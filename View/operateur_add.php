<!-- Add this form to your existing user.php file -->
<form method="post"> <!-- Assuming you create a new PHP file for handling the form submission -->
    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <label for="email">email:</label>
    <input type="email" name="email" required>

    <label for="role">Role:</label>
<select name="role" required>
    <option value="admin">Admin</option>
    <option value="operateur">Operateur</option>
    <option value="client">Client</option>
    <option value="unverified">Unverified</option>
</select>

<label for="is_active">Is Active:</label>
<input type="checkbox" name="is_active" value="1" checked>


<input type="submit" name="submit" value="Add Operator">

</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Validation and sanitation code here
  // Assuming you have a validation mechanism in place, validate the input data

  $name = $_POST["name"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $role = $_POST["role"];
  $is_active = isset($_POST["is_active"]) ? 1 : 0; // Convert checkbox value to 1 or 0

  // Assuming you have a way to set the current date and time, you can use NOW()
  $date_register = date("Y-m-d H:i:s");
    // Create a new user object
    $newUser = new user($name, $email, $password, $role, $is_active, $date_register);

    // Call the ajout_operateur method to insert the new operator into the database
    $userDAO = new userDAO();
    $userDAO->ajout_operateur($newUser);

    // Redirect or show a success message
}

    

?>
