<?php $page="signup" ?>
<?php include_once("./m.head.php") ?>
  <div class="main">
    <div class="sign-center">
      <div class="page-num1">
        <div class="num">
          01
        </div>
        <div style="font-size:45px; margin-bottom:50px; font-weight:bold; color:#504f57;">
          회원가입
        </div>
        <div style="margin-bottom:40px; color:#504f57; font-size:22px;">
          회원가입에 필요한<br>
          <b>이메일</b>과<b>비밀번호</b>를 입력해주세요.
        </div>
        <div class="sign-form">
          <div>
            <input id="sign-mail" type="text" name="sign-mail" placeholder="이메일을 입력해주세요(whereit@whereit.kr)" />
            <input id="sign-pw" type="password" name="sign-pw" placeholder="비밀번호를 입력해주세요(8자 이상 입력해주세요)" />
          </div>  
          <div class="next-btn">
            <button id="next-btn1">NEXT</button>
          </div>
        </div>
      </div>
      <div class="page-num2">
        <div class="num">
          02
        </div>
        <div style="font-size:45px; margin-bottom:50px; font-weight:bold; color:#504f57;">
          회원가입
        </div>
        <div style="margin-bottom:40px; color:#504f57; font-size:22px;">
          회원님만의 <b>멋진 닉네임</b>을
          <br>만들어주세요.
        </div>
        <div class="sign-form">
          <div>
            <input id="username" type="text" name="username" placeholder="4~16자의 한글, 영문 또는 숫자로 입력해주세요." maxlength="16" />              
            <div class="accept">
              <div id="accept">
                이용약관
              </div>
              <div id="agree3">
                동의함
              </div>
              <div class="checkbox3">
                <img src="images/box.png"/>
              </div>
            </div>  
          </div> 
          <div class="next-btn">
            <button id="next-btn2">NEXT</button>
          </div> 
        </div>
      </div>
      <div class="signup-end">
        <div class="end-center">
          <div class="end">
            회원가입이 <b>완료</b>되었습니다.
          </div>
          <div style="margin-bottom: 100px; color:#504f57; color:#504f57; font-size:22px;">
            입력하신 이메일에서 <b>인증절차를 마무리</b> 해주세요.
          </div>
          <div class="home-btn">
            <button id="home-btn" onclick="location.href='m.index.php'">HOME</button>
          </div>
        </div>
      </div>
      <div class="accept-contents">
        <div class="contents">
          <div class="flex" style="align-items:center;">
            <div id="view-accept"style="font-size:20px; flex:1; text-align:left; color:#504f57;">
              이용약관
            </div>
            <div class="checkbox1">
              <div id="agree1">동의함</div>
              <div id="checkbox1">
                <img src="images/box.png"/>
              </div>
            </div>
          </div>
          <div class="box">
            <div class="contents-box">
              계절이 지나가는 하늘에는
              가을로 가득 차있습니다。

              나는 아무 걱정도 없이
              가을속의 별들을 다 헤일듯합니다。

              가슴속에 하나 둘 새겨지는 별을
              이제 다 못헤는것은
              쉬이 아침이 오는 까닭이오、
              내일밤이 남은 까닭이오、
              아직 나의 청춘이 다하지 않은 까닭입니다。

              별하나에 追憶(추억)과
              별하나에 사랑과
              별하나에 쓸쓸함과
              별하나에 憧憬(동경)과
              별하나에 詩(시)와
              별하나에 어머니、어머니、

              어머님、나는 별 하나에 아름다운 말 한마디식 불러봅니다.
              小學校(소학교) 때 冊床(책상)을 같이 햇든 아이들의 
              일홈과 佩(패)、 鏡(경)、玉(옥) 이런 異國少女(이국소녀)들의 
              일홈과 벌서 애기 어머니 된 게집애들의 일홈과、가난한 이웃사람들의 
              일홈과、비둘기、강아지、토끼、노새、노루、｢푸랑시쓰․쨤｣ ｢라이넬․마리아․릴케｣ 
              이런 詩人(시인)의 일홈을 불러봅니다。

              이네들은 너무나 멀리 있습니다。
              별이 아슬이 멀듯이、

              어머님、
              그리고 당신은 멀리 北間島(북간도)에 게십니다。

              나는 무엇인지 그러워
              이많은 별빛이 나린 언덕우에
              내 일홈자를 써보고、
              흙으로 덥허 버리엿습니다。

              따는 밤을 새워 우는 버레는
              부끄러운 일홈을 슬퍼하는 까닭입니다。
              (一九四一、十一、五.)[1]

              그러나 겨을이 지나고 나의 별에도 봄이 오면
              무덤우에 파란 잔디가 피여나듯이
              내일홈자 묻힌 언덕우에도
              자랑처럼 풀이 무성 할게외다
            </div>
          </div>
        </div>
        <div class="contents">
          <div class="flex" style="align-items:center;">
            <div style="font-size:20px; flex:1; text-align:left; color:#504f57;">
              개인정보 이용 약관
            </div>
            <div class="checkbox2">
              <div id="agree2">동의함</div>
              <div id="checkbox2">
                <img src="images/box.png"/>
              </div>
            </div>
          </div>
          <div class="box">
            <div class="contents-box">
              계절이 지나가는 하늘에는
              가을로 가득 차있습니다。

              나는 아무 걱정도 없이
              가을속의 별들을 다 헤일듯합니다。

              가슴속에 하나 둘 새겨지는 별을
              이제 다 못헤는것은
              쉬이 아침이 오는 까닭이오、
              내일밤이 남은 까닭이오、
              아직 나의 청춘이 다하지 않은 까닭입니다。

              별하나에 追憶(추억)과
              별하나에 사랑과
              별하나에 쓸쓸함과
              별하나에 憧憬(동경)과
              별하나에 詩(시)와
              별하나에 어머니、어머니、

              어머님、나는 별 하나에 아름다운 말 한마디식 불러봅니다.
              小學校(소학교) 때 冊床(책상)을 같이 햇든 아이들의 
              일홈과 佩(패)、 鏡(경)、玉(옥) 이런 異國少女(이국소녀)들의 
              일홈과 벌서 애기 어머니 된 게집애들의 일홈과、가난한 이웃사람들의 
              일홈과、비둘기、강아지、토끼、노새、노루、｢푸랑시쓰․쨤｣ ｢라이넬․마리아․릴케｣ 
              이런 詩人(시인)의 일홈을 불러봅니다。

              이네들은 너무나 멀리 있습니다。
              별이 아슬이 멀듯이、

              어머님、
              그리고 당신은 멀리 北間島(북간도)에 게십니다。

              나는 무엇인지 그러워
              이많은 별빛이 나린 언덕우에
              내 일홈자를 써보고、
              흙으로 덥허 버리엿습니다。

              따는 밤을 새워 우는 버레는
              부끄러운 일홈을 슬퍼하는 까닭입니다。
              (一九四一、十一、五.)[1]

              그러나 겨을이 지나고 나의 별에도 봄이 오면
              무덤우에 파란 잔디가 피여나듯이
              내일홈자 묻힌 언덕우에도자랑처럼 풀이 무성 할게외다
            </div>
          </div>
        </div>
        <div class="confirm-btn">
          <button id="confirm-btn">CONFIRM</button> 
        </div>
      </div>
    </div>
  </div>
<?php include_once("./m.footer.php") ?>