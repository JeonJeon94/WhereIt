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
      var main = []
      for(var i=0; i<row.hasgtag.length; i++){
        if(row.hasgtag[i] === " "){
            continue
        }
        hastag.push(row.hasgtag[i])
        
      }
      if(row.imgs.length === 0){
        row.imgs[0] = {}
        row.imgs[0].link = './images/whereit_img_loading_m.png'
      }
      row.hasgtag = hastag

      if(row.main_img === undefined){
        main.push(row.imgs[0].link)
        row.main_img = main
      }
      try{
        $(".main-top").append(slot_template(row))
      }catch(err){console.log(err)}  
    })
})
</script>

<script id="detail-slot" type="text/template">
  <div class="store-info">
    <div class="photo">
      <img src="<%=main_img%>" onerror="this.src='./images/whereit_img_loading_m.png'"/>
    </div>
    <div class="info">
      <div style="padding:3px 0 0 0; display:flex;">
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
        <div class="modal_share">
          <div id="kakao_share">
            <a id="kakao-link-btn" href="javascript:;">
            <img src="//developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png"/>
            </a>
          </div>
          <div id="facebook_share">
            <img src="./images/sns/sns_facebook.png"/>
          </div>
        </div>
        <img id="share" src="./images/share.png" />
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
  function Loading(){
    $('.loading').css('display', 'block')
    flag = false
    setTimeout(function(){
      $('.loading').css('display', 'none')
    }, 3000);
  }


  function setImage(res){
    var slot_template = _.template($("#picture-slot").html());
    
    if(res.payload.imgs.length <= img_pivot)
      return
    img_pivot += 16
    if(img_pivot !== 16){
      Loading()
      setTimeout(function(){
        for(var i = img_pivot-16; i < img_pivot; i++){
          var row = res.payload.imgs[i]
          if(row === undefined){
            continue
          }
          try{
            $(".detail-picture").append( slot_template(row) )
          }catch(err){}
        }
        flag = true
      }, 3000);
    }else{
      flag = true
      for(var i = img_pivot -16; i < img_pivot; i++){
        var row = res.payload.imgs[i]
        if(row === undefined){
          continue
        }
        try{
          $(".detail-picture").append( slot_template(row) )
        }catch(err){}
      }
      setTimeout(function(){
        $(window).scrollTop(0)
      },600)
        
    }
  }

  $(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() +100 >= $(document).height() && flag) {
      flag = false
      setImage(res)
    }
  });

  $(function(){
    var storeId ='<?php echo $id; ?>'
    api_shop_detail(storeId,function(data){
      res = data
      setImage(res)
    })
  });

</script>

<script type='text/javascript'>

  setTimeout(function(){
    jQuery(document).ready(function($){

      var share_url = "http://whereit.kr/m.detail.php?id=<?=$id?>"

      console.log(share_url)
      window.Kakao.cleanup()
      window.Kakao.init('0b4dc8f4b2eca7999b6ae1ba6b47e872');
    
      window.Kakao.Link.createDefaultButton({
        container: '#kakao-link-btn',
        objectType: 'feed',
        content: {
          title: "WhereIt",
          description: '#WhereIt #인스타맛집',
          imageUrl: 'http://whereit.kr/images/whereit_img_og_001.png',
          link: {
            androidExecParams: share_url,
            mobileWebUrl: share_url,
            webUrl: share_url
          }
        },
        social: {
          likeCount: 0,
          commentCount: 0,
          sharedCount: 0
        },
        buttons: [
          {
            title: '웹으로 보기',
            link: {
              androidExecParams: share_url,
              mobileWebUrl: share_url,
              webUrl: share_url
            }
          },                        
        ]
      })
    });
    $('#facebook_share').click(function(){
      alert('서비스 준비중입니다.')
    })
  }, 1000);

</script>

<script id="picture-slot" type="text/template">
  <div class="store-list">
    <div class="img-container">
      <img src="<%=link%>" onerror="this.src='./images/whereit_img_loading_m.png'" onclick="location.href='https://instagram.com/p/<%=code%>'"/>
    </div>
  </div>
</script>

<?php include_once("./m.footer.php") ?>