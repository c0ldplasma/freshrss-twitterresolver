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
        $this->registerHook('entry_before_display', array($this, 'convertTwitterUrls'));
    }

    /**
     * @param FreshRSS_Entry $entry
     * @return string
     */
    public function convertTwitterUrls($entry)
    {
        $matches = [];
        $loops = 0;
        while (preg_match('#https?://t\.co/[0-9a-zA-Z_-]{1,64}#', $entry->content(), $matches) === 1 && $loops <= 3) {
            $loops++;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $matches[0]);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            $a = curl_exec($ch);
            $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
            if (strcasecmp($url, $matches[0]) !== 0) {
                $entry->_content(str_replace($matches[0], '<a href="' . $url . '">' . $url . '</a>', $entry->content()));
                $entry->_title(str_replace($matches[0], $url, $entry->title()));
            } else {
                break;
            }
        }

        return $entry;
    }
}
