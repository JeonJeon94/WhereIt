<?php $page="store"; ?>
<?php include_once('./a.head.php'); ?>
<?php 
  
  if(!empty($_GET['id'])){
    $id = $_GET['id'];
  }else{
    history_back();
  }
?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="store" onclick="location.href='./a.store.php'">업체관리</div>
      </div>
      <div class="contents">
        <div class="store_info">
          <div class="end_btn" onclick="endClick()">완료</div>
        </div>
        <div class="del_div">
          <div class="del_btn" onclick="delClick()">삭제</div>
        </div>
        <div class="detail_img">
        </div>
      </div>
    </div>
  </div>
</body>

<script>
  var storeId = '<?php echo $id; ?>'

  $(function(){
    api_shop_detail(storeId,function(data){
      var slot_template = _.template($("#store-slot").html());
      var row = data.payload
      var hastag = []
      for(var i=0; i<row.hasgtag.length; i++){
        if(row.hasgtag[i] === " "){
            continue
        }
        hastag.push(row.hasgtag[i])
      }
      if(row.imgs.length === 0){
        row.imgs[0] = {}
        row.imgs[0].link = './images/whereit_img_loading_p.png'
      }
      row.hasgtag = hastag
      try{
        $(".store_info").append(slot_template(row))
      }catch(err){console.log(err)}  
    })
  })
  function endClick(){
    var hashtag = $('#hashtag0').val()
    var hashtag2 = $('#hashtag1').val()
    var number = $('.number').val()
    var adress = $('.adress').val()
    console.log(hashtag);
    console.log(hashtag2);
    console.log(number);
    console.log(adress);

  }
</script>
  
  
<script id="store-slot" type="text/template">
  <div class="photo">
    <img src="<%=imgs[0].link%>" onerror="this.src='./images/whereit_img_loading_p.png'"/>
  </div>
  <div class="info">
    <div class="flex" style="padding-bottom:15px; padding-top:15px;">
      <div class="keyword">
        <div class="child-flex-1"><%=collect_region%></div>
      </div>
      <div class="keyword">
        <div class="child-flex-1"><%=category[0]%></div>
      </div>
    </div>
    <div class="name">
      <%=Name%>
    </div>
    <div class="hashtag">
      <% 
        for(var i=0; i < hasgtag.length;i++){
      %>
      <input id="hashtag<%=i%>" name="hashtag" value="<%=hasgtag[i]%>"/>
      <% } %>
    </div>
    <input class="number" name="number" value="<%=phonenumber%>"/>
    <input class="adress" name="adress" value="<%=new_address%>" />
  </div>
  <div class="etc">
    <div>
      <div style="padding-top:10px; font-size:20px; font-weight:500; color:#a39aa3;">월간 해시태그 사용량</div>
      <div style="padding-right:100px; font-size:20px; font-weight:500; float:right; color:#a39aa3;">2.55K</div>
    </div>
  </div>
</script>
  
<script>
  var storeId = '<?php echo $id; ?>'
  var checkList = []
  var storeName = ''
  function delClick(){
    for(let c of checkList){
      api_delete_pic(storeName, c)
    }
    location.href='a.store_edit.php?id=<?=$id?>'
  }
  function checkImg(code){
    let f = checkList.findIndex((ele)=>{
      return ele === code
    })
    if(f !== -1){
      checkList.splice(f,1)
    } else{
      checkList.push(code)
    }
  }
  $(function(){
    api_shop_detail(storeId,function(data){
      var store_template = _.template($("#img-slot").html());
      var row = data.payload
      storeName = data.payload.Name
      for(var i = 0; i < data.payload.imgs.length; i++){
        var row = data.payload.imgs[i]
        if(row === undefined){
          continue
        }
        try{
          $(".detail_img").append( store_template(row,i))
        }catch(err){}
      }  
    })
  })
  
</script>

<script id="img-slot" type="text/template">
  <div class="list-line">
    <input id="check" onclick="checkImg('<%=code%>')" class="del_check" type="checkbox"/>
    <img src="<%=link%>" onerror="this.src='./images/whereit_img_loading_p.png'" onclick="location.href='https://instagram.com/p/<%=code%>'"/>
  </div>
</script>
</html>