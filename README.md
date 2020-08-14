# WARNING: Currently under development

# Nouvelle-Techno.fr Sitemap Bundle
Bundle that generates dynamic sitemap.xml content with simple yaml configuration.

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/NouvelleTechno/sitemap-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/NouvelleTechno/sitemap-bundle/?branch=master)

## Installation

`# composer require NouvelleTechno/sitemap-bundle`

### Update your routing

Add a `sitemap.yaml` file inside `config/routes` and include the below content to enable new route

```yaml
sitemap:
    resource: '@SitemapBundle/Controller/SitemapController.php'
    type: annotation
```
The bundle will then listen to `/sitemap.xml` and generate the sitemap by itself

## Usage

The bundle generates a sitemap based on YAML configuration.

Add a `sitemap.yaml` file inside `config/packages` and customize the below example to enable your sitemap

```yaml
sitemap:
    routes:
        # List here the different routes you want to include in the sitemap
        # Single route without parameters
        - { route: 'demos_index' }

        # Route that requires parameters
        - { route: 'demos_show', entity: 'Demos', parameters: 'id' }

        # Coming soon...
        # Adding frequency and priority
```