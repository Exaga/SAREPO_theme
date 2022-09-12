# SAREPO_theme
SAREPO_theme is an Apache mod_autoindex fancyindexing front-end for viewing a Slackware ARM local mirror repository in a browser. It is designed to support https://github.com/Exaga/local-slackwarearm-repo and work in conjunction with the repository that's created and managed by that process.

**NB:** the SAREPO_theme has been designed to work with a Slackware ARM local mirror repository root directory named "slackwarearm". The  https://github.com/Exaga/local-slackwarearm-repo script creates this directory when it is first run. You can spend the time and effort editing this SAREPO_theme to suit your own requirements, but running and using it with the https://github.com/Exaga/local-slackwarearm-repo script is by far the easiest option.

### Installing ###
Copy the .htaccess file and .sarepo directory to the Slackware ARM local mirror repository root directory. e.g. /home/username/public_html/slackwarearm/

### Configuring ###
Edit the .htaccess file in the root dir (**NOT** the one in the .sarepo dir!) and set the following paths correctly:
```
  # CSS and HTML/PHP output 
  IndexStyleSheet "/slackwarearm/.sarepo/sarepo_theme.css"  
  HeaderName "/slackwarearm/.sarepo/header.php"
  ReadmeName "/slackwarearm/.sarepo/footer.php"
```

Edit the .sarepo/search.php file and set the $pathSearchDir variable. This is the full path to the Slackware ARM local mirror repository root directory named "slackwarearm".
```
// Enter the FULL path of the root search directory
$pathSearchDir = '/home/username/public_html/slackwarearm';
```
