<?php

namespace Framework;

class View
{

    public string $layout;
    public string $content = '';
    public string $component = '';

    public function __construct($layout, $component)
    {
        $this->layout = $layout;
        $this->component = $component;
    }

    public function render($view, $data = [], $layout = '', $component = ''): string
    {
        $view_file = VIEWS . "/pages/{$view}.php";

        $this->content = $this->buffer($view_file, 'view', $data);
        if (false === $layout || $layout == 'none') {
            return $this->content;
        }

        if (false !== $component || $component == 'none') {
            $component_file_name = $component ?: $this->component;
            $component_file = VIEWS ."/components/{$component_file_name}.php";
            $this->component = $this->buffer($component_file, 'component', $data);
        }
        $layout_file_name = $layout ?: $this->layout;
        $layout_file = VIEWS . "/layouts/{$layout_file_name}.php";
        return $this->buffer($layout_file, 'layout', $data);
    }

    public function renderPartial($view, $data = []): string
    {
        $view_file = VIEWS . "/{$view}.php";
        return $this->buffer($view_file, 'alert', $data);
    }

    protected function buffer($file, $component, $data = []) {
        extract($data);
        if (is_file($file)) {
            extract($data);
            ob_start();
            require_once $file;
            return ob_get_clean();
        } else {
            abort("Not found {$component} {$file}", 500);
        }
    }
}