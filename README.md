Limited Relations GridField
=================
Adds the ability to limit the number of items in the relationship managed by GridField.

## Maintainer Contact
* Ed Chipman ([UndefinedOffset](https://github.com/UndefinedOffset))

## Requirements
* SilverStripe CMS 4.2+


## Installation
__Composer (recommended):__
```
composer require webbuilders-group/silverstripe-limitedrelationsgridfield
```


If you prefer you may also install manually:
* Download the module from here https://github.com/webbuilders-group/silverstripe-limitedrelationsgridfield/archive/master.zip
* Extract the downloaded archive into your site root so that the destination folder is called limitedrelationsgridfield, opening the extracted folder should contain _config.php in the root along with other files/folders
* Run dev/build?flush=all to regenerate the manifest


## Usage
For many_many relationships simply swap the configuration for the GridField with LRGridFieldConfig_RelationEditor, for example.

```php
//Create a GridField instance with a page length of 10 and a item cound limit of 20
new GridField('MyGridField', 'My GridField', $this->Relationship(), LRGridFieldConfig_RelationEditor::create(10, 20));
```

For has_many relationships simply swap the configuration for the GridField with LRGridFieldConfig_RecordEditor, for example.

```php
//Create a GridField instance with a page length of 10 and a item cound limit of 20
new GridField('MyGridField', 'My GridField', $this->Relationship(), LRGridFieldConfig_RecordEditor::create(10, 20));
```

#### Configuration Options
The LRGridFieldAddExistingAutocompleter component provides a single method that allows changing of the limit, as well this limit can be set as the 3rd parameter to the constructor.

```php
$myLimitedAutoCompleter->setItemLimit(3); //Change the item limit to 3
```

The LRGridFieldDetailForm component provides a single method that allows changing of the limit, as well this limit can be set as the 2nd parameter to the constructor.
```php
$myLimitedDetailForm->setItemLimit(3); //Change the item limit to 3
```
