<?php $page="magazine"; ?>
<?php 

?>

<?php include_once('./head.php'); ?>
    <div class="move-top">
      <img id="top" src="./images/top.png" />
      <img id="hover" src="./images/top-hover.png" />
      <img id="click" src="./images/top-click.png" />
      <br>TOP
    </div>
    <div class="main">
      <div class="news-list">
        <?php for($i=0; $i<3; $i++) { ?>
        <div class="list-item">
          <div class="item-picture">
            <img src="./images/cafe<?php echo $i+1;?>.jpg" />
          </div>
          <div class="item-info">
            <div class="info-date">
              2018.08.02
            </div>
            <div class="theme-title">
              강남역 인근에서<br>풀코스로 놀기
            </div>
            <div class="text">
              인파가 많은 강남역의 큰길은 프렌차이즈 업체들이 즐비해있다.<br>
              언제나 새롭고 맛있는 곳을 추구하는 인스타그래머들은 강남역에서<br>
              어디를 갈까? 추억을 남길 수 있는 장소를 레모네이드가 찾아 보았다.
            </div>
            <div class="more">
              <div id="text">
                VIEW MORE
              </div>
              <img src="./images/more.png">
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="news-detail">
        <div class="detail-date">
          2018.08.02
        </div>
        <div class="detail-title">
          강남역 인근에서 풀코스로 놀기
        </div>
        <div class="main-photo">
          <img src="./images/cafe1.jpg" />
        </div>
        <div class="detail-text">
          <p>
            input type은 여러가지가 있는데 그중에 text는 그냥 글 한줄 넣겠다는 의미다. 별거 아니다.<br>
            그리고 name이 idx2 인데 그냥 보통 id 대신에 idx라고 많이 쓴단다. 2는 왜 있을까? 1이 실패했으니까 2겠지 <br>
            여튼 근데 이게 중요한듯 하다. 왜냐면 니가 입력한 그 글한줄 의 이름이 바로 idx2가 된다. 썅따옴표 기억해라. 두번해라...<br>
            여튼 그 아래 submit은 버튼 만들어준다. value는 그 버튼 표면에 적히는 이름이다.<br>
            (포장지 같은거지 머. 키보드자판에 한글이 인쇄된거랑 비슷하다)<br> 
            음 그리고 reset은 그 한줄을 지워버리는거다. 별거아님 value는 같은 의미고,<br>
            <br><br> 
            여기서 잠깐.<br>
            아까 미룬 POST한번 보자. 이건 그냥 어떤 정보를 전달하는 방식이다.<br> 
            GET과 POST두개가 있다. get이 빠른데 보안이 약하다.<br>
            그니까 그냥 post 써라. 초보면 이것만 알자. 나도 이것만 안다. 쉽지? <br>
            그래서 post는 내가 아래서 입력받은 그 한줄을 idx2라는 이름에 넣는다. 그리고 그걸 가지고 php파일에 넘겨주는 역할을 한다.<br>
            다시 말하면 임시저장창고 같은거다. 파일과 파일 사이를 연결해주는 거. 이사갈때 잠깐 이삿짐 자동차에다가 짐 싣자나? 비슷한거다.<br>
            포장 방식이 post냐 get이냐 차이일뿐. 자 이제 php 보자. 노란색이 핵심이다.<br>
            head 윗 부분은 드림위버 cs6에서 자동으로 만들어준거다. 별거 아니다. 모르면 걍 쌩까자.<br>
          </p>
        </div>
        <div class="sub-photo">
          <img src="./images/cafe2.jpg" />
        </div>
        <div class="detail-text">
          <p>
            input type은 여러가지가 있는데 그중에 text는 그냥 글 한줄 넣겠다는 의미다. 별거 아니다.<br>
            그리고 name이 idx2 인데 그냥 보통 id 대신에 idx라고 많이 쓴단다. 2는 왜 있을까? 1이 실패했으니까 2겠지 <br>
            여튼 근데 이게 중요한듯 하다. 왜냐면 니가 입력한 그 글한줄 의 이름이 바로 idx2가 된다. 썅따옴표 기억해라. 두번해라...<br>
            여튼 그 아래 submit은 버튼 만들어준다. value는 그 버튼 표면에 적히는 이름이다.<br>
            (포장지 같은거지 머. 키보드자판에 한글이 인쇄된거랑 비슷하다)<br> 
            음 그리고 reset은 그 한줄을 지워버리는거다. 별거아님 value는 같은 의미고,<br>
            <br><br> 
            여기서 잠깐.<br>
            아까 미룬 POST한번 보자. 이건 그냥 어떤 정보를 전달하는 방식이다.<br> 
            GET과 POST두개가 있다. get이 빠른데 보안이 약하다.<br>
            그니까 그냥 post 써라. 초보면 이것만 알자. 나도 이것만 안다. 쉽지? <br>
            그래서 post는 내가 아래서 입력받은 그 한줄을 idx2라는 이름에 넣는다. 그리고 그걸 가지고 php파일에 넘겨주는 역할을 한다.<br>
            다시 말하면 임시저장창고 같은거다. 파일과 파일 사이를 연결해주는 거. 이사갈때 잠깐 이삿짐 자동차에다가 짐 싣자나? 비슷한거다.<br>
            포장 방식이 post냐 get이냐 차이일뿐. 자 이제 php 보자. 노란색이 핵심이다.<br>
            head 윗 부분은 드림위버 cs6에서 자동으로 만들어준거다. 별거 아니다. 모르면 걍 쌩까자.<br>
          </p>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include_once('./script/move_top_js.php'); ?>
<?php include_once('./script/news_more_js.php'); ?>
<?php include_once('./script/dropdown_js.php'); ?>
</html>