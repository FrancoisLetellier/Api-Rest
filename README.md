blog-api
========

To use serializer of symfony:

delete commmentary into config.yml -> "serializer: { enable_annotations: true }"
put comment AppKernel.php line -> "new \JMS\SerializerBundle\JMSSerializerBundle(),"

To verify use in the console -> "bin/console debug:container serializer"
You can see "Information for Service "serializer""

A Symfony project created on May 16, 2018, 3:43 pm.
