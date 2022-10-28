<?php
session_start();
$v->layout("../_theme");
?>

<body id="top-header">

  <?php
  $v->insert("../utils/navbar.php");
  ?>

  <section class="banner-area py-5" id="banner">
    <div class="overlay"></div>
  </section>

  <section class="section">
    <!-- Content -->
    <div class="container">
      <div class="table-text">
        <h2>Grupo: <?= $grupo->name ?></h2>
        <p><?= $grupo->description ?></p>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>Entrega</th>
            <th>Arquivo</th>
            <th>Data de Envio</th>
            <th>Prazo final</th>
            <th>Nota</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Front</td>
            <td><a href="./images/banner/banner.png" download="">Baixar Entrega</a></td>
            <td>19/10/2022</td>
            <td>19/10/2022</td>
            <td><a href="#!">Adicionar nota</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <?php
  $v->insert("../utils/to_top.php");
  ?>

<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
