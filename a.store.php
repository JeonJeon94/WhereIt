<?php 
  $page="store"; 
  if(!empty($_GET['store_search'])){
    $keyword = $_GET['store_search'];  
  }else{
    $keyword = "";
  }
?>
<?php include_once('./a.head.php'); ?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="store" onclick="location.href='./a.store.php'">업체관리</div>
      </div>
      <div class="contents">
        <div style="display:flex; margin:30px 0 20px 0; align-items:center;">
          <div id="store_text">업체 관리</div>
          <div class="store_search">
            <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <input id="store_search" type="text" name="store_search" placeholder="검색" />
            </form>
          </div>
          <div id="add_store" onclick="location.href='a.new_store.php'">등록</div>
          <div id="del_store" onclick="del_btn()">삭제</div>
        </div>
        <div class="store_list" style="overflow:auto; max-height:75vh;"> 
          <table >
            <thead>
              <tr>
                <th style="width:15px;"></th>
                <th style="width:100px;">번호</th>
                <th style="width:100px;">대표이미지</th>
                <th style="width:250px;">상호</th>
                <th style="width:250px;">전화번호</th>
                <th style="width:100px;">메뉴</th>
                <th style="width:100px;">해시태그</th>
                <th style="width:250px;">주소</th>
              </tr>
            </thead>
            <tbody class="list-line">

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
  
  function loadTemplate(id) { return document.getElementById(id).innerHTML; }

  $(function(){
    var temp = loadTemplate('store-slot');
    var rank_templete = _.template($("#store-slot").html());

    function load(i){
      api_shop_list(i, 100, function(res){
        data = res
        if(data.payload !== undefined){
          for(let j=0;j<data.payload.length;j++){
            data.payload[j].number = j+1
            let row = data.payload[j]
            $(".list-line").append(rank_templete(row))
          }
        }
      })
    }
    function loadByKeyword(){
      api_search_data('<?=$keyword?>',function(res){
        data = res
        if(data.payload !== undefined){
          for(let j=0;j<data.payload.length;j++){
            let row = data.payload[j]
            $(".list-line").append(rank_templete(row))
          }
        }
      })
    }
    if('<?= $keyword?>' == '')
      load(0);
    else
      loadByKeyword();
  });

</script>
<script id="store-slot" type="text/template">
  <tr style="height:120px;">
    <td><input id="check" class="del_check " type="checkbox" value=""/></td>
    <td><%=number%></td>
    <td id="img_box"><img id="td-img"alt="store-img" onerror="this.src='./images/whereit_img_loading_m.png'"  src='<%=main_img%>' onclick="location.href='a.store_img.php?id=<%=_id%>'"/></td>
    <td><div style="cursor:pointer;" onclick="location.href='a.store_info.php?id=<%=_id%>'"><%=Name%></div></td>
    <td><%=phonenumber%></td>
    <td><%=category[0]%></td>
    <td><%=hasgtag[0]%></td>
    <td><%=new_address%></td>
  </tr>
</script>

</html>