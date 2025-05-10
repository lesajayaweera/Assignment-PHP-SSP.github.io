<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Admin Dashboard</title>
  <link rel="stylesheet" href="/Assignment/src/output.css">
</head>
<body class="font-family-montserrat">

  <!-- Mobile Sidebar Overlay -->
  <div id="mobileSidebar" class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform duration-300 lg:hidden font-sans">
    <div class="p-6 space-y-4">
      <h1 class="text-2xl font-bold mb-4">LuxCars</h1>
      <button onclick="toggleSidebar()" class="text-right w-full mb-6 text-gray-300">✕ Close</button>
      <nav class="space-y-3">
        <a href="/Assignment/Admin/Dashboard" class="block px-4 py-2 bg-gray-800 rounded">Home</a>
        <a href="./ViewProducts.html" class="block px-4 py-2 hover:bg-gray-700 rounded">View Products</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Listings</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Accounts</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Tables</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Edit Account</a>
        <a href="/Assignment/Logout" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
      </nav>
    </div>
  </div>

  <div class="flex min-h-screen">
    <!-- Desktop Sidebar -->
    <aside class="hidden lg:block lg:w-1/5 bg-black text-white p-6">
      <h1 class="text-3xl font-bold mb-8">LuxCars</h1>
      <nav class="space-y-3">
        <a href="#" class="block px-4 py-2 bg-gray-800 rounded">Home</a>
        <a href="./ViewProducts.html" class="block px-4 py-2 hover:bg-gray-700 rounded">View Products</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Listings</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Accounts</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Tables</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Edit Account</a>
        <a href="/Assignment/Logout" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 space-y-6 w-full">
      <!-- Header -->
      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-4">
          <!-- Hamburger -->
          <button class="lg:hidden text-2xl" onclick="toggleSidebar()">☰</button>
          <h2 class="text-2xl font-semibold">Admin Dashboard</h2>
        </div>
        <div class="flex items-center space-x-3">
          <span class="text-sm">Mevi Roy</span>
          <img src="https://i.pravatar.cc/150?img=4" alt="profile" class="w-10 h-10 rounded-full" />
        </div>
      </div>

      <!-- Statistics -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded shadow">
          <p class="text-sm text-gray-500">Total User</p>
          <p class="text-2xl font-bold">40,689</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
          <p class="text-sm text-gray-500">Total Order</p>
          <p class="text-2xl font-bold">10,293</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
          <p class="text-sm text-gray-500">Total Sales</p>
          <p class="text-2xl font-bold">$89,000</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
          <p class="text-sm text-gray-500">Total Products</p>
          <p class="text-2xl font-bold">2040</p>
        </div>
      </div>

      <!-- Listings -->
      <div class="bg-white rounded shadow p-4 overflow-x-auto">
        <div class="flex justify-between mb-4">
          <h3 class="text-lg font-semibold">Listings</h3>
          <select title="option" class="border rounded px-2 py-1 text-sm focus:outline-0">
            <option>Dealer</option>
            <option>Seller</option>
          </select>
        </div>
        <table class="min-w-full divide-y divide-gray-200 text-sm">
          <thead class="bg-gray-100 text-left text-gray-600">
            <tr>
              <th class="px-4 py-2">Product Name</th>
              <th class="px-4 py-2">Seller</th>
              <th class="px-4 py-2">Type</th>
              <th class="px-4 py-2 text-right">Amount</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr>
              <td class="px-4 py-3 flex items-center space-x-2">
                <img title="image" src="../../../assets/images/porsche.png" class="w-12 h-8 object-cover" />
                <span>Toyota Camry</span>
              </td>
              <td class="px-4 py-3">605N Madipakkam Landing</td>
              <td class="px-4 py-3">Sedan</td>
              <td class="px-4 py-3 text-right">$24,395</td>
            </tr>
            <tr>
              <td class="px-4 py-3 flex items-center space-x-2">
                <img title="image" src="https://imgd.aeplcdn.com/600x337/n/cw/ec/131187/honda-civic-right-front-three-quarter0.jpeg?q=80" class="w-12 h-8 object-cover" />
                <span>Honda Civic</span>
              </td>
              <td class="px-4 py-3">620G Madipakkam Landing</td>
              <td class="px-4 py-3">Hatchback</td>
              <td class="px-4 py-3 text-right">$26,395</td>
            </tr>
            <tr>
              <td class="px-4 py-3 flex items-center space-x-2">
                <img title="image" src="https://imgd.aeplcdn.com/600x337/n/cw/ec/140251/audi-rs5-right-front-three-quarter.jpeg?q=80" class="w-12 h-8 object-cover" />
                <span>Audi Walsh</span>
              </td>
              <td class="px-4 py-3">650H Madipakkam Landing</td>
              <td class="px-4 py-3">Sports</td>
              <td class="px-4 py-3 text-right">$32,495</td>
            </tr>
          </tbody>
        </table>
      </div>
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
