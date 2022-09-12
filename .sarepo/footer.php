    <p align="center" class="footxt"><br /><a href="https://sarpi.penthux.net/files/extra/local-slackwarearm-repo.txt" target="_blank">SAREPO v2</a></p>
  </main>
  </div>
  <footer>
   <p>Host: <?php echo $_SERVER['HTTP_HOST']; ?>:<?php echo $_SERVER['SERVER_PORT']; ?> &bull; Remote: <?php echo $_SERVER['REMOTE_ADDR']; ?>:<?php echo $_SERVER['REMOTE_PORT']; ?></p>
    <p align="center"><a href="https://httpd.apache.org" target="_blank"><img src="https://sarpi.penthux.net/images/linkbanners/apache_88x31_trans.png" title="SAREPO is powered by Apache/2.x (Unix)" width="88" height="31"></a></p>
  </footer>
  </div>
  <script>
    function joinUntil(array, index, separator) {
      var result = [];

      for (var i = 0; i <= index; i++) {
        result.push(array[i]);
      }
      return result.join(separator);
    }

    var iconLinks = document.querySelectorAll('.indexcolicon a');
    Array.prototype.forEach.call(iconLinks, function(link) {
      link.setAttribute('tabindex', '-1');
    });

    var path = document.querySelector('.js-path');
    var pathParts = location.pathname.split('/');

    for (var i = 0; i < pathParts.length;) {
      if (pathParts[i]) {
        i++;
      } else {
        pathParts.splice(i, 1);
      }
    }

    var pathContents = ['<a href="./">.</a>'];
    Array.prototype.forEach.call(pathParts, function(part, index) {
      pathContents.push('<a href="/' + joinUntil(pathParts, index, '/') + '">' + decodeURI(part) + '</a>');
    });

    path.innerHTML = pathContents.join('&#47;');
  </script>
</body>
</html>