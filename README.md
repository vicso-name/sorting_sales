# WooCommerce Sales Sorting Filter

This WooCommerce plugin adds a new sorting option for products to the shop catalog, allowing customers to sort by items that are currently on sale. The sorting option orders items by sale price in descending order.

## Features

- Adds a "Sort by on sale" option to the WooCommerce product sorting dropdown.
- Sorts products based on their sale price (highest to lowest).
- Integrates seamlessly with WooCommerce's existing sorting functionality.

## Installation

1. Download the `woocommerce-sales-sorting-filter.php` file.
2. Upload the file to your WordPress theme or child theme's `functions.php` file, or create a custom plugin and include the file there.
3. Ensure that WooCommerce is installed and activated on your WordPress site.
4. The new "Sort by on sale" option will automatically appear in your product sorting dropdown on the shop page.

## Usage

Once installed, navigate to the shop page of your WooCommerce store. In the sorting dropdown, you'll find a new option called "Sort by on sale." Selecting this option will reorder the products, displaying items with sale prices first, sorted from the highest sale price to the lowest.

## Code Overview

The filter hooks used in this plugin are:

- `woocommerce_get_catalog_ordering_args`: Modifies the query arguments to sort products by sale price when the "Sort by on sale" option is selected.
- `woocommerce_default_catalog_orderby_options` & `woocommerce_catalog_orderby`: Adds the "Sort by on sale" option to the product sorting dropdown.

### Key Functions:

- **`wcs_get_catalog_ordering_args( $args )`**:
  Modifies the WooCommerce query arguments when the user selects the "on sale" sorting option. It orders the products based on their `_sale_price` meta key in descending order.

- **`wcs_add_catalog_orderby_option( $sortby )`**:
  Adds the "Sort by on sale" label to the WooCommerce sorting dropdown.

## Customization

You can easily modify the sort order by adjusting the `$args['order']` value in the `wcs_get_catalog_ordering_args` function:

- `DESC` for descending order (highest sale price first)
- `ASC` for ascending order (lowest sale price first)

## Localization

To make the "Sort by on sale" option translatable, we’ve added a text domain in the code. Be sure to replace `'your-text-domain'` with your theme or plugin’s actual text domain for proper localization.

## License
This project is licensed under the MIT License.