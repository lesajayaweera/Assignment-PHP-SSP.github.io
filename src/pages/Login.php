<?php include("./src/private/initialize.php");?>
<?php $pageTitle = "Login";
$script = "Login";
?>

<?php 

if($_SERVER["REQUEST_METHOD"]==="POST"){
    include_once("./src/php/Controller/UserController.php");

    $email =htmlspecialchars($_POST['email']);
    $password =htmlspecialchars($_POST['password']);

    $user = new UserController;
    $user->login($email,$password);
}
?>
<?php include_once (SHARED_PATH . '/customer_header.php'); ?>
<section class="font-family-montserrat">
    <div class="grid grid-cols-1 md:grid-cols-2 h-screen">
        <img src="/Assignment/assets/images/Login page/login-image.jpg"
            class="h-full w-full    lg:h-screen object-cover" alt="Luxury Car Image">

        <div class="flex flex-col justify-center items-start p-8 space-y-6">
            <h2 class="text-3xl font-bold">Log In</h2>

            <form class="w-full space-y-4" method="post">
                <div>
                    <label for="email" class="block mb-1">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email"
                        class="w-full p-2 border rounded ring-2 focus:outline-none focus:ring-blue-500" required>
                </div>

                <div>
                    <label for="password" class="block mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password"
                        class="w-full p-2 border rounded ring-2 focus:outline-none focus:ring-blue-500" required>
                </div>
                <!-- <select title="role" name="role"  class="text-sm border px-2 py-2 rounded w-[200px] " required>
                        <option value="" disabled selected>Select Role</option>
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                        <option value="admin">Admin</option>
                    </select> -->
                <button type="submit" title="login button"
                    class="bg-black text-white p-3 w-full hover:bg-white hover:text-black hover:border transition duration-500">
                    Login
                </button>
            </form>


            <div class="text-sm mt-4">
                <p>Don't have an account?
                    <a href="/Assignment/Register" class="text-blue-500 hover:underline">Register</a>
                </p>
            </div>
        </div>
    </div>
</section>



<?php include_once (SHARED_PATH . '/customer_footer.php'); ?>