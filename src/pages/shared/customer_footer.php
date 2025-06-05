

<?php 

    // require_once("./src/php/Controller/BrandController.php");
    // $brand = new BrandController();
    // $result_brands = $brand->DisplayAll();

?>     
      
      <footer class="<?php echo ($pageTitle === 'Sign Up' || $pageTitle === 'Login') ? 'bg-black text-white' : 'bg-white text-gray-800'; ?> py-10 text-sm font-family-montserrat">
    <div class="w-full  mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 place-content-center items-center place-items-center" >

            <!-- Company -->
            <div class="    ">
                <h3 class="font-semibold mb-4">Company</h3>
                <ul class="space-y-2">
                    <li><a href="/Assignment/" class="hover:underline">Home</a></li>
                    <li><a href="/Assignment/About" class="hover:underline">About Us</a></li>
                    <li><a href="/Assignment/Login" class="hover:underline">Login</a></li>
                    <li><a href="/Assignment/Register" class="hover:underline">Register</a></li>
                    <li><a href="/Assignment/Listing" class="hover:underline">Listings</a></li>
                    <li><a href="/Assignment/Contactus" class="hover:underline">Contact Us</a></li>
                </ul>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="/Assignment/Login" class="hover:underline">Login</a></li>
                    <li><a href="/Assignment/Register" class="hover:underline">Register</a></li>
                    <li><a href="/Assignment/Listing" class="hover:underline">Listings</a></li>
                </ul>
            </div>

            <!-- Sale Hours -->
            <div>
                <h3 class="font-semibold mb-4">Sale Hours</h3>
                <ul class="space-y-1">
                    <li>Mon – Fri: 09:00AM – 09:00 PM</li>
                    <li>Saturday: 09:00AM – 07:00PM</li>
                    <li>Sunday: Closed</li>
                </ul>
            </div>

            <!-- Social Media -->
            <div>
                <h3 class="font-semibold mb-4">Connect With Us</h3>
                <div class="flex space-x-4">
                    <a href="#"><img src="/Assignment/assets/images/socialMedia/whatsapp.png" alt="WhatsApp" class="w-8 h-8 hover:opacity-80 transition" /></a>
                    <a href="#"><img src="/Assignment/assets/images/socialMedia/facebook.png" alt="Facebook" class="w-8 h-8 hover:opacity-80 transition" /></a>
                    <a href="#"><img src="/Assignment/assets/images/socialMedia/instagram.png" alt="Instagram" class="w-8 h-8 hover:opacity-80 transition" /></a>
                </div>
            </div>

        </div>

        <!-- Bottom Footer -->
        <div class="mt-10 border-t pt-6 flex flex-col md:flex-row justify-between items-center text-xs <?php echo ($pageTitle === 'Sign Up' || $pageTitle === 'Login') ? 'text-gray-400' : 'text-gray-500'; ?>">
            <p id="year">© <?php echo date("Y"); ?> exemple.com. All rights reserved.</p>
            <div class="space-x-4 mt-2 md:mt-0">
                <a href="#" class="hover:underline">Terms & Conditions</a>
                <a href="#" class="hover:underline">Privacy Notice</a>
            </div>
        </div>
    </div>
</footer>

      
      
    
    <script src="/Assignment/src/Js/index.js"></script>
    <script  src="<?php echo isset($script) ? '/Assignment/src/Js/' . $script . '.js' : ''; ?>"></script>
</body>
</html>

<!-- /Assignment/src/Js/Aboutus.js -->
