<?php
include 'html.php';

$html = file_get_html('https://www.aparatchi.com/afghan-live-tv/afghan-live-tv-entertainment/tolo-tv');
$videoSrc = $html->find('source', 0)->src;
?>


<html>

<head>
  <meta charset="utf-8">
  <title>Plyr HLS</title>
  <!-- Plyr style sheet -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/plyr/3.3.5/plyr.css" />
</head>

<body>
  <!-- HLS support -->
  <script src="//cdn.jsdelivr.net/hls.js/latest/hls.js"></script>
  <!-- Plyr -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/plyr/3.3.5/plyr.min.js"></script>

  <video preload="none" id="player" controls crossorigin></video>

</body>
<script type="text/javascript">
  var video = document.querySelector('video');
  if (Hls.isSupported()) {
    var hls = new Hls();
    hls.loadSource(`<?php echo$videoSrc?>`);
    hls.attachMedia(video);
  }

  var player = new Plyr(video, {
    resetOnEnd: true
  });
</script>

</html>

<?php

?>
