<?php
  if(!empty($_SESSION['cart'])){
    if(isset($_POST['update']))
    {

      foreach($_POST['id'] as $key => $id)
      {
        if($_POST["quantity"][$key] > 0 ) {
          $_SESSION['cart'][$id]['quantity']=$_POST["quantity"][$key];
        }
      }
    }
  }
?>

<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="" method="post">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                      <th>SST</th>
                      <th>Image</th>
                      <th>Name Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total money</th>
                      <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php
                    
                     $result=0;
                     $stt=0;
                     if(!empty($_SESSION['cart'])) {
                        foreach($_SESSION['cart'] as $item){
                          $stt++;
                      ?>
                        <tr>
                          <td><?php echo $stt; ?></td>
                          <td><a href="#"><img src="public/image/product/<?php echo $item['avatar']; ?>" alt="img"></a></td>
                          <td><a class="aa-cart-title" href="#"><?php echo $item['name']; ?></a></td>
                          <td><?php echo number_format($item['price']) ?>VNĐ</td>
                          <td>
                            <input class="aa-cart-quantity" name='quantity[]' type="number" value="<?php echo $item['quantity'];?>">
                            <input type="hidden" name="id[]" value="<?php echo $item['id']; ?>"> 
                          </td>
                          <td><?php echo number_format($item['quantity']*$item['price']); ?>VNĐ</td>
                          <td>
                            <a href="index.php?p=deleteCart&idsp=<?php echo $item['id']; ?>">Delete</a>
                          </td>
                        </tr>
                        <?php 
                      $result+=$item['quantity']*$item['price'];
                      } 
                     }
                    ?>
                      <tr>
                        <td colspan="7" class="aa-cart-view-bottom">
                          <input class="aa-cart-view-btn" name="update" type="submit" value="Update cart">
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Into money</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Total</th>
                     <td><?php echo number_format($result); ?>VNĐ</td>
                   </tr>
                 </tbody>
               </table>
               <?php 
                  if(empty($_SESSION['cart'])){
                    echo "<a href='index.php'  class='aa-cart-view-btn'>Cart is empty</a>";     
                  } else {
                    if (empty($_SESSION['loginclient'])) {
                      echo "<a href='index.php?p=taikhoan'  class='aa-cart-view-btn'>Please register an account before payment</a>";
                    } 
                    if (!empty($_SESSION['loginclient']['email']) && empty($_SESSION['loginclient']['id'])) {
                      echo "<a href='index.php?p=myaccount' class='aa-cart-view-btn'>Please update your account information before purchasing</a>";
                    }
                    
                    if(!empty($_SESSION['cart']) && !empty($_SESSION['loginclient']['id'])) {
                    ?>
                      <a href="index.php?p=pay" class="aa-cart-view-btn">Pay</a>
                    <?php
                    }
                  }
               ?>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
