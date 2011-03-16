package com.puglieseweb.server.domain;

import org.springframework.roo.addon.entity.RooEntity;
import org.springframework.roo.addon.javabean.RooJavaBean;
import org.springframework.roo.addon.tostring.RooToString;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;

@RooJavaBean
@RooToString
@RooEntity
public class Feedback {

    private String feedback;

    @NotNull
    @Size(min = 3, max = 30)
    private String name;

    private String email;
}
