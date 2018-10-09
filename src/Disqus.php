<?php

namespace XD\Disqus;

use SilverStripe\Core\Config\Configurable;
use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

/**
 * Class Disqus
 *
 * @author Bram de Leeuw
 * @package httpdocs
 *
 * @property Disqus|\PageController $owner
 */
class Disqus extends Extension
{
    use Configurable;

    public function onAfterInit()
    {
        if ($shortName = self::config()->get('short_name')) {
            Requirements::insertHeadTags(sprintf(
                "<script>
                var disqus_config = function () {
                    this.page.url = '%s';
                    this.page.identifier = '%s';
                };
                (function() {
                    var d = document, s = d.createElement('script');
                    s.src = 'https://%s.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
                </script>",
                $this->owner->data()->AbsoluteLink(),
                $this->owner->data()->ID,
                $shortName
            ));
        }
    }
}
