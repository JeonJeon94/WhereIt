<?php $page="detail"; ?>
<?php include_once('./head.php'); ?>
  <div class="move-top">
    <img id="top" src="./images/top.png" />
    <img id="hover" src="./images/top-hover.png" />
    <img id="click" src="./images/top-click.png" />
    <br>TOP
  </div>
  <div class="main">
    <div class="detail-main">
      <div class="main-top">
      </div>
      <div class="map-container">
        <img id="logo-left" src="./images/header/logo.png" />
        <iframe id=detail-map scrolling="no" src="http://prt.map.naver.com/mashupmap/print?key=p1542878593848_-153604968"></iframe>
        <a id=detail-site href="https://map.naver.com/?searchCoord=793de6260ef4aa30f1cb538daf1ccde0e1125a8775daaf70c407029b6b0f9f31&query=7ISc7Jq4IOyEnOy0iOq1rCDshJzstIjrjIDroZwgNDExIEdUIFRPV0VS&tab=1&lng=b896d58d9064a8e7e60e215b0f2fb68e&mapMode=0&mpx=833c4f37368d11c0e24e6c71092fcddb92d5784df699e74b3402f0b2ba6a0c37a0daea55cdf18cc028f76fa0c42796e1ae4dd4b7d1b2a78c2c1541ddee2f021a&lat=6963078383dbd6007191d60630bb9d8e&dlevel=12&enc=b64&menu=location"></a>
        <img id="logo-right" src="./images/header/logo.png" />
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
          hastag.push(row.hasgtag[i])
        }
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
    <div class="photo">
      <img src="<%=imgs[0].link%>" onerror="this.src='./images/desktop_detail_default.png'"/>
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
      <div class="number"><%=phonenumber%></div>
      <div class="adress"><%=new_address%></div>
      <div class="hashtag">
        <% 
          for(var i=0; i < hasgtag.length;i++){
        %>
        <div id="hashtag">#<%=hasgtag[i]%></div>
        <% } %>
      </div>
    </div>
    <div class="etc">
      <div class="month">
        <div class="share" style="cursor:pointer;">
          <img src="./images/share.png" />
          <div style="padding-top:10px; font-size:15px; font-weight:500;">월간 해시태그</div>
        </div>
        <div class="usage" style="cursor:pointer;">
          <img src="./images/star.png"/>
          <div style="padding-top:10px; font-size:15px; font-weight:500;">사용량<br>2.55K</div>
        </div>
      </div>
      <div class="map" style="cursor:pointer;">
        <img src="./images/map.png"/>
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
      img_pivot += 4
      playing = true;
      if(img_pivot === 4 || img_pivot === 8 || img_pivot ===12){
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
          for(var i = img_pivot -4; i < img_pivot; i++){
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
    for(var i = 0; i <= 2; i++){
      detail_fandein(i,storeId)
    }
  });



  function detail_fandein(i,storeId){
    setTimeout(function(){
      api_shop_detail(storeId,function(data){
        res = data
        setImage(res)
      })
    }, i*500);
  };


  
</script>

<script id="picture-slot" type="text/template">
  <div class="store-list">
    <div class="img-container">
      <img src="<%=link%>" onerror="this.src='./images/desktop_detail_default.png'"/>
    </div>
  </div>
</script>

</body>
<?php include_once('./script/click_map_js.php'); ?>
<?php include_once('./script/move_top_js.php'); ?>
<?php include_once('./script/click_favorite_js.php'); ?>
<?php include_once('./script/dropdown_js.php'); ?>
</html>