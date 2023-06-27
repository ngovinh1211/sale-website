<div class="wraper">
    <div class="navbar__header">
        <?php
        require_once('./mvc/views/user/header.component.php');
        $url = $data['url'];
        ?>
    </div>
    <div class="body">
        <div class="grid">
            <!-- MAIN SLIDE -->
            <div id="slider">
                <div class="container">
                    <div class="owl-carousel owl-theme" id="banner-slider">
                        <div class="item">
                            <a href=""><img src="<?=$url?>/public/img/Carousel/banner01.jpg"></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="<?=$url?>/public/img/Carousel/banner02.jpg"></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="<?=$url?>/public/img/Carousel/banner03.jpg"></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="<?=$url?>/public/img/Carousel/banner04.jpg"></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="<?=$url?>/public/img/Carousel/banner05.jpg"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN SLIDE -->
        </div>
        <!-- Category Nav -->
        <div class="products container">
            <ul class="nav-product v-center">
                <li class="nav-product__item">
                    Best Searching in 2022
                </li>
            </ul>
        </div>
        <div class="nav-suggest container">
            <div class="nav-suggest__titles-row row">
            <div class="col xlg-1-3 lg-1-3">
                    <div class="suggest__title-img ">
                        <a href="#cellphones">
                            <img src="<?=$url?>/public/img/Category-Nav/cellphone.png" alt="">
                            <p>Cellphones</p>
                        </a>
                    </div>
                </div>
                <div class="col xlg-1-3 lg-1-3">
                    <div class="suggest__title-img">
                        <a href="#tablet">
                            <img src="<?=$url?>/public/img/Category-Nav/ipad.png" alt="">
                            <p>Tablet</p>
                        </a>
                    </div>
                </div>
                <div class="col xlg-1-3 lg-1-3">
                    <div class="suggest__title-img">
                        <a href="#smartwatch">
                            <img src="<?=$url?>/public/img/Category-Nav/watch.png" alt="">
                            <p>SmartWatch</p>
                        </a>
                    </div>
                </div>
                <div class="col xlg-1-3 lg-1-3">
                    <div class="suggest__title-img">
                        <a href="#earphone">
                            <img src="<?=$url?>/public/img/Category-Nav/headphone.png" alt="">
                            <p>Earphone</p>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="introduce" id="cellphones">
            <div class="grid">
                <div class="yolo-title title-center yolo-title-margin-bottom">
                    <span class="content__tophead">Cellphones</span>
                    <p class="sub-title">The Search trends 2022</p>
                    <div class="arrow-down"></div>
                </div>
            </div>
        </div>
        <!-- Cellphones -->
        <div class="owl-carousel container" id="content-slider">
            <?php
            foreach ($data['cellphones'] as $index => $product) {
                echo '<div class="card-1">
                            <span class="like"><i class="fas fa-heart"></i></span>
                            <span class="cart"><i class="fas fa-cart-arrow-down"></i></span>
                            <div class="card__img">
                                <a href="'.$url.'/product/detail/'.$product['id'].'"><img src="' . str_replace("./public", "$url/public", $product['thumbnail']) . '" alt="" /></a>

                            </div>
                            <h2 class="card__title">' . $product['title'] . '</h2>
                            <p class="card__price">' . $product['price'] . '$</p>
                            <div class="card__size">
                                <h3>Brand:</h3>
                                <span class="';
                                switch ($product['brand_name']) {
                                    case 'Apple':
                                        echo 'brand1';
                                        break;
                                    case 'Samsung':
                                        echo 'brand2';
                                        break;
                                    case 'Oppo':
                                        echo 'brand3';
                                        break;
                                    case 'Xiaomi':
                                        echo 'brand4';
                                        break;
                                    default:
                                        echo 'green';
                                        break;
                                }    
                                echo '">' . $product['brand_name'] . '</span>
                            </div>
                    <div class="card__action">
                        <a href="'.$url.'/product/detail/'.$product['id'].'" ><button>Quick View</button></a>
                        <a href="'.$url.'/compare/addCompare/'.$product['id'].'" ><button>Compare</button></a>
                    </div>
                </div>';
            }
            ?>
        </div>
        <!-- Tablet -->
        <div class="introduce" id="tablet">
            <div class="grid">
                <div class="banner container">
                    <img src="<?=$url?>/public/img/banner/banner01.jpg" alt="">
                </div>
                <div class="yolo-title title-center yolo-title-margin-bottom">
                    <span class="content__tophead">Tablet</span>
                    <div class="arrow-down"></div>
                </div>
            </div>
        </div>
        <div class="products container">
            <ul class="nav-product v-center">
                <li class="nav-product__item">
                    <a href="" class='nav-product__item__title-link'>
                        SALE
                    </a>
                </li>
                <li class="nav-product__item">
                    <a href="" class='nav-product__item__title-link'>
                        FEATURED
                    </a>
                </li>
                <div class="showMore">
                    <a href="" class="showMore__link">
                        <span class="showMore__link__text">Show more</span>
                        <span class="showMore__link__icon"></span>
                        <i class="fas fa-angle-double-down"></i>
                    </a>
                </div>
            </ul>
            <div class="owl-carousel" id="explore-slider">
                <?php
                foreach ($data['tablet'] as $index => $product) {
                    echo '<div class="col xlg-2-4 lg-2-4 md-4 sm-6 xsm-12">
                                    <div class="product product--sale">
                                        <div class="product-img-info">
                                            <a href="'.$url.'/product/detail/' . $product['id'] . '" class="product__link">
                                                <img src="' . str_replace("./public", "$url/public", $product['thumbnail']) . '" class="product__img" alt="">
                                                <div class="product__sale">
                                                    SALE!
                                                </div>
                                            </a>
                                            <div class="item-box-hover">
                                                <div class="cart-wrap">
                                                    <i class="fas fa-shopping-cart"></i> ADD TO COMPARE
                                                </div>
                                                <div class="box-inner v-center">
                                                    <a href="" class="box-inner__item wishlist">
                                                        <i class="fas fa-heart"></i>
                                                        <div class="icon-script">Add to Wishlist</div>
                                                    </a>
                                                    <a href="'.$url.'/compare/addCompare/' . $product['id'] . '" class="box-inner__item compare">
                                                        <i class="fas fa-random"></i>
                                                        <div class="icon-script">Comparision</div>

                                                    </a>
                                                    <a href="'.$url.'/product/detail/' . $product['id'] . '" class="box-inner__item view">
                                                        <i class="fas fa-eye"></i>
                                                        <div class="icon-script">Quick View</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="'.$url.'/product/detail/' . $product['id'] . '" class="product__name">' . $product['title'] . '</a>
                                        <div class="product__price">
                                            <span class="new-price">$ '.$product['price'].'</span>
                                        </div>
                                        <div class="product__rating">
                                            <i class="far fa-star fas fa-star--gold"></i>
                                            <i class="far fa-star fas fa-star--gold"></i>
                                            <i class="far fa-star fas fa-star--gold"></i>
                                            <i class="far fa-star fas fa-star--gold"></i>
                                            <i class="far fa-star fas fa-star--gold"></i>
                                        </div>
                                    </div>
                                </div>';
                }
                ?>
            </div>
        </div>
        <!-- Smartwatch -->
        <div class="introduce" >
            <div class="grid">
                <div class="banner container">
                    <img src="<?=$url?>/public/img/banner/banner2.jpg" alt="">
                </div>
                <div class="yolo-title title-center yolo-title-margin-bottom">
                    <span class="content__tophead">SmartWatch</span>
                    <div class="arrow-down"></div>
                </div>
            </div>
        </div>
        <div class="products container" id="smartwatch">
            <ul class="nav-product v-center">
                <li class="nav-product__item">
                    <a href="" class='nav-product__item__title-link'>
                        BEST SELLING
                    </a>
                </li>
                <div class="showMore">
                    <a href="" class="showMore__link">
                        <span class="showMore__link__text">Show more</span>
                        <span class="showMore__link__icon"></span>
                        <i class="fas fa-angle-double-down"></i>
                    </a>
                </div>
            </ul>
            <div class="owl-carousel" id="bestSelling-slider">
                <?php
                foreach ($data['smartwatch'] as $index => $product) {
                    echo '<div class="col xlg-2-4 lg-2-4 md-4 sm-6 xsm-12">
                                    <div class="product ">
                                        <div class="product-img-info">
                                            <a href="'.$url.'/product/detail/' . $product['id'] . '" class="product__link">
                                                <img src="' . str_replace("./public", "$url/public", $product['thumbnail']) . '" class="product__img" alt="' . $product['title'] . '">
                                                <div class="product__sale">
                                                    SALE!
                                                </div>
                                            </a>
                                            <div class="item-box-hover">
                                                <div class="cart-wrap">
                                                    <i class="fas fa-shopping-cart"></i> ADD TO COMPARE
                                                </div>
                                                <div class="box-inner v-center">
                                                    <a href="" class="box-inner__item wishlist">
                                                        <i class="fas fa-heart"></i>
                                                        <div class="icon-script">Add to Wishlist</div>
                                                    </a>
                                                    <a href="'.$url.'/compare/addCompare/' . $product['id'] . '" class="box-inner__item compare">
                                                        <i class="fas fa-random"></i>
                                                        <div class="icon-script">Comparision</div>

                                                    </a>
                                                    <a href="'.$url.'/product/detail/' . $product['id'] . '" class="box-inner__item view">
                                                        <i class="fas fa-eye"></i>
                                                        <div class="icon-script">Quick View</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="'.$url.'/product/detail/' . $product['id'] . '" class="product__name">' . $product['title'] . '</a>
                                        <div class="product__price">
                                            <span class="new-price">$ '.$product['price'].'</span>
                                        </div>
                                        <div class="product__rating">
                                            <i class="far fa-star fas fa-star--gold"></i>
                                            <i class="far fa-star fas fa-star--gold"></i>
                                            <i class="far fa-star fas fa-star--gold"></i>
                                            <i class="far fa-star fas fa-star--gold"></i>
                                            <i class="far fa-star fas fa-star--gold"></i>
                                        </div>
                                    </div>
                                </div>';
                }
                ?>
            </div>
        </div>
        <!-- Earphone -->
        <div class="products container mt-3" id="earphone">
            <ul class="nav-product v-center">
                <li class="nav-product__item">
                    New Earphone Collection
                </li>
            </ul>
            <div class="newCollection">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="new-product__image-container">
                            <img src="<?=$url?>/public/img/banner/newCollection1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col xlg-3 lg-3 md-3 sm-6 xsm-o-1 xsm-10">
                        <div class="new-product__content">
                            <h2>THE NEW AIRPOD 3</h2>
                            <h4>NEW PRODUCTS</h4>
                            <p>The AirPods 3 headphones have many of the same designs as the AirPods Pro generation, but without the earplugs.
                                    This design brings a comfortable feeling to the user, suitable for most ear sizes.
                                    In particular, this design is suitable for users who often sweat without causing discomfort.
                                    The body of the ear is also made shorter and more compact.</p>
                            <button>BUY NOW</button>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel mt-5" id="newCollection-slider">
                    <?php
                    foreach ($data['earphone'] as $index => $product) {
                        echo '<div class="col xlg-2-4 lg-2-4 md-4 sm-6 xsm-12">
                                    <div class="product product--sale">
                                        <div class="product-img-info">
                                            <a href="'.$url.'/product/detail/' . $product['id'] . '" class="product__link">
                                                <img src="' . str_replace("./public", "$url/public", $product['thumbnail']) . '" class="product__img" alt="' . $product['title'] . '">
                                                <div class="product__sale">
                                                    SALE!
                                                </div>
                                            </a>
                                            <div class="item-box-hover">
                                                <div class="cart-wrap">
                                                    <i class="fas fa-shopping-cart"></i> ADD TO COMPARE
                                                </div>
                                                <div class="box-inner v-center">
                                                    <a href="" class="box-inner__item wishlist">
                                                        <i class="fas fa-heart"></i>
                                                        <div class="icon-script">Add to Wishlist</div>
                                                    </a>
                                                    <a href="'.$url.'/compare/addCompare/' . $product['id'] . '" class="box-inner__item compare">
                                                        <i class="fas fa-random"></i>
                                                        <div class="icon-script">Comparision</div>
                                                    </a>
                                                    <a href="'.$url.'/product/detail/' . $product['id'] . '" class="box-inner__item view">
                                                        <i class="fas fa-eye"></i>
                                                        <div class="icon-script">Quick View</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="'.$url.'/product/detail/' . $product['id'] . '" class="product__name">' . $product['title'] . '</a>
                                        <div class="product__price">
                                            <span class="new-price">$'.$product['price'].'</span>
                                        </div>
                                        <div class="product__rating">
                                            <i class="far fa-star fas fa-star--gold"></i>
                                            <i class="far fa-star fas fa-star--gold"></i>
                                            <i class="far fa-star fas fa-star--gold"></i>
                                            <i class="far fa-star fas fa-star--gold"></i>
                                            <i class="far fa-star fas fa-star--gold"></i>
                                        </div>
                                    </div>
                                </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Latest Post -->
        <div class="content__container container">
            <div class="content__suggest">
                <p class="content-title">Latest Post</p>
                <div class="content__slider">
                    <div class="owl-carousel" id="suggest-slider">
                        <div class="products__lastest-posts__item col xlg-4 lg-4 md-6 sm-6 xsm-12">
                            <a href="" class="products__lastest-posts__item__img img-effect-hover-1">
                                <img src="<?=$url?>/public/img/latest/img1.jpg" alt="">
                            </a>
                            <div class="products__lastest-posts__item__infor">
                                <div class="date-month">
                                    <div class="date-month__date">12</div>
                                    <div class="date-month__month">JUL</div>
                                </div>
                                <div class="products__lastest-posts__item__content">
                                    <a href="" class="author">Admin</a>
                                    <a href="" class="title">Latest news about iPhone 14</a>
                                    <div class="excerpt">
                                        A source from LeaksApplePro said that Apple is likely to "kill" the iPhone 11, after launching the new generation of iPhones in September.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="products__lastest-posts__item col xlg-4 lg-4 md-6 sm-6 xsm-12">
                            <a href="" class="products__lastest-posts__item__img img-effect-hover-1">
                                <img src="<?=$url?>/public/img/latest/OIP.jpg" alt="">
                            </a>
                            <div class="products__lastest-posts__item__infor">
                                <div class="date-month">
                                    <div class="date-month__date">06</div>
                                    <div class="date-month__month">JUL</div>
                                </div>
                                <div class="products__lastest-posts__item__content">
                                    <a href="" class="author">Admin</a>
                                    <a href="" class="title">Our new store is launching</a>
                                    <div class="excerpt">
                                        We are launching a new store very soon.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="products__lastest-posts__item col xlg-4 lg-4 md-6 sm-6 xsm-12">
                            <a href="" class="products__lastest-posts__item__img img-effect-hover-1">
                                <img src="<?=$url?>/public/img/latest/service.jpg" alt="">
                            </a>
                            <div class="products__lastest-posts__item__infor">
                                <div class="date-month">
                                    <div class="date-month__date">04</div>
                                    <div class="date-month__month">JUL</div>
                                </div>
                                <div class="products__lastest-posts__item__content">
                                    <a href="" class="author">Admin</a>
                                    <a href="" class="title">HIRING</a>
                                    <div class="excerpt">
                                    Looking for customer service staff.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-0 mb-7">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row row-fluid">
                            <div class="col-sm-4">
                                <div class="yolo-service-box">
                                    <div class="service-icon">
                                        <div class="service-icon-border"></div>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="service-icon-duplicate">
                                        <div class="service-icon-border"></div>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="service-text clearfix">
                                        <p class="sub-title">Weekly</p>
                                        <h2 class="title"><strong>Promotions</strong></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="yolo-service-box">
                                    <div class="service-icon">
                                        <div class="service-icon-border"></div>
                                        <i class="far fa-arrow-alt-circle-right"></i>
                                    </div>
                                    <div class="service-icon-duplicate">
                                        <div class="service-icon-border"></div>
                                        <i class="far fa-arrow-alt-circle-right"></i>
                                    </div>
                                    <div class="service-text clearfix">
                                        <p class="sub-title">Nationwide</p>
                                        <h2 class="title"><strong>Shipping</strong></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="yolo-service-box">
                                    <div class="service-icon">
                                        <div class="service-icon-border"></div>
                                        <i class="fas fa-redo-alt"></i>
                                    </div>
                                    <div class="service-icon-duplicate">
                                        <div class="service-icon-border"></div>
                                        <i class="fas fa-redo-alt"></i>
                                    </div>
                                    <div class="service-text clearfix">
                                        <p class="sub-title">In 7 days</p>
                                        <h2 class="title"><strong>Free Returns</strong></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="footer mt-5">
        <?php
        require_once('./mvc/views/user/footer.component.php');
        ?>
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
    var barBtn = document.querySelector('.js-bar')
    var modal = document.querySelector('.menu-modal')
    var closeBtn = document.querySelector('.js-close')
    var overlay = document.querySelector('.menu-overlay')

    barBtn.onclick = function() {
        modal.style.transform = "translateX(0)";
        overlay.style.display = "block";
    }
    closeBtn.onclick = function() {
        modal.style.transform = "translateX(100%)";
        overlay.style.display = "none";
    }
    overlay.onclick = function(event) {
        console.log('click');
        modal.style.transform = "translateX(100%)";
        overlay.style.display = "none";
    }
</script>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "flex";
        setTimeout(showSlides, 7500); // Change image every 3 seconds
    }
</script>

<script>
    const dot1 = document.querySelector('.js-dot-1')
    const dot2 = document.querySelector('.js-dot-2')

    dot2.addEventListener('click', function() {
        dot2.classList.add('manual-btn--active')
        dot1.classList.remove('manual-btn--active')
    })

    dot1.addEventListener('click', function() {
        dot1.classList.add('manual-btn--active')
        dot2.classList.remove('manual-btn--active')
    })
</script>

<!--JS Slider -->
<script src="<?=$url?>/public/js/slider/jquery.min.js"></script>
<script src="<?=$url?>/public/js/slider/owl.carousel.js"></script>
<script src="<?=$url?>/public/js/slider/slider.js"></script>
<script>
    $('.count').countUp({
        delay: 10,
        time: 1500
    });
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
<script>
    $(document).ready(function() {
        $('.dropdown-submenu a.test').on("click", function(e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
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
