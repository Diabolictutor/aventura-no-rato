<?php

/**
 * 
 */
class View {

    public static $POS_INIT = 1;
    public static $POS_HEAD = 2;
    public static $POS_END = 3;
//
    private $layout;
    private $scripts;
    private $styles;
    private $jsInit;
    private $jsEnd;
    private $data;
    private $parcials;
    private $controller;
    private $jsEndFiles;
    private $scriptFiles;

    public function __construct($controller, $layout = 'site') {
        $this->controller = $controller;
        $this->layout = $layout;
        $this->scripts = array();
        $this->styles = array();
        $this->jsInit = array();
        $this->jsEnd = array();
        $this->data = array();
        $this->parcials = array();
        $this->jsEndFiles = array();
        $this->scriptFiles = array();
    }

    public function __get($name) {
        return (isset($this->data[$name]) ? $this->data[$name] : null);
    }

    /**
     *
     * @param array $path
     * @param array $params
     * @return string 
     */
    public function createURL($path, $params = array()) {
        $ps = array();
        if (isset($path['r'])) {
            $ps[] = $path['r'];
        }

        if (isset($path['c'])) {
            $ps[] = $path['c'];
        }

        if (isset($path['a'])) {
            $ps[] = $path['a'];
        }

        foreach ($params as $key => $value) {
            $ps[] = $key . '=' . urlencode($value);
        }

        if (empty($ps)) {
            return System::app()->getURL();
        }

        return System::app()->getURL() . '/index.php?' . implode('&', $ps);
    }

    public function includeViewFile($name) {
        $name = VIEWROOT . '/' . $name . '.php';
        if (is_file($name))
            include $name;
    }

    /**
     *
     * @param string $script
     * @param integer $pos 
     */
    public function registerScript($script, $pos = 2) {

        if ($pos == self::$POS_END) {
            $this->jsEnd[] = $script;
        } else if ($pos == self::$POS_INIT) {
            $this->jsInit[] = $script;
        } else if ($pos == self::$POS_HEAD) {
            $this->scripts[] = $script;
        }
    }

    public function registerScriptFile($scriptFile, $pos = 2) {

        if ($pos == self::$POS_END) {
            $this->jsEndFiles[] = $scriptFile;
        } else if ($pos == self::$POS_HEAD) {
            $this->scriptFiles[] = $scriptFile;
        }
    }

    /**
     *
     * @param string $style 
     */
    public function registerStyle($style) {
        $this->styles[] = $style;
    }

//Jorge
    public function getStyleSection() {
        ob_start();

        if (!empty($this->styles)) {
            foreach ($this->styles as $st) {
                echo '<link rel="stylesheet" type="text/css" href="', $st, '" />', "\n";
            }
        }

        return ob_get_clean();
    }

    public function getScriptSection() {
        ob_start();

        if (!empty($this->jsEndFiles)) {
            foreach ($this->jsEndFiles as $js) {
                echo '<script type="text/javascript" src="', $js, '"></script>', "\n";
            }
        }
        if (!empty($this->jsEndFiles)) {
            foreach ($this->jsEndFiles as $js) {
                echo '<script type="text/javascript">', $js, '</script>', "\n";
            }
        }
        return ob_get_clean();
    }

    /**
     *
     * @return type 
     */
    public function getInitScriptSection() {
        ob_start();

        if (!empty($this->jsInit)) {
            echo '<script type="text/javascript">', "\n";
            echo '$(function() {', "\n";
            foreach ($this->jsInit as $js) {
                echo $js, "\n";
            }
            echo '});', "\n";
            echo '</script>', "\n";
        }
        return ob_get_clean();
    }

//Jorge
    public function getEndScriptSection() {
        ob_start();

        if (!empty($this->scriptFiles)) {
            foreach ($this->scriptFiles as $js) {
                echo '<script type="text/javascript" src="', $js, '"></script>', "\n";
            }
        }
        if (!empty($this->scripts)) {
            foreach ($this->scripts as $js) {
                echo '<script type="text/javascript">', $js, '</script>', "\n";
            }


            return ob_get_clean();
        }
    }

    /**
     *
     * @return type 
     */
    public function getContentSection() {
        ob_start();
        foreach ($this->parcials as $parcial) {
            echo $parcial;
        }

        return ob_get_clean();
    }

    /**
     *
     * @param type $view
     * @param type $data
     * @param type $return
     * @return type 
     */
    public function render($view, $data = array(), $return = false) {
        if (empty($view)) {
            throw new Exception('Invalid view.');
        }

        if (is_object($data)) {
            $data = get_object_vars($data);
        } else if (!is_array($data)) {
            $data = array($data => $data);
        }
        $this->data = array_merge($this->data, $data);

        $file = VIEWROOT . '/' . $view . '.php';
        ob_start();
        if (is_file($file)) {
            include $file;
        } else if (is_file($view)) {
            include $view;
        }

        if ($return) {
            return ob_get_clean();
        }
        $this->parcials[] = ob_get_clean();
        $this->output();
    }

    /**
     * 
     */
    private function output() {
        $path = VIEWROOT . '/layouts/' . $this->layout . '.php';
        if (is_file($path)) {
            ob_start();
            include $path;
            echo ob_get_clean();
        }
    }

}
