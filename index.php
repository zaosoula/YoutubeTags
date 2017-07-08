<?
$attr = null;
$status = null;
$url = (!empty($_GET['url']))?$_GET['url']:null;
$v = (!empty($_GET['v']))?$_GET['v']:null;

  $debug =  $url.'/'.$v;
if($url!=null){
  if(preg_match("/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/", $url, $matches)){
    $ref = $matches[1];
    $url = 'https://www.youtube.com/watch?v='.$ref;
    // Create DOM from URL or file

      header('Location: watch?v='.$ref);

    }else{
      $attr = 'invalid';
    }
}elseif($v!=null){
  $attr = $v;
  if(preg_match("/^((\w|-){11})(?:\S+)?$/", $v, $matches)){
    $ref = $matches[1];
    $url = 'https://www.youtube.com/watch?v='.$ref;
    $status = true;

    $content = file_get_contents("http://www.youtube.com/get_video_info?video_id=".$ref);
    parse_str($content, $tags);
  }else{
    $attr = 'invalid';
    $url = 'https://www.youtube.com/watch?v='.$v;
  }

}
?>
<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
    <?
    if($status)
      echo '<title>'.$tags['title'].' - Youtube Tags</title>';
    else
      echo '<title>Youtube Tags</title>';
    ?>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="Content-Type" content="UTF-8">
    <meta name="Content-Language" content="fr">
    <meta name="Description" content="Le seul outil qui vous permet de récupérer toutes les informations d'une vidéo Youtube">
    <meta name="Copyright" content="© Zao Soula. All rights reserved">
    <meta name="Author" content="Zao Soula">
    <meta name="Publisher" content="Zao Soula">
    <meta name="Identifier-Url" content="youtubetags.com">
    <meta name="Revisit-After" content="31 days">
    <meta name="Robots" content="all">
    <meta name="Rating" content="general">
    <meta name="Distribution" content="global">
    <meta name="Category" content="internet">


		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="#intro">Youtube Tags</a></li>
              <?
                if($status){
                ?>
                <li><a href="#one">Miniatures</a></li>
                <li><a href="#two">Intégrer</a></li>
                <li><a href="#three">Tags</a></li>
                <?
                }
              ?>

						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
              <div class="row">
                <div class="6u 12u$(medium)">
    							<h1>Youtube Tags</h1>
    							<p>Le seul outil qui vous permet de récupérer toutes les informations d'une vidéo Youtube</a></p>
    							<form method="GET">
    								<ul class="actions">
    									<li><input type="text" name="url" id="url" placeholder="Video Url (https://youtube.com/watch?v=XXXX)" class="<? echo $attr;?>" value="<?echo$url?>"/></li>
    									<li><a  class="button submit">Récupérer les infos</a></li>
    								</ul>
    							</form>
                </div>
                <?if($status){?>
                <div class="6u 12u$(medium)">
                  <div class="video-container">
                    <input type="hidden" id="youtubeembed" value="https://www.youtube.com/embed/<?echo$ref?>"></iframe>
                  </div>
                </div>
                <?}else{?>
                  <div class="6u 12u$(medium) align-center">
                    <a class="button" href="javascript:if(window.location.host=='www.youtube.com' || window.location.host=='youtube.com'){window.location.href='https://youtube-tags.com'+window.location.pathname+window.location.search;}else{window.location.href='https://youtube-tags.com'}void(0);">Open in Youtube Tags</a><br>
                    Drag the button to your bookmarks bar <br> to open YouTube Tags more easily!
                  </div>
                  <?}?>
						</div>
          </div>
					</section>
        <?if($status){?>
				<!-- One -->
        <section id="one" class="wrapper style2 fade-up">
          <div class="inner">
            <h2>MINIATURES</h2>
            <p>Toutes les miniatures de la vidéo</p>
            <div class="features">
              <section>
                <span class="icon major fa-picture-o"></span>
                <h3>[HD] Haute Définition (1920×1080 pixels)</h3>
                <p><a href="download.php?url=http://img.youtube.com/vi/<?echo$ref?>/maxresdefault.jpg&name=maxresdefault.jpg&id=<?echo$ref?>"><img src="http://img.youtube.com/vi/<?echo$ref?>/maxresdefault.jpg" class="mini"></a></p>
              </section>
              <section>
                <span class="icon major fa-picture-o"></span>
                <h3>Définition Standard (640×480 pixels)</h3>
                <p><a href="download.php?url=http://img.youtube.com/vi/<?echo$ref?>/sddefault.jpg&name=sddefault.jpg&id=<?echo$ref?>"><img src="http://img.youtube.com/vi/<?echo$ref?>/sddefault.jpg" class="mini"></a></p>
              </section>
              <section>
                <span class="icon major fa-picture-o"></span>
                <h3>Vignette (480×360 pixels)</h3>
                <p><a href="download.php?url=http://img.youtube.com/vi/<?echo$ref?>/0.jpg&name=0.jpg&id=<?echo$ref?>"><img src="http://img.youtube.com/vi/<?echo$ref?>/0.jpg" class="mini"></a></p>
              </section>
              <section>
                <span class="icon major fa-picture-o"></span>
                <h3>Haute Qualité (480×360 pixels)</h3>
                <p><a href="download.php?url=http://img.youtube.com/vi/<?echo$ref?>/hqdefault.jpg&name=hqdefaulthqdefault.jpg&id=<?echo$ref?>"><img src="http://img.youtube.com/vi/<?echo$ref?>/hqdefault.jpg" class="mini"></a></p>
              </section>
              <section>
                <span class="icon major fa-picture-o"></span>
                <h3>Qualité moyenne (320×180 pixels)</h3>
                <p><a href="download.php?url=http://img.youtube.com/vi/<?echo$ref?>/mqdefault.jpg&name=mqdefault.jpg&id=<?echo$ref?>"><img src="http://img.youtube.com/vi/<?echo$ref?>/mqdefault.jpg" class="mini"></a></p>
              </section>
              <section>
                <span class="icon major fa-picture-o"></span>
                <h3>Qualité normale (120×90 pixels)</h3>
                <p><a href="download.php?url=http://img.youtube.com/vi/<?echo$ref?>/default.jpg&name=default.jpg&id=<?echo$ref?>"><img src="http://img.youtube.com/vi/<?echo$ref?>/default.jpg" class="mini"></a></p>
              </section>
            </div>

          </div>
        </section>

				<!-- Two -->
					<section id="two" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>INTÉGRER</h2>
							<p>Intégrer la vidéo à votre site en copiant ce code</p>
                <pre><code>&lt;iframe width="560" height="315" src="https://www.youtube.com/embed/<?echo$ref?>" frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;</code></pre>
						</div>
					</section>

        <!-- Three -->
        <section id="three" class="wrapper style4 fade-up">
          <div class="inner">
            <h2>TAGS</h2>
            <p>Tous les mots-clés associés à la vidéo</p>
              <?if(!empty($tags['keywords'])){
                echo '<ul class="actions">';
                foreach(explode(',',$tags['keywords']) as $tag)
                {

                      echo '<li><button class="button special tag">'.$tag.'</button></li>';

                }
                echo '</ul>';
              }else{
                echo '<button class="button special tag">AUCUN TAG</button>';

              }?>
          </div>
        </section>

    <?}?>
  </div>
		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; Zao Soula. All rights reserved.</li><li>Design: <a target="_blank"  href="http://html5up.net">HTML5 UP</a> & Develop: <a href="https://zaosoula.fr/">Zao Soula</a></li>
          </ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42595785-10', 'auto');
  ga('send', 'pageview');

</script>

	</body>
</html>
