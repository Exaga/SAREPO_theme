# SAREPO_theme
SAREPO_theme is an Apache mod_autoindex fancyindexing front-end for viewing a Slackware ARM local mirror repository in a browser. It is designed to support https://github.com/Exaga/local-slackwarearm-repo and work in conjunction with the repository that's created and managed by that process.

### SAREPO_theme working LIVE demo: https://sarpi.penthux.net/index.php?p=sarepo ###

SAREPO_theme features a basic file search function that's PHP driven. **Blank spaces and/or wildcards are unsupported search parameters!** PHP v7+ needs to be enabled on the host server in order to use the search function. For those who do not have PHP v7+ capabilities, header.html and footer.html files are included.

![Image1](https://user-images.githubusercontent.com/19157861/189742610-ed412292-0a20-465a-9e56-9b4cfcf760d6.jpg)

### Notes ###
* This SAREPO_theme is highly configurable - it all depends on how much time and effort one wants to dedicate towards customizing it.
* When browsing via the directory tree, the "Index of ./**path**/**of**/**dir**" elements can be clicked on and used for navigation.
* While using the search function, a "Home" icon appears at the top of the screen which can be clicked on to take you back to the main index page.

![Image2](https://user-images.githubusercontent.com/19157861/189724616-551b75b5-cb33-49cc-86dd-71eadfb69298.jpg)

**NB:** the SAREPO_theme has been designed to work with a Slackware ARM local mirror repository root directory named "slackwarearm". The  https://github.com/Exaga/local-slackwarearm-repo script creates this directory when it is first run. You can spend the time and effort editing this SAREPO_theme to suit your own requirements, but running and using it with the https://github.com/Exaga/local-slackwarearm-repo script is by far the easiest option. It's advised and prudent to setup and run that script first before installing this SAREPO_theme.

### Downloading ###
```
username@slackware:~$ git clone https://github.com/Exaga/SAREPO_theme
```

### Installing ###
Copy the .htaccess file and .sarepo directory to the normal users' Slackware ARM local mirror repository root directory. e.g. /home/username/public_html/slackwarearm/

### Configuring ###
Edit the .htaccess file in the root dir (**NOT** the one in the .sarepo dir!) and set the IndexStyleSheet, HeaderName, and ReadmeName file paths correctly:
```
  # CSS and HTML/PHP output 
  IndexStyleSheet "/slackwarearm/.sarepo/sarepo_theme.css"  
  HeaderName "/slackwarearm/.sarepo/header.php"
  ReadmeName "/slackwarearm/.sarepo/footer.php"
```
**NB:** There are header.html and footer.html files available for those who do not have PHP server capabilities. In this case, just change header.php and footer.php to header.html and footer.html respectively.

Edit the .sarepo/search.php file and set the $pathSearchDir variable. This is the full path to the Slackware ARM local mirror repository root directory named "slackwarearm".
```
// Enter the FULL path of the root search directory
$pathSearchDir = '/home/username/public_html/slackwarearm';
```


As '**root**' user, add a symlink to the Apache web document root directory that points to the /home/username/public_html/slackwarearm dir:
```
root@slackware:~# cd /var/www/htdocs 
root@slackware:~# ln -s /home/username/public_html/slackwarearm slackwarearm
```

Access the Slackware ARM local mirror repository in a browser [e.g. http://localhost/slackwarearm or http://192.168.10.20/slackwarearm] to view the SAREPO_theme in effect.

* There may be other settings (e.g. within the .htaccess file) that you need to review, or add, in order to suit your existing system setup.

![Image1](https://user-images.githubusercontent.com/19157861/189724543-b48a258d-36a0-4fe6-b00d-4fcea33aeeec.jpg)


### Uninstalling ###
Delete the .htaccess file and .sarepo directory from the Slackware ARM local mirror repository root directory.
```
username@slackware:~$ rm -rf /home/username/public_html/slackwarearm/.htaccess
username@slackware:~$ rm -rf /home/username/public_html/slackwarearm/.sarepo
```


