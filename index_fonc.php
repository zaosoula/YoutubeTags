<?
if(!empty($_GET['url'])){
  preg_match("/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/", $_GET['url'], $matches);
  $url = 'https://www.youtube.com/watch?v='.$matches[1];
  // Create DOM from URL or file
  $html = file_get_contents($url);

var_dump(getMetaTags($html));
}

function getMetaTags($str)
{
$pattern = '
~<\s*meta\s

# using lookahead to capture type to $1
  (?=[^>]*?
  \b(?:name|property|http-equiv)\s*=\s*
  (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
  ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
)

# capture content to $2
[^>]*?\bcontent\s*=\s*
  (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
  ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
[^>]*>

~ix';

if(preg_match_all($pattern, $str, $out))
  return array_combine_($out[1], $out[2]);
return array();
}
function array_combine_($keys, $values)
{
  $result = array();
  foreach ($keys as $i => $k) {
      $result[$k][] = $values[$i];
  }
  array_walk($result, create_function('&$v', '$v = (count($v) == 1)? array_pop($v): $v;'));
  return    $result;
}

?>
<form method="GET">
  <input type="text" name="url" id="url" />
  <button id="valid"> Get tags </button>
</form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!--<script>
function ytVidId(url) {
  var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
  return (url.match(p)) ? RegExp.$1 : false;
}
$('#valid').click(function(){
  var video_id=ytVidId($('#url').val());

  var $url = 'https://www.youtube.com/watch?v=' + video_id;

  $.ajax({
        url: url,
        type: "GET",
        timeout: 5000,
        datattype: "html",
        success: function(result) {
        alert(result);
        },
    });
});

</script>-->
