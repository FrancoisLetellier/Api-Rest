blog-api
========
To install JMSSerializer: -find in pakagist https://packagist.org/packages/jms/serializer-bundle

$ composer require jms/serializer-bundle
Verify in AppKernel.php in the bundles new \JMS\SerializerBundle\JMSSerializerBundle(),
To verify if Symfony use JMS Serializer : bin/console debug:container serializer A memu with JMS serialize 
we can see into the the console


To install JMSSerializer:
-find in pakagist https://packagist.org/packages/jms/serializer-bundle
- $ composer require jms/serializer-bundle
- Verify in AppKernel.php in the bundles
new \JMS\SerializerBundle\JMSSerializerBundle(),

To verify if Symfony use JMS Serializer :
bin/console debug:container serializer
A memu with JMS serialize we can see into the the console


We are creating two type service Listener and Handler.
Watch into service.yml to active one or other.



To use serializer of symfony:

delete commmentary into config.yml -> "serializer: { enable_annotations: true }"
put comment AppKernel.php line -> "new \JMS\SerializerBundle\JMSSerializerBundle(),"

To verify use in the console -> "bin/console debug:container serializer"
You can see "Information for Service "serializer""

A Symfony project created on May 16, 2018, 3:43 pm.
