# Example Complex Extension Attributes
An example of how to create Extension Attributes. The file `extension_attributes.xml` lists a new attribute that refers to an Extension Attribute interface (and class, through a preference). Next, a Plugin is used to add the attribute to the repository input and output. Values are stored in a separate table (see the Setup class). There is a CLI command as a proof of concept.

The "listing" CLI task also shows the workings of a JOIN when collecting lists through a repository.

### Installation
```
composer require yireo-training/magento2-example-complex-extension-attributes:dev-master
```
