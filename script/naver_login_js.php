<script type="text/javascript">
	var naverLogin = new naver.LoginWithNaverId(
		{
			clientId: "T2gAKVtQHVUdwkqP3sew",
			callbackUrl: "http://whereit.kr//naver.login.php",
      isPopup: false, /* 팝업을 통한 연동처리 여부 */
			loginButton: {color: "white", type: 1, height: 34} /* 로그인 버튼의 타입을 지정 */
		}
	);
	
  naverLogin.init();
  let img = $('#naverIdLogin_loginButton')[0].children[0]
  img.src = '../images/sns/sns_naver.png'

</script>