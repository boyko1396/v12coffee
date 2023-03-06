<?php

function rest($url, $data) {
$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $data
    )
);
$context  = stream_context_create($opts);
$result = file_get_contents("https://v12coffee.bitrix24.ua/rest/1937/fzf2ct7k25s12b9n/".$url, false, $context);
return json_decode($result);
}

$arr = [
 'mail' => "lidogeneratorv12@gmail.com",
 'name' => $_POST['user_name'],
 'phone' => $_POST['user_phone'],
 'utm_source' => $_POST['utm_source'],
 'utm_medium' => $_POST['utm_medium'],
 'utm_campaign' => $_POST['utm_campaign'],
 'utm_content' => $_POST['utm_content']

];

$message = '
 <html>
 <body>
 <center>
 <table border=1 cellpadding=6 cellsapcin=0 width=90% bordercolor="#DBDBDB">
 <tr><td colspan=2 align=center bgcolor="E4E4E4"><b>Информация</b></td></tr>
';

if (isset($_POST['user_name'])){
	$message .='<tr>
	<td><b>Имя</b></td>
	<td>'.$arr['name'].'</td>
	</tr>';
}
    $message .='<tr>
	<td><b>Телефон</b></td>
	<td>'.$arr['phone'].'</td>
	</tr>';

if (!empty($_POST['utm_source'])) {
   $message .= '<tr>
  <td><b>Источник кампании</b></td>
  <td>'.$arr['utm_source'].'</td>
 </tr>';
 }

if (!empty($_POST['utm_medium'])) {
   $message .= '<tr>
  <td><b>Тип трафика</b></td>
  <td>'.$arr['utm_medium'].'</td>
 </tr>';
 }

if (!empty($_POST['utm_campaign'])) {
   $message .= '<tr>
  <td><b>Название кампании</b></td>
  <td>'.$arr['utm_campaign'].'</td>
 </tr>';
 }

if (!empty($_POST['utm_content'])) {
   $message .= '<tr>
  <td><b>Идентификатор объявления</b></td>
  <td>'.$arr['utm_content'].'</td>
 </tr>';
 }   

    $message .='
  </table>
  </center>
  </body>
  </html>';    
$contact_add = rest("crm.contact.add", http_build_query(array("fields" => array(
              "NAME" => $_POST['user_name'],
              "PHONE" => array(array("VALUE" => $_POST['user_phone'], "VALUE_TYPE" => "WORK")),
              "UF_CRM_1658735248 " => $_POST['user_phone'],
              "TYPE_ID" => "CLIENT",
              "ASSIGNED_BY_ID" => 8819,              
              ),
              "params" => array(
                "REGISTER_SONET_EVENT" => "Y",
              ),
)));
$deal_add = rest("crm.deal.add", http_build_query(array("fields" => array(
              "TITLE" => 'Заявка з сайту',
              "UTM_CONTENT" => $_POST['utm_content'],
              "UTM_CAMPAIGN" => $_POST['utm_campaign'],
              "UTM_MEDIUM" => $_POST['utm_medium'],
              "UTM_SOURCE" => $_POST['utm_source'],
              "UTM_TERM" => $_POST['utm_term'],
              "ASSIGNED_BY_ID" => 8819,
              "STAGE_ID" => "C11:NEW",
              "CATEGORY_ID" => 11,
              "CONTACT_ID" => $contact_add->result,
              ),
              "params" => array(
                "REGISTER_SONET_EVENT" => "Y",
              ),
            )));

$headers = "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: New Message <admin@v12coffee.com.ua>\r\n";
$result = mail($arr['mail'], $arr['subject'], $message, $headers);

header("Refresh: 5; URL=/");
?>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
  <meta http-equiv="refresh" content="5; url=/">
  <title>Дякуємо! Ми вам зателефонуємо!</title>
  <meta name="generator">
  <script type="text/javascript">
    setTimeout('location.replace("/")', 55000);
  </script>
  <link href="/img/favicon.png" type="image/png" rel="icon">
  <link rel="stylesheet" href="/css/style.min.css?923602358433">
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '820794729077925');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=820794729077925&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '621046626340192');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=621046626340192&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '471780618166141');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=471780618166141&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-235221948-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-235221948-1');
</script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TD7MBX2JCQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-TD7MBX2JCQ');
</script>
  





