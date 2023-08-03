<?php
if(!isset($_COOKIE['Login'])){
  header("Location: auth.php");
}
require("conect.php");
$login = $_COOKIE['Login'];
$backet1 = $connect->query("SELECT * FROM `basket` WHERE `id_user` = '$login'");
if (($backet1->num_rows)==0) {$backet=[];}
else  $backet = $backet1 ->fetch_all();
$product1 = $connect->query("SELECT * FROM `items`");
$product = $product1 ->fetch_all();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="assets/css/main.css">
  <title>N&K fascion </title>
  <script src="assets/js/111.js"></script>
</head>
<body>

  <header class="l-header">


    <nav class="nav bd-grid">
      <div>
        <a href="#" class="nav_logo">N&K</a>
      </div>



      <div class="nav_menu" id="nav-menu">
        <ul class="nav_list">
          <li class="nav_item"><a href="#home" class="nav_link active">HOME</a></li>
          <li class="nav_item"><a href="#featured" class="nav_link">FEATURED</a></li>
          <li class="nav_item"><a href="#new" class="nav_link">NEW</a></li>
          <li class="nav_item"><a href="#suscribed" class="nav_link">Suscribed</a></li>
        </ul>
      </div>

      <div class="header__cart cart active" tabindex="0">
        <div class="cart_text">

          Cart
          <span class="cart_quintiti"><?php echo count($backet) ?></span>
        </div>

        <div class = "cart-content">
          <ul class ="cart-content__list">
            <?php $it=0;
            if(count($backet)!=0){
            foreach($backet as $backet):
              $id=$backet [2];
              $id_pre=$backet [0];
              $p = $connect->query("SELECT * FROM `items`WHERE id = $id");
              $items=$p->fetch_assoc();
              $name=$items['name'];
              $prece=$items['price'];
              $it+=$prece;
              $img=$items['img'];
            ?>
            <li class= "cart-content__item" data = simplebar>
              <article class="cart-content__product cart-product">
                <img src="assets/img/<?php echo $img ?>" alt="" class="cart-product__img">
                <div class="cart-product__text"></div>
                <div>
                <h3 class="cart-product__title"><?php echo $name ?></h3>
                <span class="cart-product__price"><?php echo "$".$prece ?></span>
              </div>
              <a href="delete.php?id=<?php echo $id_pre ?>" class="cart-product__delete" aria-label="Удалить Товар">+</a>
              </article>
            </li>
  <?php endforeach; ?>
          </ul>
          <div class="cart-content__bottom">
            <div class="cart-content__fullprice">
              <span>Total:</span>
              <span class="fullprice"><?php echo "$".$it ?></span>
              <button class="cart-content__btn btn">Оформить заказ</button>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>

    </nav>

  </header>

  <main class="l-main">

    <section class="home" id="home">
      <div class="home_container bd-grid">
        <div class="home_data">
          <h1 class="home_title">NEW<br><span>ARRIVALS</span></h1>
          <a href="#featured" class="buttonn">GO SHOPPING</a>
        </div>
        <img src="assets/img/home.png" alt="" class="home_img">
      </div>
    </section>


    <section class="collection section">
      <div class="collection_container bd-grid">
        <div class="collection_box">

          <img src="assets/img/backpackMan.png" alt="" class="collection_img">

          <div class="collection_data">
            <h2 class="collection_title"><span class="collection_subtitle">Men</span><br>Backpack</h2>
            <a href="#" class="collection_view">View collection</a>
          </div>
        </div>
      </div>

      <div class="collection_container bd-grid">
        <div class="collection_box">



          <div class="collection_data">
            <h2 class="collection_title"><span class="collection_subtitle">Women</span><br>Backpack</h2>
            <a href="#" class="collection_view">View collection</a>
          </div>
          <img src="assets/img/backpackWoman.png" alt="" class="collection_img">
        </div>
      </div>

    </section>


    <section class="featured section" id="featured">
      <h2 class="section-title">FEATURED PRODUCTS</h2>
      <a href="#" class="section-all">View All</a>

      <div class="featured_container bd-grid">
        <div class="featured_product">
          <div class="featured_box">
            <div class="featured_new">NEW</div>
            <img src="assets/img/feature1.png" alt="" class="featured_img">
          </div>
          <div class="featured_data">
            <h3 class="featured_name">Headphone One Black</h3>
            <span class="featured_preci">$29</span>
          </div>



        </div>



        <div class="featured_product">
          <div class="featured_box">
            <div class="featured_new">NEW</div>
            <img src="assets/img/feature2.png" alt="" class="featured_img">
          </div>
          <div class="featured_data">
            <h3 class="featured_name">Speaker Beats</h3>
            <span class="featured_preci">$109</span>
          </div>
        </div>




        <div class="featured_product">
          <div class="featured_box">
            <div class="featured_new">NEW</div>
            <img src="assets/img/feature3.png" alt="" class="featured_img">
          </div>
          <div class="featured_data">
            <h3 class="featured_name">Apple Air Pods</h3>
            <span class="featured_preci">$129</span>
          </div>
        </div>

        <div class="featured_product">
          <div class="featured_box">
            <div class="featured_new">NEW</div>
            <img src="assets/img/feature4.png" alt="" class="featured_img">
          </div>
          <div class="featured_data">
            <h3 class="featured_name">Smartwatch F9</h3>
            <span class="featured_preci">$99</span>
          </div>
        </div>

      </div>

    </section>
    <section class="offer section">
      <div class="offer_bg">
        <div class="offer_data">


          <h2 class="offer_title">Speciall Offer</h2>
          <p class= "offer_description">Speciall Offer For Women Only This Week</p>
          <a href="#" class="buttonn">SHOP NOW</a>

        </div>
      </div>

    </section>


    <section class="new section" id="new">
      <h2 class="section-title">NEW ARRIVALS</h2>
      <a href="#" class="section-all">View All</a>


      <div class="new_container bd-grid">
        <?php
foreach ($product as $product):
        ?>
        <div class="new_box">
          <img src="assets/img/<?php echo $product[2] ?>" alt="" class="new_img">
          <div class="new_link">
            <a href= "backet.php?id=<?php echo $product[0] ?>" class="buybuttonn">Add to cart</a>
          </div>
        </div>
  <?php endforeach; ?>

      </div>

    </div>

  </section>


  <section class="newsletter section" id="suscribe">
    <div class="newsletter_container bd-grid">
      <div  class="newsletter_suscribe">
        <h2 class="section-title">OUR NEWSLETTER</h2>
        <p class="newsletter_description">Promotion new products and sales</p>

        <form action=""class="newsletter_form"></form>
        <input type="text" class="newsletter_input" placeholder=" Enter your email" >
        <a href= "#" class="buttonn">SUBSCRIBE</a>
      </div>
    </div>
  </section>


  <section class="sponsors section">
    <div class="sponsors_container bd-grid">
      <div class="sponsors_logo">
        <img src="assets/img/logo1.png" alt="" >
      </div>

      <div class="sponsors_logo">
        <img src="assets/img/logo2.png" alt="" >
      </div>

      <div class="sponsors_logo">
        <img src="assets/img/logo3.png" alt="" >
      </div>

      <div class="sponsors_logo">
        <img src="assets/img/logo4.png" alt="" >
      </div>

    </div>
  </section>
</main>


<footer class="footer section">
  <div class="footer_container bd-grid">
    <div class="footer_box">
      <h3 class="footer_title">N&K fascion</h3>
      <p class="footer_deal">Products store</p>
      <a href="#"><img src="assets/img/footerstore1.png" alt="" class="footer_store"></a>
      <a href="#"><img src="assets/img/footerstore2.png" alt="" class="footer_store"></a>
    </div>
    <div class="footer_box">
      <h3 class="footer_title">EXPLORE<h3>
        <ul>
          <li><a href="#" class="footer_link">Home</a></li>
          <li><a href="#" class="footer_link">Featured</a></li>
          <li><a href="#" class="footer_link">New</a></li>
          <li><a href="#" class="footer_link">Suscribe</a></li>
        </ul>
      </div>

      <div class="footer_box">
        <h3 class="footer_title">OUR SERVICES<h3>
          <ul>
            <li><a href="#" class="footer_link">Pricing</a></li>
            <li><a href="#" class="footer_link">Free Shipping</a></li>
            <li><a href="#" class="footer_link">Gift Cards</a></li>

          </ul>
        </div>

        <div class="footer_box">
          <h3 class="footer_title">FOLLOW<h3>

            <a href="#" class="footer_social"><i class='bx bxl-facebook-square'></i></a>
            <a href="#" class="footer_social"><i class='bx bxl-vk'></i></a>
            <a href="#" class="footer_social"><i class='bx bxl-instagram'></i></a></li>


          </div>
        </div>
        <p class="footer_copy">&#169; 2020 copyright all right reserved</p>
      </footer>

      <script src="simplebar.css"></script>
      <script src="assets/js/cart.js"></script>

    </body>
    </html>
