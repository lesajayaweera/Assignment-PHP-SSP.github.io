<?php include("./src/private/initialize.php");?>
<?php $pageTitle = "About Us";
$script = "AboutUs";
?>
<?php include_once (SHARED_PATH . '/customer_header.php'); ?>
      
    <section class="bg-white py-30  font-family-montserrat">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <!-- Breadcrumb -->
          <p class="text-sm text-gray-500 mb-2">
            <a href="/Assignment/" class="hover:underline transition">Home</a> / <span class="text-black">About Us</span>
          </p>
      
          <!-- Title -->
          <h1 class="text-3xl font-bold text-gray-900 mb-6">About Us</h1>
      
          <!-- Tagline and paragraph section -->
          <div class="grid md:grid-cols-2 gap-8 mb-16">
            <div>
              <h2 class="text-2xl font-bold text-gray-900 mb-4">
                We Value Our Clients And <br />
                Want Them To Have A Nice <br />
                Experience
              </h2>
            </div>
            <div class="text-gray-600 space-y-4">
              <p>
                Lorem ipsum dolor sit amet consectetur. Convallis integer enim eget sit
                urna. Eu dui lectus amet vestibulum varius. Nibh tellus sit et lorem
                facilisis. Nunc vulputate ac interdum aliquet vestibulum in tellus.
              </p>
              <p>
                Sit convallis rhoncus dolor purus amet orci urna. Lobortis vulputate
                vestibulum consectetur donec ipsum egestas velit laoreet justo. Eu
                dignissim egestas egestas ipsum. Sit est nunc pellentesque at a aliquam
                ultrices consequat. Velit duis velit nec amet eget eu morbi. Libero non
                diam sit viverra dignissim. Aliquam tincidunt in cursus euismod enim.
              </p>
              <p>
                Magna odio sed ornare ultrices. Id lectus mi amet sit at sit arcu mi
                nisl. Mauris egestas arcu mauris.
              </p>
            </div>
          </div>
      
          <!-- Image section -->
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            <!-- Badge and small image -->
            <div class="flex flex-col  items-center space-y-4">
              <div class="bg-black  text-white rounded-xl px-6 py-8 text-center shadow-md w-full">
                <div class="text-3xl font-bold">45</div>
                <div class="text-lg">Years in Business</div>
              </div>
              <img src="/Assignment/assets/images/AboutUs page/handshake.jpg" alt="Handshake" class="rounded-lg w-full h-auto object-cover max-w-[600px]" />
              <div class="bg-black  text-white rounded-xl px-6 py-8 text-center shadow-md w-full">
                <div class="text-3xl font-bold">100+</div>
                <div class="text-lg">Countries in Business</div>
              </div>
            </div>
      
            <!-- Main person image -->
            <div>
              <img src="/Assignment/assets/images/AboutUs page/person in a car.jpg" alt="Person with car" class="rounded-lg w-full h-auto object-cover" />
            </div>
      
            <!-- Grid of 3 images -->
            <div class="grid grid-cols-2 gap-4">
              <img src="/Assignment/assets/images/AboutUs page/car showroom.jpg" alt="Car showroom" class="rounded-lg w-full h-auto object-cover col-span-2" />
              <img src="/Assignment/assets/images/AboutUs page/car rear.jpg   " alt="Car rear" class="rounded-lg w-full h-auto object-cover" />
              <img src="/Assignment/assets/images/AboutUs page/key handover.jpg" alt="Keys handover" class="rounded-lg w-full h-auto object-cover" />
            </div>
          </div>
        </div>
      </section>
      <section class="py-16 bg-white font-family-montserrat">
        <div class="max-w-7xl mx-auto px-4 text-center">
          <h2 class="text-3xl font-bold text-gray-900 mb-12">Why Choose Us?</h2>
      
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="flex flex-col items-center">
              <div class="text-blue-500 text-4xl mb-4">
                <!-- Replace with your SVG icon or Lucide icon -->
                <img src="/Assignment/assets/icons/financing.png" alt="" class="h-10 w-10" />
              </div>
              <h4 class="font-semibold text-lg">Special Financing Offers</h4>
              <p class="text-sm text-gray-600 mt-2">Our stress-free finance department that can find financial solutions to save you money.</p>
            </div>
      
            <!-- Feature 2 -->
            <div class="flex flex-col items-center">
              <div class="text-blue-500 text-4xl mb-4">
                <!-- Icon -->
                <img src="/Assignment/assets/icons/dealership.png" alt="" class="h-10 w-10" />
              </div>
              <h4 class="font-semibold text-lg">Trusted Car Dealership</h4>
              <p class="text-sm text-gray-600 mt-2">Our stress-free finance department that can find financial solutions to save you money.</p>
            </div>
      
            <!-- Feature 3 -->
            <div class="flex flex-col items-center">
              <div class="text-blue-500 text-4xl mb-4">
                <!-- Icon -->
                <img src="/Assignment/assets/icons/pricing.png" alt="" class="h-10 w-10" />
              </div>
              <h4 class="font-semibold text-lg">Transparent Pricing</h4>
              <p class="text-sm text-gray-600 mt-2">Our stress-free finance department that can find financial solutions to save you money.</p>
            </div>
      
            <!-- Feature 4 -->
            <div class="flex flex-col items-center">
              <div class="text-blue-500 text-4xl mb-4">
                <!-- Icon -->
                <img src="/Assignment/assets/icons/service.png" alt="" class="h-10 w-10" />
              </div>
              <h4 class="font-semibold text-lg">Expert Car Service</h4>
              <p class="text-sm text-gray-600 mt-2">Our stress-free finance department that can find financial solutions to save you money.</p>
            </div>
          </div>
        </div>
      </section>
      
      <section class="bg-gray-50 py-12 font-family-montserrat">
        <div class="max-w-7xl mx-auto px-4">
          <!-- Header -->
          <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Explore Our Premium Brands</h2>
            <a href="#" id="show-more-btn" class="text-sm text-gray-500 hover:text-black flex items-center space-x-1">
              <span>Show All Brands</span>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
              </svg>
            </a>
          </div>
      
          <!-- Brand Cards Grid -->
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4" id="brand-list">
            <!-- Audi -->
            <div class="flex flex-col items-center justify-center border rounded-lg p-4 bg-white hover:shadow-md transition">
              <img src="/Assignment/assets/images/audi.png" alt="Audi" class="h-10 mb-2" />
              <span class="text-sm text-gray-700">Audi</span>
            </div>
      
            <!-- BMW -->
            <div class="flex flex-col items-center justify-center border rounded-lg p-4 bg-white hover:shadow-md transition">
              <img src="/Assignment/assets/images/bmw.png" alt="BMW" class="h-10 mb-2" />
              <span class="text-sm text-gray-700">BMW</span>
            </div>
      
            <!-- Ford -->
            <div class="flex flex-col items-center justify-center border rounded-lg p-4 bg-white hover:shadow-md transition">
              <img src="/Assignment/assets/images/ford.png" alt="Ford" class="h-10 mb-2" />
              <span class="text-sm text-gray-700">Ford</span>
            </div>
      
            <!-- Mercedes Benz -->
            <div class="flex flex-col items-center justify-center border rounded-lg p-4 bg-white hover:shadow-md transition">
              <img src="/Assignment/assets/images/benz.png" alt="Mercedes Benz" class="h-10 mb-2" />
              <span class="text-sm text-gray-700 text-center">Mercedes Benz</span>
            </div>
      
            <!-- Land Rover -->
            <div class="flex flex-col items-center justify-center border rounded-lg p-4 bg-white hover:shadow-md transition">
              <img src="/Assignment/assets/images/land rover.png" alt="land Rover" class="h-10 mb-2" />
              <span class="text-sm text-gray-700">Land Rover</span>
            </div>
      
            <!-- Rolls Royce -->
            <div class="flex flex-col  items-center justify-center border rounded-lg p-4 bg-white hover:shadow-md transition">
              <img src="/Assignment/assets/images/ferrari.png" alt="Ferrari" class="h-10 mb-2" />
              <span class="text-sm text-gray-700">Ferrari</span>
            </div>
            <div class="flex flex-col hidden items-center justify-center border rounded-lg p-4 bg-white hover:shadow-md transition">
              <img src="/Assignment/assets/images/lamborghini.png" alt="lamborghini" class="h-10 mb-2" />
              <span class="text-sm text-gray-700">Lamborghini</span>
            </div>
            <div class="flex flex-col hidden items-center justify-center border rounded-lg p-4 bg-white hover:shadow-md transition">
              <img src="/Assignment/assets/images/bugatti.png" alt="bugatti" class="h-10 mb-2" />
              <span class="text-sm text-gray-700">Bugatti</span>
            </div>
            
          </div>
        </div>
      </section>
      
      <section class="bg-white py-16 font-family-montserrat">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <!-- Video + Text Section -->
          <div class="grid md:grid-cols-2 gap-8 bg-gray-100 p-8 rounded-xl">
            <!-- Left: Image with play button -->
            <div class=" rounded-xl overflow-hidden">
              <img src="/Assignment/assets/images/AboutUs page/car.jpg" alt="Car on road" class="w-full h-full object-cover rounded-xl" />
              
            </div>
      
            <!-- Right: Text and bullet points -->
            <div class="flex flex-col justify-center">
              <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">
                Get A Fair Price For Your Car<br />
                Sell To Us Today
              </h2>
              <p class="text-gray-600 mb-6">
                We are committed to providing our customers with exceptional service, competitive pricing, and a wide range of.
              </p>
              <ul class="space-y-3 mb-6">
                <li class="flex items-start">
                  <span class="text-blue-600 mt-1 mr-2">✔️</span>
                  <span class="text-gray-700">We are the UK’s largest provider, with more patrols in more places</span>
                </li>
                <li class="flex items-start">
                  <span class="text-blue-600 mt-1 mr-2">✔️</span>
                  <span class="text-gray-700">You get 24/7 roadside assistance</span>
                </li>
                <li class="flex items-start">
                  <span class="text-blue-600 mt-1 mr-2">✔️</span>
                  <span class="text-gray-700">We fix 4 out of 5 cars at the roadside</span>
                </li>
              </ul>
              <a href="/Assignment/Login" class="inline-flex items-center px-6 py-3 bg-white text-black text-sm font-medium rounded-lg shadow hover:bg-black hover:text-white border hover:border-white transition">
                Get Started
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
              </a>
            </div>
          </div>
      
          <!-- Stats Section -->
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 mt-12 text-center">
            <div>
              <p class="text-2xl sm:text-3xl font-bold text-gray-900">836M</p>
              <p class="text-sm text-gray-600 mt-1">Cars For Sale</p>
            </div>
            <div>
              <p class="text-2xl sm:text-3xl font-bold text-gray-900">738M</p>
              <p class="text-sm text-gray-600 mt-1">Dealer Reviews</p>
            </div>
            <div>
              <p class="text-2xl sm:text-3xl font-bold text-gray-900">95M</p>
              <p class="text-sm text-gray-600 mt-1">Visitors Per Day</p>
            </div>
            <div>
              <p class="text-2xl sm:text-3xl font-bold text-gray-900">238M</p>
              <p class="text-sm text-gray-600 mt-1">Verified Dealers</p>
            </div>
          </div>
        </div>
      </section>
      <section class="bg-white py-16 font-family-montserrat">
        <div class="max-w-7xl mx-auto px-6">
          <!-- Header -->
          <div class="flex justify-between items-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Our Team</h2>
            <a href="#" class="text-sm text-gray-600 hover:text-black flex items-center gap-1">
              View All <span class="text-xs">↗</span>
            </a>
          </div>
      
          <!-- Team Grid -->
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8" id="images">
            <!-- Team Member -->
            <div>
              <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e" alt="Courtney Henry" class="rounded-xl w-full h-80 object-cover mb-4">
              <h4 class="text-lg font-semibold text-gray-900">Courtney Henry</h4>
              <p class="text-sm text-gray-600">Development Manager</p>
            </div>
      
            <!-- Team Member -->
            <div>
              <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e" alt="Jerome Bell" class="rounded-xl w-full h-80 object-cover mb-4">
              <h4 class="text-lg font-semibold text-gray-900">Jerome Bell</h4>
              <p class="text-sm text-gray-600">Software Tester</p>
            </div>
      
            <!-- Team Member -->
            <div>
              <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2" alt="Arlene McCoy" class="rounded-xl w-full h-80 object-cover mb-4">
              <h4 class="text-lg font-semibold text-gray-900">Arlene McCoy</h4>
              <p class="text-sm text-gray-600">Software Developer</p>
            </div>
      
            <!-- Team Member -->
            <div>
              <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2" alt="Jenny Wilson" class="rounded-xl w-full h-80 object-cover mb-4">
              <h4 class="text-lg font-semibold text-gray-900">Jenny Wilson</h4>
              <p class="text-sm text-gray-600">UI/UX Designer</p>
            </div>
          </div>
        </div>
      </section>
      
      <section class="bg-gray-50 py-16 font-family-montserrat">
        <div class="max-w-7xl mx-auto px-6">
          <!-- Header -->
          <div class="flex justify-between items-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">What our customers say</h2>
            
          </div>
      
          <!-- Testimonials -->
          <div class="grid md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-2xl shadow-md">
              <div class="mb-4">
                <h4 class="font-semibold text-gray-900">Great Work</h4>
                <span class="text-3xl text-gray-400">“</span>
              </div>
              <p class="text-gray-700 text-sm mb-6">
                Amazing design, easy to customize and a design quality superlative account on its cloud platform for the optimized performance. And we didn’t on our original designs.
              </p>
              <div class="flex items-center space-x-4">
                <img class="w-10 h-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                <div>
                  <p class="font-medium text-sm text-gray-900">Leslie Alexander</p>
                  <p class="text-xs text-gray-500">Facebook</p>
                </div>
              </div>
            </div>
      
            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-2xl shadow-md">
              <div class="mb-4">
                <h4 class="font-semibold text-gray-900">Awesome Design</h4>
                <span class="text-3xl text-gray-400">“</span>
              </div>
              <p class="text-gray-700 text-sm mb-6">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
              </p>
              <div class="flex items-center space-x-4">
                <img class="w-10 h-10 rounded-full" src="https://randomuser.me/api/portraits/women/65.jpg" alt="">
                <div>
                  <p class="font-medium text-sm text-gray-900">Jenny Wilson</p>
                  <p class="text-xs text-gray-500">UI/UX Designer</p>
                </div>
              </div>
            </div>
      
            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-2xl shadow-md">
              <div class="mb-4">
                <h4 class="font-semibold text-gray-900">Perfect Quality</h4>
                <span class="text-3xl text-gray-400">“</span>
              </div>
              <p class="text-gray-700 text-sm mb-6">
                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.
              </p>
              <div class="flex items-center space-x-4">
                <img class="w-10 h-10 rounded-full" src="https://randomuser.me/api/portraits/men/44.jpg" alt="">
                <div>
                  <p class="font-medium text-sm text-gray-900">Courtney Henry</p>
                  <p class="text-xs text-gray-500">Software Developer</p>
                </div>
              </div>
            </div>
          </div>
      
          <!-- Navigation Arrows -->
          <div class="flex justify-start space-x-3 mt-10">
            <button class="p-2 rounded-full bg-white shadow hover:bg-gray-100">
              <span>&larr;</span>
            </button>
            <button class="p-2 rounded-full bg-white shadow hover:bg-gray-100">
              <span>&rarr;</span>
            </button>
          </div>
        </div>
      </section>
      <section class="bg-white py-16 font-family-montserrat">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">Frequently Asked Questions</h2>
      
          <!-- Accordion Container -->
          <div class="space-y-4">
            <!-- FAQ Item -->
            <div class="hover:bg-gray-50 p-6 rounded-lg">
              <button onclick="toggleFAQ(0)" class="flex justify-between items-center w-full text-left">
                <span class="text-gray-800 font-medium">Does BoxCar own the cars I see online or are they owned by other.</span>
                <span id="icon-0" class="text-2xl">−</span>
              </button>
              <div id="answer-0" class="mt-4 text-sm text-gray-600">
                Cras vitae ac nunc orci. Purus amet tortor non at phasellus ultricies hendrerit. Eget a, sit morbi nunc sit id massa.
                Metus, scelerisque volutpat nec sit vel donec. Sagittis, id volutpat erat vel.
              </div>
            </div>
      
            <!-- FAQ Item -->
            <div class="p-6 rounded-lg hover:bg-gray-50 transition">
              <button onclick="toggleFAQ(1)" class="flex justify-between items-center w-full text-left">
                <span class="text-gray-800 font-medium">How do you choose the cars that you sell?</span>
                <span id="icon-1" class="text-2xl">+</span>
              </button>
              <div id="answer-1" class="mt-4 text-sm text-gray-600 hidden">
                We select our cars based on quality, maintenance history, and performance, ensuring only the best are listed.
              </div>
            </div>
      
            <!-- Add More FAQ Items As Needed -->
            <div class="p-6 rounded-lg hover:bg-gray-50 transition">
              <button onclick="toggleFAQ(2)" class="flex justify-between items-center w-full text-left">
                <span class="text-gray-800 font-medium">Can I save my favorite cars to a list I can view later?</span>
                <span id="icon-2" class="text-2xl">+</span>
              </button>
              <div id="answer-2" class="mt-4 text-sm text-gray-600 hidden">
                Yes, you can create an account to save cars and access your favorites from any device.
              </div>
            </div>
      
            <div class="p-6 rounded-lg hover:bg-gray-50 transition">
              <button onclick="toggleFAQ(3)" class="flex justify-between items-center w-full text-left">
                <span class="text-gray-800 font-medium">Can I be notified when cars I like are added to your inventory?</span>
                <span id="icon-3" class="text-2xl">+</span>
              </button>
              <div id="answer-3" class="mt-4 text-sm text-gray-600 hidden">
                Absolutely! Enable notifications and we’ll alert you when matching cars are listed.
              </div>
            </div>
      
            <div class="p-6 rounded-lg hover:bg-gray-50 transition">
              <button onclick="toggleFAQ(4)" class="flex justify-between items-center w-full text-left">
                <span class="text-gray-800 font-medium">What tools do you have to help me find the right car for me and my budget?</span>
                <span id="icon-4" class="text-2xl">+</span>
              </button>
              <div id="answer-4" class="mt-4 text-sm text-gray-600 hidden">
                Use our smart filters and affordability calculator to find your ideal car based on price, mileage, and more.
              </div>
            </div>
          </div>
        </div>
      </section>
      
<?php include_once (SHARED_PATH . '/customer_footer.php'); ?>
      
    

<!-- npx @tailwindcss/cli -i ./src/css/main.css -o ./src/output.css --watch -->