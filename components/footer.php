 <!-- About Section -->
 <section id="about" class="container py-5">
     <h2 class="text-center mb-4 section-heading">About Game Store</h2>
     <p class="text-center">Game Store is the premier destination for elite gamers seeking the latest and greatest gear.
         From headsets and keyboards to exclusive merchandise, we supply the best to fuel your passion. Our team is made of
         dedicated gamers who know what you want and deliver it fast.</p>
 </section>

 <!-- footer -->
 <footer class="py-4">
     <div class="container text-center">
         <!-- Social Media Icons -->
         <div class="social-icons mb-3">
             <a href="https://www.instagram.com/erbil_polytechnic_university?igsh=MXZyM3R5MmR3ZHI4Zg==" target="_blank" class="social-icon me-3">
                 <i class="fab fa-instagram fa-lg"></i>
             </a>
             <a href="https://www.facebook.com/share/15z8EEPEdF/?mibextid=wwXIfr" target="_blank" class="social-icon">
                 <i class="fab fa-facebook fa-lg"></i>
             </a>
         </div>

         <p>&copy; 2025 Game Store. All rights reserved.</p>
     </div>
 </footer>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

 <script>
     function searchRedirect(event) {

         event.preventDefault();
         const query = document.getElementById("searchInput").value.trim().toLowerCase();

         if (query === "games" || query === "game") {
             window.location.href = "games.html";
         }

         if (query === "discount" || query === "discounts") {
             window.location.href = "discount.html";
         }
         if (query === "headset" || query === "headsets") {
             window.location.href = "headsetspage.html";
         }
     }
 </script>

 </body>

 </html>