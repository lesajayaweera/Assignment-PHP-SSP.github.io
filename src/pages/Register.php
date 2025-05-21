<?php include("./src/private/initialize.php");
      
?>
<?php $pageTitle = "Sign Up";
$script = "SignUp";
?>
<?php include_once (SHARED_PATH . '/customer_header.php'); ?>


<?php 
if($_SERVER["REQUEST_METHOD"]==="POST"){

  include_once("./src/php/Controller/UserController.php");


  $first_name = htmlspecialchars($_POST['firstName']);
  $last_name =htmlspecialchars($_POST['lastName']);
  $email =htmlspecialchars($_POST['email']);
  $password =htmlspecialchars($_POST['password']);
  $role =$_POST['role'];

  $user = new UserController;
  $user->register($first_name,$last_name,$email,$password,$role);





  


}

?>
  <!-- Sign Up Section -->
  <section class="font-family-montserrat">
    <div class="grid grid-cols-1 md:grid-cols-2 h-screen">
      <img src="/Assignment/assets/images/Login page/login-image.jpg" class="w-full h-full object-cover" alt="Login Visual"/>

      <form class="flex flex-col justify-center items-start p-8 space-y-6 w-full" method="post">
        <h2 class="text-3xl font-bold">Sign Up</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
          <input type="text" name="firstName" placeholder="First Name" class="p-2 border rounded  outline-none focus:ring-blue-500" required />
          <input type="text" name="lastName" placeholder="Last Name" class="p-2 border rounded  focus:outline-none focus:ring-blue-500" required />
        </div>

        <input type="email" name="email" placeholder="Email" class="w-full p-2 border rounded  focus:outline-none focus:ring-blue-500" required />


        <input type="password" name="password" placeholder="Password" class="w-full p-2 border  rounded  focus:ring-blue-500" required />

        
        <select title="role" name="role"  class="text-sm border px-2 py-2 rounded w-[200px] " required>
          <option value="" disabled selected>Select Role</option>
          <option value="buyer">Buyer</option>
          <option value="seller">Seller</option>
          <option value="admin">Admin</option>
      </select>

        <button type="submit" class="bg-black text-white p-4 w-full hover:bg-white hover:text-black hover:border transition duration-500">
          Sign Up
        </button>

        <p class="text-sm self-start">
          Already have an account? 
          <a href="./Login.html" class="text-blue-500 hover:underline">Login</a>
        </p>
      </form>
    </div>
  </section>
<?php include_once (SHARED_PATH . '/customer_footer.php'); ?> 
