Wordpress Starter for Devs
==========

Simple wordpress starter with no customization. Good for devs.

This theme uses LESS (though could just use CSS or even support similar SCSS in the future).


## Setup
1. Copy this theme to your WP install and rename the folder
1. Change **THEME_DOMAIN** constant in *functions.php*
1. (optional) Copy the HTACCESS code to get gzip/expiring included
1. Start adding custom pages! Try to keep things as simple as possible.

## HTACCESS
```
# gzip compression.
<IfModule mod_deflate.c>
  # html, xml, css, and js:
  AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css application/x-javascript text/javascript application/javascript application/json
  # webfonts and svg:
  <FilesMatch "\.(ttf|otf|eot|svg)$" >
    SetOutputFilter DEFLATE
  </FilesMatch>
</IfModule>

# these are pretty far-future expires headers
# they assume you control versioning with cachebusting query params like
#   <script src="application.js?20100608">
# additionally, consider that outdated proxies may miscache
#   www.stevesouders.com/blog/2008/08/23/revving-filenames-dont-use-querystring/
# if you don't use filenames to version, lower the css and js to something like
#   "access plus 1 week" or so
<IfModule mod_expires.c>
  Header set cache-control: public
  ExpiresActive on

  # Perhaps better to whitelist expires rules? Perhaps.
  ExpiresDefault                          "access plus 1 month"
  # cache.manifest needs re-reqeusts in FF 3.6 (thx Remy ~Introducing HTML5)
  ExpiresByType text/cache-manifest       "access plus 0 seconds"
  # your document html
  ExpiresByType text/html                  "access"
  # rss feed
  ExpiresByType application/rss+xml       "access plus 1 hour"
  # favicon (cannot be renamed)
  ExpiresByType image/vnd.microsoft.icon  "access plus 1 week"
  # media: images, video, audio
  ExpiresByType image/png                 "access plus 1 month"
  ExpiresByType image/jpg                 "access plus 1 month"
  ExpiresByType image/jpeg                "access plus 1 month"
  ExpiresByType video/ogg                 "access plus 1 month"
  ExpiresByType audio/ogg                 "access plus 1 month"
  ExpiresByType video/mp4                 "access plus 1 month"
  # webfonts
  ExpiresByType font/ttf                  "access plus 1 month"
  ExpiresByType font/woff                 "access plus 1 month"
  ExpiresByType image/svg+xml             "access plus 1 month"
  # css and javascript
  ExpiresByType text/css                  "access plus 1 month"
  ExpiresByType application/javascript    "access plus 1 month"
  ExpiresByType text/javascript           "access plus 1 month"
</IfModule>

# Since we're sending far-future expires, we don't need ETags for
# static content.
#   developer.yahoo.com/performance/rules.html
#etags
FileETag None
```
