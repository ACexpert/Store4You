<!DOCTYPE html>
<html>
<title>Store4you</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../server/css/store4you.css"> 
<script src="../server/s/store4you.js"></script>

<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
     <a href="home.html"><h3 class="w3-wide"><b>Store4You</b></h3></a>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="home.html" class="w3-bar-item w3-button">Home</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Products <i class="fa fa-caret-down"></i>
    </a>
   <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#pencil" class="w3-bar-item w3-button">Pencil</a>
      <a href="#paperblock" class="w3-bar-item w3-button">Paperblock</a>
      <a href="#eraser" class="w3-bar-item w3-button">Eraser</a>
      <a href="#lineal" class="w3-bar-item w3-button">Lineal</a>
      <a href="#compasses" class="w3-bar-item w3-button">Compasses</a>
      <a href="#pen" class="w3-bar-item w3-button">Pen</a>
      <a href="#heft" class="w3-bar-item w3-button">Heft</a>
      <a href="#agenda" class="w3-bar-item w3-button">Agenda</a>
    </div>
  </div>
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <a href="home.html"><div class="w3-bar-item w3-padding-24 w3-wide">Store4You</div></a>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
     <a href="home.html"><p class="w3-left">Store4You</p></a>
    <p class="w3-right">
      <a href="shoppingcart.php" class="w3-bar-item w3-button"> 
        <i class="fa fa-shopping-cart w3-margin-right "></a></i>
      <i class="fa fa-search"></i>
    </p>
  </header>
<div class="w3-display-container w3-container">
  <form action="shoppingcart.php" method="post">
   <table>
          <thead>
              <tr>
                  <th>Product</th>
                  <th>Price in CHF</th>
              </tr>
          </thead>
          <tbody>
          <?php
               include '../server/php/sql.php';

               $tot = 0;

                $rs = mysqli_query($conn, "SELECT warenkorb.WarenkorbID, artikel.Name, artikel.Preis FROM artikel INNER JOIN warenkorb on artikel.ArtikelID = warenkorb.ArtikelFK WHERE warenkorb.UserFK = 5");
                
                while($row = mysqli_fetch_array($rs)) {
              ?>
                  <tr>
                      <td><?php echo $row['Name'];?></td>
                      <td><?php echo $row['Preis'];?></td>
                      <?php
                        echo '<td><input type="submit" name="deleteItem" value="'.$row['WarenkorbID'].'" /></td>';

                          if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem']))
                          {
                            $delete = $_POST['deleteItem'];
                            $sql = mysqli_query($conn, "DELETE FROM warenkorb where WarenkorbID = '$delete'"); 
                            header('Location: shoppingcart.php');
                          }
                        ?> 
                  </tr>

              <?php
                $tot = $tot + $row['Preis'];
              }
              ?>
          </tbody>
          <th>Total</th>
                  <th><?php echo $tot; ?></th>
      </table>
    </form>
    </div>

    <br>

  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">We're hiring</a></p>
        <p><a href="#">Support</a></p>
        <p><a href="#">Find store</a></p>
        <p><a href="#">Shipment</a></p>
        <p><a href="#">Payment</a></p>
        <p><a href="#">Gift card</a></p>
        <p><a href="#">Return</a></p>
        <p><a href="#">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> Switzerland, Zuerich</p>
        <p><i class="fa fa-fw fa-envelope"></i> readynow@abwesend.de</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
        <br>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
      </div>
    </div>
  </footer>

  <div class="w3-black w3-center w3-padding-24">Store4you</a></div>

  <!-- End page content -->
</div>

<!-- Newsletter Modal -->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">NEWSLETTER</h2>
      <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
  </div>
</div>
</body>
</html>
