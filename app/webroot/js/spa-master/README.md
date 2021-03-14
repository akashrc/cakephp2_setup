# Turn any site into an SPA with a single line of Javascript

This is a pure Javascript / client side mechanism for turning your pre-existing legacy website into something suitable for working with persistent websocket connections and site-wide local web-workers.

## Why?

*"Wouldn't it be nice to write a real-time widget that you can plug into a website and provide facilities like chat that are available across the entire site, maybe even a WebRTC video chat?"*

Yes, but the problem is that as soon as someone clicks on a link to move to another page in the site, any websocket connections or local webworkers are cut down in their tracks. Now although it's possible to code around this, it's not clean, efficient, scalable, or terribly easy to manage. Net effect, it's often seen as a poor investment to develop real-time tools for pre-existing websites and instead there is a focus on writing *new* specially designed single page applications to cater for such requirements. (things like Facebook for example)

## Why not?
Wouldn't it be nice if we could convert all websites into SPA's, then it would be worthwhile writing real-time widgets because everyone could use them?! Well, yes, so here it is;

```javascript
<script type="text/javascript" src="js/iflex_spa.js" defer></script>
```
## What does it work with?
Thus far I'm testing with Wordpress and SMF (forums), there are always caveats but there are now a few live sites that seem to be pretty much 100%.

## How does it work?
In principle, it overrides the **href** and **submit** tags on a page, so when you click on something that would traditionally take you to a new page, instead it uses the URL to perform an ajax call to recover the desired destination, then it replaces your pre-existing **head** and **body** tags with tags from the recovered page, while as the same time rearranging all your script tags so they appear at the bottom of your **body** section. With a little additional manipulation the address bar, back button and page title are made to emulate their normal functions, and short of shortcomings yet to be recognised, that's about all there is to it.

## How do we add real-time widgets?

However you wish, as the site becomes one page, so long as you make sure your persistent components are referenced by global variables, they should effectively persist between pages. In addition we currently use a global callback array so you can install a handler to be called every time someone switches pages, like so;

```javascript
// my real-time app
jQuery(document).ready(function() {
    iflex_spa_callbacks['my_label'] = my_page_handler;
});

```
## What could go wrong?

Obviously lots, but bugs aside it's predominantly likely to be people coding using global variables or just dumping Javascript snippets in the global namespace. Whereas generally this will be ok, traditionally assumptions are made about the state of the global namespace when a page is loaded, and using this approach, some of those assumptions no longer hold.

## Warning:

This is an initial release, there is a reasonable chance that adding this code to your site may cause something on your site not to function as it might normally, please test exhaustively on a backup site before taking this anywhere near your live site. Once you have it up (live or otherwise) please let us know!

## Wordpress plugin

Type **make**, this will yield a zip file in the **dist** folder. This can then be installed on your wordpress site by installing from the control panel using the **upload file** option.

## Example sites

* [https://linux.co.uk/](https://linux.co.uk/)
* [https://linuxforums.org.uk/](https://linuxforums.org.uk/)
* [https://peppermintos.com/](https://peppermintos.com/)
* [http://nutpress.co.uk/](http://nutpress.co.uk/)

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MGF6AU8SWLFJL)