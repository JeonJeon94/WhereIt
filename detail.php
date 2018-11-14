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
        <iframe class="detail-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1821.8292275490492!2d127.0679270028805!3d37.541913447280834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca4e9cfeb8cdf%3A0xe2c2e87019dac86f!2z7ISc7Jq47Yq567OE7IucIOq0keynhOq1rCDtmZTslpHrj5kgOS0zOQ!5e1!3m2!1sko!2skr!4v1541928597174" allowfullscreen></iframe>
      </div>
      <div class="detail-picture">.
      </div>
    </div>
  </div>
</div>
<script>
  $(function(){
    api_shop_detail('<?php echo $id; ?>',function(data){
      var slot_template = _.template($("#detail-slot").html());
      var row = data.payload
      var hastag = []
      for(var i=0;i<row.hasgtag.length;i++){
        if(row.hasgtag[i] === " ")
          continue
        hastag.push(row.hasgtag[i])
      }
      row.hasgtag = hastag
      try{
        $(".main-top").append( slot_template(row) )
      }catch(err){}  
    })
  })
</script>

<script id="detail-slot" type="text/template">
    <div class="photo">
      <img src="<%=imgs[0].link%>" onerror="this.src='./images/desktop_detail_default.png'"/>
    </div>
    <div class="info">
      <div class="flex" style="padding-bottom:15px;">
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
        <div class="share">
          <img src="./images/share.png" />
          <div>월간 해시태그</div>
        </div>
        <div class="usage">
          <img src="./images/star.png"/>
          <div>사용량<br>2.55k</div>
        </div>
      </div>
      <div class="map">
        <img src="./images/map.png"/>
      </div>
    </div>
</script>

<script>
  $(function(){
    api_shop_detail('<?php echo $id; ?>',function(data){
      var slot_template = _.template($("#picture-slot").html());
      for(var i =0; i < data.payload.imgs.length; i++){
        var rows = data.payload.imgs[i]
        try{
        $(".detail-picture").append( slot_template(rows) )
        }catch(err){}
      }
    })
  })
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