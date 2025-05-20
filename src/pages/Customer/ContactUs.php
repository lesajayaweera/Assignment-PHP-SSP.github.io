<?php require_once("./src/private/initialize.php");?>
<?php
$pageTitle = "Contact Us";
$script = "Listing";?>
<?php include_once(SHARED_PATH . '/customer_header.php');?>
    <section class="bg-white py-30 font-family-montserrat">
        <!-- Map Embed -->
        <div class="w-full h-96">
          
          <iframe class="w-full h-full border-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31687.80372271747!2d79.88771604069434!3d6.893537958746933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25990379a8a4f%3A0x4b887a5266410b49!2sSri%20Jayawardenepura%20Kotte!5e0!3m2!1sen!2slk!4v1744970702310!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      
        <!-- Contact Form + Info -->
        <div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-10">
          <!-- Form -->
          <div class="lg:col-span-2">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Get In Touch</h2>
            <p class="text-gray-500 mb-8">Etiam pharetra egestas interdum blandit viverra morbi consequat mi non bibendum egestas quam egestas nulla.</p>
            
            <form class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">First Name*</label>
                <input type="text" placeholder="Jhon" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name*</label>
                <input type="text" placeholder="Hamilton" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email*</label>
                <input type="email" placeholder="example@gmail.com" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone*</label>
                <input type="tel" placeholder="+90 123 456 789" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
              </div>
              <div class="col-span-1 sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                <textarea rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 font-family-montserrat" placeholder="Your message..."></textarea>
              </div>
              <div class="col-span-1 sm:col-span-2">
                <button type="button" class="bg-black text-white px-6 py-2 rounded-md hover:bg-white hover:text-black hover:border transition">Send Message</button>
              </div>
            </form>
          </div>
      
          <!-- Contact Details -->
          <div class="bg-gray-50 rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Contact details</h3>
            <p class="text-sm text-gray-600 mb-6">
              Etiam pharetra egestas interdum blandit viverra morbi consequat mi non bibendum egestas quam egestas nulla.
            </p>
            <ul class="space-y-4 text-sm text-gray-800">
              <li>
                <strong class="block text-gray-600 mb-1">📍 Address</strong>
                123 Queensberry Street, North Melbourne VIC3051, Australia.
              </li>
              <li>
                <strong class="block text-gray-600 mb-1">✉️ Email</strong>
                ali@boxcars.com
              </li>
              <li>
                <strong class="block text-gray-600 mb-1">📞 Phone</strong>
                +86 968 123 456
              </li>
            </ul>
            <div class="mt-6 flex space-x-4">
              <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-twitter"></i></a>
              <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </section>
      <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 font-family-montserrat">
        <div class="max-w-7xl mx-auto">
          <h2 class="text-2xl font-bold text-gray-900 mb-10">Our Offices</h2>
      
          <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-sm text-gray-700">
            <!-- San Francisco Office -->
            <div>
              <h3 class="font-semibold text-gray-900 mb-2">San Francisco</h3>
              <p>456 Dewey Blvd, San Francisco,<br> CA 94116, USA</p>
              <a href="#" class="inline-block mt-2 text-blue-600 hover:underline text-xs">
                See on Map <span aria-hidden="true">↗</span>
              </a>
              <div class="mt-4 flex items-center space-x-3">
                <span>📧</span>
                <span>sfteam@boxcars.com</span>
              </div>
              <div class="mt-1 flex items-center space-x-3">
                <span>📞</span>
                <span>+86 658 123 456</span>
              </div>
            </div>
      
            <!-- New York Office -->
            <div>
              <h3 class="font-semibold text-gray-900 mb-2">New York</h3>
              <p>232–240 Wilton Ave, Brooklyn,<br> NY 11237, USA</p>
              <a href="#" class="inline-block mt-2 text-blue-600 hover:underline text-xs">
                See on Map <span aria-hidden="true">↗</span>
              </a>
              <div class="mt-4 flex items-center space-x-3">
                <span>📧</span>
                <span>ny@boxcars.com</span>
              </div>
              <div class="mt-1 flex items-center space-x-3">
                <span>📞</span>
                <span>+76 958 123 456</span>
              </div>
            </div>
      
            <!-- London Office -->
            <div>
              <h3 class="font-semibold text-gray-900 mb-2">London</h3>
              <p>127–143 Borough High St.,<br> London SE1 1NP, UK</p>
              <a href="#" class="inline-block mt-2 text-blue-600 hover:underline text-xs">
                See on Map <span aria-hidden="true">↗</span>
              </a>
              <div class="mt-4 flex items-center space-x-3">
                <span>📧</span>
                <span>ali2@boxcars.com</span>
              </div>
              <div class="mt-1 flex items-center space-x-3">
                <span>📞</span>
                <span>+96 222 333 888</span>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php include_once(SHARED_PATH. "/customer_footer.php") ?>
      