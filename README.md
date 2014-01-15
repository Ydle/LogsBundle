LogsBundle
==========

Logs actions of the YDLE hub


Installation :

Ajouter à votre fichier composer.json : "ydle/logs-bundle": "dev-master"

Ajoutez le bundle à AppKernel :

new Ydle\LogsBundle\YdleLogsBundle(),

Ajoutez ensuite à votre fichier de routing :

ydle_logs:
    resource: "@YdleLogsBundle/Resources/config/routing.yml"
    prefix:   /
    
Puis modifiez votre config.yml pour ajouter le mapping :
doctrine:
    orm:
        entity_managers:
            default:
                mappings:
                    YdleLogsBundle: ~

Mettez ensuite votre base de données à jour :
app/console doctrine:schema:update --dump-sql
puis :
app/console doctrine:schema:update --force

Et voila, le bundle est désormais activé.