Instructions to install and use
-----------------------

* add it the pom.xml of your project

    <dependency>
      <groupId>info.magnolia</groupId>
      <artifactId>magnolia-blossom-sample-webflow</artifactId>
      <version>1.0.0-SNAPSHOT</version>
    </dependency>

* add this to your applicationContext.xml or equivalent

    <import resource="classpath:/info/magnolia/blossom/sample/webflow/webflow-config.xml" />

* add this to your blossom-servlet.xml or equivalent

    <context:component-scan base-package="info.magnolia.blossom.sample" use-default-filters="false">
        <context:include-filter type="annotation" expression="info.magnolia.module.blossom.annotation.Template"/>
    </context:component-scan>

* add 'booking-flow' as an available component on your areas

    @AvailableComponents({"blossomSampleModule:components/bookingFlow"})

    or:

    @AvailableComponentClasses(BookingFlowComponent.class)

Note on caching
-----------------------

The flow execution key is embedded within the html as a hidden input field. Therefore a page containing a web flow must
not be cached, otherwise users getting the page from cache would use a flow that no longer exists.

Known limitations
-----------------------

Spring WebFlow heavily uses redirects to navigate between steps, this works in a standard Magnolia installation since
the cache and gzip filter will allow a redirect to be set at any time. With these filters turned off however you will
not be able to issue a redirect from a paragraph. This is the exact same problem that pre-execution in blossom solves.
As of Spring WebFlow 2.0 rendering is not performed by Spring Web MVC, instead WebFlow does view rendering on its own
(although it uses the same classes as Spring Web MVC) which is why Blossom pre-execution out of the box can't handle it
for Spring WebFlow.
