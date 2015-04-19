<?php namespace Website\Providers;

use Illuminate\Support\ServiceProvider;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DoctrineServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app()->singleton("doctrine",function(){
            $this->app()->configure("database");
            $this->getEntityManager();

        });
        $this->app->controller("",new \Website\Http\Controllers\TopController());
        $this->app->controller("/account/",new \Website\Http\Controllers\AccountController());
    }

    /**
     * @return \Chatbox\Rumic\Application
     */
    protected function app(){
        return $this->app;
    }

    protected function getEntityManager(){
        $conn = config("database.doctrine.conn");
        $config = $this->getConfig();
        return EntityManager::create($conn,$config);
    }

    protected function getConfig(){
        $type = config("database.doctrine.metadata.type");
        $path = config("database.doctrine.metadata.path");
        $isDevMode = config("database.doctrine.isDevMode",false);

        switch($type){
            case "annotation":
                $config = Setup::createAnnotationMetadataConfiguration($path, $isDevMode);
                break;
            case "xml":
                $config = Setup::createXMLMetadataConfiguration($path, $isDevMode);
                break;
            case "yaml":
                $config = Setup::createYAMLMetadataConfiguration($path, $isDevMode);
                break;
            default:
                throw new \Exception("invalid metadata setting");
        }
        return $config;
    }
}
