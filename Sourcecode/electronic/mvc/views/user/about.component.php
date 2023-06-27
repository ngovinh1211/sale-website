<div class="wraper">
    <div class="navbar__header">
        <?php
                require_once('./mvc/views/user/header.component.php');
        ?>
    </div>
    <div class="about__container">
        <div class="about__image">
                <img src="https://cdn.pickr.com.au/wp-content/uploads/2020/05/2D22CB63-B929-464D-A8DE-C74F92AE23C1.jpeg" alt="">
        </div>
        <div class="about">
                <div class="about__body">
                        <div class="about__introduce">
                                <h1>INTRODUCE</h1>
                        </div>
                        <div class="about__information">
                                <div class="about__title">
                                        <h3>HISTORY BEGIN</h3>
                                </div>
                                <div class="about__content">
                                        <p>Liberty Electronics is a shop selling various electronic products.The company advertises by distributing the pamphlets, advertising on television and so on.</p>
                                        <p>Currently, in the field of electronic products, especially cellphones, LIBERTY ELECTRONICS can be proud of being one of the most famous and prestigious brands with a lot of love and affection from customers.</p>
                                        <p>LIBERTY ELECTRONICS always looks forward to welcoming you all at this website address or at its shops, whether you come to us to buy goods or just to visit, advice on shopping, use and maintenance our products.</p>
                                        <p>Sincerely thank you for your attention to LIBERTY ELECTRONICS - Wishing you health and happiness! It is our pleasure to contribute to your joy, beauty and happiness!</p>
                                        <p><img src="https://vnn-imgs-a1.vgcloud.vn/znews-photo.zingcdn.me/w860/Uploaded/spluaaa/2022_05_04/Gioi_thieu_iphone.jpg" alt=""></p>
                                        <p><img src="https://image.cellphones.com.vn/640x/media/wysiwyg/dia-chi-cua-hang/asp_4.jpg" alt=""></p>

                                </div>
                        </div>
                        <div class="about__information">
                                <div class="about__title">
                                        <h3>INFORMATION ABOUT LIBERTY ELECTRONICS</h3>
                                </div>
                                <div class="about__content">
                                        <p>Liberty Electronics is a shop selling various electronic products.The company advertises by distributing the pamphlets, advertising on television and so on.</p>
                                        <p>Currently, in the field of electronic products, especially cellphones, LIBERTY ELECTRONICS can be proud of being one of the most famous and prestigious brands with a lot of love and affection from customers.</p>
                                        <p>LIBERTY ELECTRONICS always looks forward to welcoming you all at this website address or at its shops, whether you come to us to buy goods or just to visit, advice on shopping, use and maintenance our products.</p>
                                        <p>Sincerely thank you for your attention to LIBERTY ELECTRONICS - Wishing you health and happiness! It is our pleasure to contribute to your joy, beauty and happiness!</p>
                                        <p>
                                        Phone: (024) 3999 9999 | Hotline: 0989 999 999 - 0988 888 999 <br>
                                        Website: <a href="https://cellphones.com.vn/">http://libertyelectronics.vn</a> | Email: <a href="mailto: libertyelectronics@gmail.com">libertyelectronics@gmail.com</a> <br>
                                        Facebook: <a href="https://www.facebook.com/libertyelectronics/" target="_blank">Liberty Electronics</a>
                                        </p>
                                </div>
                        </div>
                        <div class="about__information">
                                <div class="about__title">
                                        <h3>SHOWROOM SYSTEM</h3>
                                </div>
                                <div class="about__content">
                                        <p><img src="https://www.apple.com/newsroom/images/environments/stores/Apple_New-store-opening-Yas-Mall_interior_Full-Bleed-Image.jpg.slideshow-xlarge_2x.jpg" alt=""></p>
                                        <div class="about__address">
                                                <h4>LIBERTY ELECTRONICS Doi Can</h4>
                                                <p>Address: 285 Doi Can, Ba Dinh, Hanoi <br>
                                                Phone: (024) 3999 9999 | Hotline: 0989 999 999 - 0988 888 999 
                                                </p>
                                        </div>
                                        
                                       
                                </div>
                        </div>
                </div>
        </div>
