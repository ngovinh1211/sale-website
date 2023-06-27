<div class="wraper">
    <div class="navbar__header">
        <?php
                require_once('./mvc/views/user/header.component.php');
        ?>
    </div>
       
    <div class="container" style="margin-top: 125px;">

        <h1 class="section_title">your order information</h1>
        <form action="" method="post" onsubmit="return completeCheckout();">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="detail_information">customer information</h1>
                    <div class="form-group">
                        <!-- <label for="fullname">FullName:</label> -->
                        <input required type="text" class="form-control" id="fullname" value="<?=$data['user']['fullname']?>" disabled>
                    </div>
                    <div class="form-group">
                        <!-- <label for="email">Email:</label> -->
                        <input required type="email" class="form-control" id="email" value="<?=$data['user']['email']?>" disabled>
                    </div>
                    <div class="form-group">
                        <!-- <label for="phone_number">Phone Number:</label> -->
                        <input required type="tel" class="form-control" id="phone_number" value="<?=$data['user']['phoneNo']?>" disabled>
                    </div>
                    <div class="form-group">
                        <!-- <label for="address">Address:</label> -->
                        <input required type="text" class="form-control" id="address" value="<?=$data['user']['address']?>" disabled>
                    </div>
                    <div class="form-group">
                        <!-- <label for="note">Note:</label> -->
                        <textarea name="note" id="note" class="form-control form-note" cols="30" rows="3" placeholder="Note"></textarea>
                    </div>
                </div>
                <div class="col-md-6" >
                    <h1 class="detail_information">product details you choose</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Title</th>
                                    <th>Storage</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalPrice = 0;
                                foreach ($data['order'] as $index => $product) {
                                    echo '<tr>
                                            <td>'.(++$index).'</td>
                                            <td>'.$product['title'].'</td>
                                            <td>'.$product['storage_id'].'</td>
                                            <td>'.$product['color_id'].'</td>
                                            <td>'.$product['price'].'</td>
                                            <td>'.$product['quantity'].'</td>
                                            <td>$'.$product['quantity']*$product['price'].'</td>
                                        </tr>';

                                    $totalPrice += (($product['quantity']*$product['price'])+10);
                                }
                                ?>
                            </tbody>
                            
                                <tr>
                                    <th colspan="4" style="text-align: center;">Total Money</th>
                                    <th>$<?=$totalPrice?></th>
                                </tr>
                        </table>
                        <a href=""><button class="btn btn-success" style="width: 100%;" onclick="myFunction()">Order</button></a>
                </div>
            </div>
        </form>
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
</div>
    <script>
        var fullname = document.getElementById('fullname');
        var email = document.getElementById('email');
        var phone_number = document.getElementById('phone_number');
        var address = document.getElementById('address');
        var note = document.getElementById('note');


        function myFunction() {
            if(fullname.value == '' || email.value == '' || phone_number.value == '' || address.value == '' ){
                alert('Please fill in all information');
                return false;
            }else{
                alert('Order created successfully');
            }

        }
    </script>
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
