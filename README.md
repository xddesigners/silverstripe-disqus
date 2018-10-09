# SilverStripe Disqus 
Simple module for adding disqus to your site.

## Installation
Configure the short name of your disqus url:
```yml
XD\Disqus\Disqus:
  short_name: 'xddesigners'
```

Add the extension to the page type you want the disqus thread on:
```yml
SilverStripe\Blog\Model\BlogPostController:
  extensions:
    - XD\Disqus\Disqus
```