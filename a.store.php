<?php 
  $page="store"; 
  if(!empty($_GET['store_search'])){
    $keyword = $_GET['store_search'];  
  }else{
    $keyword = "";
  }
?>
<?php include_once('./a.head.php'); ?>
  <div class="modal">
    <div class="store_add">
      <div style="display:flex; height:30px; margin:30px 0; align-items:center; ">
        <div class="store_name">상호</div>
        <input id="store_name" name="store_name" type="text" />
      </div>
      <div style="display:flex; height:30px; margin:30px 0; align-items:center; ">
        <div class="store_phone">전화번호</div>
        <input id="store_phone" name="store_phone" type="text" />
      </div>
      <div style="display:flex; height:30px; margin:30px 0; align-items:center; ">
        <div class="store_index">검색색인</div>
        <input id="store_index" name="store_index" type="text" />
      </div>
      <div style="display:flex; height:30px; margin:30px 0; align-items:center; ">
        <div class="store_index">검색색인</div>
        <input id="store_index" name="store_index" type="text" />
      </div>
      <div style="display:flex; height:30px; margin:30px 0; align-items:center; ">
        <div class="store_hashtag">해시태그</div>
        <input id="store_hashtag" name="store_hashtag" type="text" />
      </div>
      <div style="display:flex; height:30px; margin:30px 0; align-items:center; ">
        <div class="store_address">주소</div>
        <input id="store_address" name="store_address" type="text" />
      </div>
      <div style="display:flex; height:30px; margin:30px 0; align-items:center; ">
        <div class="store_img">이미지</div>
        <input id="store_img" name="store_img" type="file" onChange="file_select(this)" />
      </div>
      <div style="display:flex; height:30px; margin:10px 0; justify-content:center;">
        <div id="add_shop" style="" onclick="add_shop()">등록</div>
        <div id="cancel">취소</div>
      </div>
    </div>
  </div>
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
          <div id="add_store">등록</div>
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
  var selected_file = null

  $('#add_store').click(function(){
    $('.modal').css('display','block');
  })
  $('#cancel').click(function(){
    $('.modal').css('display','none');
  })
  
  function file_select(e){
    selected_file = e.files[0]
  }

  function add_shop(){
    var store_name = $('#store_name').val();
    var store_phone = $('#store_phone').val();
    var store_index = $('#store_index').val();
    var store_hashtag = $('#store_hashtag').val();
    var store_address = $('#store_address').val();
    
    if(selected_file == null){
      return alert("이미지를 선택해주세요")
    }
    
    if(store_name==""||store_phone==""||store_index==""||store_hashtag==""||store_address==""){
      alert('빈칸을 모두 채워주세요.');
    }else{

      api_insert_shop(store_name,store_address,store_phone,store_index,store_hashtag,selected_file, function(res){
        if(res.code==1){
          return location.href="./a.store.php";
        }else{
          alert("업체 등록에 실패하였습니다.")
        }    
      })
    }
  }



  function loadTemplate(id) { return document.getElementById(id).innerHTML; }

  $(function(){
    var temp = loadTemplate('store-slot');
    var rank_templete = _.template($("#store-slot").html());

    function load(i){
      api_shop_list(i, 10, function(res){
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
            data.payload[j].number = j+1
            let row = data.payload[j]
            $(".list-line").append(rank_templete(row))
          }
        }
      })
    }
    if('<?=$keyword?>' == ''){
      load(0);
    }else{
      loadByKeyword();
    }

  });

</script>

<script id="store-slot" type="text/template">
  <tr style="height:120px;">
    <td><input id="check" class="del_check" onclick="check('<%=_id%>')" type="checkbox"/></td>
    <td><%=number%></td>
    <td id="img_box"><img id="td-img"alt="store-img" onerror="this.src='./images/whereit_img_loading_m.png'"  src='<%=main_img%>' onclick="location.href='a.store_img.php?id=<%=_id%>'"/></td>
    <td><div style="cursor:pointer;" onclick="location.href='a.store_info.php?id=<%=_id%>'"><%=Name%></div></td>
    <td><%=phonenumber%></td>
    <td><%=food_category%></td>
    <td><%=hasgtag[0]%></td>
    <td><%=new_address%></td>
  </tr>
</script>

<script>
  var id_list = []
  function check(id){
    let index = id_list.indexOf(id);
    if(index !== -1){
      id_list.splice(index,1);
    } else{
      id_list.push(id)
    }

    
  }
  function del_btn(){

    for(let id of id_list){
      api_delete_shop(id)
      return location.href="./a.store.php"
    }
  }

</script>

</html>