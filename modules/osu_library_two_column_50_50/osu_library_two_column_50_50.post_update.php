<?php

/**
 * @file
 * Post update functions for osu_library_two_column_50_50.
 */

declare(strict_types=1);

use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Set the new alt text field for the section library preview photo.
 */
function osu_library_two_column_50_50_post_update_preview_alt_text(): TranslatableMarkup {
  $section_storage = Drupal::entityTypeManager()
    ->getStorage('section_library_template');
  /** @var array $section_library_items */
  $section_library_items = $section_storage->loadByProperties(['uuid' => 'e91a5628-cb28-402e-81f8-ba3690768232']);
  /** @var \Drupal\section_library\Entity\SectionLibraryTemplate $section_library_item */
  $section_library_item = reset($section_library_items);
  /** @var \Drupal\image\Plugin\Field\FieldType\ImageItem $section_preview */
  $section_preview = $section_library_item->get('image')[0];
  $section_preview->set('alt', 'Example of a two-column layout with equal-width columns. The left column contains a long text block, and the right column contains an image above a short text block.');
  $section_library_item->save();

  return t('Set alt text for Two Column Equal Width Library Preview');
}
