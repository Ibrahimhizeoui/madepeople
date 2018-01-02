<?php
require_once("connect.php");

	
 ?>
<div id="all" class="all col">

    	<h1>List of Orders</h1>
    	<a href="#" class="add">Add Order</a>
            <div class="table-responsive">
              <table class="table table-striped tablevote table-responsive">
                 <thead> 
                     <tr> 
                     <th>#</th>
                     <th>Customer</th>
                     <th>Total sum</th>
                     <th>Remaining sum</th>
                     <th>created at</th>
                     <th>State</th>
                     <td></td>
                         <td></td>
                     </tr> 
                 </thead>
                 <tbody>
                 <?php foreach ($orders as $order) {
                 ?>
                      <tr>
                      <th scope="row"> <?php echo $order->getId();?></th>
                      <td><?php echo $order->getCustomer()->getName();?></td>
                      <td><?php echo $order->getTotalSum();?> </td>
                      <td><?php echo $order->getRemainingSum();?></td>
                      <td><?php echo $order->getCreatedAt();?></td>
                      <td><?php echo  $order->getState();?></td>
                          <?php
                          if($order->getState()=="paid") {
                              ?>
                              <td><a class="view_event awayv"
                                     href="save-order.php?action=save&order_id=<?php echo $order->getId(); ?>">Save as
                                      paid</a></td>
                              <?php
                          }
                          ?>
                          <td></td>
                      </tr> 
                   <?php }  ?>  
                  </tbody> 
                  </table> 
    		</div>
    </div> 