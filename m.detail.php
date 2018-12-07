<?php $page = "detail" ?>
<?php include_once("./m.head.php") ?>

<?php 
if($member){
  $user_id=$member[id];
  $favorit = sql_one("SELECT * FROM favorit WHERE shopId='$id' and user_id='$user_id'");
}
?>
  <div class="main">
    <div class="detail-main">
      <div class="main-top">
      </div>
      <div class="map-container">
        <iframe id=detail-map src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1298.3578935399303!2d127.02570264252127!3d37.49770732756075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca15bd138859d%3A0x49003f4294ee5df3!2z7ISc7Jq47Yq567OE7IucIOyEnOy0iOq1rCDshJzstIg064-ZIOyEnOy0iOuMgOuhnCA0MTE!5e0!3m2!1sko!2skr!4v1544091180659" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="detail-picture">
      </div>
      <div class="loading dot">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
  </div>

<script>
  var storeId = '<?php echo $id; ?>'

  $(function(){
    api_shop_detail(storeId,function(data){
      var slot_template = _.template($("#detail-slot").html());
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
        row.imgs[0].link = './images/desktop_detail_default.png'
      }
      row.hasgtag = hastag
      try{
        $(".main-top").append(slot_template(row))
      }catch(err){console.log(err)}  
    })
})
</script>

<script id="detail-slot" type="text/template">
  <div class="store-info">
    <div class="photo">
      <img src="<%=imgs[0].link%>" onerror="this.src='./images/desktop_detail_default.png'"/>
    </div>
    <div class="info">
      <div style="padding:15px 0 0 0; display:flex;">
        <div class="keyword">
          <div><%=collect_region%></div>
        </div>
        <div class="keyword">
          <div><%=category[0]%></div>
        </div>
      </div>
      <div class="name">
        <%=Name%>
      </div>
      <div style="display:flex;">
        <div class="detail-text">누적 해시태그량</div>
        <div class="detail-text" style="border-left:1px solid #d0c1d0; padding-left:5px;">2.55K</div>
      </div>
    </div>
    <div class="etc">
      <div class="share">
        <img src="./images/share.png" />
      </div>
      <div class="phone">
        <img src="./images/etc/phone.png"/>
      </div>
      <div class="usage">
        <div onclick='location.href="m.toggle_favorit.php?shopId=<?php echo $id; ?>"'>
          <?php if($favorit){ ?>
            <img style="width:15px; height:15px;" src="./images/star_active.png"/>
          <?php }else{ ?>
            <img style="width:15px; height:15px;" src="./images/star.png"/>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="store-adress">
    <div style="display:flex; flex-direction:column;">
      <div class="hashtag">
        <% 
        for(var i=0; i < hasgtag.length;i++){
        %>
        <div id="hashtag">#<%=hasgtag[i]%></div>
        <% } %>
      </div>
      <div class="adress"><%=new_address%></div>
    </div>
    <div class="map">
      <img src="./images/default/area.png"/>
    </div>
  </div>
</script>

<script>
  var img_pivot = 0
  var flag = false
  var playing = false

  function setImage(res){
    var slot_template = _.template($("#picture-slot").html());
    if(!playing){
      img_pivot += 16
      playing = true;
      if(img_pivot === 16 || img_pivot === 32 || img_pivot === 48){
        for(var i = img_pivot-4; i < img_pivot; i++){
          var row = res.payload.imgs[i]
          if(row === undefined){
            continue
          }
          try{
          $(".detail-picture").append( slot_template(row) )
          }catch(err){}
        }
        flag = true;
        playing = false;
      }else{
        Loading()
        setTimeout(function(){
          for(var i = img_pivot -12; i < img_pivot; i++){
            var row = res.payload.imgs[i]
            if(row === undefined){
              continue
            }
            try{
            $(".detail-picture").append( slot_template(row) )
            }catch(err){}
          }
          playing = false;
        }, 1000)
      }
    }
  }

  function Loading(){
    if(flag === true){
      $('.loading').css('display', 'block')
      flag = false
      setTimeout(function(){
        $('.loading').css('display', 'none')
        flag = true
      }, 1000);
    }
  }

  $(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() === $(document).height() && flag && !playing) {
      api_shop_detail(storeId,function(data){
        res = data
        setImage(res)
      })
    }
  });

  $(function(){
    var storeId ='<?php echo $id; ?>'
    // for(var i = 0; i <= 2; i++){
      detail_fandein(storeId)
    // }
  });



  function detail_fandein(storeId){
    // setTimeout(function(){
      api_shop_detail(storeId,function(data){
        res = data
        setImage(res)
      })
    // }, i*500);
  };
</script>

<script id="picture-slot" type="text/template">
  <div class="store-list">
    <div class="img-container">
      <img src="<%=link%>" onerror="this.src='./images/desktop_detail_default.png'"/>
    </div>
  </div>
</script>

<?php include_once("./m.footer.php") ?>