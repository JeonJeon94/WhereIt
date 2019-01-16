<?php $page = "search" ?>

<?php include_once("./m.head.php") ?>
  <div class="main">
    <div class="main-top">
      <div class="top_layer_1">
        <div class="text">
          <div style="display:flex;">
            <div style="color:#FF5566; margin-right:4px;">
              <?=$address?>
            </div>/
            <div style="color:#FF5566; margin-left:4px;">
              <?=$food?>
            </div>
          </div><br><b>TOP10</b>
        </div>
      </div>
    </div>
    <div class="list-line">
    </div>
  </div>

<script>
  var searchWord = "<?=$address?>"+" "+"<?=$food?>";

  function loadTemplate(id) { return document.getElementById(id).innerHTML; }

  $(function(){
    var temp = loadTemplate('store-slot');
    var store_template = _.template($("#store-slot").html());
    api_search_data(searchWord,function(data){
      for(var i = 0; i < 10; i++){
        var row = data.payload[i]
        row.no = i+1 < 10 ? "0"+(i+1) : i+1
        if(row === undefined)
          continue
        try{
          $(".list-line").append( store_template(row) )
        }catch(err){console.log(err)}  
      }
    })
  });



</script>

<script id="store-slot" type="text/template">
  <div class="store-list">
    <div class="store-info">
      <div class="store-num"><%=no%></div>
      <div class="store-name" onclick="location.href='m.detail.php?id=<%=_id%>'">
        <%=Name%>
      </div>
      <div style="display:flex; align-items:center;"> 
        <div class="keyword" style="margin-right: 10px;">
          <%=collect_region%>
        </div>
        <div class="keyword">
          <%=category[0]%>
        </div>
      </div>
    </div>
    <div class="store-img">
      <img src="<%=main_img%>"  onclick="location.href='m.detail.php?id=<%=_id%>'" onerror="this.src='./images/whereit_img_loading_p.png'"/>
    </div>
  </div>

</script>


<?php include_once("./m.footer.php") ?>