<?php
/**
 * Created by PhpStorm.
 * User: as
 * Date: 09/01/2017
 * Time: 11:41
 */

namespace App\Supports;


class Assets
{
    protected $js = [];

    protected $css = [];

    public function __construct()
    {
        $this->js = \Config::get('resources.js');
        $this->css = \Config::get('resources.css');
    }

    public function getJavascripts()
    {
        return array_unique($this->js);
    }

    public function getStylesheets()
    {
        return array_unique($this->css);
    }

    public function addJavascripts($appends)
    {
        if (is_array($appends)) {
            $this->js = array_merge($this->js, $appends);
        } else {
            $this->js = array_merge($this->js, [$appends]);
        }
    }

    public function addStylesheets($appends)
    {
        if (is_array($appends)) {
            $this->css = array_merge($this->css, $appends);
        } else {
            $this->css = array_merge($this->css, [$appends]);
        }
    }

    public function removeJavascripts($script)
    {
        $script = is_array($script) ? $script : [$script];
        $this->js = array_filter($this->js , function($val) use ($script) {
          return !in_array($val, $script);
        });
    }

    public function removeStylesheet($css) {
        $css = is_array($css) ? $css : [$css];
        $this->css = array_filter($this->css , function($val) use ($css) {
            return !in_array($val, $css);
        });
    }
}