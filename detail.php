<?php $page="detail"; ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
  if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
    // 모바일 브라우저라면  모바일 URL로 이동 
    header("Location: ./m.detail.php");
    exit;
  }
}

?>
<?php include_once('./head.php'); ?>
<?php 
if($member){
  $user_id=$member[id];
  $favorit = sql_one("SELECT * FROM favorit WHERE shopId='$id' and user_id='$user_id'");
}
?>
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
      <iframe id=detail-map scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1298.3578935399303!2d127.02570264252127!3d37.49770732756075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca15bd138859d%3A0x49003f4294ee5df3!2z7ISc7Jq47Yq567OE7IucIOyEnOy0iOq1rCDshJzstIg064-ZIOyEnOy0iOuMgOuhnCA0MTE!5e0!3m2!1sko!2skr!4v1544091180659" frameborder="0" style="border:0" allowfullscreen></iframe>
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
        row.imgs[0].link = './images/whereit_img_loading_p.png'
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
  <div class="photo">
    <img src="<%=main_img%>" onerror="this.src='./images/whereit_img_loading_p.png'"/>
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
    <div class="name"><%=Name%></div>
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
      <div class="usage" style="cursor:pointer;" onclick='location.href="toggle_favorit.php?shopId=<?php echo $id; ?>"'>
        <?php if($favorit){ ?>
          <img src="./images/star_active.png"/>
        <?php }else{ ?>
          <img src="./images/star.png"/>
        <?php } ?>
      </div>
    </div>
    <div>
      <div style="padding-top:10px; font-size:14px; font-weight:500; color:#a39aa3;">월간 해시태그 사용량</div>
      <div style="padding-right:80px; font-size:14px; font-weight:500; float:right; color:#a39aa3;">2.55K</div>
    </div>
    <div class="map" style="cursor:pointer;">
      <img src="./images/map.png"/>
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
    if($(window).scrollTop() + $(window).height() === $(document).height() && flag) {
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
      var share_url = "http://whereit.kr/detail.php?id=<?=$id?>"
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
      <img src="<%=link%>" onerror="this.src='./images/whereit_img_loading_p.png'" onclick="location.href='https://instagram.com/p/<%=code%>'"/>
    </div>
  </div>
</script>

</body>
<?php include_once('./script/click_map_js.php'); ?>
<?php include_once('./script/move_top_js.php'); ?>
<?php include_once('./script/click_favorite_js.php'); ?>
<?php include_once('./script/dropdown_js.php'); ?>
</html>