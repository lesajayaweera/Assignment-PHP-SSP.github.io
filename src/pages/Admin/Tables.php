<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Admin-View Listings</title>
  <link rel="stylesheet" href="../../output.css">
</head>
<body class="bg-gray-100 font-family-monteserat">

  <!-- Mobile Sidebar Overlay -->
  <div id="mobileSidebar" class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform duration-300 lg:hidden">
    <div class="p-6 space-y-4">
      <h1 class="text-2xl font-bold mb-4">LuxCars</h1>
      <button onclick="toggleSidebar()" class="text-right w-full mb-6 text-gray-300">✕ Close</button>
      <nav class="space-y-3">
        <a href="./Dashboard.html" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
        <a href="./ViewProducts.html" class="block px-4 py-2  bg-gray-800 rounded">View Products</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Listings</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Accounts</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Tables</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Edit Account</a>
        <a href="#" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
      </nav>
    </div>
  </div>

  <div class="flex min-h-screen">
    <!-- Desktop Sidebar -->
    <aside class="hidden lg:block lg:w-1/5 bg-black text-white p-6">
      <h1 class="text-3xl font-bold mb-8">LuxCars</h1>
      <nav class="space-y-3">
        <a href="./Dashboard.html" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
        <a href="./ViewProducts.html" class="block px-4 py-2 bg-gray-800  rounded">View Products</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Listings</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Accounts</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Tables</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Edit Account</a>
        <a href="#" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 space-y-6 w-full">
      <!-- Header -->
      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-4">
          <!-- Hamburger -->
          <button class="lg:hidden text-2xl" onclick="toggleSidebar()">☰</button>
          <h2 class="text-2xl font-semibold">Tables</h2>
        </div>
        <div class="flex items-center space-x-3">
          <span class="text-sm">Mevi Roy</span>
          <img src="https://i.pravatar.cc/150?img=4" alt="profile" class="w-10 h-10 rounded-full" />
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
                <th class="px-6 py-3">Address</th>
                <th class="px-6 py-3">Joined</th>
                <th class="px-6 py-3">Type</th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white">
                <td class="px-6 py-4 font-mono text-gray-900">00001</td>
                <td class="px-6 py-4">Christine Brooks</td>
                <td class="px-6 py-4">089 Kutch Green Apt. 448</td>
                <td class="px-6 py-4">14 Feb 2019</td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-800">Seller</span>
                </td>
              </tr>
              <tr class="bg-gray-50">
                <td class="px-6 py-4 font-mono text-gray-900">00002</td>
                <td class="px-6 py-4">Rosie Pearson</td>
                <td class="px-6 py-4">979 Immanuel Ferry Suite 526</td>
                <td class="px-6 py-4">14 Feb 2019</td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800">Buyer</span>
                </td>
              </tr>
              <tr class="bg-white">
                <td class="px-6 py-4 font-mono text-gray-900">00003</td>
                <td class="px-6 py-4">Darrell Caldwell</td>
                <td class="px-6 py-4">8587 Frida Ports</td>
                <td class="px-6 py-4">14 Feb 2019</td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800">Buyer</span>
                </td>
              </tr>
              <tr class="bg-gray-50">
                <td class="px-6 py-4 font-mono text-gray-900">00004</td>
                <td class="px-6 py-4">Gilbert Johnston</td>
                <td class="px-6 py-4">768 Destiny Lake Suite 600</td>
                <td class="px-6 py-4">14 Feb 2019</td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-800">Seller</span>
                </td>
              </tr>
              <tr class="bg-white">
                <td class="px-6 py-4 font-mono text-gray-900">00005</td>
                <td class="px-6 py-4">Alan Cain</td>
                <td class="px-6 py-4">042 Mylene Throughway</td>
                <td class="px-6 py-4">14 Feb 2019</td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800">Buyer</span>
                </td>
              </tr>
              <tr class="bg-gray-50">
                <td class="px-6 py-4 font-mono text-gray-900">00006</td>
                <td class="px-6 py-4">Alfred Murray</td>
                <td class="px-6 py-4">543 Weinmann Mountain</td>
                <td class="px-6 py-4">14 Feb 2019</td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-800">Seller</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        

      </section>
      <section class="font-family-monteserat">
        <h2 class="font-bold text-xl mb-4">User table</h2>

        <div class="overflow-x-auto rounded-2xl shadow-md">
          <table class="min-w-full text-left text-sm text-gray-700 bg-white">
            <thead class="bg-gray-100 text-xs uppercase text-gray-600">
              <tr>
                <th class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Address</th>
                <th class="px-6 py-3">Joined</th>
                <th class="px-6 py-3">Type</th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white">
                <td class="px-6 py-4 font-mono text-gray-900">00001</td>
                <td class="px-6 py-4">Christine Brooks</td>
                <td class="px-6 py-4">089 Kutch Green Apt. 448</td>
                <td class="px-6 py-4">14 Feb 2019</td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-800">Seller</span>
                </td>
              </tr>
              <tr class="bg-gray-50">
                <td class="px-6 py-4 font-mono text-gray-900">00002</td>
                <td class="px-6 py-4">Rosie Pearson</td>
                <td class="px-6 py-4">979 Immanuel Ferry Suite 526</td>
                <td class="px-6 py-4">14 Feb 2019</td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800">Buyer</span>
                </td>
              </tr>
              <tr class="bg-white">
                <td class="px-6 py-4 font-mono text-gray-900">00003</td>
                <td class="px-6 py-4">Darrell Caldwell</td>
                <td class="px-6 py-4">8587 Frida Ports</td>
                <td class="px-6 py-4">14 Feb 2019</td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800">Buyer</span>
                </td>
              </tr>
              <tr class="bg-gray-50">
                <td class="px-6 py-4 font-mono text-gray-900">00004</td>
                <td class="px-6 py-4">Gilbert Johnston</td>
                <td class="px-6 py-4">768 Destiny Lake Suite 600</td>
                <td class="px-6 py-4">14 Feb 2019</td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-800">Seller</span>
                </td>
              </tr>
              <tr class="bg-white">
                <td class="px-6 py-4 font-mono text-gray-900">00005</td>
                <td class="px-6 py-4">Alan Cain</td>
                <td class="px-6 py-4">042 Mylene Throughway</td>
                <td class="px-6 py-4">14 Feb 2019</td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800">Buyer</span>
                </td>
              </tr>
              <tr class="bg-gray-50">
                <td class="px-6 py-4 font-mono text-gray-900">00006</td>
                <td class="px-6 py-4">Alfred Murray</td>
                <td class="px-6 py-4">543 Weinmann Mountain</td>
                <td class="px-6 py-4">14 Feb 2019</td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-800">Seller</span>
                </td>
              </tr>
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