</head>
<body>

  <div class="site">
    <!-- header BEGIN -->
    <header class="header">
      <div class="container header__container">
        <a href="#intro-section" class="js-link-anchor logo logo--size-sm header__logo">
          <img src="img/logo.svg" alt="V12 Coffee To Go" class="img logo__img" width="78px" height="74px">
        </a>
        <nav class="nav header__nav" role="navigation">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="/#partners-section" class="js-link-anchor nav__link">На чому заробляють</a>
            </li>
            <li class="nav__item">
              <a href="/#opportunities-section" class="js-link-anchor nav__link">Локації</a>
            </li>
            <li class="nav__item">
              <a href="/#why-we-section" class="js-link-anchor nav__link">Чому саме ми?</a>
            </li>
            <li class="nav__item">
              <a href="/#stand-section" class="js-link-anchor nav__link">Вигляд стійки</a>
            </li>
            <li class="nav__item">
              <a href="/#franchise-section" class="js-link-anchor nav__link">Ціна</a>
            </li>
          </ul>
        </nav>
        <div class="contacts-block header__contacts">
          <div class="contacts-block__inner">
            <ul class="contacts-block__list">
              <li class="contacts-block__item contacts-block__item--phone">
                <a href="tel:0686250573" class="contacts-block__phone color-accent">068 625 05 73</a>
              </li>
              <li class="contacts-block__item">
                <a href="https://www.instagram.com/v12_coffee_togo/" target="_blank" class="contacts-block__social-link">
                  <img src="img/svg/instagram.svg" alt="Instagram" class="contacts-block__img" width="36px" height="36px">
                </a>
              </li>
              <li class="contacts-block__item">
                <a href="tel:+380638426123" target="_blank" class="contacts-block__social-link">
                  <img src="img/svg/viber.svg" alt="Viber" class="contacts-block__img" width="36px" height="36px">
                </a>
              </li>
              <li class="contacts-block__item">
                <a href="https://t.me/V12CoffeeToGo" target="_blank" class="contacts-block__social-link">
                  <img src="img/svg/telegram.svg" alt="Telegram" class="contacts-block__img" width="36px" height="36px">
                </a>
              </li>
            </ul>
          </div>
        </div>
        <button class="js-header-toggle header__toggles">
          <span class="header__toggle"></span>
          <span class="header__toggle"></span>
          <span class="header__toggle"></span>
        </button>
      </div>
    </header>
    <!-- header END -->
    <!-- thanks-section BEGIN -->
    <section class="thanks-section">
      <div class="container thanks-section__container">
        <div class="thanks-section__inner">
          <h1 class="thanks-section__title">Дякуємо за заявку!</h1>
          <p class="thanks-section__description">Ми зв'яжемося з вами найближчим часом!</p>
          <a href="/" class="btn thanks-section__btn">На головну</a>
        </div>
      </div>
    </section>
    <!-- thanks-section END -->
    <!-- footer BEGIN -->
    <footer class="footer">
      <div class="container footer__container">
        <a href="#intro-section" class="js-link-anchor logo logo--size-md footer__logo">
          <img src="img/logo.svg" alt="V12 Coffee To Go" class="logo__img" width="78px" height="74px">
        </a>
        <nav class="nav footer__nav" role="navigation">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="#" class="nav__link">ТЗоВ "В-12 Кофі Ту Гоу"</a>
            </li>
            <li class="nav__item">
              <a href="#" class="nav__link">Політика конфіденційності</a>
            </li>
          </ul>
        </nav>
        <div class="footer__language">
          <a href="/" class="link">Укр</a> \ <a href="/ru/" class="link">Рос</a>
        </div>
        <div class="contacts-block footer__contacts">
          <div class="contacts-block__inner">
            <ul class="contacts-block__list">
              <li class="contacts-block__item contacts-block__item--phone">
                <a href="tel:0686250573" class="contacts-block__phone color-accent">068 625 05 73</a>
              </li>
              <li class="contacts-block__item">
                <a href="https://www.instagram.com/v12_coffee_togo/" target="_blank" class="contacts-block__social-link">
                  <img src="img/svg/instagram.svg" alt="Instagram" class="contacts-block__img" width="36px" height="36px">
                </a>
              </li>
              <li class="contacts-block__item">
                <a href="tel:+380638426123" target="_blank" class="contacts-block__social-link">
                  <img src="img/svg/viber.svg" alt="Viber" class="contacts-block__img" width="36px" height="36px">
                </a>
              </li>
              <li class="contacts-block__item">
                <a href="https://t.me/V12CoffeeToGo" target="_blank" class="contacts-block__social-link">
                  <img src="img/svg/telegram.svg" alt="Telegram" class="contacts-block__img" width="36px" height="36px">
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- footer END -->
  </div>

</body>
</html>