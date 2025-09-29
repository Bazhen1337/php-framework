<?php

namespace Framework;

class Application
{
    protected string $uri;
    public Request $request;
    public Response $response;
    public Router $router;
    public View $view;
    public Session $session;
    public Database $db;
    public static Application $app;

    public function __construct()
    {
        self::$app = $this;
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->request = new Request($this->uri);
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View(LAYOUT, COMPONENT);
        $this->session = new Session();
        $this->generateScrfToken();
        $this->db = new Database();
    }

    public function run()
    {
        echo $this->router->dispatch();
    }

    public function generateScrfToken(): void
    {
        if(!$this->session->has('csrf_token')){
            $this->session->set('csrf_token', md5(uniqid(mt_rand(), true)));
        }
    }

}