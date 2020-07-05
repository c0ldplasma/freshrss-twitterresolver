<?php

/**
 * Class TwitterResolverExtension
 *
 * Latest version can be found at https://github.com/c0ldplasma/freshrss-twitterresolver
 *
 * @author C0ldPlasma
 */
class TwitterResolverExtension extends Minz_Extension
{

    /**
     * Initialize this extension
     */
    public function init()
    {
        $this->registerHook('entry_before_display', array($this, 'embedYouTubeVideo'));
        $this->registerTranslates();
    }

    /**
     * @param string $url
     * @return string
     */
    public function convertYoutubeFeedUrl($url)
    {
        $matches = [];

        if (preg_match('#^https?://t\.co/([0-9a-zA-Z_-]{1,64})#', $url, $matches) === 1) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $a = curl_exec($ch);
            $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        }

        return $url;
    }
}