</div>
<div class="media-button">
        <div id="share-circle">
            <div id="share1" class="share facebook" onclick="icon_select('share1');"><span class="icon-facebook"><i class="fab fa-facebook-messenger"></i></span></div>
            <div id="share2" class="share twitter" onclick="icon_select('share2');"><span class="icon-twitter"><i class="fad fa-phone"></i></span></div>
            <div id="share3" class="share googleplus" onclick="icon_select('share3');"><span class="icon-google-plus"><i class="fal fa-calendar-alt"></i></span></div>
            <div id="share4" class="share linkedin" onclick="icon_select('share4');"><span class="icon-linkedin2"></span><i class="fab fa-telegram"></i></div>


            <div id="share-button">
                <span id="shareicon" class="icon-share" onclick="share_expand();"><i class="far fa-phone-square-alt"></i></span>
                <span id="xicon" class="icon-x" style="display: none;" onclick="share_close();"><i class="fas fa-times"></i></span>
            </div>
        </div>
</div>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-double-up"></i></button>
<div class="footer mt-5">
        <?php
        require_once('./mvc/views/user/footer.component.php');
        ?>
    </div>
    <script>
    //Get the button:
    mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>
<script>
        // Big red button
        var redbutton = document.getElementById('share-button');
        var sharebutton = document.getElementById('shareicon');
        var xbutton = document.getElementById('xicon');

        // Mini share buttons
        var share1 = document.getElementById('share1');
        var share2 = document.getElementById('share2');
        var share3 = document.getElementById('share3');
        var share4 = document.getElementById('share4');

        function share_expand() {
            // Animation for the big red button with the share icon
            redbutton.className = 'share-button button-expand';
            sharebutton.className = 'icon-share share-expand';
            xbutton.style.display = 'block';
            xbutton.className = 'icon-x x-expand';

            // Opening the mini share buttons
            setTimeout(function() {
                share1.className = 'share facebook opened';
                share2.className = 'share twitter opened';
                share3.className = 'share googleplus opened';
                share4.className = 'share linkedin opened';
            }, 300);

            // setTimeout for the big red button with the share icon
            setTimeout(function() {
                sharebutton.className = 'icon-share closed';
                xbutton.className = 'icon-x expanded';
                sharebutton.style.display = 'none';
            }, 1000);
        }

        function share_close() {
            // Animation for the big red button with the share icon
            redbutton.className = 'share-button button-close';
            xbutton.className = 'icon-x x-close';
            sharebutton.style.opacity = '0';
            sharebutton.style.display = 'block';
            sharebutton.className = 'icon-share share-close';

            // Closing the mini share buttons
            share1.className = 'share facebook nodelay';
            share2.className = 'share twitter nodelay';
            share3.className = 'share googleplus nodelay';
            share4.className = 'share linkedin nodelay';


            // setTimeout for the big red button with the share icon
            setTimeout(function() {
                sharebutton.style.opacity = '1';
                sharebutton.className = 'icon-share';
                xbutton.className = 'icon-x';
                xbutton.style.display = 'none';

                // Closing the mini share buttons
                share1.className = 'share facebook';
                share2.className = 'share twitter';
                share3.className = 'share googleplus';
                share4.className = 'share linkedin';
            }, 1000);
        }
    </script>
    
<script>
    const navMobileBtn = document.querySelector('.js-mobile-btn')
    const mobileMenu = document.querySelector('.js-mobile-menu')
    var mobileOverlay = document.querySelector('.mobile-menu-overlay')

    navMobileBtn.onclick = function() {
        mobileMenu.style.transform = "scaleY(1)";
        mobileOverlay.style.display = "block";
    }

    mobileOverlay.onclick = function() {
        mobileMenu.style.transform = "scaleY(0)";
        mobileOverlay.style.display = "none";
    }
</script>
