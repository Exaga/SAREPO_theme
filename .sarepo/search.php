<?php

// Enter the FULL path of the root search directory
$pathSearchDir = '/home/phil/public_html/slackwarearm';

include 'html_head.php.inc';

?>
<div id="container">
  <main>
    <table id="banner" style="width:100%">
      <tr>
        <th><span class="banner_title" align="left">SAREPO</span><br /><span class="title" align="left">Slackware ARM local mirror repository</span></th>
		<th align="center"><a href="/slackwarearm/"><img src="/slackwarearm/.sarepo/sarepo_home.png" title="Home - Main Index" alt="Home - Main Index"/></a></th>
        <th align="right"><a href="https://github.com/Exaga/SAREPO_theme"><img src="/slackwarearm/.sarepo/SAREPO_Logo.png" title="SAREPO_theme on GitHub" alt="SAREPO_theme on GitHub"/></a></th>
      </tr>
    </table>
	<div id="searchform">
	<p><form action="" method="post">
      <input type="text" name="query" size="35" placeholder="Case sensitive file search..." />
      <input type="submit" value="Search" />
    </form></p></div>
<div id="content">
<?php

$pathLen = strlen($pathSearchDir);

if (isset($_POST['query'])) {
   $pattern = "/" . htmlspecialchars($_POST['query']) . "/";
   echo "<p><span class=\"pathindex\">Search result for:</span> <b>" . htmlspecialchars($_POST['query']) . "</b></p>";
}

$fileFilter = function ($searchFiles) {
   $thisFile = $searchFiles->getFilename();
   // Files and dirs to be skipped - e.g. $thisFile == '<name_of_file/dir>'
   if ($thisFile == '.htaccess') {
      return false;
   }
   if ($thisFile == '.sarepo') {
      return false;
   }
   return true;
};

$directoryIterator = new RecursiveDirectoryIterator($pathSearchDir, RecursiveDirectoryIterator::SKIP_DOTS);
$filterIterator    = new RecursiveCallbackFilterIterator($directoryIterator, $fileFilter);
$iteratorIterator  = new RecursiveIteratorIterator($filterIterator);
$regexIterator     = new RegexIterator($iteratorIterator, $pattern);

global $pathLen;

foreach ($regexIterator as $file) {
   $displayName = substr($file, $pathLen + 1);
   $fileName    = basename($file);
   $linkName    = str_replace(" ", "%20", substr($file, $pathLen - 13));
   if (is_dir($fileName)) {
      echo "<p><span class=\"pathindex\"><a href=\"" . $linkName . "\" style=\"text-decoration:none;\">" . $linkName . "</a></span></p>\n";
      myScanDir($fileName, $level + 1, strlen($fileName));
   } else {
      echo "<p><span class=\"pathindex\"><a href=\"" . $linkName . "\" style=\"text-decoration:none;\">" . $displayName . "</a></span></p>\n";
   }
}

include 'footer.php';

?>

