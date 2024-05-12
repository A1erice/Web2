<?php $this->view("include/header", $data) ?>
<div class="container-fluid pt-4 px-5">
  <div class="row bg-light p-4">
    <div class="col-12 d-flex align-items-center justify-content-between mb-3">
      <h6 class="mb-3">Đơn hàng của bạn</h6>
    </div>
    <div id="displayOrderData">

    </div>
  </div>


</div>
<?php $this->view("include/footer", $data) ?>
<script>
  function fetch_data(page) 
  {  var user_id = <?= $data['user_data']->id ?>;
      $.ajax({
             url:'<?= ROOT ?>order/getAll',
             method: "POST",
             data :{
              page:page,
              user_id: user_id
             },
             success: function(data,status){
              console.log(data);
              $('#displayOrderData').html(data);
             } 
            });    
  }
  fetch_data();
  function changePageFetch(page) {
    fetch_data(page);
  }
  
</script>