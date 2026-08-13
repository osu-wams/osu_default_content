<?php

/**
 * @file
 * Post update functions for osu_library_two_column_25_75.
 */

declare(strict_types=1);

use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Set the new alt text field for the section library preview photo.
 */
function osu_library_two_column_25_75_post_update_preview_alt_text(): TranslatableMarkup {
  $section_storage = Drupal::entityTypeManager()
    ->getStorage('section_library_template');
  /** @var array $section_library_items */
  $section_library_items = $section_storage->loadByProperties(['uuid' => 'f5f32813-2eb8-49ac-b5d6-df111babdb7c']);
  /** @var \Drupal\section_library\Entity\SectionLibraryTemplate $section_library_item */
  $section_library_item = reset($section_library_items);
  /** @var \Drupal\image\Plugin\Field\FieldType\ImageItem $section_preview */
  $section_preview = $section_library_item->get('image')[0];
  $section_preview->set('alt', 'Example of a two-column layout with 25/75 column widths. Left is 25 percent and a text block and right is 75 percent with a large image.');
  $section_library_item->save();

  return t('Set alt text for Two Column 25/75 Library Preview');
}
