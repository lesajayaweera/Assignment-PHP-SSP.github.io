<?php 
session_start();
require_once('./src/php/Controller/AdminController.php');
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: /Assignment/Login");
    exit;
}

$con = new AdminController();
$data =$con->LoadAllUsers();
// echo "<pre>";
// print_r($data);
// echo "<pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Admin-View Listings</title>
  <link rel="stylesheet" href="/Assignment/src/output.css">
</head>
<body class="bg-gray-100 font-sans">

  <!-- Mobile Sidebar Overlay -->
  <div id="mobileSidebar" class="fixed font-sans inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform duration-300 lg:hidden">
    <div class="p-6 space-y-4">
      <h1 class="text-2xl font-bold mb-4">LuxCars</h1>
      <button onclick="toggleSidebar()" class="text-right w-full mb-6 text-gray-300">✕ Close</button>
      <nav class="space-y-3">
        <a href="/Assignment/Admin/Dashboard" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
        <a href="/Assignment/Admin/ManageListings" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Listings</a>
        <a href="/Assignment/Admin/ManageProducts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Products</a>
        <a href="/Assignment/Admin/ManageAccounts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Accounts</a>
        <a href="/Assignment/Admin/Tables" class="block px-4 py-2 bg-gray-800 rounded hover:bg-gray-700 rounded">Tables</a>
        <a href="/Assignment/Logout" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
      </nav>
    </div>
  </div>

  <div class="flex min-h-screen font-sans">
    <!-- Desktop Sidebar -->
    <aside class="hidden lg:block lg:w-1/5 bg-black text-white p-6 fixed top-0 bottom-0 left-0">
      <h1 class="text-3xl font-bold mb-8">LuxCars</h1>
      <nav class="space-y-3">
        <a href="/Assignment/Admin/Dashboard" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
        <a href="/Assignment/Admin/ManageListings" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Listings</a>
        <a href="/Assignment/Admin/ManageProducts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Products</a>
        <a href="/Assignment/Admin/ManageAccounts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Accounts</a>
        <a href="/Assignment/Admin/Tables" class="block px-4 py-2 bg-gray-800 rounded ">Tables</a>
        <a href="/Assignment/Logout" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 space-y-6 w-4/5 lg:ml-[20%]">
      <!-- Header -->
      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-4">
          <!-- Hamburger -->
          <button class="lg:hidden text-2xl" onclick="toggleSidebar()">☰</button>
          <h2 class="text-2xl font-semibold">Tables</h2>
        </div>
        <div class="flex items-center space-x-3">
          <span class="text-sm"><?php echo isset($_SESSION['name']) ?  $_SESSION['name'] :  "User"; ?></span>
          <img src="<?php echo isset($_SESSION['image']) && !empty($_SESSION['image']) ? $_SESSION['image'] : 'https://i.pravatar.cc/150?img=4'; ?>" alt="profile" class="w-10 h-10 rounded-full" />
        </div>
      </div>

      <section class="font-family-monteserat">
        <h2 class="font-bold text-xl mb-4">User table</h2>

        <div class="overflow-x-auto rounded-2xl shadow-md">
          <table class="min-w-full text-left text-sm text-gray-700 p-4 bg-white">
            <thead class="bg-gray-300 text-xs uppercase text-gray-600">
              <tr>
                <th class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Image</th>
                <th class="px-6 py-3">Role</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $d):?>
              <tr class="bg-white">
                <td class="px-6 py-4 font-mono text-gray-900"><?= $d['id'] ?></td>
                <td class="px-6 py-4"><?= $d['firstName'] ?> <?= $d['lastName'] ?></td>
                <td class="px-6 py-4"><?= $d['email'] ?></td>
                <td class="px-6 py-4"><img src="<?= $d['image_path']?$d['image_path']:'https://i.pravatar.cc/150?img=6' ?>"  class="w-8 h-8 object-cover rounded-full" alt=""></td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full <?= $d['role']==='seller' ?'bg-green-100 px-2 py-1 text-xs font-semibold text-green-800' :'bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800'?>"   ><?= $d['role'] ?></span>
                </td>
              </tr>
              <?php endforeach;?>
              
              
            </tbody>
          </table>
        </div>
        

      </section>
      
      
    </main>
  </div>

  <!-- JavaScript -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("mobileSidebar");
      sidebar.classList.toggle("-translate-x-full");
    }
  </script>

</body>
</html>
