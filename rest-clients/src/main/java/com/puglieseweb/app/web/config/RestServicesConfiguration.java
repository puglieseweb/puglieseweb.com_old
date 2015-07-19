package com.puglieseweb.app.web.config;


import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;

@Configuration
@ComponentScan(basePackages = "com.puglieseweb.app.web.rest.client")
public class RestServicesConfiguration {


}