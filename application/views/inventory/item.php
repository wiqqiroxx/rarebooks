<script type="text/javascript">

function UpdateCart(id)
{
    var temp=id.split("-");
    var selId = temp[0]+"-select";
    var select=document.getElementById(selId);
    var qty =select.options[select.selectedIndex].text;
    location.href = '<?php echo URL;?>'+"cart/addtocart/"+temp[0]+"/"+qty;
}

</script>
<form method = "POST" >

<div class="container">
  <h3>Name : <?php echo $book[0]->item_name; ?></h3>
  </br><h3>Description:</h3>
  <p> <?php echo $book[0]->item_description; ?> </p>
  <br>
  <select <?php if (isset($book[0]->item_id)) {echo "id=".$book[0]->item_id."-select "; 
                    echo "name=".$book[0]->item_id."-select"; }?>>
                    <?php
                    for($i=1; $i<=($book[0]->quantity_on_hand - $qty_in_cart);$i++){
                        echo '<option value="'.$book[0]->item_id.$i.'">'.$i.'</option>';
                    }
                    ?>
                </select>

  <input type="button" <?php if (isset($book[0]->item_id)) {echo "id=".$book[0]->item_id."-button "; 
                echo "name=".$book[0]->item_id."-button"; }?> value="Add To Cart" onclick="UpdateCart(this.id);"/>
 <?php if(isset($_SESSION['userid']) && $_SESSION['userid'] !=0 ){?> <a href=<?php echo URL.'review/index/'.$book[0]->item_id?> >
  <input type="button" id = "review" name = "review" value="Add Review"/>
   </a>
   <?php }?>
  </br>
</div>
<div class="container">
	<h3>Reviews</h3>
	<table>
 <?php foreach ($reviews as $review) { ?>
  	<tr>
        <td>Customer : <?php if (isset($review->customer_id)) echo $review->customer_id; ?></td>
        <td>Rating : <?php if (isset($review->item_rating)) echo $review->item_rating; ?></td>
    </tr>
    <tr>
    	<td>Review : <?php if (isset($review->review_text)) echo $review->review_text; ?></td>
    </tr>
 <?php } ?>


</table>
</div>
</form>
