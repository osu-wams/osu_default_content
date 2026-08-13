<?php

/**
 * @file
 * Post update functions for osu_library_three_column.
 */

declare(strict_types=1);

use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Set the new alt text field for the section library preview photo.
 */
function osu_library_three_column_cards_post_update_preview_alt_text(): TranslatableMarkup {
  $section_storage = Drupal::entityTypeManager()
    ->getStorage('section_library_template');
  /** @var array $section_library_items */
  $section_library_items = $section_storage->loadByProperties(['uuid' => 'd139bfe9-8a30-4f08-9c4a-b442cf82b8c7']);

  if (count($section_library_items) > 0) {
    /** @var \Drupal\section_library\Entity\SectionLibraryTemplate $section_library_item */
    $section_library_item = reset($section_library_items);
    /** @var \Drupal\image\Plugin\Field\FieldType\ImageItem $section_preview */
    $section_preview = $section_library_item->get('image')[0];
    $section_preview->set('alt', 'Example of a three-column card layout. Each column contains a card with an image, a heading, and a short block of text.');
    $section_library_item->save();
  }

  return t('Set alt text for Three Column Library Preview');
}
