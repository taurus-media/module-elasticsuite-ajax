# Taurus ElasticSuite AJAX

AJAX-based layered navigation filtering for Smile ElasticSuite on Hyva themes.

## Features

- **AJAX Filtering**: Intercepts filter clicks on Category and Search Result pages to update the product list and sidebar filters without a full page reload.
- **Hyva Compatible**: Built specifically for Hyva themes, using AlpineJS-friendly patterns and registering for Tailwind CSS processing.
- **URL Management**: Automatically cleans up `ajax=1` parameters from URLs to maintain clean browser history.
- **Smooth UX**: Includes loading states and smooth scrolling to the top of the product list after filter application.

## Installation & Configuration

### Composer Installation

To install the module via Composer, run the following commands in your Magento root directory:

```bash
composer require taurus-media/module-elasticsuite-ajax
bin/magento setup:upgrade
```

### Manual Installation

If you are installing the module manually, place it in `app/code/Taurus/ElasticSuiteAjax` and run:

```bash
bin/magento setup:upgrade
```

### Hyva Compatibility

The module registers itself for Hyva's Tailwind CSS processing via an observer on `hyva_config_generate_before`. This ensures that any Tailwind classes used in the module's templates are correctly included in the theme's CSS.

## Requirements

- Magento 2.4.x
- Smile ElasticSuite
- Hyva Theme
