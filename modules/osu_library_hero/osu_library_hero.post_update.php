<?php

/**
 * @file
 * Post update functions for osu_library_hero.
 */

declare(strict_types=1);

use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Set the new alt text field for the section library preview photo.
 */
function osu_library_hero_post_update_preview_alt_text(): TranslatableMarkup {
  $section_storage = Drupal::entityTypeManager()
    ->getStorage('section_library_template');
  /** @var array $section_library_items */
  $section_library_items = $section_storage->loadByProperties(['uuid' => '93f31c1f-c230-4449-a8cd-f5918aeb2853']);
  /** @var \Drupal\section_library\Entity\SectionLibraryTemplate $section_library_item */
  $section_library_item = reset($section_library_items);
  /** @var \Drupal\image\Plugin\Field\FieldType\ImageItem $section_preview */
  $section_preview = $section_library_item->get('image')[0];
  $section_preview->set('alt', 'Example of a hero banner layout with centered text content and call-to-action button on a pink background featuring a repeating image pattern.');
  $section_library_item->save();

  return t('Set alt text for Hero Library Preview');
}
