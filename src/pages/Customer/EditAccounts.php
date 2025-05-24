<?php
require_once("./src/private/initialize.php");
require_once("./src/php/Controller/BuyerController.php");

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'buyer') {
    header("Location: /Assignment/Login");
    exit;
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $image = $_FILES['image'] ? $_FILES['image'] : "";
    $controller = new BuyerController();
    $controller->EditBuyer(
        htmlspecialchars($_POST['fname']),
        htmlspecialchars($_POST['lname']),
        $_SESSION['email'],
        htmlspecialchars($_POST['password']),
        $image,
    );
    $details_image = $controller->GetBuyerDetails($_SESSION['email'])['image_path'];
    $_SESSION['image'] = $details_image;
}
?>

<?php 
$pageTitle = "Edit Accounts";
$script = "Edit";
?>


<?php include_once(SHARED_PATH.'/customer_header.php');?>
<section class="py-30">
    <div class="w-full mx-auto p-8 bg-white rounded-2xl  ">
        <div class="flex flex-col md:flex-row items-center justify-center md:items-start gap-8">
            <form class="flex items-start justify-around w-full space-x-6" enctype="multipart/form-data" method="post">
                <!-- Profile Picture -->
                <div class="flex-shrink-0 items-center justify-start relative">
                    <img src="<?php echo isset($_SESSION['image']) && !empty($_SESSION['image']) ? $_SESSION['image'] : 'https://i.pravatar.cc/150?img=4'; ?>"
                        id="profile-preview" alt="Profile Photo" class="h-32 w-32 rounded-full object-cover shadow">

                    <!-- Upload Icon/Button -->
                    <label for="profile-upload"
                        class="w-8 h-8 bg-black text-white absolute bottom-2 -right-2 rounded-full flex items-center justify-center cursor-pointer shadow-md hover:bg-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </label>

                    <!-- Hidden File Input -->
                    <input type="file" id="profile-upload" class="hidden" name="image" accept="image/*" />
                </div>


                <!-- Form Fields -->
                <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-6 w-full">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="fname">Your First Name</label>
                        <input title="input" type="text" name="fname" value="<?php echo  $_SESSION['first_name'];  ?>"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="lname">Your Last Name</label>
                        <input title="input" type="text" name="lname" value="<?php echo  $_SESSION['last_name'];  ?>"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>





                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="password">Password</label>
                        <input title="input" type="password" name="password"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>


                    <!-- Save Button (spanning full width on mobile, bottom right on desktop) -->
                    <div class="md:col-span-2 flex justify-start w-full">
                        <button type="submit"
                            class="rounded-lg bg-blue-600 px-6 py-2 text-white w-full md:w-fit  font-medium hover:bg-blue-700 transition">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileUpload = document.getElementById('profile-upload');
        const profilePreview = document.getElementById('profile-preview');

        profileUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            // Validate file type
            if (!file.type.match('image.*')) {
                alert('Please select an image file (JPEG, PNG, etc.)');
                return;
            }

            // Create preview
            const reader = new FileReader();
            reader.onload = function(event) {
                profilePreview.src = event.target.result;
            };
            reader.readAsDataURL(file);
        });

        // Optional: Click on image to trigger file input
        profilePreview.addEventListener('click', function() {
            profileUpload.click();
        });
    });
    </script>
</section>
<?php include_once(SHARED_PATH."/customer_footer.php" );?>