Limited Relations GridField
=================
Adds the ability to limit the number of items in the relationship managed by GridField.

## Maintainer Contact
* Ed Chipman ([UndefinedOffset](https://github.com/UndefinedOffset))

## Requirements
* SilverStripe CMS ~6.0


## Installation
__Composer (recommended):__
```
composer require webbuilders-group/silverstripe-limitedrelationsgridfield
```

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
