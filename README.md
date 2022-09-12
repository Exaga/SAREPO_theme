# SAREPO_theme
SAREPO_theme is an Apache mod_autoindex fancyindexing front-end for viewing a Slackware ARM local mirror repository in a browser. It is designed to support https://github.com/Exaga/local-slackwarearm-repo and work in conjunction with the repository that's created and managed by that process.

**NB:** the SAREPO_theme has been designed to work with a Slackware ARM local mirror repository root directory named "slackwarearm". The  https://github.com/Exaga/local-slackwarearm-repo script creates this directory when it is first run. You can spend the time and effort editing this SAREPO_theme to suit your own requirements, but running and using it with the https://github.com/Exaga/local-slackwarearm-repo script is by far the easiest option. It's advised and prudent to setup and run that script first before installing this SAREPO_theme.

### Installing ###
Copy the .htaccess file and .sarepo directory to the normal users' Slackware ARM local mirror repository root directory. e.g. /home/username/public_html/slackwarearm/

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

As 'root' user, add a symlink to the Apache web root directory that points to the /home/username/public_html/slackwarearm dir:
```
root@slackware:~# cd /var/www/htdocs 
root@slackware:~# ln -s /home/username/public_html/slackwarearm slackwarearm
```

Access the Slackware ARM local mirror repository in a browser [e.g. http://localhost/slackwarearm or http://192.168.10.20/slackwarearm] to view the SAREPO_theme in effect.

### Uninstalling ###
Delete the .htaccess file and .sarepo directory from the Slackware ARM local mirror repository root directory.
```
username@slackware:~# rm -rf /home/username/public_html/slackwarearm/.htaccess
username@slackware:~# rm -rf /home/username/public_html/slackwarearm/.sarepo
```

