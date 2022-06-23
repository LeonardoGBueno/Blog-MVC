<?php

namespace App\Core;

class Router
{
    //Todos os parâmetros da URL em Array
    private array $uriData;
    private string $controller;
    private string $method;

    public function __construct()
    {
        //Controller padrão, ex: HomeController
        $this->controller = 'home';

        //Método padão, ex: index()
        $this->method     = 'index';

        //Chama o método para formatar as propriedades
        $this->format();

        //Executa e chama o método
        $this->run();
    }

    /**
     * Recebe os dados da URI, formata e devolve na propriedade $uriData
     *
     * @return void
     */
    private function format()
    {
        $uri = $_SERVER['REQUEST_URI'];

        if (strpos($uri, '?') > 0)
            $uri = substr($uri, 0, strpos($uri, '?'));
        
        $ex = explode('/', $uri);
     
        if (!is_array($ex))
            return;

        $ex = array_values(array_filter($ex));

        for ($i = 0; $i < REMOVE_INDEX; $i++)
            unset($ex[$i]);

        $this->uriData = array_values($ex);
    }
    
    /**
     * Chama a controller, method e envia os parâmetros para a rota correta
     *
     * @return void
     */
    private function run()
    {
        $controller = $this->getController();

        $method = $this->getMethod($controller);

        $params = $this->getParams();

        call_user_func_array([
            (new $controller),
            $method
        ], $params);
    }
    
    /**
     * Obtém qual controller deve ser executado
     *
     * @return string
     */
    public function getController() : string
    {
        if (isset($this->uriData[0])) {
            $cont = $this->uriData[0];

            $cont = 'App\\Site\\Controller\\' . ucfirst($cont) . 'Controller';

            if (class_exists($cont))
                return $cont;
        }

        return 'App\\Site\\Controller\\' . ucfirst($this->controller) . 'Controller';
    }
    
    /**
     * Obtém qual método deve ser executtado
     *
     * @param  string $controllerPath Endereço da controller
     * @return string
     */
    public function getMethod(string $controllerPath) : string
    {
        $meth = $this->method; //index

        if (isset($this->uriData[1])) 
            $meth = $this->uriData[1]; 

        if (method_exists($controllerPath, $meth)) 
            return $meth; 

        return $this->method; 
    }
    
    /**
     * Obtém os parâmetros necessários para serem passados para o método
     *
     * @return array Retorna a lista de métodos ou um array vazio caso não exista parâmetro
     */
    public function getParams() : array
    {
        if (count($this->uriData) <= 2)
            return [];

        $params = [];

        for($i = 2; $i < count($this->uriData); $i++){
            $params[] = $this->uriData[$i];
        }

        return $params;
    }
}
