<?php
/**
 * Demo file import for localhost testing
 */
function ocdi_import_files() {
  return [
    [
      'import_file_name'           => 'Ready Home page',
      'categories'                 => ['Homepage'],
      'import_file_url'            => get_template_directory_uri() . '/inc/demo/demo.xml',
      'import_widget_file_url'     => get_template_directory_uri() . '/inc/demo/widget.wie',
      'import_redux'               => [
        [
          'file_url'    => get_template_directory_uri() . '/inc/demo/redux.json',
          'option_name' => 'wptb_options',
        ],
      ],
      'import_preview_image_url'   => 'http://localhost/my-theme/ocdi/preview_import_image1.jpg',
      'preview_url'                => 'http://localhost/my-theme/my-demo-1',
    ],
  ];
}
add_filter('pt-ocdi/import_files', 'ocdi_import_files');
