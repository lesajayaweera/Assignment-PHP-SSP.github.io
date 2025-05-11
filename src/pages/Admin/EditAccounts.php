<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admin-Edit Accounts</title>
    <link rel="stylesheet" href="/Assignment/src/output.css">
</head>

<body class="bg-gray-100 font-family-monteserat">

    <!-- Mobile Sidebar Overlay -->
    <div id="mobileSidebar"
        class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform duration-300 lg:hidden">
        <div class="p-6 space-y-4">
            <h1 class="text-2xl font-bold mb-4">LuxCars</h1>
            <button onclick="toggleSidebar()" class="text-right w-full mb-6 text-gray-300">✕ Close</button>
            <nav class="space-y-3">
                <a href="" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                <a href="" class="block px-4 py-2  bg-gray-800 rounded">View Products</a>
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
                <a href="" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
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
                    <h2 class="text-2xl font-semibold">Edit Accounts</h2>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="text-sm">Mevi Roy</span>
                    <img src="../../../assets/images/profile pic3.jpg" alt="profile" class="w-10 h-10 rounded-full" />
                </div>
            </div>
            <section>
                <div class="max-w-4xl mx-auto p-8 bg-white rounded-2xl  shadow-md">
                    <div class="flex flex-col md:flex-row items-start justify-center md:items-center gap-8">
                        <!-- Profile Picture -->
                        <div class="flex-shrink-0 items-center justify-center ">
                            <img src="https://i.pravatar.cc/150?img=5" alt="Profile Photo"
                                class="h-32 w-32 rounded-full object-cover shadow">
                        </div>

                        <!-- Form Fields -->
                        <form class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                                <input title="input" type="text"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                                <div class="relative">
                                    <input title="input" type="text"
                                        class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm pr-10 focus:border-blue-500 focus:ring-blue-500 focus:outline-none" />
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input title="input" type="email"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <input title="input" type="password"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none" />
                            </div>

                            <!-- Save Button (spanning full width on mobile, bottom right on desktop) -->
                            <div class="md:col-span-2 flex justify-end w-full">
                                <button type="submit"
                                    class="rounded-lg bg-blue-600 px-6 py-2 text-white w-full md:w-fit  font-medium hover:bg-blue-700 transition">Save</button>
                            </div>
                        </form>
                    </div>
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