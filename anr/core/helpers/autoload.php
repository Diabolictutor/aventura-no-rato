<?php

/**
 * 
 */
function __autoload($name) {
    global $autoloadCache;

    if (isset($autoloadCache[strtolower($name)]) && is_file($autoloadCache[strtolower($name)])) {
        require $autoloadCache[strtolower($name)];
    }
}

function recreateAutoloadCache() {
    global $autoloadCache;
    $autoloadCache = array();

    $paths = array(
        APPROOT . '/core/',
        APPROOT . '/forum/',
        APPROOT . '/game/',
        APPROOT . '/site/',
    );

    foreach ($paths as $dir) {
        $Directory = new RecursiveDirectoryIterator($dir);
        $Iterator = new RecursiveIteratorIterator($Directory);
        $Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

        foreach ($Regex as $filename)
            foreach ($filename as $filename) {
                $code = file_get_contents($filename);
                $code = preg_replace('!/\*.*?\*/!s', '', $code);
                $code = preg_replace('/\n\s*\n/', "\n", $code);

                $matches = array();
                preg_match_all('/class +([a-zA-Z0-9_]+)/', $code, $matches);
                if (isset($matches[1]))
                    foreach ($matches[1] as $match)
                        $autoloadCache[strtolower($match)] = $filename;

                $matches = array();
                preg_match_all('/interface +([a-zA-Z0-9_]+)/', $code, $matches);
                if (isset($matches[1]))
                    foreach ($matches[1] as $match)
                        $autoloadCache[strtolower($match)] = $filename;
            }
    }
    file_put_contents(APPROOT . '/cache/autoload.cache', serialize($autoloadCache));
}

// load cache, if exists or create it
global $autoloadCache;
$autoloadCache = array();

if (is_file(APPROOT . '/cache/autoload.cache')) {
    $autoloadCache = unserialize(file_get_contents(APPROOT . '/cache/autoload.cache'));
    if (empty($autoloadCache)) {
        $autoloadCache = array();
        unlink(APPROOT . '/cache/autoload.cache');
        recreateAutoloadCache();
    }
} else {
    recreateAutoloadCache();
}