<?php
	namespace Framework;

    class Controller
    {
        protected $params = [];

        public function __construct($params)
        {
            $this->params = $params;
        }

//        public function render($view, $data = [])
//        {
//            extract($data);
//            $controller = str_replace('Controller', '', basename(get_class($this)));
//            $viewPath = "app/views/pages/{$view}.php";
//            if (file_exists($viewPath)) {
//                require $viewPath;
//            } else {
//                echo "Представление {$view} не найдено";
//            }
//        }
    }
