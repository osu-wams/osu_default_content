# OSU Default Content

To Export everything needed for a Section Library Item you will need to know the UUID of the library item.
Remove any dependency on the User that created the media item. Will be under the _meta definition in every default yaml.

Set the default user to be user id of `1` for every YAML.

## Examples

Exporting a Media item, and it's file to a folder where the ID of the media item is 31

```shell
drush default-content:export-references media 31 --folder=/tmp/media-export
```


