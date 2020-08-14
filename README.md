# WARNING: Currently under development - Nouvelle-Techno.fr Sitemap Bundle
Bundle that generates dynamic sitemap.xml content with simple yaml configuration.

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/aca709cea5de408fb1ed4a7dce569cd6)](https://www.codacy.com/manual/NouvelleTechno/sitemap-bundle?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=NouvelleTechno/sitemap-bundle&amp;utm_campaign=Badge_Grade)

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