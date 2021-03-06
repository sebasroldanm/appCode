 <!-- s-footer
    ================================================== -->
 <footer class="s-footer">

     <div class="s-footer__main">
         <div class="row">

             <div class="col-six tab-full s-footer__about">

                 <h4>About Wordsmith</h4>

                 <p>Fugiat quas eveniet voluptatem natus. Placeat error temporibus magnam sunt optio aliquam. Ut ut occaecati placeat at.
                     Fuga fugit ea autem. Dignissimos voluptate repellat occaecati minima dignissimos mollitia consequatur.
                     Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa error
                     temporibus magnam est voluptatem.</p>

             </div> <!-- end s-footer__about -->

             <div class="col-six tab-full s-footer__subscribe">

                 <h4>Our Newsletter</h4>

                 <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.</p>

                 <!-- <div class="subscribe-form">
                     <form method="POST" id="newstter_form" class="group" novalidate="true">

                         <input type="email" style="color: white;" value="" name="email" class="email" id="newsletter-input" placeholder="Email Address" required="">

                         <div class="btn" id="newsletter-send">Send</div>

                         <label for="mc-email" style="color: white;" class="subscribe-message"></label>

                     </form>
                 </div> -->

                 <div class="subscribe-form">
                     <form method="POST" id="mc-form" class="group" novalidate="true">

                         <input type="email" value="" name="email" class="email" id="mc-email" placeholder="Email Address" required="">

                         <!-- <input type="submit" name="subscribe" value="Send"> -->
                         <div class="btn" type="submit" id="newsletter-send">Subscibirme</div>

                         <label for="mc-email" class="subscribe-message"></label>

                     </form>
                 </div>

             </div> <!-- end s-footer__subscribe -->

         </div>
     </div> <!-- end s-footer__main -->

     <div class="s-footer__bottom">
         <div class="row">

             <div class="col-six">
                 <ul class="footer-social">
                     <li>
                         <a href="#0"><i class="fab fa-facebook"></i></a>
                     </li>
                     <li>
                         <a href="#0"><i class="fab fa-twitter"></i></a>
                     </li>
                     <li>
                         <a href="#0"><i class="fab fa-instagram"></i></a>
                     </li>
                     <li>
                         <a href="#0"><i class="fab fa-youtube"></i></a>
                     </li>
                     <li>
                         <a href="#0"><i class="fab fa-pinterest"></i></a>
                     </li>
                 </ul>
             </div>

             <div class="col-six">
                 <div class="s-footer__copyright">
                     <span>
                         <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                         Copyright &copy;<script>
                             document.write(new Date().getFullYear());
                         </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                         <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     </span>
                 </div>
             </div>

         </div>
     </div> <!-- end s-footer__bottom -->

     <div class="go-top">
         <a class="smoothscroll" title="Back to Top" href="#top"></a>
     </div>

 </footer> <!-- end s-footer -->


 <!-- Java Script
    ================================================== -->
 <script src="<?= base_url() ?>/assets/js/jquery-3.2.1.min.js"></script>
 <script src="<?= base_url() ?>/assets/js/plugins.js"></script>
 <script src="<?= base_url() ?>/assets/js/main.js"></script>

 <!-- Summernote -->

 <!-- include libraries(jQuery, bootstrap) -->
 <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
 <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <!-- include summernote css/js -->
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

 <!-- Summernote -->

 <script type="text/javascript">
     $("#newsletter-send").click(function() {
         console.log("Se ha clickeado")
         var inputemail = $("#mc-email").val()
         $.post("<?php base_url() ?>/addNewsLetter", {email:inputemail}).done(function(data) {
             console.log("Enviando Post")
             console.log(data)
             $(".subscribe-message").html(data)
         });
     });
 </script>

 </body>

 </html>